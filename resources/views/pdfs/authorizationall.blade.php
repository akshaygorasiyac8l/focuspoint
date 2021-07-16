<!DOCTYPE html>
<html>
<head>
    <title>Authorizations Data</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
</head>
<body>
<?php
$authorizations = array_values($authorizations);
$total_authorizations = sizeof($authorizations);
?>
<h1>Authorizations</h1>
<table class="table" >
    <tr>
        <th>Auth No</th>
        <th>Services</th>

        <th>Record No</th>
        

     
    </tr>
    @for($i=0;$i<$total_authorizations;$i++)
    <tr>
        <td>{{$authorizations[$i]['auth_no']}}</td>
        <td>{{$authorizations[$i]['services']}}</td>
        <td>{{$authorizations[$i]['record_no']}}</td>

     
    </tr>
    @endfor
    
    
</table>
</body>
</html>