@extends('layouts.master')

@section ('title', 'Home') {{-- tytuł naszej sekcji --}}

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Moje oferty') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif


                    <img src="{{asset(Auth::user()->avatar)}}">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection