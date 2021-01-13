@extends('layouts.master')

@section ('title', 'Home')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Offers') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <table>
                        <th>Name</th><th>Localization</th><th>Price</th>
                        <?php
                        $conn = mysqli_connect("127.0.0.1","root","","FlowGo");
                        if ($conn-> connect_error){
                            die("Connection failed: " . $conn -> connect_error);
                        }
                        $sql = "SELECT images, name, price, localization FROM offers";
                        $result = $conn -> query($sql);
            
                        if($result -> num_rows >0){
                            while($row = $result-> fetch_assoc()){
            
                                print "<tr><td>"
                                    .$row["name"]."</td>
                                    <td>".$row["localization"]."</td>
                                    <td>".$row["price"]."</td></tr>";
                            }
                        }
                        ?>
                        </table>

                    {{-- <img src="{{asset(Auth::user()->avatar)}}"> --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
