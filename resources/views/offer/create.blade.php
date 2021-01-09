@extends('layouts.master') 

@section ('title', 'Crete offer')
 @section('content')  

<form method="POST" class="form-horizontal" role="form" encrypte="multipart/form-data" > 
 @csrf
  <div class="form-group">
    <label for="text" class="col-sm-2 control-label">Name</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="name" placeholder="Enter the offer name">
    </div>
  </div>

  <div class="form-group">
    <label for="text" class="col-sm-2 control-label">Localization</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="localization" placeholder="Enter the place localization">
    </div>
  </div>

  <div class="form-group">
    <label for="text" class="col-sm-2 control-label">Price per day</label>
    <div class="col-sm-10">
      <input type="number" class="form-control" name="price" placeholder="Enter the offer price">
    </div>
  </div>

  <div class="form-group"> 
    <label for="text" class="col-sm-2 control-label">Description</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="description" placeholder="Enter the offer description">
    </div>
  </div>
  
  <div class="form-group">
    <label for="addphoto" class="col-sm-2 control-label" >Add place photos</label>

    <div class="col-sm-10">
    <input type="file" class="form-control-file" name="images" data-show-upload="false" data-show-caption="true" multiple>

    </div>
  </div> 

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <input type="submit" class="btn btn-dark buttonCreate" value="Create!">
    </div>
  </div>
</form>
@endsection

{{-- @extends('layouts.master') 
@section ('title', 'Crete offer') 
@section('content')
    <form method="POST">
        @csrf
        Name:
        <input type="text" name="name">
        Description:
        <input type="text" name="description">
        <input type="submit" value="Create!">
    </form>
@endsection  --}}

