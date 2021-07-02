<!DOCTYPE html>
<html>
<head>
    <title>Consumers Data</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
</head>
<body>
<?php
$consumers = array_values($consumers);
$total_consumers = sizeof($consumers);
?>
<h1>Consumers</h1>
<table class="table" >
    <tr>
        <th>Name</th>
        <th>Date of Birth</th>
        <th>Email</th>
        <th>Record No</th>
        <th>Created Date</th>
        <th>Status</th>
     
    </tr>
    @for($i=0;$i<$total_consumers;$i++)
    <tr>
        <td>{{$consumers[$i]['fname']}} {{$consumers[$i]['lname']}}</td>
        <td>{{$consumers[$i]['dob']}}</td>
        <td>{{$consumers[$i]['email']}}</td>
        <td>{{$consumers[$i]['record_no']}}</td>
        <td>{{$consumers[$i]['created_date']}}</td>
        <td>{{$consumers[$i]['status']}}</td>
     
    </tr>
    @endfor
    
    
</table>
</body>
</html>