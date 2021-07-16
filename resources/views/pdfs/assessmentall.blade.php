<!DOCTYPE html>
<html>
<head>
    <title>Assessments Data</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
</head>
<body>
<?php
$assessments = array_values($assessments);
$total_assessments = sizeof($assessments);
?>
<h1>Assessments</h1>
<table class="table" >
    <tr>
        <th>Assessment No</th>
        <th>Location</th>
        <th>Communication</th>
        <th>Record No</th>


     
    </tr>
    @for($i=0;$i<$total_assessments;$i++)
    <tr>
        <td>{{$assessments[$i]['assessment_no']}}</td>
        <td>{{$assessments[$i]['location']}}</td>
        <td>{{$assessments[$i]['communication']}}</td>
        <td>{{$assessments[$i]['record_no']}}</td>


     
    </tr>
    @endfor
    
    
</table>
</body>
</html>