@extends('head')
@section('maincontent')

<section role="main" class="content-body">
	<header class="page-header">
		<h2>Admin Panel Tickets</h2>
	
		<div class="right-wrapper text-right">
			<ol class="breadcrumbs">
				<li>
					<a href="{{route('dashboard')}}">
						<i class="fas fa-home"></i>
					</a>
				</li>
				<li><span>Pages</span></li>
				<li><span>Admin Tickets</span></li>
			</ol>
	
			<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fas fa-chevron-left"></i></a>
		</div>
	</header>

	<!-- start: page -->
	<!-- start: page -->
	<div class="row">
      <div class="col-md-12">
      	 <section class="card">
            <header class="card-header bg-theme">
               <div class="card-actions">
                  <a href="#" class="card-action card-action-toggle" data-card-toggle></a>
                  <a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
               </div>
   
               <h2 class="card-title text-center color-theme">Users Tickets</h2>
            </header>
            <div class="card-body">
              @foreach($tickets as $key=>$ticket)
              	<div id="accordion">
				   <div class="card">
				      <div id="heading{{$key}}">
				         <h5 class="m-0 p-0">
				            <button class="btn @if($ticket->solution != NULL) btn-dark @else btn-success @endif text-white w-100 collapsed" data-toggle="collapse" data-target="#collapse{{$key}}" aria-expanded="false" aria-controls="collapse{{$key}}">
				           	Ticket-Id #LIV{{$ticket->id}}
				            </button>
				         </h5>
				      </div>

					   
				      <div id="collapse{{$key}}" class="collapse" aria-labelledby="heading{{$key}}" data-parent="#accordion">
				         <div class="card-body">
				         	<div class="table-responsive">
					            <table class="table table-border text-center">
					               <thead align="center">
					                  <tr>
					                  	 <th>User</th>
					                     <th>Issue</th>
					                     <th>Solution</th>
					                     <th>Status</th>
					                  </tr>
					               </thead>
					               <tbody>
					               	<tr>
					               		<?php $user=DB::table('admins')->where('id',$ticket->user_id)->first(); ?>
					               		<td>{{$user->email}}</td>
					               		<td>{{$ticket->issue}}</td>
					               		<td>
					               			@if($ticket->solution)
					               			{{$ticket->solution}}
					               			@else
						               			<form action="{{route('solution_ticket')}}" method="post">
						               				@csrf
						               				<input type="hidden" name="id" value="{{$ticket->id}}">
						               				<input type="text" class="form-control" name="solution">
						               				<button type="submit" class="btn btn-sm btn-success mt-3">Save</button>
						               			</form>
					               			@endif
					               			
					               		</td>
					               		<td>@if($ticket->status==1)<span class="badge badge-success">Solved</span> @else <span class="badge badge-info">Open</span> @endif</td>
					               	</tr>
					               </tbody>
					               
					            </table>
					        </div>
				         </div>
				      </div>
				      
				   </div>
				</div>
				<!--  accordian end -->
              @endforeach
            </div>
         </section>
      </div>
    </div>

    
	
	<!-- end: page -->

	<!-- end: page -->
</section>

@endsection