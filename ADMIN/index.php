<?php
include "adminlogin.php";

// Check user login or not
if(!isset($_SESSION['uname'])){
    header('Location: index.php');
}

// logout
if(isset($_POST['but_logout'])){
    session_destroy();
    header('Location: login.php');
}
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
<!-- Bootstrap Font Icon CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"  crossorigin="anonymous"></script>
<?php include '../connection.php';?>

</head>
<body>

	<header id="main-header" class="bg-danger py-2 text-white">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<h1><i class="fa fa-user-secret"></i> Admin Panel</h1>
					 <form method='post' action="">
            <input type="submit" value="Logout" name="but_logout">
        </form>
				</div>
			</div>
		</div>
	</header>
	<!--This is section-->
	<section id="sections" class="py-4 mb-4 bg-faded">
		<div class="container">
			<div class="row">
				<div class="col-md"></div>
				<div class="col-md-2">
					<a href="#" class="btn btn-warning btn-block" style="border-radius:0%;" data-toggle="modal" data-target="#addPostModal"><i class="fa fa-spinner"></i> Pending Jobs</a>
				</div>
				<div class="col-md-2">
					<a href="#" class="btn btn-success btn-block" style="border-radius:0%;" data-toggle="modal" data-target="#addCateModal"><i class="fa fa-check"></i> Approved</a>
				</div>
				<div class="col-md-2">
					<a href="#" class="btn btn-danger btn-block" style="border-radius:0%;" data-toggle="modal" data-target="#addJobtModal"><i class="fa fa-users"></i> Add a Job</a>
				</div>
			
				<div class="col-md"></div>
			</div>
		</div>
	
	</section>
	<!----Section2 for showing Post Model ---->
  <h3>Jobs</h3>
<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names..">

	<section id="post">
		<div class="container">
			<div class="row">
			<table class="table table-bordered table-hover table-striped" id="myTable" >
							<tr class="header">
								<th>#</th>
								<th>Position</th>
								<th>Category</th>
								<th>Job Type</th>
								<th>How To Apply</th>
								<th>Status</th>
							</tr>
							 <tr>
							 	<?php 
									$sql = "SELECT * FROM jobrequests ORDER BY id DESC";
									$que = mysqli_query($conn,$sql);
									$cnt = 1;
									while ($result = mysqli_fetch_assoc($que)) {
										
									?>

									
							 	<tr>
									<td><?php echo $cnt;?></td>
							 			<td><?php echo $result['position']; ?></td>
							 		<td><?php echo $result['category']; ?></td>
							 		<td><?php echo $result['jobtype']; ?></td>
							 		<td><?php echo $result['howtoapply']; ?></td>
							 		<td>
							 			<?php 
							 			if ($result['status'] == 'pending') {
											echo "<span class='badge badge-warning'>Pending</span>";
							 			}
							 			else{
											echo "<span class='badge badge-success'>Approved</span>";
							 			}
							 	$cnt++;	}
							 		 ?>
							 		</td>
							 	</tr>
								
							 </tr>
						</table>
			</div>
		</div>
	</section>
	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
	
    <!-- Pending -->
	<div class="modal fade" id="addPostModal">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header bg-warning text-white">
					<div class="modal-title">
						<h5>Pending</h5>
					</div>
					<button class="close" data-dismiss="modal"><span>&times;</span></button>
				</div>
				<div class="modal-body">
				<table class="table table-bordered table-hover table-striped">
							<thead>
								<th>#</th>
								<th>Position</th>
								<th>How To apply</th>
								<th>Status</th>
								<th>Action</th>
							</thead>
							 <tbody>
							 	<?php 
									$sql = "SELECT * FROM jobrequests WHERE status = 'pending'";
									$que = mysqli_query($conn,$sql);
									$cnt = 1;
									while ($result = mysqli_fetch_assoc($que)) {
									?>

									
							 	<tr>
									<td><?php echo $cnt;?></td>
							 		<td><?php echo $result['position']; ?></td>
							 		<td><?php echo $result['howtoapply']; ?></td>
							 		<td>
							 			<?php 
							 			if ($result['status'] == 'pending') {
							 				echo "Pending";
							 				?>
							 				</td>
							 		<td>
							 			<form action="accept.php?id=<?php echo $result['id']; ?>" method="POST">
							 				<input type="hidden" name="appid" value="<?php echo $result['id']; ?>">
							 				<input type="submit" class="btn btn-sm btn-success" name="approve" value="Approve">
							 			</form>
							 		</td>
							 				<?php
							 			}
							 			else{
							 				echo "Approved";
							 			}
							 	$cnt++;	}
							 		 ?>
							 		
							 	</tr>

							 </tbody>
						</table>
					
				</div>
				
			</form>
			</div>
		</div>
	</div>
	<!--Approved Jobs-->
	<div class="modal fade" id="addCateModal">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header bg-success text-white">
					<div class="modal-title">
						<h5>Approved Jobs</h5>
					</div>
					<button class="close" data-dismiss="modal"><span>&times;</span></button>
				</div>
				<div class="modal-body">
				<table class="table table-bordered table-hover table-striped">
							<thead>
								<th>#</th>
								<th>Position</th>
								<th>How To apply</th>
								<th>Status</th>
                	<th>Action</th>
							</thead>
							 <tbody>
							 	<?php 
									$sql = "SELECT * from jobrequests where status = 'approved'";
									$que = mysqli_query($conn,$sql);
									$cnt = 1;
									while ($result = mysqli_fetch_assoc($que)) {
									?>

									
							 	<tr>
									<td><?php echo $cnt;?></td>
							 		<td><?php echo $result['position']; ?></td>
							 		<td><?php echo $result['howtoapply']; ?></td>
							 		<td>
							 			<?php 
							 			if ($result['status'] == 'approved') {
											echo "<span class='badge badge-warning'>Approved</span>";
                      ?>
							 		</td>
                   	<td>
							 			<form action="delete.php?id=<?php echo $result['id']; ?>" method="POST">
							 				<input type="hidden" name="appid" value="<?php echo $result['id']; ?>">
							 				<input type="submit" class="btn btn-sm btn-success" name="delete" value="Delete">
							 			</form>
							 		</td>
                   		<?php
							 			}
							 			else{
							 				echo "Approved";
							 			}
							 	$cnt++;	
              }
							 		 ?>
							 	</tr>

							 </tbody>
						</table>
					
				</div>
			
			</div>
		</div>
	</div>
	<!-- ADD JOB Modal -->
	<div class="modal fade" id="addJobtModal">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header bg-primary text-white">
					<div class="modal-title">
						<h5>Add Job</h5>
					</div>
					<button class="close" data-dismiss="modal"><span>&times;</span></button>
				</div>
				<div class="modal-body">
				<form id="myForm" action="adminaddjob.php" method="post" autocomplete="off">
          <label class="label">Position <span id="req">*</span></label>
          <input type="text" name="position" id="position" placeholder="e.g Software Engineer" class="form-control"
            required />
          <label class="label">Category <span id="req">*</span></label>
          <select  name="category" id="category" class="form-select" aria-label="Default select example"required><span id="req">*</span>
            <option value="">Choose category</option>
            <option value="Software Development">Software Development</option>
            <option value="Customer Service">Customer Service</option>
            <option value="Design">Design</option>
            <option value="Writing">Writing</option>
            <option value="Marketing">Marketing</option>
            <option value="Business">Business</option>
            <option value="Other">Other</option>
          </select>
          <label class="label">Job type<span>*</span></label>
          <select class="form-select" aria-label="Default select example" id="jobtype" name="jobtype" required><span id="req">*</span>
            <option value="">Job Type...</option>
            <option value="Full Time">Full-Time</option>
            <option value="Part Time">Part-Time</option>
            <option value="Remote">Remote</option>
            <option value="Internship">Internship</option>
            <option value="Freelance">Freelance</option>
            <option value="Other">Other</option>
          </select>
          <label class="label">How to apply? <span id="req">*</span></label>
          <input type="text" name="applymeans" id="applymeans" placeholder="provide link or description"
            class="form-control jobtype" required />
          <label class="jobtype">Job Description<span>*</span></label>
          <textarea id="myTextarea" class="form-control" rows="5" name="myTextarea" required></textarea>
          <div class="btnn" style="text-align: center;">
            <button type="submit" id="#submittone" name="button" class="btn m-3" style="border: 1px solid #050505;">
              <span></span>
              <span></span>
              <span></span>
              <span></span> UPLOAD JOB
            </button>
          </div>
        </form>
				</div>
				
			</div>
		</div>
	</div>
  
  
  <script src="js/jquery.min.js"></script>
  <script src="js/tether.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="https://cdn.ckeditor.com/4.9.1/standard/ckeditor.js"></script>

<script>
  function myFunction() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}

    $(document).ready(function() {
            $("#submittone").click(function(e) {
              e.preventDefault()
              let position = $("#position").val();
                let category = $("#category").val();
                let jobtype = $("#jobtype").val();
                let applymeans = $("#applymeans").val();
                let myTextarea = $("#myTextarea").val();
              
 
                if(position==''||category==''||jobtype==''|| applymeans=='' ||myTextarea =='' ) {
                    alert("Please fill all fields.");
                    return false;
                }
 
                $.ajax({
                    type: "POST",
                    url: "adminaddjob.php",
                    data: {
                        position: position,
                        category: category,
                        jobtype: jobtype,
                        applymeans: applymeans,
                        myTextarea: myTextarea,
                    },
                    cache: false,
                    success: function(data) {
                   
                        alert('success');
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr);
                    }
                });
                 
            });
 
        });
</script>
</body>
</html>
