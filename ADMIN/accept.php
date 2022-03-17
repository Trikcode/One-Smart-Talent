<?php
	include'../connection.php'; 
	if (isset($_POST['approve'])){
		$appid = $_POST['appid'];
		$sql = "UPDATE jobrequests SET status='approved' WHERE id = '$appid'";
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