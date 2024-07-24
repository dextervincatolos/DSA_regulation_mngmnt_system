<aside class="main-sidebar sidebar-light-primary elevation-4">
        <!-- Brand Logo -->
        <a href="dashboard.php" class="brand-link">
            <img src="../assets/img/school-logo.png" alt="CICS logo" class="brand-image img-circle elevation-3">
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
                    <li class="nav-item">
                        <a href="policy.php" class="nav-link <?php echo $active_page == 'policy' ? 'active' : ''; ?>">
                            <i class="nav-icon fas fa-balance-scale"></i>
                            <p> Policy Management </p>
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
                            <li class="nav-item">
                                <a href="manage_violation.php" class="nav-link <?php echo $active_page == 'manage_violation' ? 'active' : ''; ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Violation</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item <?php echo in_array($active_page, $sys_mngmnt_pages) ? 'menu-open' : ''; ?>" <?php echo $_SESSION['role'] == 'User' ? 'hidden' : ''; ?>>
                        <a href="#" class="nav-link <?php echo in_array($active_page, $sys_mngmnt_pages) ? 'active' : ''; ?>">
                            <i class="nav-icon fas fa-cogs"></i>
                            <p> System Management <i class="right fas fa-angle-left"></i> </p>
                        </a>
                        <ul class="nav nav-treeview">
                        <li class="nav-item">
                                <a href="manage_user.php" class="nav-link <?php echo $active_page == 'manage_user' ? 'active' : ''; ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>User</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="manage_college.php" class="nav-link <?php echo $active_page == 'manage_college' ? 'active' : ''; ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Department/College</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="manage_course.php" class="nav-link <?php echo $active_page == 'manage_course' ? 'active' : ''; ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Course/Program</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="manage_yearlvl.php" class="nav-link <?php echo $active_page == 'manage_yearlvl' ? 'active' : ''; ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Year Level</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="manage_acadsyear.php" class="nav-link <?php echo $active_page == 'manage_acadsyear' ? 'active' : ''; ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Academic year</p>
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
                                <a href="report_analytics.php" class="nav-link <?php echo $active_page == 'report_analytics' ? 'active' : ''; ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Analytics</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="report_custom.php" class="nav-link <?php echo $active_page == 'report_custom' ? 'active' : ''; ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Custom Report</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="report_activity.php" class="nav-link <?php echo $active_page == 'report_activity' ? 'active' : ''; ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Activity logs</p>
                                </a>
                            </li>
                        </ul>
                    <!-- </li>
                    <li class="nav-item">
                        <a href="access_level_chart.php" class="nav-link <?php echo $active_page == 'access_level_chart' ? 'active' : ''; ?>">
                            <i class="nav-icon fas fa-sitemap"></i>
                            <p> Access Levels Chart </p>
                        </a>
                    </li> -->
                </ul>
            </nav>

            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>