@extends('layouts.master') 

@section ('title', 'Add comment')
 @section('content')
 <div class="container">
  <div class="row justify-content-center">
      <div class="col-md-11">
 <div class="card">
  <div class="card-header">{{ __('Add comment') }}</div>
 <div class="card-body align-items-center d-flex justify-content-center"> 
    <form method="POST">
        @csrf
        <div class="form-group"> 
            <label for="text" class="col-sm-9 control-label">Your comment</label>
            <div class="col-sm-12">
            <input type="text" class="form-control" name="message" placeholder="Enter your comment">
            </div>
        </div>
        <div class="form-group">
            <label for="text" class="col-sm-9 control-label">Name</label>
            <div class="col-sm-12">
              <input type="text" class="form-control" name="name" placeholder="Enter your name">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-12">
            <input type="submit" class="btn btn-dark buttonCreate" value="Add">
            </div>
        </div>
    </form>
</div>
</div>
</div>
</div>
</div>
@endsection
   