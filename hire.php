<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>One Smart Talent</title>
</head>

<body>
 <div class="col-sm-8 row-jobs">
  <h3 class="hired">Get Hired Now!!!</h3>
  <?php
          include_once 'connection.php';
          $query = "select * from jobrequests where status = 'approved'";
          $result = mysqli_query($conn, $query);
          ?>
  <?php if ($result->num_rows > 0): ?>
  <?php while($array=mysqli_fetch_row($result)): ?>
  <div class="row text-center mb-3 job pt-3">
   <div class="col-2">
    <span class="rounded-circle"><i class="bi bi-handbag"></i></span>
   </div>
   <div class="col-5 single-job">
    <p>
     <?php echo $array[1];?>
    </p>
   </div>
   <div class="col-3 apply">
    <a class="iew" href="application.php?data-id=<?php echo $array[0];?>">Apply</a>
    <a href="javascript:void(0)" class="btn btn-primary view" data-id="<?php echo $array[0];?>">View</a>
   </div>
  </div>
  <?php endwhile; ?>
  <?php else: ?>
  <?php endif; ?>
  <?php mysqli_free_result($result); ?>
 </div>
</body>

</html>