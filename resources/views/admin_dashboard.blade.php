@extends('head')
@section('maincontent')

<section role="main" class="content-body">
	<header class="page-header">
		<h2>Admin Dashboard</h2>
	
		<div class="right-wrapper text-right">
			<ol class="breadcrumbs">
				<li>
					<a href="{{route('dashboard')}}">
						<i class="fas fa-home"></i>
					</a>
				</li>
				<li><span>Pages</span></li>
				<li><span>Admin Dashboard</span></li>
			</ol>
	
			<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fas fa-chevron-left"></i></a>
		</div>
	</header>

	<!-- start: page -->
	<!-- start: page -->
	<div class="row">
      <div class="col-md-4">
        <section class="card card-featured-left card-featured-primary mb-3">
		   <div class="card-body">
		      <div class="widget-summary">
		         <div class="widget-summary-col widget-summary-col-icon">
		            <div class="summary-icon bg-primary">
		               <i class="fas fa-users"></i>
		            </div>
		         </div>
		         <div class="widget-summary-col">
		            <div class="summary">
		               <h4 class="title">Total Users</h4>
		               <div class="info">
		                  <strong class="amount">{{count($total_users)}}</strong>
		                  <!-- <span class="text-primary">(14 unread)</span> -->
		               </div>
		            </div>
		            <div class="summary-footer">
		               <a class="text-muted text-uppercase" href="{{route('all_users')}}">(view all)</a>
		            </div>
		         </div>
		      </div>
		   </div>
		</section>
      </div>
      <div class="col-md-4">
        <section class="card card-featured-left card-featured-primary mb-3">
		   <div class="card-body">
		      <div class="widget-summary">
		         <div class="widget-summary-col widget-summary-col-icon">
		            <div class="summary-icon bg-primary">
		               <i class="fas fa-users"></i>
		            </div>
		         </div>
		         <div class="widget-summary-col">
		            <div class="summary">
		               <h4 class="title">Blocked Users</h4>
		               <div class="info">
		                  <strong class="amount">{{count($blocked_users)}}</strong>
		                  <!-- <span class="text-primary">(14 unread)</span> -->
		               </div>
		            </div>
		            <div class="summary-footer">
		               <a class="text-muted text-uppercase" href="{{route('blocked_users')}}">(view all)</a>
		            </div>
		         </div>
		      </div>
		   </div>
		</section>
       </div>
       <div class="col-md-4">
        <section class="card card-featured-left card-featured-primary mb-3">
		   <div class="card-body">
		      <div class="widget-summary">
		         <div class="widget-summary-col widget-summary-col-icon">
		            <div class="summary-icon bg-primary">
		               <i class="fas fa-users"></i>
		            </div>
		         </div>
		         <div class="widget-summary-col">
		            <div class="summary">
		               <h4 class="title">Gifted fire on active funnel</h4>
		               <div class="info">
		                  <strong class="amount">{{count($active_paid_fires)}}</strong>
		                  <!-- <span class="text-primary">(14 unread)</span> -->
		               </div>
		            </div>
		            <div class="summary-footer">
		               <a class="text-muted text-uppercase" href="{{route('active_paid_fires')}}">(view all)</a>
		            </div>
		         </div>
		      </div>
		   </div>
		</section>
      </div>
      
    </div>

    <div class="row">
      <div class="col-md-4">
        <section class="card card-featured-left card-featured-primary mb-3">
		   <div class="card-body">
		      <div class="widget-summary">
		         <div class="widget-summary-col widget-summary-col-icon">
		            <div class="summary-icon bg-primary">
		               <i class="fas fa-users"></i>
		            </div>
		         </div>
		         <div class="widget-summary-col">
		            <div class="summary">
		               <h4 class="title">Pending gift on active funnel</h4>
		               <div class="info">
		                  <strong class="amount">{{count($active_unpaid_fires)}}</strong>
		                  <!-- <span class="text-primary">(14 unread)</span> -->
		               </div>
		            </div>
		            <div class="summary-footer">
		               <a class="text-muted text-uppercase" href="{{route('active_unpaid_fires')}}">(view all)</a>
		            </div>
		         </div>
		      </div>
		   </div>
		</section>
      </div>
      <div class="col-md-4">
        <section class="card card-featured-left card-featured-primary mb-3">
		   <div class="card-body">
		      <div class="widget-summary">
		         <div class="widget-summary-col widget-summary-col-icon">
		            <div class="summary-icon bg-primary">
		               <i class="fas fa-users"></i>
		            </div>
		         </div>
		         <div class="widget-summary-col">
		            <div class="summary">
		               <h4 class="title">Total active waters</h4>
		               <div class="info">
		                  <strong class="amount">{{count($total_active_water)}}</strong>
		                  <!-- <span class="text-primary">(14 unread)</span> -->
		               </div>
		            </div>
		            <div class="summary-footer">
		               <a class="text-muted text-uppercase" href="{{route('total_active_water')}}">(view all)</a>
		            </div>
		         </div>
		      </div>
		   </div>
		</section>
      </div>
      
       <div class="col-md-4">
        <section class="card card-featured-left card-featured-primary mb-3">
		   <div class="card-body">
		      <div class="widget-summary">
		         <div class="widget-summary-col widget-summary-col-icon">
		            <div class="summary-icon bg-primary">
		               <i class="fas fa-users"></i>
		            </div>
		         </div>
		         <div class="widget-summary-col">
		            <div class="summary">
		               <h4 class="title">Pending confirmation(water)</h4>
		               <div class="info">
		                  <strong class="amount">{{count($active_unpaid_water)}}</strong>
		                  <!-- <span class="text-primary">(14 unread)</span> -->
		               </div>
		            </div>
		            <div class="summary-footer">
		               <a class="text-muted text-uppercase" href="{{route('total_active_water')}}">(view all)</a>
		            </div>
		         </div>
		      </div>
		   </div>
		</section>
      </div>
    </div>

    <div class="row">
    	<div class="col-md-4">
	        <section class="card card-featured-left card-featured-primary mb-3">
			   <div class="card-body">
			      <div class="widget-summary">
			         <div class="widget-summary-col widget-summary-col-icon">
			            <div class="summary-icon bg-primary">
			               <i class="fas fa-users"></i>
			            </div>
			         </div>
			         <div class="widget-summary-col">
			            <div class="summary">
			               <h4 class="title">Accepted gifts(Water)</h4>
			               <div class="info">
			                  <strong class="amount">{{count($active_paid_water)}}</strong>
			                  <!-- <span class="text-primary">(14 unread)</span> -->
			               </div>
			            </div>
			            <div class="summary-footer">
			               <a class="text-muted text-uppercase" href="{{route('active_paid_water')}}">(view all)</a>
			            </div>
			         </div>
			      </div>
			   </div>
			</section>
      </div>
      <div class="col-md-4">
        <section class="card card-featured-left card-featured-primary mb-3">
		   <div class="card-body">
		      <div class="widget-summary">
		         <div class="widget-summary-col widget-summary-col-icon">
		            <div class="summary-icon bg-primary">
		               <i class="fas fa-users"></i>
		            </div>
		         </div>
		         <div class="widget-summary-col">
		            <div class="summary">
		               <h4 class="title">Total funnels</h4>
		               <div class="info">
		                  <strong class="amount">{{count($total_flowers)}}</strong>
		                  <!-- <span class="text-primary">(14 unread)</span> -->
		               </div>
		            </div>
		            <div class="summary-footer">
		               <a class="text-muted text-uppercase" href="{{route('flowers')}}">(view all)</a>
		            </div>
		         </div>
		      </div>
		   </div>
		</section>
      </div>
      <div class="col-md-4">
        <section class="card card-featured-left card-featured-primary mb-3">
		   <div class="card-body">
		      <div class="widget-summary">
		         <div class="widget-summary-col widget-summary-col-icon">
		            <div class="summary-icon bg-primary">
		               <i class="fas fa-users"></i>
		            </div>
		         </div>
		         <div class="widget-summary-col">
		            <div class="summary">
		               <h4 class="title">Total waiting fires</h4>
		               <div class="info">
		                  <strong class="amount">{{count($total_waiting_fires)}}</strong>
		                  <!-- <span class="text-primary">(14 unread)</span> -->
		               </div>
		            </div>
		            <div class="summary-footer">
		               <a class="text-muted text-uppercase" href="{{route('total_waiting_fires')}}">(view all)</a>
		            </div>
		         </div>
		      </div>
		   </div>
		</section>
      </div>
    </div>



    
	
	<!-- end: page -->

	<!-- end: page -->
</section>

@endsection