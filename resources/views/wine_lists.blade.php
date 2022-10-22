@extends('head')
@section('maincontent')

<section role="main" class="content-body">
	<!-- <header class="page-header">
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
            <!-- <header class="card-header bg-theme">
               <div class="card-actions">
                  <a href="#" class="card-action card-action-toggle" data-card-toggle></a>
                  <a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
               </div>
   
               <h2 class="card-title text-center color-theme">Weinkarten</h2>
            </header> -->
            <div class="card-body">
              
               <div id="datatable-default_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
               		 <a data-toggle="modal" href="#newCat" class="btn btn-success mb-2">+ Weinkarte hinzufügen</a>
                  <div class="table-responsive">
                     <table class="table table-bordered table-striped" id="datatable-default">
						<thead align="center">
							<tr>
								
								<th>Name</th>
								<th>Inhalt</th>
								<th>Löschen</th>
								
							</tr>
						</thead>
						<tbody align="center">
							@foreach($wine_lists as $key => $wine_list)
								<tr>
									<td>{{$wine_list->name}} </td>
									
									<td><a class="btn btn-success" href="{{url('/wines')}}/{{$wine_list->id}}">Weinkarte bearbeiten</a></td>
									<td>
										<a data-confirm="This will permanently remove the wine list, are you sure you want to delete?" class="text-danger" href="{{url('delete_wine_list')}}/{{$wine_list->id}}"><i class="fa fa-trash"></i></a>
									</td>
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


<!-- Modal -->
    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="newCat" class="modal fade">
      <div class="modal-dialog">
         <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">+ Weinkarte hinzufügen</h4>
              </div>
             
              <form action="{{route('save_wine_list')}}" method="POST" enctype="multipart/form-data">
                
                <input type="hidden" name="_token" value="<?php echo csrf_token();?>">
                <div class="modal-body">

                    <div class="form-group">
                      <label class="" for="exampleInputEmail1">Name der Weinkarte</label>
                      <input class="form-control form-control-sm" name="name" type="text" required="" >
                      
                    </div>
                    
                </div>
                <div class="modal-footer">
                  <button data-dismiss="modal" class="btn btn-danger" type="button">Abbrechen</button>
                  <button class="btn btn-success" type="submit">Speichern</button>
                </div>
              </form>
          </div>
      </div>
    </div>
      <!-- modal -->

@endsection