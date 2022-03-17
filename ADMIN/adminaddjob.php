<?php
$db_host = 'localhost';
$username = 'root';
$password = '';
$db_name = 'onesmartalent';

$conn = mysqli_connect($db_host, $username, $password, $db_name);
$position =   $_POST["position"];
 $category =  $_POST["category"];
 $jobtype =  $_POST["jobtype"];
 $applymeans =  $_POST["applymeans"];
 $myTextarea = $_POST["myTextarea"];
 $status = "approved";

$sql = "INSERT INTO  `jobrequests` ( `position`, `category`, `jobtype`, `howtoapply`, `description`,`status`) VALUES ('$position', '$category','$jobtype', '$applymeans','$myTextarea','$status')";
 $run =mysqli_query($conn, $sql);
 	if($run == true){
			echo "<script> 
					alert('Job Added Successfully');
					window.open('index.php','_self');
				  </script>";
		}else{
			echo "<script> 
			alert('Failed To Add Job');
			</script>";
		}
header('index.php?success');
 ?>
