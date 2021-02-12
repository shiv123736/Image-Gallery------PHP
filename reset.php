<?php

include "component/_db_connect.php";
$sql = "TRUNCATE TABLE imageslist";
$result = $conn->query($sql);
$sql1 = "TRUNCATE TABLE report";
$result1 = $conn->query($sql1);
if($result == true && $result1 == true) {
    header("location:index.php");
}


?>