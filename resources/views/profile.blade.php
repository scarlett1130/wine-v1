@extends('head')
@section('maincontent')
<section role="main" class="content-body">
	<!-- <header class="page-header">
		<h2>Sicherheit</h2>
	
		<div class="right-wrapper text-right">
			<ol class="breadcrumbs">
				<li>
					<a href="./">
						<i class="fas fa-home"></i>
					</a>
				</li>
				<li><span>Pages</span></li>
				<li><span>Sicherheit</span></li>
			</ol>
	
			<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fas fa-chevron-left"></i></a>
		</div>
	</header> -->

	<!-- start: page -->

	<div class="row">
		<div class="col-lg-4 col-xl-4 mb-4 mb-xl-0">

			<section class="card">
				<div class="card-body">
					<div class="thumb-info mb-3">
						<img src="@if(!empty($user_details->image))
								{{asset($user_details->image)}} 
							@endif
							@if(empty($user_details->image))	 
							{{asset('owner/img/!logged-user.jpg')}} 
							@endif" class="rounded img-fluid" 
						  alt="">
						
					</div>

					<div class="widget-toggle-expand mb-3">
						<div class="widget-header">
							<h5 class="mb-2 font-weight-bold">{{$user_details->name}}</h5>
							<div class="widget-toggle">+</div>
						</div>
						
						<div class="widget-content-expanded">
							<ul class="simple-todo-list mt-3">
								
								<li class="completed">Email: {{$user_details->email}}</li>
							
								
							</ul>
						</div>
					</div>

					<hr class="dotted short">

					<h5 class="mb-2 mt-3">About</h5>
					<div class="widget-content-expanded">
						<ul class="simple-todo-list mt-3">
							
						
							<li class="completed">Registered As: {{$user_details->role}}</li>						
						</ul>
					</div>
					

				</div>
			</section>

		</div>
		<div class="col-lg-8 col-xl-8">

			<div class="tabs">
				<ul class="nav nav-tabs tabs-primary">
					
					<li class="nav-item active">
						<a class="nav-link bg-transparent" href="#edit" data-toggle="tab">Sicherheit</a>
					</li>
					
					<!-- <li class="nav-item">
						<a class="nav-link bg-transparent" href="#billing" data-toggle="tab">Übersicht Farbe</a>
					</li> -->
					<li class="nav-item">
						<a class="nav-link bg-transparent" href="#picture" data-toggle="tab">Profilbild auswählen</a>
					</li>
				</ul>
				<div class="tab-content bg-transparent">
					
					<div id="edit" class="tab-pane active">

						<form action="{{route('save_profile')}}" method="post" class="p-3" autocomplete="off">
							@csrf
							<div class="form-group mb-3">
								<label>Aktuelles Passwort</label>
								<input name="current_pwd" type="password" class="form-control form-control-lg" required/>
							</div>

							<div class="form-group mb-0">
							   <div class="row">
							      <div class="col-sm-6 mb-3">
							         <label>Neues Passwort</label>
							         <input name="pwd" type="password" class="form-control form-control-lg" required>
							      </div>
							      <div class="col-sm-6 mb-3">
							         <label>Neues Passwort wiederholen</label>
							         <input name="pwd_confirm" type="password" class="form-control form-control-lg" required>
							      </div>
							   </div>
							</div>

							<hr class="dotted tall">

							<div class="form-row">
								<div class="col-md-12 text-right mt-3">
									<button type="submit" name="password_change" class="btn btn-primary modal-confirm">Update</button>
								</div>
							</div>

						</form>

					</div>
					
					<!-- <div id="billing" class="tab-pane">
						<form action="{{route('save_profile')}}" class="p-3" autocomplete="off" method="post">
							@csrf
							<h4 class="mb-3">Change Theme Color</h4>
							<div class="form-group">
								<label for="inputAddress">Text Color</label>
								<input name="text_color" type="text" class="form-control jscolor {hash:true}" id="inputAddress" value="{{$user_details->text_color}}">
							</div>
							
							<div class="form-row">
								<div class="form-group col-md-12">
									<div class="row">
										<div class="col-sm-6 mb-4">
								         <label>Background (gradient 1)</label>
								         <input name="bg_color1" type="text" class="form-control jscolor {hash:true}" id="inputAddress" value="{{$user_details->bg_color1}}">
								        </select>
								      </div>

								      <div class="col-sm-6 mb-4">
								         <label>Background (gradient 2)</label>
								       <input name="bg_color2" type="text" class="form-control jscolor {hash:true}" id="inputAddress" value="{{$user_details->bg_color2}}">
								      </div>
									</div>
								</div>
								
								
							</div>


							<hr class="dotted tall">
							<div class="form-row">
								<div class="col-md-12 text-right mt-3">
									<button type="submit" class="btn btn-primary modal-confirm">Update</button>
								</div>
							</div>
						</form>
						
					</div> -->

					<div id="picture" class="tab-pane">

						<form action="{{route('save_profile')}}" method="post" class="p-3" autocomplete="off" enctype="multipart/form-data">
							@csrf
							<div class="form-group mb-3">
								<label>Profilbild auswählen</label><small> (Picture size less than 1mb)</small>
								<input name="img" type="file" class="form-control" required/>
								<input type="hidden" name="profilepic" value="abc">
							</div>

							<hr class="dotted tall">

							<div class="form-row">
								<div class="col-md-12 text-right mt-3">
									<button type="submit" class="btn btn-primary modal-confirm">Update</button>
								</div>
							</div>

						</form>

					</div>
				</div>
			</div>
		</div>

	</div>
	<!-- end: page -->

</section>
@endsection