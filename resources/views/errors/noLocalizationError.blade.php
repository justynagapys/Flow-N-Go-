@extends('layouts.master')

@section ('title', 'Error') 

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header">{{ __('Error') }}</div>
                <div class="card-body align-items-center d-flex justify-content-center">
                    <div>
                        <strong>Sorry, we don't have any offers with the localization you're searching for!</strong>
                        <br />
                        <center><a href="/" class="btn btn-dark buttonCreate btnMang">Return</a></center>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection