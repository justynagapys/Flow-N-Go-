@extends('layouts.master') 

@section ('title', 'Crete offer')
 @section('content')
 <div class="container">
  <div class="row justify-content-center">
      <div class="col-md-11">
 <div class="card">
  <div class="card-header">{{ __('Create offer') }}</div>
 <div class="card-body align-items-center d-flex justify-content-center">  

<form method="POST" class="form-horizontal" role="form" enctype="multipart/form-data" > 
 @csrf
  <div class="form-group">
    <label for="text" class="col-sm-3 control-label">Name</label>
    <div class="col-sm-12">
      <input type="text" class="form-control" name="name" placeholder="Enter the offer name">
    </div>
  </div>

  <div class="form-group">
    <label for="text" class="col-sm-5 control-label">Localization</label>
    <div class="col-sm-12">
      <input type="text" class="form-control" name="localization" placeholder="Enter the place localization">
    </div>
  </div>

  <div class="form-group"> 
    <label for="text" class="col-sm-7 control-label">Description</label>
    <div class="col-sm-12">
      <input type="text" class="form-control" name="description" placeholder="Enter the offer description">
    </div>
  </div>

  <div class="form-group">
    <label for="addphoto" class="col-sm-10 control-label" >Add cover photo of the place</label>

    <div class="col-sm-12">
    <input type="file" class="form-control-file" name="coverImage" data-show-upload="false" data-show-caption="true">

    </div>
  </div> 
  
  <div class="form-group">
    <label for="addphoto" class="col-sm-10 control-label" >Add another place photos</label>

    <div class="col-sm-12">
    <input type="file" class="form-control-file" name="images[]" data-show-upload="false" data-show-caption="true" multiple="">
    </div>
  </div> 

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-12">
      <input type="submit" class="btn btn-dark buttonCreate" value="Create">
    </div>
  </div>
</form>
</div>
</div>
</div>
</div>
</div>
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

