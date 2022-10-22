@extends('head')
@section('maincontent')
<section role="main" class="content-body">
  
   <!-- start: page -->
   <div class="row">
      <div class="col-md-12">
         <section class="card">
            <!--  <header class="card-header bg-theme">
               <div class="card-actions">
                  <a href="#" class="card-action card-action-toggle" data-card-toggle></a>
                  <a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
               </div>
               
               <h2 class="card-title text-center color-theme">Wine List</h2>
               </header> -->
            <form action="{{route('make_list')}}" method="post">
               <div class="card-body">
                
                     <div class="row">
                        <div class="col-md-4 text-center">
                           <a data-toggle="modal" href="#newCat" class="btn btn-success mb-2">+ Wein hinzufügen</a>
                        </div>
                        <div class="col-md-4 text-center">
                           <select class="form-control" required="1" name="wine_list_id">
                              <option value="">Weinkarte Auswählen</option>
                              @foreach($wine_lists as $wine_list)
                              <option value="{{$wine_list->id}}">{{$wine_list->name}}</option>
                              @endforeach
                           </select>
                        </div>
                        <div class="col-md-4 text-center">
                           <button type="submit" class="btn btn-info">Auswahl zur Weinkarte hinzufügen</button>
                        </div>
                     </div>
                     @csrf
                     <div class="table-responsive">
                        <table  style="width: 100%" class="table table-bordered table-striped" id="datatable-default">
                           <thead>
                              <tr>
                                 <th>Auswahl</th>
                                 <th>ID</th>
                                 <th>Bild</th>
                                 <th>Name</th>
                                 <th>Land</th>
                                 <th>Region</th>
                                 <th>Weingut</th>
                                 <th>Rebsorte</th>
                                 <th>Weinart</th>
                                
                                 <th>Hinzugefügt am</th>
                                 <th>Bearbeiten / Löschen</th>
                              </tr>
                           </thead>
                           <tbody>
                              @foreach($wines as $key => $wine)
                              <tr>
                                 <td>
                                    <input type="checkbox" name="wine_id[]" value="{{$wine->id}}">
                                 </td>
                                 <td>
                                    {{$wine->id}}
                                 </td>
                                 <td><a data-toggle="modal" data-target="#exampleModal{{$key}}"><img width="15" src="{{asset('owner/wines/'.$wine->picture)}}"></a></td>
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
                                 <td>{{$wine->category}}</td>
                                 
                                 <td>{{$wine->added_at}}</td>
                                 <td  class="center">
                                    <a data-toggle="modal" href="#newCat{{$key}}" class="text-success"><i class="fa fa-edit"></i></a>
                                    <a data-confirm="This will permanently remove the wine, are you sure you want to delete?" class="text-danger" href="{{url('delete_wine')}}/{{$wine->id}}"><i class="fa fa-trash"></i></a>
                                 </td>
                              </tr>
                              @endforeach
                           </tbody>
                        </table>
                     </div>
                 
               </div>
            </form>
         </section>
      </div>
   </div>
   <!-- end: page -->
</section>


@foreach($wines as $key=>$wine)
<!-- Modal -->
<div class="modal fade" id="exampleModal{{$key}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel{{$key}}" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center" id="exampleModalLabel{{$key}}">{{$wine->name}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
       <img src="{{asset('owner/wines/'.$wine->picture)}}">
      </div>
      
    </div>
  </div>
</div>
<!-- modal -->
@endforeach



@foreach($wines as $key=>$wine)
<!-- Modal -->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="newCat{{$key}}" class="modal fade">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title">Wein Bearbeiten</h4>
         </div>
         <form action="{{route('edit_wine')}}" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="{{$wine->id}}">
            <input type="hidden" name="_token" value="<?php echo csrf_token();?>">
            <div class="modal-body">
               <div class="form-group">
                  <label class="" for="exampleInputEmail1">Name</label>
                  <input class="form-control form-control-sm" name="name" type="text" required="" value="{{$wine->name}}">
                 
               </div>
               <div class="form-group">
                  <label class="" for="exampleInputEmail1">Land</label>
                  <input class="form-control form-control-sm" name="country" type="text" required="" value="{{$wine->country}}">
                 
               </div>
               <div class="form-group">
                  <label class="" for="exampleInputEmail1">Region</label>
                  <input class="form-control form-control-sm" name="region" type="text" required="" value="{{$wine->region}}">
                 
               </div>
               <div class="form-group">
                  <label class="" for="exampleInputEmail1">Weingut</label>
                  <input class="form-control form-control-sm" name="winery" type="text" required="" value="{{$wine->winery}}">
                 
               </div>
               <div class="form-group">
                  <label class="" for="exampleInputEmail1">Rebsorte</label>
                  <input class="form-control form-control-sm" name="grapes" type="text" required="" value="{{$wine->grapes}}">
                 
               </div>
               <div class="form-group">
                  <label class="" for="exampleInputEmail1">Weinart</label>
                  <input class="form-control form-control-sm" name="category" type="text" required="" value="{{$wine->category}}">
                 
               </div>
               <div class="form-group">
                  <label class="" for="exampleInputEmail1">Beschreibung</label>
                  <textarea class="form-control"  name="description">{!!$wine->description!!}</textarea>
                 
               </div>
               <!-- <div class="form-group">
                  <label class="" for="exampleInputEmail1">Image path </label>
                  <textarea class="form-control"  name="images">{!!$wine->images!!}</textarea>
                  <small id="emailHelp" class="form-text text-muted">Write path </small>
               </div> -->
               <div class="form-group">
                  <label class="" for="exampleInputEmail1">Bild</label>
                  <input type="hidden" name="picture_url" value="{{$wine->picture}}">
                  <input type="file" class="form-control" name="picture">
                  <small id="emailHelp" class="form-text text-muted"></small>
                  @if($wine->picture)<img src="{{asset('owner/wines/'.$wine->picture)}}" width="20">@endif
               </div>
               <!-- <div class="form-group">
                  <span style="background:purple;" class="btn btn-success fileinput-button">
                      <i class="glyphicon glyphicon-plus"></i>
                      <span>Add images...</span>
                    <input type="file" name="images[]" multiple>
                    </span>
                  </div> -->
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
@endforeach
<!-- Modal -->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="newCat" class="modal fade">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title">+ Wein hinzufügen</h4>
         </div>
         <form action="{{route('save_wine')}}" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="<?php echo csrf_token();?>">
            <div class="modal-body">
               <div class="form-group">
                  <label class="" for="exampleInputEmail1">Name </label>
                  <input class="form-control form-control-sm" name="name" type="text" required="" >
                  
               </div>
               <div class="form-group">
                  <label class="" for="exampleInputEmail1">Land </label>
                  <input class="form-control form-control-sm" name="country" type="text" required="">
                 
               </div>
               <div class="form-group">
                  <label class="" for="exampleInputEmail1">Region </label>
                  <input class="form-control form-control-sm" name="region" type="text" required="">
                 
               </div>
               <div class="form-group">
                  <label class="" for="exampleInputEmail1">Weingut </label>
                  <input class="form-control form-control-sm" name="winery" type="text" required="">
                  
               </div>
               <div class="form-group">
                  <label class="" for="exampleInputEmail1">Reebsorten </label>
                  <input class="form-control form-control-sm" name="grapes" type="text" required="">
                 
               </div>
               <div class="form-group">
                  <label class="" for="exampleInputEmail1">Weinart </label>
                  <input class="form-control form-control-sm" name="category" type="text" required="">
                  
               </div>
               <div class="form-group">
                  <label class="" for="exampleInputEmail1">Beschreibung </label>
                  <textarea class="form-control"  name="description"></textarea>
                  
               </div>
               <!--   <div class="form-group">
                  <label class="" for="exampleInputEmail1">Image path </label>
                  <textarea class="form-control"  name="images"></textarea>
                  <small id="emailHelp" class="form-text text-muted">Write path </small>
                  </div> -->
               <div class="form-group">
                  <label class="" for="exampleInputEmail1">Bild</label>
                  <input type="file" class="form-control" name="picture">
               </div>
               <!-- <div class="form-group">
                  <span style="background:purple;" class="btn btn-success fileinput-button">
                      <i class="glyphicon glyphicon-plus"></i>
                      <span>Add images...</span>
                    <input type="file" name="images[]" multiple>
                    </span>
                  </div> -->
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