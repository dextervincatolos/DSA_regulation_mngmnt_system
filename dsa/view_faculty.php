<?php
$pageTitle = 'User Info';
include('sessions.php');
include('includes/header.php');
include('includes/navbar.php');


    $getUSer = "SELECT * FROM  user_tbl WHERE userID =".$_GET['id'];
    $res = mysqli_query($connection, $getUSer);
    ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="wrapper" style="min-height: 870px;">
        
            <!-- Content Header (Page header) -->
            <?php include('includes/breadcrumb.php'); ?>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">

                <section class="content">
                    <div class="container-fluid">

                        <div class="mx-5">
                        
                        <div class="col-md-12">
                            <?php 
                            
                            while($row = mysqli_fetch_assoc($res))
                                    { ?>
                            <!-- Widget: user widget style 1 -->
                            <div class="card card-widget widget-user">
                                <!-- Add the bg color to the header using any of the bg-* classes -->
                                <div class="widget-user-header text-white" style="background-color:cornflowerblue;">
                                    <h3 class="widget-user-username text-right"><?php echo $row['faculty_fname'].' '.$row['faculty_mname'].' '.$row['faculty_lname']; ?></h3>
                                    <h5 class="widget-user-desc text-right"><?php echo $row['faculty_role'] ?></h5>
                                </div>  
                                <div class="widget-user-image">
                                    <img class="img-circle" src="../assets/img/avatar/avatar2.png" alt="User Avatar">
                                </div>  
                                <div class="card-footer">
                                    <div class="row">
                                    <div class="col-sm-4 border-right">
                                            <div class="description-block">
                                                <h5 class="description-header">3,200</h5>
                                                <span class="description-text">ACTIVITY LOGS</span>
                                            </div>
                                            <!-- /.description-block -->
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-sm-4 border-right">
                                            <div class="description-block">
                                                <h5 class="description-header">3,200</h5>
                                                <span class="description-text">UPDATE RECORD</span>
                                            </div>
                                            <!-- /.description-block -->
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-sm-4">
                                            <div class="description-block">
                                                <h5 class="description-header">13,000</h5>
                                                <span class="description-text">DEACTIVATE</span>
                                            </div>
                                            <!-- /.description-block -->
                                        </div>
                                        <!-- /.col -->
                                    
                                    </div>
                                    <!-- /.row -->
                                </div>
                            </div>
                            <!-- /.widget-user -->
                                <?php }?>
                        </div>
                        <!-- /.col -->
                    </div>
                        <!-- /.row -->

                </div><!-- /.container-fluid -->
            </section>



























                    
                        
                    </section>
                <!-- /.content -->
            </div>
            




<?php
include('includes/scripts.php');
?>
