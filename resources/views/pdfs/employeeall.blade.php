<!DOCTYPE html>
<html>
<head>
    <title>Employee Data</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
</head>
<body>
<?php
$users = array_values($users);
$total_users = sizeof($users);
?>
<h1>Employees</h1>
<table class="table" >
    <tr>
        <th>Name</th>
        <th>Login</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Role</th>
        <th>Created Date</th>
        <th>Status</th>
     
    </tr>
    @for($i=0;$i<$total_users;$i++)
    <tr>
        <td>{{$users[$i]['fname']}} {{$users[$i]['lname']}}</td>
        <td>{{$users[$i]['fname']}}</td>
        <td>{{$users[$i]['email']}}</td>
        <td>{{$users[$i]['phone']}}</td>
        <td>{{$users[$i]['role_id']}}</td>
        <td>{{$users[$i]['created_at']}}</td>
        <td>{{$users[$i]['status']}}</td>
     
    </tr>
    @endfor
    
    
</table>
</body>
</html>