<?php
$pageTitle = 'Dashboard';
include('sessions.php');
include('includes/header.php');
include('includes/navbar.php');


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

  //alltime violation
  $alltime_violation ="SELECT * FROM violation_tbl";
  $alltime_result = $connection->query($alltime_violation);
  $alltime_count = mysqli_num_rows($alltime_result);

?>

    <!-- Main Sidebar Container -->
    <?php include('includes/sidebar.php'); ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <?php include('includes/breadcrumb.php'); ?>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <!-- Students -->
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-teal">
                            <div class="inner">
                                <?php
                                    echo '<h3>'.$daily_count.'</h3>';
                                ?>
                                <p>Daily</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-hourglass-start"></i>
                            </div>
                            <a href="violation.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                     <!-- settled Violations -->
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-teal">
                            <div class="inner">
                                <?php
                                    echo '<h3>'.$weekly_count.'</h3>';
                                ?>
                                <p>Weekly</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-hourglass-half"></i>
                            </div>
                            <a href="violation.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./settled violations -->
                    <!-- unsettled Violation -->
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-teal">
                            <div class="inner">
                                <?php
                                    echo '<h3>'.$monthly_count.'</h3>';
                                ?>
                                <p>Monthly</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-hourglass-end"></i>
                            </div>
                            <a href="violation.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./unsettled Violation -->
                    <!-- unsettled Violation -->
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <?php
                                    echo '<h3>'.$alltime_count.'</h3>';
                                ?>
                                <p>All Time</p>
                            </div>
                            <div class="icon">
                            <i class="fa fa-hourglass"></i>
                            </div>
                            <a href="violation.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./unsettled Violation -->
                   
                </div>
                <!-- ./Small boxes (Stat box) -->

                <div class="row">
                    <!-- health chart -->
                    <div class="col-md-6">
                        <div class="card card-green card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Total Number of Violation Reported</h3>

                            <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="chart">
                            <canvas id="areaChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>

                    <!-- educ chart -->
                    <div class="col-md-6">
                        <div class="card card-green card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Distribution of Violation by Department</h3>

                            <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="chart">
                            <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <!-- /.row -->

              

            </div><!-- /.container-fluid -->
        </section>
        <!-- /.Main content -->
    </div>
    <!-- /.content-wrapper -->

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>