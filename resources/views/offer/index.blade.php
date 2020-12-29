@extends('layouts.master') {{-- używa naszego master layoutu --}}

@section ('title', 'Offers') {{-- tytuł naszej sekcji --}}

@section('content')
<div>
    Tutaj będzie lista ofert
</div>
<!-- zapytanie do konkretnej tabeli-->
<?php
  //  $wynik = mysql_query("SELECT * FROM offers") 

    //or die('Błąd zapytania'); 
     

    // <!-- wyświetlamy wyniki, sprawdzamy, czy zapytanie zwróciło wartość większą od 0  -->
    //if(mysql_num_rows($wynik) > 0) { 
        // <!-- /*jeżeli wynik jest pozytywny, to wyświetlamy dane */ -->
        //echo "<table cellpadding=\"2\" border=1>"; 
        //while($r = mysql_fetch_assoc($wynik)) { 
            //echo "<tr>"; 
            //echo "<td>".$r['name']."</td>"; 
            //echo "<td>".$r['description']."</td>";
            //echo "</tr>"; 
        //} 
        //echo "</table>";}
?> 
@endsection
