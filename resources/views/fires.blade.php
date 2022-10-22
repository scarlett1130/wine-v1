@extends('head')
@section('maincontent')

<section role="main" class="content-body">
	<header class="page-header">
		<h2>Fires</h2>
	
		<div class="right-wrapper text-right">
			<ol class="breadcrumbs">
				<li>
					<a href="{{route('dashboard')}}">
						<i class="fas fa-home"></i>
					</a>
				</li>
				<li><span>Pages</span></li>
				<li><span>Fires</span></li>
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
   
               <h2 class="card-title text-center color-theme">Fires List</h2>
            </header>
            <div class="card-body">
               
               <div id="datatable-default_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                  <div class="table-responsive">
                     <table class="table table-bordered table-striped" id="datatable-default">
						<thead align="center">
							<tr>
								
								<th>Name</th>
								<th>Email</th>
								<th>Join Date</th>
								<th>Water date(when received all 8 gifts)</th>
								<th>Status</th>
								
							</tr>
						</thead>
						<tbody align="center">
							@foreach($active_fires as $key => $active_fire)
							<?php $fire_details=DB::table('admins')->where('id',$active_fire->user_id)->first(); ?>
							<tr>
								
								<td>{{$fire_details->name}}</td>
								<td>{{$fire_details->email}}</td>
								<td>{{date("M d Y", strtotime($fire_details->joined_date))}}

								</td>
								<td>
									@if($active_fire->water==1)
										{{$active_fire->gifted_time}}
									@endif
								</td>
								<td>Active</td>
							</tr>
							@endforeach
							
							@if(!empty($inactive_fire_users))
								@foreach($inactive_fire_users as $key => $inactive_fire_user)
								<tr>
									
									<td>{{$inactive_fire_user->name}}</td>
									<td>{{date("M d Y", strtotime($inactive_fire_user->joined_date))}}</td>
									<td>
										
									</td>
									<td>Blocked</td>
								</tr>
								@endforeach
							@endif
							
						</tbody>
					</table>
                  </div>
               </div>
            </div>
         </section>
      </div>
    </div>
	
	<!-- end: page -->
</section>

@endsection