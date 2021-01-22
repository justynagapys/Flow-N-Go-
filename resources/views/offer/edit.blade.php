@extends('layouts.master') {{-- używa naszego master layoutu --}}

@section ('title', 'Edit') {{-- tytuł naszej sekcji --}}

@section('content')
<!-- <form method="POST">
        @csrf
        @method('PATCH')
        <input type="text" name="name">
        <input type="text" name="description">
        <input type="submit" value="update!">
    </form> -->
    <div class="container">
      <div class="row justify-content-center">
          <div class="col-md-11">
     <div class="card">
      <div class="card-header">{{ __('Edit offer') }}</div>
     <div class="card-body align-items-center d-flex justify-content-center">  
    
    <form action="{{url('offers', [$offer->id])}}" method="POST" class="form-horizontal" role="form">
      {{method_field('PATCH')}}
      {{ csrf_field() }}
  <div class="form-group">
    <label for="text" class="col-sm-5 control-label">Name</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="name" placeholder="Enter the offer name" value={{$offer["name"]}}>
    </div>
  </div>

  <div class="form-group">
    <label for="text" class="col-sm-7 control-label">Localization</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="localization" placeholder="Enter the place localization" value={{$offer["localization"]}}>
    </div>
  </div>

  <div class="form-group">
    <label for="text" class="col-sm-5 control-label">Price</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="price" placeholder="Enter the offer price" value={{$offer["price"]}}>
    </div>
  </div>

  <div class="form-group">
    <label for="text" class="col-sm-7 control-label">Description</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="description" placeholder="Enter the offer description" value={{$offer["description"]}}>
    </div>
  </div>

  <div class="form-group">
    <label for="addphoto" class="col-sm-10 control-label" >Add cover photo of the place</label>

    <div class="col-sm-12">
    <input type="file" class="form-control-file" name="coverImage" data-show-upload="false" data-show-caption="true">

    </div>
  </div> 
  
  <div class="form-group">
    <label for="addphoto" class="col-sm-10 control-label" >Add place photos</label>

    <div class="col-sm-10">
    <input type="file" class="form-control-file" id="addphoto" data-show-upload="false" data-show-caption="true" multiple>
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <a href="/offers/{{$offer["id"]}}/edit" class="btn btn-dark buttonCreate">Update</a>
    </div>
  </div>
</div>
</div>
</div>
</div>
</div>
</div>
</form>
@endsection
