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
                                if($comment["user_id"]==auth()->user()->id){
                                    print "<tr><td td style='text-align:left; border: solid #F3F9FD'><strong>".$userFinal. ":</strong> ".wordwrap($commentFinal, 100, "<br />\n")."<br />" .$dateFinal. "</td><td><a href='/offers/{{$offer["id"]}}/comments/{{$comment["id"]}}/delete' class='btn btn-dark buttonCreate btnMang'>Delete</a></td></tr>";}
                                 else{
                                    print "<tr><td td style='text-align:left; border: solid #F3F9FD'><strong>".$userFinal. ":</strong> ".wordwrap($commentFinal, 100, "<br />\n"). "<br />" .$dateFinal."</td></tr>";}                                    
                                }
                        
                            ?>
                            <tr><td style="text-align:left"><a href="/offers/{{$offer["id"]}}/comments/create" class="btn btn-dark buttonCreate btnMang">Add comment</a></td></tr>                    
                        </table>
        
            </div>
        </div>
    </div>
</div>
@endsection
