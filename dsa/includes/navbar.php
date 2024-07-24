<!-- Navbar -->
<nav class="<?php echo $active_page != 'view_faculty' ? 'main-header' : ''; ?>  navbar navbar-expand navbar-green navbar-dark">
<!-- Left navbar links -->
<ul class="navbar-nav">
    <li class="nav-item">
    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
    <a href="dashboard.php" class="nav-link">Home</a>
    </li>
</ul>

<!-- Right navbar links -->
<ul class="navbar-nav ml-auto">
    <!-- Navbar Search -->
    <li class="nav-item">
    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
        <i class="fas fa-search"></i>
    </a>
    <div class="navbar-search-block">
        <form class="form-inline">
        <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
            <button class="btn btn-navbar" type="submit">
                <i class="fas fa-search"></i>
            </button>
            <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                <i class="fas fa-times"></i>
            </button>
            </div>
        </div>
        </form>
    </div>
    </li>

    
        <!-- Admin Profile Dropdown -->
        <li class="nav-item dropdown user-menu">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-user-circle"></i>
                
                <span class="d-none d-md-inline p-2"><?php echo $_SESSION['role'];?> </span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-item dropdown-header"><?php echo $_SESSION['username'] ?></span>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                <i class="fas fa-user mr-3"></i> Profile
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                <i class="fas fa-cog mr-3"></i> Settings
                </a>
                <div class="dropdown-divider"></div>
                <a href="activity_logs.php" class="dropdown-item">
                <i class="fas fa-list-ul mr-3"></i> Activity Log
                </a>
                <div class="dropdown-divider"></div>
                <a class="btn dropdown-item dropdown-footer text-danger" data-toggle="modal" data-target="#signout">Sign Out  <i class="fa fa-arrow-right"> </i></a>
            </div>
        </li>
</ul>
</nav>
<!-- /.navbar -->

    <!-- sign out modal -->
    <div class="modal fade" id="signout" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-s" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-danger" id="exampleModalLabel">Sign Out <i class="fa fa-arrow-right"> </i></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Select "<span class="text-danger">SIGN OUT</span>" below if you are ready to end your current session.
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>

                <form action="script/logout.php" method="POST">
                    <button type="submit" name="signOut" class="btn btn-danger">Sign Out</button>
                </form> 

            </div>

            </div>
        </div>
    </div>