<?php
$pageTitle = 'User Info';
include('sessions.php');
include('includes/header.php');
include('includes/navbar.php');
?>


    <body class="layout-top-nav" style="height: auto;">
<div class="wrapper">

 
  <!-- Content Wrapper. Contains page content -->
  <div class="wrapper" style="min-height: 1344px;">
    <!-- Content Header (Page header) -->
        <?php include('includes/breadcrumb.php'); ?>
        <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
            
           

        </section>
        <!-- /.content -->
  </div>
   




<?php
include('includes/scripts.php');
include('includes/footer.php');
?>

<script>
    //script for data tables
    $(function () 
    {
        $("#violation_history").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#violation_history_wrapper .col-md-6:eq(0)');
        
    });

</script>