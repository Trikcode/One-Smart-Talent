<?php
include_once 'connection.php';
$position =   $_POST["position"];
 $category =  $_POST["category"];
 $jobtype =  $_POST["jobtype"];
 $applymeans =  $_POST["applymeans"];
 $myTextarea = $_POST["myTextarea"];
 $status = "pending";

$sql = "INSERT INTO  `jobrequests` ( `position`, `category`, `jobtype`, `howtoapply`, `description`,`status`) VALUES ('$position', '$category','$jobtype', '$applymeans','$myTextarea','$status')";
 mysqli_query($conn, $sql);

 ?>
