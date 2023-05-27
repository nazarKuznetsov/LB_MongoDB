<?php
include("connect.php");
$nurseName = $_POST["nurseName"];

   $collections = (new MongoDB\Client)->Lb6_Nurses->duty;
   $filter = ['nurses' => $nurseName];
   $projection = ['wards' => 1];
   $cursor = $collections-> find($filter, $projection);

   $result = array();
   foreach ($cursor as $Documents)
    {
            foreach ($Documents['wards'] as $ward)
            {
                $result[] = $ward;
            }
   }

   $unique_wards = array_unique($result);
   foreach ($unique_wards as $ward) {
            echo $ward . "<br>";
   }

   echo "<script>localStorage.setItem('request', '" . json_encode($result)."'); </script>";
?>