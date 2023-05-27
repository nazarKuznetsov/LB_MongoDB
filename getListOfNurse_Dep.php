<?php
include("connect.php");

$departments = $_POST['department'];

$collections = (new MongoDB\Client)->Lb6_Nurses->duty;
$filter = ['department' => $departments];
$projection = ['nurses' => 1];
$cursor = $collections->find($filter, $projection);

$result = array();
foreach ($cursor as $Documents) 
{
    foreach ($Documents['nurses'] as $nurse) 
    {
        $result[] = $nurse;
    }
}


$unique_nurses = array_unique($result);
foreach ($unique_nurses as $nurse) {
    echo $nurse . "<br>";
}

echo "<script>localStorage.setItem('request', '" . (json_encode($result)) . "');</script>";
?>