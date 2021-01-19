@extends('layouts.master')

@section ('title', 'Home') 

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('My offers') }}</div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <table>
                        <th>Picture</th><th>Name</th><th>Localization</th><th>Price</th><th></th>
                        @foreach($offers as $offers){{
                            print "<tr><td>".'<img src='.$offers["coverImage"] .' width="110" height="70">'."</td>
                                <td>".$offers["name"]."</td>
                                <td>".$offers["localization"]."</td>
                                <td>".$offers["price"]."</td>
                                <td><input type='submit' class='btn btn-dark buttonCreate' value='Details' action=/offers/{id}></td></tr>"
                            }}
                        @endforeach
                        </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
