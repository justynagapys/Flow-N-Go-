@extends('layouts.master')

@section ('title', 'Offers') 

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header">{{ __('Offers') }}</div>
                <div class="card-body align-items-center d-flex justify-content-center">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <table>
                        <th>Picture</th><th>Name</th><th>Localization</th><th>Price</th><th></th>
                        @foreach($offers as $offers)
                            <tr><td class="offersTable"><img src={{$offers["coverImage"]}} width="165" height="105"></td>
                            <td class="offersTable">{{$offers["name"]}}</td>
                            <td class="offersTable">{{$offers["localization"]}}</td>
                            <td class="offersTableSmall">{{$offers["price"]}} $</td>
                            <td class="offersTableSmall"><a href="/offers/{{$offers["id"]}}" class="btn btn-dark buttonCreate btnMang">Details</a></td>
                            </tr>
                        @endforeach
                    </table>
        
            </div>
        </div>
    </div>
</div>
@endsection
