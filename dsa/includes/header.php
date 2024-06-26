<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SJCBI_DSA | <?php echo $pageTitle; ?></title>

  <link href="../assets/img/school-logo.png" rel="icon">
  
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../assets/css/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="../assets/css/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../assets/css/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../assets/css/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../assets/css/adminlte.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../assets/css/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../assets/css/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../assets/css/summernote/summernote-bs4.min.css">
   <!-- DataTables -->
   <link rel="stylesheet" href="../assets/css/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../assets/css/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../assets/css/datatables-buttons/css/buttons.bootstrap4.min.css">

  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="../assets/css/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">


</head>
<?php 
  $college = 'SJCBI'; 
  $active_page = basename($_SERVER['PHP_SELF'], ".php");
  $active_page_name= ucfirst($active_page);
  $student_mngmnt_pages = ['manage_student', 'manage_violation'];
  $sys_mngmnt_pages = ['manage_user', 'manage_college', 'manage_course', 'manage_yearlvl', 'manage_acadsyear'];
  $report_pages = ['report_analytics', 'report_custom', 'report_activity'];

  //Get Daily violation from database.
  $daily_violation = "SELECT DATE(created_at) AS date, COUNT(*) AS daily_count
                      FROM violation_tbl
                      GROUP BY DATE(created_at)
                      ORDER BY date DESC";
  $daily_result = $connection->query($daily_violation);
  $daily_count = mysqli_num_rows($daily_result);
  
  //weekly count
  $weekly_violation ="SELECT YEARWEEK(created_at, 1) AS week, COUNT(*) AS weekly_count
                      FROM violation_tbl
                      GROUP BY YEARWEEK(created_at, 1)
                      ORDER BY week DESC"; 
  $weekly_result = $connection->query($weekly_violation);
  $weekly_count = mysqli_num_rows($weekly_result);

  //Monthly violation
  $monthly_violation ="SELECT DATE_FORMAT(created_at, '%Y-%m') AS month, COUNT(*) AS monthly_count
                      FROM violation_tbl
                      GROUP BY DATE_FORMAT(created_at, '%Y-%m')
                      ORDER BY month DESC";
  $monthly_result = $connection->query($monthly_violation);
  $monthly_count = mysqli_num_rows($monthly_result);

  //Monthly violation
  $alltime_violation ="SELECT * FROM violation_tbl";
  $alltime_result = $connection->query($alltime_violation);
  $alltime_count = mysqli_num_rows($alltime_result);


?>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <!-- <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="assets/img/HEALME-LOGO-MAIN.png" alt="HEAL ME LOGO MAIN" height="500" width="500">
  </div> -->