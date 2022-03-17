<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Job Details</title>
   <link rel="stylesheet" href="./css/apply.css">
 <?php include './bootstrap.php';?>
</head>

<body>
    <div id="navbar" class="upper-main">
        <div class="col-sm-8 anim">
          <a href="./index.php" style="text-decoration: none;">
            <p class="neonText">One Smart Talent</p>
          </a>
        </div>
        </div>
      </div>
 <?php
          include_once 'connection.php';
          $id = $_GET['data-id'];
          $query = "select * from jobrequests where id = '$id'";
          $result = mysqli_query($conn, $query);
          ?>
           <?php if ($result->num_rows > 0): ?>
              <?php while($array=mysqli_fetch_row($result)): ?>

<div class="application-container">
  <div class="row m-5">
    <div class="title">
      <h1><?php echo $array[1];?></h1>
    </div>
    <div class="col-xs-6">
    <div class="category d-flex">
      Category: <p class="text-muted  ml-3"><?php if (true) echo $array[2]; else echo 'Not Specified';?></p>
    </div>
    <div class="category d-flex">
      Job Type: <p class="text-muted  ml-3"><?php if (true) echo $array[3]; else echo 'Not Specified';?></p>
    </div>
</div>
<div class="col-sm-9">
  <p><?php echo $array[5];?></p>
</div>
<div class="col-sm-12">
  <a  href="<?php echo $array[4];?>" target="_blank">
  <button >Apply Now</button>
</a>
</div>
  </div>

</div>
 <?php endwhile; ?>
          <?php else: ?>
          <?php endif; ?>
          <?php mysqli_free_result($result); ?>

</body>

</html>