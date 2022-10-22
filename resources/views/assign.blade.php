@extends('head')
@section('maincontent')

<section role="main" class="content-body">
	<header class="page-header">
		<h2>Assignement</h2>
	
		<div class="right-wrapper text-right">
			<ol class="breadcrumbs">
				<li>
					<a href="{{route('dashboard')}}">
						<i class="fas fa-home"></i>
					</a>
				</li>
				<li><span>Pages</span></li>
				<li><span>Assignement</span></li>
			</ol>
	
			<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fas fa-chevron-left"></i></a>
		</div>
	</header>

	<!-- start: page -->
	<!-- start: page -->
	<div class="row">
      <div class="col-md-6">
      	 <section class="card">
            <header class="card-header bg-theme">
               <div class="card-actions">
                  <a href="#" class="card-action card-action-toggle" data-card-toggle></a>
                  <a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
               </div>
   
               <h2 class="card-title text-center color-theme">Assign Blocked User to Funnel</h2>
            </header>
            <div class="card-body">
               <form action="{{route('save_assignment')}}" method="post">
               	@csrf
				  <div class="form-group">
				    <label for="exampleInputEmail1">List of blocked user</label>
				    <select name="user_id" class="form-control" required>
				    	<option value="">User List</option>
				    	@foreach($total_blocked_users as $total_blocked_user)

				    	<option value="{{$total_blocked_user->id}}">{{$total_blocked_user->name}}</option>
				    	@endforeach
				    </select>
				    <small id="emailHelp" class="form-text text-muted">Select The Blocked User to Assign In a New Funnel</small>
				  </div>
				  <button type="submit" class="btn btn-primary mt-2">Assign to random funnel</button>
				</form>
              
            </div>
         </section>
      </div>
    </div>

    
	
	<!-- end: page -->

	<!-- end: page -->
</section>

@endsection