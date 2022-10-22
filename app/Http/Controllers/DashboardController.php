<?php
namespace App\Http\Controllers;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File; 
use DB;
use DateTime;
use ZipArchive;

class DashboardController extends Controller {


   	// dashboard page protection
	public function dashboard(Request $request){
		
		if ($request->session()->has('user_email')) {
			$email = Session::get('user_email');
			$user_details = DB::table('admins')->where('email',$email)->first();

			$wines=DB::select('SELECT * FROM (wines)');
			$wine_lists=DB::select('SELECT * FROM (wine_lists)');
		   	
		   	return view('dashboard', compact(['user_details','wines','wine_lists']));
		   
		}else{
			Session::flash('error','You are not loged in');
			return redirect()->route('login_default');
		}
	}




	// save_wine

	public function save_wine(Request $request){


		if ($request->session()->has('user_email')) {

				if ($request->isMethod('post') && !empty($request->input('name'))) {

				$last_wine = DB::table('wines')->orderBy('id', 'desc')->first();
				$next_wine=(int)$last_wine->id+1;

				$name=$request->input('name');
				$country=$request->input('country');
				$region=$request->input('region');
				$winery=$request->input('winery');
				$grapes=$request->input('grapes');
				$category=$request->input('category');
				$description=$request->input('description');

				$picture=$request->picture;
					
				
				if(!empty($picture)){
	            $name_img = $category.'_'.$next_wine.'.'.$picture->getClientOriginalExtension();
	            $destinationPath = public_path('owner/wines');
	            $picture->move($destinationPath, $name_img);
	            $picture_url = $name_img;
		        }else{
		        	$picture_url="";
		        }

		        $images="//images/".$picture_url;

		       
				$regi=DB::insert('insert into wines (category,country,region,winery,name,grapes,description,images,picture,added_at) values(?,?,?,?,?,?,?,?,?,?)',[$category,$country,$region,$winery,$name,$grapes,$description,$images,$picture_url,date('Y-m-d H:i:s')]);
				if($regi){
					Session::flash('message','Wine Added successfully');
					return redirect()->route('dashboard');
				}else{
					Session::flash('error','Not Successful');
					return redirect()->route('dashboard');
				}
				

		}else{
            Session::flash('error','Fields cannot be empty');
			return redirect()->route('dashboard');
		}

		    
		}else{
			Session::flash('error','You are not loged in');
			return redirect()->route('login_default');
		}

	}//save_wine



	
	// edit_service

	public function edit_wine(Request $request){

		if ($request->session()->has('user_email')) {

				if ($request->isMethod('post') && !empty($request->input('name'))) {
				$id=$request->input('id');
				$name=$request->input('name');
				$country=$request->input('country');
				$region=$request->input('region');
				$winery=$request->input('winery');
				$grapes=$request->input('grapes');
				$category=$request->input('category');
				$description=$request->input('description');
				

				$picture=$request->picture;
					
				
				if(!empty($picture)){
	            $name_img = $category.'_'.$id.'.'.$picture->getClientOriginalExtension();
	            $destinationPath = public_path('owner/wines');
	            $picture->move($destinationPath, $name_img);
	            $picture_url = $name_img;
		        }else{
		        	$picture_url=$request->input('picture_url');
		        }
				
				
				$images="//images/".$picture_url;
		      
		        $regi=DB::update('UPDATE wines SET category=?,country=?,region=?,winery=?,name=?,grapes=?,description=?,images=?,picture=? WHERE id=?',[$category,$country,$region,$winery,$name,$grapes,$description,$images,$picture_url,$id]);

				
				if($regi){
					Session::flash('message','Wine Updated Successfully!');
					return redirect()->route('dashboard');
				}else{
					Session::flash('error','Not Successful');
					return redirect()->route('dashboard');
				}
				

		}else{
            Session::flash('error','Fields cannot be empty');
			return redirect()->route('dashboard');
		}

		    
		}else{
			Session::flash('error','You are not loged in');
			return redirect()->route('login_default');
		}

	}//edit_service






	//delete_service
	public function delete_wine(Request $request,$id){
		if ($request->session()->has('user_email')) {
		   $delete_user=DB::delete('DELETE FROM wines WHERE id=?',[$id]);

		   	Session::flash('message','wine successfully deleted');
		   	return redirect()->route('dashboard');
		  
		}else{
			Session::flash('message','You are not loged in');
			return redirect()->route('login_default');
		}
	}
	//delete_service



		//delete_service
	public function delete_wine_list(Request $request,$id){
		if ($request->session()->has('user_email')) {
		   $delete_user=DB::delete('DELETE FROM wine_lists WHERE id=?',[$id]);

		   	Session::flash('message','Wine list successfully deleted');
		   	return redirect()->route('wine_lists');
		  
		}else{
			Session::flash('message','You are not loged in');
			return redirect()->route('login_default');
		}
	}
	//delete_service




		//delete_service
	public function delete_wine_from_list(Request $request,$id){
		if ($request->session()->has('user_email')) {
		   $delete_user=DB::delete('DELETE FROM wines_in_list WHERE id=?',[$id]);

		   	Session::flash('message','Wine from the list successfully deleted');
		   	return redirect()->route('wine_lists');
		  
		}else{
			Session::flash('message','You are not loged in');
			return redirect()->route('login_default');
		}
	}
	//delete_service




	// show profile
	public function profile(Request $request){
		
		if ($request->session()->has('user_email')) {
			$email = Session::get('user_email');
			$user_id = Session::get('user_id');
			$user_details = DB::table('admins')->where('email',$email)->first();
			

			return view('profile', compact(['user_details']));		    
		}else{
			Session::flash('error','You are not loged in');
			return redirect()->route('login_default');
		}
	}// show profile




	// save_member

	public function save_profile(Request $request){
				
		if ($request->session()->has('user_email')) {

				if ($request->isMethod('post') && !empty($request->input('current_pwd'))) {

				$current_pwd=$request->input('current_pwd');
				$pwd=$request->input('pwd');
				$pwd_confirm=$request->input('pwd_confirm');

				$user_id=Session::get('user_id');
				
				$admin = DB::table('admins')->where('id',$user_id)->first();
				 
		      	if(password_verify($current_pwd, $admin->password)){

				if (!empty($pwd_confirm) && !empty($pwd) && $pwd!=$pwd_confirm) {
					
					Session::flash('error','New Password not match!');
					 return redirect()->route('profile');
				}else{

					$uppercase = preg_match('@[A-Z]@', $pwd);
					$lowercase = preg_match('@[a-z]@', $pwd);
					$number    = preg_match('@[0-9]@', $pwd);

					if(!$uppercase && !$lowercase || !$number || strlen($pwd) < 8) {
					 
					  Session::flash('error','Password must be at least 8 charecters and contain number and letter!');
					   return redirect()->route('profile');
					}

				}

			}else{
				
				 Session::flash('error','Current Password wrong!');
				 return redirect()->route('profile');
			}


				$pwd = password_hash($pwd, PASSWORD_BCRYPT);
        		$update=DB::update('UPDATE admins SET password=? WHERE id=?',[$pwd,$user_id]);
				
				if($update){
					Session::flash('message','Password changed successfully');
					return redirect()->route('profile');
				}else{
					Session::flash('error','Password changes not successful');
					return redirect()->route('profile');
				}
				

		}elseif($request->isMethod('post') && !empty($request->input('text_color'))){
			$text_color=$request->input('text_color');
			$bg_color1=$request->input('bg_color1');
			$bg_color2=$request->input('bg_color2');
			$user_id=Session::get('user_id');
			$update=DB::update('UPDATE admins SET text_color=?,bg_color1=?,bg_color2=? WHERE id=?',[$text_color,$bg_color1,$bg_color2,$user_id]);
			
			Session::flash('message','Color Updated!');
			return redirect()->route('profile');
			
				
		}elseif($request->isMethod('post') && !empty($request->input('gift_method'))){
			$gift_method=$request->input('gift_method');
			$gift_username=$request->input('gift_username');
			$comment=$request->input('comment');			
			$user_id=Session::get('user_id');
			$update=DB::update('UPDATE admins SET gift_method=?,gift_username=?,comment=? WHERE id=?',[$gift_method,$gift_username,$comment,$user_id]);
			
			Session::flash('message','Gift method Updated!');
			return redirect()->route('profile');
			
				
		}elseif($request->isMethod('post') && !empty($request->input('profilepic'))){
			$image = $request->img;
			if(!empty($image)){
			$name = time().'.'.$image->getClientOriginalExtension();
			$destinationPath = public_path('owner/profile-image');
			$image->move($destinationPath, $name);
			$image_url = 'owner/profile-image/' . $name;
			}else{
		        	$image_url="";
		        }
			$user_id=Session::get('user_id');
			$update=DB::update('UPDATE admins SET image=? WHERE id=?',[$image_url,$user_id]);
			
			Session::flash('message','Profile picture updated!');
			return redirect()->route('profile');
			
		}else{
            Session::flash('error','Fields cannot be empty');
			return redirect()->route('profile');
		}

		    
		}else{
			Session::flash('error','You are not loged in');
			return redirect()->route('login_default');
		}

	}//save_member






	// make_list

	public function make_list(Request $request){


		if ($request->session()->has('user_email')) {

				if ($request->isMethod('post') && !empty($request->input('wine_list_id'))) {

				$wine_list_id=$request->input('wine_list_id');
				$wine_ids= $request->input('wine_id');

				if (!empty($wine_ids)) {
					foreach ($wine_ids as $key => $wine_id) {
						$regi=DB::insert('insert into wines_in_list (wine_list_id,wine_id) values(?,?)',[$wine_list_id,$wine_id]);
					}
				}
				
				if($regi){
					Session::flash('message','Wine Added to list successfully');
					return redirect()->route('dashboard');
				}else{
					Session::flash('error','Not Successful');
					return redirect()->route('dashboard');
				}
				

		}else{
            Session::flash('error','Fields cannot be empty');
			return redirect()->route('dashboard');
		}

		    
		}else{
			Session::flash('error','You are not loged in');
			return redirect()->route('login_default');
		}

	}//save_wine





	// save_wine_list

	public function save_wine_list(Request $request){


		if ($request->session()->has('user_email')) {

				if ($request->isMethod('post') && !empty($request->input('name'))) {

				$name=$request->input('name');	
		       
				$regi=DB::insert('insert into wine_lists (name) values(?)',[$name]);
				if($regi){
					Session::flash('message','Wine Added successfully');
					return redirect()->route('wine_lists');
				}else{
					Session::flash('error','Not Successful');
					return redirect()->route('wine_lists');
				}
				

		}else{
            Session::flash('error','Fields cannot be empty');
			return redirect()->route('wine_lists');
		}

		    
		}else{
			Session::flash('error','You are not loged in');
			return redirect()->route('login_default');
		}

	}//save_wine




	// wine_lists
	public function wine_lists(Request $request){
		
		if ($request->session()->has('user_email')) {
			$email = Session::get('user_email');
			$user_details = DB::table('admins')->where('email',$email)->first();

		   	$wine_lists=DB::select('SELECT * FROM (wine_lists)');
		   	return view('wine_lists', compact(['user_details','wine_lists']));

		}else{
			Session::flash('error','You are not loged in');
			return redirect()->route('login_default');
		}
	} // wine_lists




	// particular wine for list
	public function wines(Request $request,$id){
		
		if ($request->session()->has('user_email')) {
			$email = Session::get('user_email');
			$user_details = DB::table('admins')->where('email',$email)->first();
		
		   		
		   		$list_wines = DB::table('wines_in_list')->where('wine_list_id','=',$id)->orderBy('order_id', 'asc')->get();
		   		$wine_lists=DB::select('SELECT * FROM (wine_lists)');
		   		return view('wines_in_list', compact(['user_details','list_wines','id','wine_lists']));
		  
		}else{
			Session::flash('error','You are not loged in');
			return redirect()->route('login_default');
		}
	}




	// sortable wine for list
	public function sortable(Request $request){
		
		if ($request->session()->has('user_email')) {
			$email = Session::get('user_email');
			$user_details = DB::table('admins')->where('email',$email)->first();
			
			
			$post_order = isset($request->post_order_ids) ? $request->post_order_ids : [];

			if(count($post_order)>0){
				for($order_no= 0; $order_no < count($post_order); $order_no++)
				{
				 $update=DB::update('UPDATE wines_in_list SET order_id=? WHERE id=?',[($order_no+1),$post_order[$order_no]]);
				}
				echo true; 
			}else{
				echo false; 
			}
						   		
		  
		}else{
			Session::flash('error','You are not loged in');
			return redirect()->route('login_default');
		}
	}


	// export wines
	 public function index(Request $request)
    {
        if($request->has('download')) {
        	File::delete(public_path('images.zip'));
        	$wine_ids = DB::table('wines_in_list')->where('wine_list_id',$request->download)->get();

        	// Define Dir Folder
        	$public_dir=public_path();
        	// Zip File Name
            $zipFileName = 'images.zip';
            // Create ZipArchive Obj
            $zip = new ZipArchive;
            if ($zip->open($public_dir . '/' . $zipFileName, ZipArchive::CREATE) === TRUE) {
            	// Add File in ZipArchive
            	foreach ($wine_ids as $key => $wine_id) {
					$wine_details = DB::table('wines')->where('id',$wine_id->wine_id)->first();
					
					 $zip->addFile(public_path('owner/wines/'.$wine_details->picture),$wine_details->picture);
					// echo public_path('owner/wines/'.$wine_details->picture);
					// $zip->addFile(public_path('owner/wines/'.$wine_details->picture));

				}
               
                // Close ZipArchive     
                $zip->close();
            }
            // Set Header
            $headers = array(
                'Content-Type' => 'application/octet-stream',
            );
            $filetopath=$public_dir.'/'.$zipFileName;
            // Create Download Response
            if(file_exists($filetopath)){
                return response()->download($filetopath,$zipFileName,$headers);
            }
        }
       
    }






	// export wines
	public function export(Request $request,$id){
		
			if ($request->session()->has('user_email')) {
				$email = Session::get('user_email');
				$user_details = DB::table('admins')->where('email',$email)->first();
				
				// $wine_ids=DB::select('SELECT * FROM (wines_in_list) WHERE wine_list_id=?',[$id]);
				$wine_ids = DB::table('wines_in_list')->where('wine_list_id',$id)->orderBy('order_id', 'asc')->get();

				// echo "<pre>"; var_dump($wine_ids); echo "</pre>";die();
				$FileName = "exported.csv";
				$file = fopen($FileName,"w");
				$array = array("country","region","winery","name","grapes","description","images");
				fputcsv($file,$array);



				// $zipname = 'file.zip';
				// $zip = new ZipArchive;
				// $zip->open($zipname, ZipArchive::CREATE);



				foreach ($wine_ids as $key => $wine_id) {
					$wine_details = DB::table('wines')->where('id',$wine_id->wine_id)->first();
					$array = array($wine_details->country,$wine_details->region,$wine_details->winery,$wine_details->name,$wine_details->grapes,$wine_details->description,$wine_details->images);
					fputcsv($file,$array);

					// echo public_path('owner/wines/'.$wine_details->picture);
					// $zip->addFile(public_path('owner/wines/'.$wine_details->picture));

				}

				fclose($file);
				header('Content-Type: application/csv');
				header('Content-Disposition: attachment; filename="exported.csv"');
				readfile($FileName);


				// $zip->close();
				// header('Content-Type: application/zip');
				// header('Content-disposition: attachment; filename='.$zipname);
				// header('Content-Length: ' . filesize($zipname));
				// readfile($zipname);
							   		
			  
			}else{
				Session::flash('error','You are not loged in');
				return redirect()->route('login_default');
			}
		}



			

		
	}




?>
