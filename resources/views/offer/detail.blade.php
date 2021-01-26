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
                    $imageArray = explode(' ', $images);
                    $userOffer = str_replace('[', "", $user );
                    $userOfferNew = str_replace(']', "", $userOffer );
                    $userArray = explode(',', $userOfferNew);
                    $userName=str_replace("\"name\":\"", "", $userArray[1]);
                    $userNameFinal = str_replace("\"", "", $userName);
                    $userEmail = str_replace("\"email\":\"", "", $userArray[2]);
                    $userEmailFinal = str_replace("\"", "", $userEmail);
                    $userAvatar = str_replace("\"avatar\":\"", "", $userArray[4]);
                    $userAvatarNew = str_replace("\"", "", $userAvatar);
                    $userAvatarFinal = str_replace('\/', '/', $userAvatarNew)?> 
                    
                    <div style="text-align:center; margin-bottom:40px"><img src={{$newImage}} width="330" height="210"></div>
                    <div style="text-align:center; margin-bottom:20px">
                        @foreach($imageArray as $element)
                        @if(!empty($element))
                            <img src={{$element }} width="220" height="140">
                        @endif
                    @endforeach      
                    </div>
                    
                    <div>
                        <table style="float: left; width: 70%">
                            <tr><td style="text-align:left"><h4>{{$offer["name"]}}</h4></td></tr>
                      <tr><td style="text-align:left"><strong>Localization: </strong>{{$offer["localization"]}}</td></tr>
                            <tr><td style="text-align:left"><strong>Description: </strong></td></tr>
                            <tr><td style="text-align:left">{{$offer["description"]}}</td></tr>
                            <tr><td style="text-align:left"><strong>Users comments: </strong></td></tr> 
                            <?php $comments = $offer["comments"];
                                foreach($comments as $comment){
                                $commentNew = explode(",", $comment);
                                $commentNewer = str_replace("\"message\":\"","",$commentNew[6]);
                                $commentFinal = str_replace("\"}", "",$commentNewer);
                                $user = str_replace("\"name\":\"","", $commentNew[5]);
                                $userFinal = str_replace("\"", "",$user);
                                $date = str_replace("\"created_at\":\"","", $commentNew[1]);
                                $dateNew = str_replace("\"", "",$date);
                                $dateFinal = substr($dateNew, 0, -17);
                                print "<tr><td td style='text-align:left; border: solid #F3F9FD'><strong>".$userFinal. ":</strong> ".$commentFinal. "<br />" .$dateFinal."</td></tr>";}
                            ?>
                            <tr><td style="text-align:left"><a href="/offers/{{$offer["id"]}}/comments" class="btn btn-dark buttonCreate btnMang">All comments</a>
                            <a href="/offers/{{$offer["id"]}}/comments/create" class="btn btn-dark buttonCreate btnMang">Add comment</a></td></tr>
                        </table>
                        <table class="author" style="float:right; width: 30%">
                            <tr><td><h5>Author: </h5></td></tr>
                            <tr><td><img src="{{$userAvatarFinal}}" class="avatarImageOffer"></td></tr>    
                            <tr><td>{{$userNameFinal}} <br />{{$userEmailFinal}}</td></tr>
                            <tr><td><a href="mailto:{{$userEmailFinal}}" class="btn btn-dark buttonCreate btnMang">Contact</a></td></tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
