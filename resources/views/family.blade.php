@extends('head')
@section('maincontent')

<section role="main" class="content-body">
	<header class="page-header">
		<h2>Family</h2>
	
		<div class="right-wrapper text-right">
			<ol class="breadcrumbs">
				<li>
					<a href="{{route('dashboard')}}">
						<i class="fas fa-home"></i>
					</a>
				</li>
				<li><span>Pages</span></li>
				<li><span>Family</span></li>
			</ol>
	
			<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fas fa-chevron-left"></i></a>
		</div>
	</header>

	<!-- start: page -->
	<div class="row">
      <div class="col-md-12">
         <section class="card">
            <header class="card-header bg-theme">
               <div class="card-actions">
                  <a href="#" class="card-action card-action-toggle" data-card-toggle></a>
                  <a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
               </div>
   
               <h2 class="card-title text-center color-theme">My Funnels</h2>
            </header>
            <div class="card-body">
                 @if (!empty($my_flowers_id)) 
					@for ($i=0; $i < count($my_flowers_id); $i++)
					<?php $flower_status = DB::table('flowers')->where('id',$my_flowers_id[$i])->first(); ?>
						<!-- accordian -->
						<div id="accordion">
						   <div class="card">
						      <div id="heading{{$i}}">
						         <h5 class="m-0 p-0">
						            <button class="btn @if($flower_status->active==0) btn-dark @else btn-success @endif text-white w-100 collapsed" data-toggle="collapse" data-target="#collapse{{$i}}" aria-expanded="false" aria-controls="collapse{{$i}}">
						            Funnel (#<?php echo $my_flowers_id[$i];?>)
						            </button>
						         </h5>
						      </div>
						      <?php
								 $my_flower_members=DB::select('SELECT * FROM (flower_members) WHERE flower_id=?',[$my_flowers_id[$i]]);
							   ?>

							   
						      <div id="collapse{{$i}}" class="collapse" aria-labelledby="heading{{$i}}" data-parent="#accordion">
						         <div class="card-body">
						         	<div class="table-responsive">
							            <table class="table table-border text-center">
							               <thead align="center">
							                  <tr>
							                     <th>Name</th>
							                     <th>Payment Method of water</th>
							                     <th>Email</th>
							                     <th>Phone</th>
							                     <th>Position</th>
							                    
							                     <th>Gift Status</th>
							                     <th>Active Status</th>
							                  </tr>
							               </thead>
							               <tbody>
							               	<?php
											 foreach ($my_flower_members as $key => $my_flower_member) {
											 	$member_details=DB::table('admins')->where('id',$my_flower_member->user_id)->first();
											?>
											
												<tr>
													<td class="@if($my_flower_member->user_id==$user_id) text-success font-weight-bold @endif">{{$member_details->name}}</td>
													<td>@if($my_flower_member->water==1) {{$member_details->gift_method}}->{{$member_details->gift_username}}  @endif</td>
													<td>{{$member_details->email}}</td>
													<td>{{$member_details->phone}}</td>
													<td><?php if($my_flower_member->water==1){echo 'water';}else{echo "fire";}?></td>
													
													
													<td>@if($my_flower_member->paid==1)
														<span class="text-success"><i class="fa fa-check-circle"></i></span>@elseif($my_flower_member->user_id==$user_id && $my_flower_member->fire1==0)
														<form action="{{route('gift_button')}}" method="post">
															@csrf
															<input type="hidden" name="flower_id" value="{{$my_flower_member->flower_id}}">
															<input type="hidden" name="water" value="{{$my_flower_member->water}}">
															<input type="hidden" name="fire8" value="{{$my_flower_member->fire8}}">
															<input type="hidden" name="gift_id" value="{{$my_flower_member->user_id}}">
															<input type="hidden" name="id" value="{{$my_flower_member->id}}">
															<button title="Confirm Gift" type="submit" class='btn btn-sm btn-danger'>@if($my_flower_member->water==1) <i class="fa fa-gift"></i> @else Gift Now @endif</button>
														</form>
														
														@if($my_flower_member->water==1 && $my_flower_member->report==0)
														
															
														<button data-toggle="modal" data-target="#exampleModal" title="Report A Problem" class="btn btn-sm btn-danger mt-1"><i class="fa fa-question-circle"></i> </button>
														<!-- modal -->
															<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
															  <div class="modal-dialog" role="document">
															    <div class="modal-content">
															      <div class="modal-header">
															        <h3 class="modal-title font-weight-bold text-center" id="exampleModalLabel">Write Your Issue</h3>
															        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
															          <span aria-hidden="true">&times;</span>
															        </button>
															      </div>
															      <form action="{{route('report')}}" method="post">
															      	@csrf
																		<input type="hidden" name="flower_id" value="{{$my_flower_member->flower_id}}">
																		<input type="hidden" name="water" value="{{$my_flower_member->water}}">
																		<input type="hidden" name="fire8" value="{{$my_flower_member->fire8}}">
																		<input type="hidden" name="gift_id" value="{{$my_flower_member->user_id}}">
																		<input type="hidden" name="id" value="{{$my_flower_member->id}}">
																      <div class="modal-body text-left">
																          <div class="form-group">
																            <label for="recipient-name" class="col-form-label">Comment</label>
																            <textarea required="1" type="text" name="comment" class="form-control" placeholder="Write your issue"></textarea>
																            <small>Write your issue here</small>
																          </div>
																      </div>
																      <div class="modal-footer">
																        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
																        <button type="submit" class="btn btn-primary">Report to Admin</button>
																      </div>
															      </form>
															    </div>
															  </div>
															</div>
															<!-- modal end -->
													
														@endif
														@else pending
														@endif
													</td>
													<td><?php if($my_flower_member->active==1){echo 'active';}else{echo "inactive";}?></td>
												</tr>
											<?php if($my_flower_member->fire8==1 && $my_flower_member->user_id==$user_id){?>
												<!-- grab water of this flower and grab linked flower where he is present as fire -->
												<?php
													$water_of_current_flower = DB::table('flower_members')->where([['flower_id','=',$my_flower_member->flower_id],['water','=',1]])->first();


													$second_flower_where_water1_is_present_as_fire = DB::table('flower_members')->where([['user_id','=',$water_of_current_flower->user_id],['water','=',0],['active','=',1],['fire1','=',1]])->first();

													if ($second_flower_where_water1_is_present_as_fire) {
														$water_of_second_flower = DB::table('flower_members')->where([['flower_id','=',$second_flower_where_water1_is_present_as_fire->flower_id],['water','=',1],['active','=',1]])->first();
														if ($water_of_second_flower) {
															$member_details2=DB::table('admins')->where('id',$water_of_second_flower->user_id)->first();
														}
													}

													

													
													
												?>


												<tr>
													<td class="font-weight-bold text-danger" colspan="8"> Notice only for {{$member_details->name}}<br> Hello {{$member_details->name}}, @if($my_flower_member->paid==1) You gifted to this user: @else You have to gift to this user: @endif</td>
												</tr>
												@if($second_flower_where_water1_is_present_as_fire)
												<tr>
													<td>{{$member_details2->name}}</td>
													<td>{{$member_details2->gift_method}}->{{$member_details2->gift_username}}</td>
													<td>{{$member_details2->email}}</td>
													<td>{{$member_details2->phone}}</td>
													<td><?php if($water_of_second_flower->water==1){echo 'water';}else{echo "fire";}?></td>
													
													<td>@if($water_of_second_flower->paid==1)
														<span class="text-success"><i class="fa fa-check-circle"></i></span>@elseif($water_of_second_flower->user_id==$user_id)
														<form action="{{route('gift_button')}}" method="post">
															@csrf
															<input type="hidden" name="flower_id" value="{{$water_of_second_flower->flower_id}}">
															<input type="hidden" name="water" value="{{$water_of_second_flower->water}}">
															<input type="hidden" name="gift_id" value="{{$water_of_second_flower->user_id}}">
															<input type="hidden" name="id" value="{{$water_of_second_flower->id}}">
															<button type="submit" class='btn btn-sm btn-danger'>Gift Now</button>
														</form>
														@else pending
														@endif
													</td>
													<td><?php if($water_of_second_flower->active==1){echo 'active';}else{echo "inactive";}?></td>
												</tr>
												@else
												<tr>
													<td class="font-weight-bold" colspan="8">Please wait for next funnel created to see your water</td>
												</tr>
												@endif
												
											<?php } ?>
							               	
											<?php } ?>
							               </tbody>
							            </table>
							        </div>
						         </div>
						      </div>
						      
						   </div>
						</div>
						<!--  accordian end -->


						
						
					@endfor
				@endif
            </div>
         </section>
      </div>
    </div>
	
	<!-- end: page -->
</section>


@endsection