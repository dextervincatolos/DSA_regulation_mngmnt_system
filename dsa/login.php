<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SJCBI_DSA | Administrator Login</title>
  
  <link href="../assets/img/school-logo.png" rel="icon">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../assets/css/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../assets/css/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../assets/css/adminlte.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    
    <div class="card-header text-center">
      <a href="login.php" class="h4"> Faculty Login</a>
    </div>
    <div class="card-body">

    <form action="script/loginRequest.php" method="POST">


        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control" placeholder="Email" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-6">
          </div>
          <!-- /.col -->
          <div class="col-6">
            <p class="mt-1 ml-2">
                <a href="#">I forgot my password</a>
            </p>
          </div>
          <!-- /.col -->
        </div>
        <div class="row">
          <div class="col-12 mb-2">
            <button type="submit" class="btn btn-primary btn-block" name="login" >LOGIN</button>
          </div>
        </div>
        
      </form>

       
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->


<script src="../assets/js/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../assets/js/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../assets/js/adminlte.min.js"></script>

<!-- SweetAlert -->
<script src="../assets/js/sweetalert.min.js"></script>

<?php

  session_start();
  if(isset($_SESSION['status']) && $_SESSION['status'] !='')
  {
    ?>
      <script>
        // script for adding users
        swal({
          title: "<?php echo $_SESSION['status']; ?>",
          icon: "<?php echo $_SESSION['status_code']; ?>",
        });
      </script>
    <?php
    unset($_SESSION['status']);
  }
?>

</body>
</html>
