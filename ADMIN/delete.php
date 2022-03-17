<?php
	include '../connection.php'; 
	if (isset($_POST['delete'])){
		$appid = $_POST['appid'];
		$sql = "DELETE FROM jobrequests  WHERE id = '$appid'";
		$run = mysqli_query($conn,$sql);
		
		if($run == true){
			echo "<script> 
					alert('Application Approved');
					window.open('index.php','_self');
				  </script>";
		}else{
			echo "<script> 
			alert('Failed To Approved');
			</script>";
		}
	}
	
 ?>