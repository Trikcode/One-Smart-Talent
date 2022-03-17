<?php include 'member.php';?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="google-signin-client_id"
    content="771624491251-cn12g6dcc8m5aoq3kmhnu8hq0ho1gltj.apps.googleusercontent.com">
  <script src="https://kit.fontawesome.com/4e28144f1f.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
  <!-- Bootstrap Font Icon CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <link rel="stylesheet" href="./css/reg.css" />

  <script src="https://cdn.tiny.cloud/1/r7qtc05frondhyat5jeg61jiq5vw29a67avd0d9s3vm4hyoa/tinymce/5/tinymce.min.js"
    referrerpolicy="origin"></script>
  </script>
  <script>
    tinymce.init({
      selector: '#myTextarea',
      force_br_newlines : false,
      force_p_newlines : false,
      forced_root_block : '',
    });
    
  </script>
  <title>Add Job</title>
<style media="screen">
.popup{
    background-color: #ffffff;
    width: 420px;
    padding: 30px 40px;
    position: absolute;
    transform: translate(-50%,-50%);
    left: 50%;
    top: 50%;
    border-radius: 8px;
    font-family: "Poppins",sans-serif;
    display: none; 
    text-align: center;
}
.popup #close{
    display: block;
    cursor: pointer;
    border-radius: 100%;
    padding: 5px 10px 5px 10px;
    border: none;
    outline: none;
    background-color: #2196f3;
    margin:  0 0 20px auto;
}
    </style>
</head>

<body>
  <div class="navbar">
    <div class="col-sm-4">
      <div class="neonText"><a href="./index.php">
          One Smart Talent
        </a></div>


    </div>

  </div>
  
  <div class="popup">
    <button id="close">&times;</button>
    <div class="social-login bg-danger" style="text-align: center">
      <div class="g-signin2" data-onsuccess="onSignIn"></div>
    </div>
      <form class="side-form" method="post" action="member.php">
      <?php include('errors.php'); ?>
      <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" name="email" class="form-control" id="exampleInputEmail1" value="<?php echo $email; ?>" aria-describedby="emailHelp" required>
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" name="password_1" class="form-control" id="exampleInputPassword1"  required>
      </div>
      <button type="submit" name="reg_user" id="submit" class="btn btn-primary m-3" style="border: 1px solid #050505;">
        <span></span>
        <span></span>
        <span></span>
        <span></span> Sign Up
      </button>
    </form>
    </div>

  <div class="main container-fluid">
    <div class="row">
      <div class="col-sm-7 form-container">
        <p class="job-desc">Describe your Job</p>
        <form id="myForm" action="" method="post" autocomplete="off">
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
          <textarea id="myTextarea" class="form-control" rows="15" name="myTextarea" required></textarea>
          <div class="btnn" style="text-align: center;">
            <button type="submit" id="submittwo" name="button" class="btn m-3" style="border: 1px solid #050505;">
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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <!-- <script src="https://apis.google.com/js/platform.js" async defer></script> -->
  <script src="./Js/dash.js"> </script>
  <script type="text/javascript">
    $(document).ready(function() {
            $("#submittwo").click(function(e) {
              e.preventDefault()
              tinyMCE.triggerSave() 
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
                    url: "addjob.php",
                    data: {
                        position: position,
                        category: category,
                        jobtype: jobtype,
                        applymeans: applymeans,
                        myTextarea: myTextarea,
                    },
                    cache: false,
                    success: function(data) {
                   
                        alert('Success!!! Your Job will be posted once approved');
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr);
                    }
                });
                 
            });
 
        });

        window.addEventListener("load", function(){
    setTimeout(
        function open(event){
            document.querySelector(".popup").style.display = "block";
        },
        2000 
    )
});


document.querySelector("#close").addEventListener("click", function(){
    document.querySelector(".popup").style.display = "none";
});
  </script>
</body>

</html>