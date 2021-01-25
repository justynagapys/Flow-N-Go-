@extends('layouts.master')

@section ('title', 'Comments') 

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header">{{ __('Comments') }}</div>
                <div class="card-body align-items-center d-flex justify-content-center">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <table>
                        <th>User</th><th>Date</th><th>Comment</th><th></th>
                        @foreach($comments as $comments)
                            <tr></td>
                            <td></td>
                            <td></td>
                            </tr>
                        @endforeach
                    </table>
        
            </div>
        </div>
    </div>
</div>
@endsection
