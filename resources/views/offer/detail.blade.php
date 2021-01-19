@extends('layouts.master') 

@section ('title', 'Offer details')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Offer details') }}</div>

                <div class="card-body">
                    <table>
                        <?php
                            header("content-type: image/jpeg");
                            print "<td>".'<img src='.$offer["coverImage"] .' width="110" height="70">'."</td>
                                    <td>".$offer["name"]."</td>
                                    <td>".$offer["localization"]."</td>
                                    <td>".$offer["price"]."</td>";    
                        ?> 
                    </table>
                    

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
