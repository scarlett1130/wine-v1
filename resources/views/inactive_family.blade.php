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
   
               <h2 class="card-title text-center color-theme">My Active Funnels</h2>
            </header>
            <div class="card-body">
               
               <div id="datatable-default_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                  <div class="table-responsive">
                     <table class="table table-bordered table-striped" id="datatable-default">
						<thead align="center">
							<tr>
								<th>Name</th>
								<th>Email</th>
								<th>Phone</th>
								<th>Water</th>
								<th>Gift Status</th>
							</tr>
						</thead>
						<tbody align="center">
							
								@foreach ($inactive_fire_users_of_inactive_flower as $key => $inactive_fire_user_of_inactive_flower)
								<?php var_dump($inactive_fire_users_of_inactive_flower);die();?>
								<tr>
									<th>jh</th>
									<th>Email</th>
									<th>Phone</th>
									<th>Water</th>
									<th>Gift Status</th>
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