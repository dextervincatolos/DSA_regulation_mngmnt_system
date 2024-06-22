<?php
$pageTitle = 'Admin Dashboard';
include('includes/header.php');
include('includes/navbar.php');
?>

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-light-primary elevation-4">
        <!-- Brand Logo -->
        <a href="dashboard.php" class="brand-link">
            <img src="../assets/img/cics-logo.png" alt="CICS logo" class="brand-image img-circle elevation-3">
            <span class="brand-text font-weight-bold"><?php echo $college; ?> </span>
        </a>

        <!-- sidebar divider -->
        <div class="sidebar">
            
            <!-- SidebarSearch Form -->
            <div class="form-inline">
                <div class="input-group mt-3" data-widget="sidebar-search">
                    <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-sidebar">
                            <i class="fas fa-search fa-fw"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                    <li class="nav-item">
                        <a href="dashboard.php" class="nav-link active">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p> Dashboard </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-cogs"></i>
                            <p> System Management <i class="right fas fa-angle-left"></i> </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="create_policy.php" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Policy</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="faculty_tbl.php" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Course/Program</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="admin_user_tbl.php" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Class Sections</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="admin_user_tbl.php" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Events</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="admin_user_tbl.php" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Organization</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-table"></i>
                            <p> Users Record <i class="right fas fa-angle-left"></i> </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="student_tbl.php" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Student Table</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="faculty_tbl.php" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Faculty Table</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="admin_user_tbl.php" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Admin Users Table</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-file-pdf"></i>
                            <p> User Reports <i class="right fas fa-angle-left"></i> </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="reports_residents.php" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Resident Reports</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="access_level_chart.php" class="nav-link">
                            <i class="nav-icon fas fa-sitemap"></i>
                            <p> Access Levels Chart </p>
                        </a>
                    </li>
                </ul>
            </nav>

            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                            <li class="breadcrumb-item active">Admin Dashboard</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <!-- Students -->
                    <div class="col-lg-4 col-6">
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>80</h3>
                                <p>Students</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-users"></i>
                            </div>
                            <a href="student_tbl.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./Students -->
                     <!-- settled Violations -->
                     <div class="col-lg-4 col-6">
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>100</h3>
                                <p>Settled students violation</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-check"></i>
                            </div>
                            <a href="user_brgy.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./settled violations -->
                    <!-- unsettled Violation -->
                    <div class="col-lg-4 col-6">
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>20</h3>
                                <p>Unsettled students Violation</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-exclamation-triangle"></i>
                            </div>
                            <a href="user_municity.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./unsettled Violation -->
                   
                </div>
                <!-- ./Small boxes (Stat box) -->

                <div class="row">
                    <!-- health chart -->
                    <div class="col-md-6">
                        <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Chart 1</h3>

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
                        <div class="card card-info card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Chart 2</h3>

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

                <div class="row">
                    <!-- agri chart -->
                    <div class="col-md-6">
                        <div class="card card-secondary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Chart 3</h3>

                            <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="chart">
                            <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>

                    <!-- livelihood chart -->
                    <div class="col-md-6">
                        <div class="card card-warning card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Chart 4</h3>

                            <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="chart">
                            <canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
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