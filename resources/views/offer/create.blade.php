@extends('layouts.master') {{-- używa naszego master layoutu --}}

@section ('title', 'Crete offer') {{-- tytuł naszej sekcji --}}

@section('content')

<form method="POST" class="form-horizontal" role="form" encrypte="multipart/form-data">
@csrf
  <div class="form-group">
    <label for="text" class="col-sm-2 control-label">Name</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="name" placeholder="Enter the offer name">
    </div>
  </div>

  <div class="form-group">
    <label for="text" class="col-sm-2 control-label">Localization</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="localization" placeholder="Enter the place localization">
    </div>
  </div>

  <div class="form-group">
    <label for="text" class="col-sm-2 control-label">Price</label>
    <div class="col-sm-10">
      <input type="number" class="form-control" id="price" placeholder="Enter the offer price">
    </div>
  </div>

  <div class="form-group">
    <label for="text" class="col-sm-2 control-label">Description</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="description" placeholder="Enter the offer description">
    </div>
  </div>
  
  <div class="form-group">
    <label for="addphoto" class="col-sm-2 control-label" >Add place photos</label>

    <div class="col-sm-10">
    <input type="file" class="form-control-file" id="images" data-show-upload="false" data-show-caption="true" multiple>

    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-dark">Create</button>
    </div>
  </div>
</form>
@endsection


