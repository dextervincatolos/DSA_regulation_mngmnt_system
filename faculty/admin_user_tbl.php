<?php
$pageTitle = 'Admin-User Table';
include('includes/header.php');
include('includes/navbar.php');
?>

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-light-primary elevation-4">
        
        <!-- Brand Logo -->
        <a href="dashboard.php" class="brand-link">
            <img src="../assets/img/cics-logo.png" alt="cics-logo" class="brand-image img-circle elevation-3">
            <span class="brand-text font-weight-bold">CICS Department</span>
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
                    <a href="dashboard.php" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Dashboard
                    </p>
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
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Course/Program</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Events</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Organization</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item menu-open">
                    <a href="#" class="nav-link active">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                        Users
                        <i class="right fas fa-angle-left"></i>
                    </p>
                    </a>
                    <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="#" class="nav-link">
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
                        <a href="admin_user_tbl.php" class="nav-link active">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Admin Users Table</p>
                        </a>
                    </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-table"></i>
                    <p>
                        Resident Reports
                        <i class="right fas fa-angle-left"></i>
                    </p>
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
                <div class="row mt-1">
                    <div class="col-sm-6">
                        <h1 class="m-0">Admin-User Table</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                            <li class="breadcrumb-item active">Admin User Table</li>
                        </ol>
                   
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
            
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            
            <div class="card">
                <!-- /.card-header -->
                <div class="card-body">
                    <a class="btn btn-primary float-right" data-toggle="modal" data-target="#">
                        <i class="fas fa-user-plus fa-sm text-white-50"></i> Add Admin-user
                    </a>
                    <br>
                    <hr>
                    <table id="faculty_tbl" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Faculty Name</th>
                                <th>Faculty Gender</th>
                                <th>Contact Number</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Faculy Role</th>
                                <th>Login Status</th>
                                <th>View record</th>
                                
                            </tr>
                        </thead>
                        
                        <tbody>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    

</div>
<!-- ./wrapper -->

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>


<script>
    //script for data tables
    $(function () 
    {
        $("#faculty_tbl").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#faculty_tbl_wrapper .col-md-6:eq(0)');
        
    });

</script>


</body>
</html>
