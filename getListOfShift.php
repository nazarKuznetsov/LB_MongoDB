<?php
include("connect.php");

$departments = $_POST['department'];

$collections = (new MongoDB\Client)->Lb6_Nurses->duty;
$filter = ['department' => $departments];
$projection = ['shifts' => 1];
$cursor = $collections->find($filter, $projection);

$result = array();
foreach ($cursor as $Documents) 
{
    $result[] = $Documents['shift'];
}

$unique_shifts = array_unique($result);
foreach ($unique_shifts as $shift) {
    echo $shift . "<br>";
}

echo "<script>localStorage.setItem('request', '" . (json_encode($result)) . "');</script>";
?>
