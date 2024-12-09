<?php
$pageTitle = 'Dashboard';
include('sessions.php');
include('includes/header.php');
include('includes/navbar.php');

$daily_count = '<i class="fa fa-spinner"></i>';
$weekly_count = '<i class="fa fa-spinner"></i>';
$monthly_count = '<i class="fa fa-spinner"></i>';
$alltime_count = '<i class="fa fa-spinner"></i>';
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
                               
                                   <h3 id="dailyCount"><?php echo $daily_count; ?></h3>
                                
                                <p>Daily</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-hourglass-start"></i>
                            </div>
                            <a href="dailyViolation.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                     <!-- settled Violations -->
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-teal">
                            <div class="inner">
                                <h3 id="weeklyCount"><?php echo $weekly_count; ?></p></h3>
                                <p>Weekly</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-hourglass-half"></i>
                            </div>
                            <a href="weeklyViolation.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./settled violations -->
                    <!-- unsettled Violation -->
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-teal">
                            <div class="inner">
                                <h3 id="monthlyCount"><?php echo $monthly_count; ?></h3>
                                <p>Monthly</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-hourglass-end"></i>
                            </div>
                            <a href="monthlyViolation.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./unsettled Violation -->
                    <!-- unsettled Violation -->
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3 id="alltimeCount"><?php echo $alltime_count; ?> </h3>
                                <p>All Time</p>
                            </div>
                            <div class="icon">
                            <i class="fa fa-hourglass"></i>
                            </div>
                            <a href="report_custom.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./unsettled Violation -->
                   
                </div>
                <!-- ./Small boxes (Stat box) -->

                <div class="row">
                    <!-- health chart -->
                    <div class="col-md-12">
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
                    <div class="col-md-12">
                        <div class="card card-green card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Distribution of Violation by Course</h3>

                            <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="chart">
                            <canvas id="groupedBarChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
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
include('script/violationGraph.php');
?>

<script>
    function fetchViolationCounts() {
        fetch('script/getViolationCounts.php')
            .then(response => response.json())
            .then(data => {
                document.getElementById('dailyCount').innerText = data.daily_count;
                document.getElementById('weeklyCount').innerText = data.weekly_count;
                document.getElementById('monthlyCount').innerText = data.monthly_count;
                document.getElementById('alltimeCount').innerText = data.alltime_count;
            })
            .catch(error => console.error('Error fetching violation counts:', error));
    }

    // Fetch counts every 10 seconds
    setInterval(fetchViolationCounts, 5000);

    // Initial fetch
    window.onload = fetchViolationCounts;
</script>

