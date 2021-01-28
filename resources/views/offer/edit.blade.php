@extends('layouts.master') {{-- używa naszego master layoutu --}}


@section ('title', 'Edit') {{-- tytuł naszej sekcji --}}

@section('content')
 <div class="container">
  <div class="row justify-content-center">
      <div class="col-md-11">
        <div class="card">
          <div class="card-header">{{ __('Edit offer') }}</div>
          <div class="card-body align-items-center d-flex justify-content-center">   
            <form method="POST" class="form-horizontal">
              @csrf
              @method('PATCH')
              <div class="form-group">
                <label for="text" class="col-sm-5 control-label">Name</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="name" placeholder="Enter the offer name" value="{{$offer["name"]}}">
                </div>
              </div>
              <div class="form-group">
                <label for="text" class="col-sm-7 control-label">Localization</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="localization" placeholder="Enter the place localization" value="{{$offer["localization"]}}">
                </div>
              </div>
              <div class="form-group">
                <label for="text" class="col-sm-7 control-label">Description</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="description" placeholder="Enter the offer description" value="{{$offer["description"]}}">
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-dark buttonCreate" value="Update">
                </div>
              </div>
            </form>
        </div>
      </div>
    </div>    
  </div>
  </div>
@endsection

