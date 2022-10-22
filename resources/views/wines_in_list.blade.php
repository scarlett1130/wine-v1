@extends('head')
@section('maincontent')
<?php



?>
<section role="main" class="content-body">
<!-- 	<header class="page-header">
		<h2>Weinkarten</h2>
	
		<div class="right-wrapper text-right">
			<ol class="breadcrumbs">
				<li>
					<a href="{{route('dashboard')}}">
						<i class="fas fa-home"></i>
					</a>
				</li>
				<li><span>Pages</span></li>
				<li><span>Weinkarten</span></li>
			</ol>
	
			<a class="sidebar-right-toggle" href="javascript:void(0)"><i class="fas fa-chevron-left"></i></a>
		</div>
	</header> -->

	<!-- start: page -->
	<div class="row">
      <div class="col-md-12">
         <section class="card">
           <!--  <header class="card-header bg-theme">
               <div class="card-actions">
                  <a href="#" class="card-action card-action-toggle" data-card-toggle></a>
                  <a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
               </div>
              
               <h2 id="wine" class="card-title text-center color-theme">Wine List</h2>
            </header> -->

            <div class="card-body">
                @if($user_details->role=='admin')
               <a href="{{ route('create-zip',['download'=> $id]) }}" class="btn btn-info" >Bildern Exportieren</a>
               <a href="{{url('/export')}}/{{$id}}" class="btn btn-info" >CSV Exportieren</a>
               @endif
             <form action="{{route('make_list')}}" method="post">
              @csrf
               <div class="row my-2">
                  
                  
                  <div class="col-md-6 text-center">
                     <button type="submit" class="btn btn-info w-100">Diese Weinkarte kopieren nach...</button>
                  </div>
                  <div class="col-md-6 text-center">
                     <select class="form-control" required="1" name="wine_list_id">
                        <option value="">Weinkarte Auswählen</option>
                        @foreach($wine_lists as $wine_list)
                        <option value="{{$wine_list->id}}">{{$wine_list->name}}</option>
                        @endforeach
                     </select>
                  </div>
               </div>
              
               <div class="dt-bootstrap4 no-footer">
               	 
                  <div class="alert icon-alert with-arrow alert-success form-alter" role="alert">
                    <i class="fa fa-fw fa-check-circle"></i>
                    <strong> Success ! </strong> <span class="success-message"> Wine Order has been updated successfully </span>
                  </div>
                  <div class="alert icon-alert with-arrow alert-danger form-alter" role="alert">
                    <i class="fa fa-fw fa-times-circle"></i>
                    <strong> Note !</strong> <span class="warning-message"> Empty list cant be ordered </span>
                  </div>
              
                  <div class="table-responsive">
                   
                     <table class="table table-bordered table-striped">
            						<thead align="center">
            							<tr>
                            <th>Weinart</th>
            								<th>Bild</th>
            								<th>Name</th>
            								<th>Land</th>
            								<th>Region</th>
                            
            								<th>Weingut</th>
            								<th>Rebsorte</th>
            								<th>Beschreibung</th>
                            <th>Aus Weinkarte löschen</th>           								
            							</tr>
            						</thead>
            						<tbody align="center" id="post_list">
            							
            								@foreach($list_wines as $key => $list_wine)
                            <?php $wine=DB::table('wines')->where('id',$list_wine->wine_id)->first(); ?>
                              <input type="hidden" name="wine_id[]" value="{{$list_wine->wine_id}}">
            									<tr data-post-id= {{$list_wine->id}}>
            										 @if($wine)
                                 <td>{{$wine->category}}</td>
            										<td>
                                            
                                             <img width="15" src="{{asset('owner/wines/'.$wine->picture)}}">
                                             
                                          </td>
            										<td>{{$wine->name}}</td>
            										<td>{{$wine->country}}</td>
            										<td>
            											{{$wine->region}}
            										</td>
                                
            										<td>
            											{{$wine->winery}}
            										</td>
            										<td>
            											{{$wine->grapes}}
            										</td>
            										<td>
                                  {{$wine->description}}
                                </td>
                                <td> <a data-confirm="This will permanently remove the wine from the list, are you sure you want to delete?" class="text-danger" href="{{url('delete_wine_from_list')}}/{{$list_wine->id}}"><i class="fa fa-trash"></i></a></td>
            										@endif
            										
            									</tr>
            								@endforeach
            							
            						</tbody>
            					</table>
                  </div>
               </div>
               </form>
            </div>
         </section>
      </div>
    </div>

	<!-- end: page -->
</section>



@endsection