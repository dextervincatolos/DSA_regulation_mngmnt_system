<aside class="main-sidebar sidebar-light-primary elevation-4">
        <!-- Brand Logo -->
        <a href="dashboard.php" class="brand-link">
            <img src="../assets/img/school-logo.png" alt="School-logo" class="brand-image img-circle elevation-3">
            <span class="brand-text font-weight-bold"><?php echo $college; ?> </span>
        </a>

        <!-- sidebar divider -->
        <div class="sidebar">

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item">
                        <a href="dashboard.php" class="nav-link  <?php echo $active_page == 'dashboard' ? 'active' : ''; ?>">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p> Dashboard </p>
                        </a>
                    </li>
                    <li class="nav-item <?php echo in_array($active_page, $student_mngmnt_pages) ? 'menu-open' : '';?>" >
                        <a href="#" class="nav-link <?php echo in_array($active_page, $student_mngmnt_pages) ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-users"></i>
                            <p> Student Management <i class="right fas fa-angle-left"></i> </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="manage_student.php" class="nav-link <?php echo $active_page == 'manage_student' ? 'active' : ''; ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Student</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item <?php echo in_array($active_page, $report_pages) ? 'menu-open' : ''; ?>"  <?php echo $_SESSION['role'] == 'User' ? 'hidden' : ''; ?> >
                        <a href="#" class="nav-link <?php echo in_array($active_page, $report_pages) ? 'active' : ''; ?>">
                            <i class="nav-icon fas fa-table"></i>
                            <p> Reporting <i class="right fas fa-angle-left"></i> </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="report_custom.php" class="nav-link <?php echo $active_page == 'report_custom' ? 'active' : ''; ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Violation Report</p>
                                </a>
                            </li>
                        </ul>
                </ul>
            </nav>

            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>