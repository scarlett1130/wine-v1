@extends('head')
@section('maincontent')

<section role="main" class="content-body">
	<header class="page-header">
		<h2>Total Active Unpaid Waters</h2>
	
		<div class="right-wrapper text-right">
			<ol class="breadcrumbs">
				<li>
					<a href="{{route('dashboard')}}">
						<i class="fas fa-home"></i>
					</a>
				</li>
				<li><span>Pages</span></li>
				<li><span>Total Active Unpaid Waters</span></li>
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
   
               <h2 class="card-title text-center color-theme">Total Active Unpaid Waters List</h2>
            </header>
            <div class="card-body">
               
               <div id="datatable-default_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                  <div class="table-responsive">
                     <table class="table table-bordered table-striped" id="datatable-default">
						<thead align="center">
							<tr>
								
								<th>Funnel id</th>
								<th>Name</th>
								<th>Email</th>
								<th>Phone</th>
								<th>Position</th>
								<th>Gift Status</th>
								

								
							</tr>
						</thead>
						<tbody align="center">
							@foreach($active_unpaid_water as $key => $active_unpaid_water1)
							<?php $user=DB::table('admins')->where('id',$active_unpaid_water1->user_id)->first(); ?>
								<tr>
									<td>Funnel (#{{$active_unpaid_water1->flower_id}})</td>
									<td>{{$user->name}}</td>
									<td>{{$user->email}}</td>
									<td>{{$user->phone}}</td>
									<td>@if($active_unpaid_water1->water==1)Water @else Fire @endif</td>
									<td>@if($active_unpaid_water1->paid==1)Paid @else Pending @endif</td>
									
								</tr>
							@endforeach
						
							
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