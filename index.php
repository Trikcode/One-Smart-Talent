<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <script src="https://kit.fontawesome.com/4e28144f1f.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
  <!-- Bootstrap Font Icon CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <link rel="stylesheet" href="./css/index.css">
</head>

<body>

  <div class="sidenav">
    <a href="#"><i class="bi bi-bounding-box"></i></a>
    <hr class="horizontal" />
    <a href="./ADMIN/index.php"><i class="bi bi-house-door"></i></a>
    <a href="./postjob.php"><i class="bi bi-bag-plus one"></i></a>
    <a href="#downpage"><i class="bi bi-person-check three"></i></a>
    <a href="./hire.html"><i class="bi bi-question-diamond four"></i></a>
  </div>

  <div class="main">
    <nav id="navbar_top" class="navbar" style="background: #ece7e0; overflow:hidden;">
      <div class="container-fluid">
        <a href="#" style="text-decoration: none;">
          <p class="neonText">One Smart Talent</p>
        </a>

        <div class="col-sm-4 d-flex search-main">
          <div class="search-container">
            <input id="myInput" type="text" name="search" placeholder="Search..." class="search-input">
            <a href="#" class="search-btn">
              <i class="fas fa-search"></i>
            </a>
          </div>

          <div class="upload">
            <a href="./postjob.php"> <i class="bi bi-cloud-upload"></i></a>

            <a href="./postjob.php"><button>
                <p class="btn">Add a Job</p>
                <div class="liquid"></div>
              </button></a>

          </div>
        </div> <!-- navbar-collapse.// -->
      </div> <!-- container-fluid.// -->
    </nav>
      <div class="row">
        <div class="col-sm-4">
          <div class="">
            <div class="talent">
              <img src="./images/final1.jpg" alt="" width="100%" />
            </div>
          </div>

        </div>

        <!-- Apply for Jobs -->

        <div class="col-sm-8 row-jobs">
          <p class="hired">We have the best Job for you</p>
          <?php
          include_once 'connection.php';
          $query = "select * from jobrequests where status = 'approved'";
          $result = mysqli_query($conn, $query);
          ?>
          <?php if ($result->num_rows > 0): ?>
          <?php while($array=mysqli_fetch_row($result)): ?>
          <div class="row text-center d-flex mb-3 job pt-3" style="display: flex; justify-content:space-between">
            <div class="col-2">
              <span class="rounded-circle"><i class="bi bi-handbag"></i></span>
            </div>
            <div id="myList" class="col-5 single-job">
              <p>
                <?php echo $array[1];?>
              </p>
            </div>
            <div class="col-3 text-center applly ">
              <a class="view" style="text-decoration: none; color:#fff"
                href="application.php?data-id=<?php echo $array[0];?>"><button class="applyone">Apply</button></a>
            </div>
          </div>
          <?php endwhile; ?>
          <?php else: ?>
          <?php endif; ?>
          <?php mysqli_free_result($result); ?>
        </div>
      </div>
      <div class="row bottom-layer" id="downpage">
        <div class="col-sm-4">
           <h5>SKILLS</h5>
          <uL>
            <li class="text-muted">Remote python Jobs</li>
            <li class="text-muted">Remote AWS Jobs</li>
            <li class="text-muted" class="text-muted">Remote Java Jobs</li>
            <li class="text-muted">Remote Product management jobs</li>
            <li class="text-muted" class="text-muted">Remote SaaS Jobs</li>
            <li class="text-muted">Remote php Jobs</li>
            <li class="text-muted">Remote react Jobs</li>
            <li class="text-muted">Remote sql Jobs</li>
          </uL>


        </div>
         <div class="col-sm-4">
            <h5>WORK TIPS</h5>
        <uL>
            <li class="text-muted"> Hiring Remotely</li>
            <li class="text-muted">Remote Success Stories</li>
            <li class="text-muted" class="text-muted">Remote Jobs Listing Template</li>
            <li class="text-muted">Developer Salaries</li>
            
          </uL>
        </div>
         <div class="col-sm-4">
           <h5>SOCIAL LINKS</h5>
        <uL>
            <li class="text-muted">Twitter</li>
            <li class="text-muted">LinkedIn</li>
            <li class="text-muted" class="text-muted">Slack</li>
           
          </uL>
        </div>
        </div>
      </div>
    
      <div class="row footer">
        <hr class="solid">
        <div class="col-sm-4">
        

        </div>
        <div class="col-sm-4  bottom-icons">
          <a href="#"><i class="bi bi-twitter"></i></a>
          <a href="#"><i class="bi bi-slack"></i></a>
          <a href="#"><i class="bi bi-instagram"></i></a>

        </div>
        <div class="col-sm-4"></div>
      </div>
    </div>

  <!-- Bootstrap JS Bundle with Popper -->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script>
    $(document).ready(function () {
      $("#myInput").on("keyup", function () {
        var value = $(this).val().toLowerCase();
        $("#myList p").filter(function () {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    });

    document.addEventListener("DOMContentLoaded", function () {
      window.addEventListener('scroll', function () {
        if (window.scrollY > 10) {
          document.getElementById('navbar_top').classList.add('fixed-top');
          document.getElementById('navbar_top').classList.add('paddit');
          // add padding top to show content behind navbar
          navbar_height = document.querySelector('.navbar').offsetHeight;
          document.body.style.paddingTop = navbar_height + 'px';
        } else {
          document.getElementById('navbar_top').classList.remove('fixed-top');
          // remove padding top from body
          document.body.style.paddingTop = '0';
        }
      });
    }); 
  </script>
</body>

</html>