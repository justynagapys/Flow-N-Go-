@extends('layouts.master') 

@section ('title', 'Offer details')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Offer details') }}</div>

                <div class="card-body">
                    
                        
                        <?php $newImage = str_replace('\/', '/', $offer["coverImage"]);
                        $images = str_replace('\/', '/', $offer['images']);
                        $imageArray = explode(' ', $images);?>
                        <div style="text-align:center; margin-bottom:40px"><img src={{$newImage}} width="330" height="210"></div>
                        <div style="text-align:center; margin-bottom:20px">
                            @foreach($imageArray as $element)
                            @if(!empty($element))
                                <img src={{$element }} width="220" height="140">
                            @endif
                        @endforeach      
                        </div>
                        <table>
                        <tr><td style="text-align:left"><h4>{{$offer["name"]}}</h4></td></tr>
                                <tr><td style="text-align:left"><strong>Localization: </strong>{{$offer["localization"]}}</td></tr>
                                <tr><td style="text-align:left"><strong>Price: </strong>{{$offer["price"]}} $</td></tr>
                                <tr><td style="text-align:left"><strong>Description: </strong></td></tr>
                                <tr><td style="text-align:left">{{$offer["description"]}}</td></tr>     
                    
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
