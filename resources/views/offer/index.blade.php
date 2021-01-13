@extends('layouts.master')

@section ('title', 'Offers') 

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Offers') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <table>
                        <th>Picture</th><th>Name</th><th>Localization</th><th>Price</th><th></th>
                        <?php
                        $conn = mysqli_connect("127.0.0.1","root","","FlowGo");
                        if ($conn-> connect_error){
                            die("Connection failed: " . $conn -> connect_error);
                        }
                        $sql = "SELECT name, price, localization, coverImage FROM offers";
                        $result = $conn -> query($sql);
                        header("content-type: image/jpeg");
                        if($result -> num_rows >0){
                            while($row = $result-> fetch_assoc()){
                                print "<tr><td>".'<img src='.$row["coverImage"] .' width="110" height="70">'."</td>
                                    <td>".$row["name"]."</td>
                                    <td>".$row["localization"]."</td>
                                    <td>".$row["price"]."</td>
                                    <td><input type='submit' class='btn btn-dark buttonCreate' value='Details' action=''></td></tr>";
                            }
                        }
                        ?>
                        </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
