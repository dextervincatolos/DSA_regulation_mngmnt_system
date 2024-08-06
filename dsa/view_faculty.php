<?php
    $pageTitle = 'User Information';
    include('sessions.php');
    include('includes/header.php');
    include('includes/navbar.php');

    $getUSer = "SELECT * FROM  user_tbl WHERE userID =".$_GET['id'];
    $res = mysqli_query($connection, $getUSer);

    $getActivities = "SELECT * FROM activity_logs_tbl WHERE userID = ".$_GET['id'];
    $activity = mysqli_query($connection, $getActivities);
    ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="wrapper" style="min-height: 870px;">
        
        <!-- Content Header (Page header) -->
        <?php include('includes/breadcrumb.php'); ?>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
        
            <?php            
            while($row = mysqli_fetch_assoc($res)) { ?>
                <div class="watermark <?php echo $row['user_status'] == 'deactivated' ? 'Isdeactivated' : ''; ?>" id="watermark">
                    <h1><i class="fa fa-ban"></i></h1>
                    <h1 class="deactivation-text">This account is permanently deactivated!</h1>
                    <a class="nav-link">                                  
                        <h5 class="text-primary"> <span class="description-text">GO BACK</span> <i class="fa fa-share-square"></i></h1>
                    </a>
                </div>
                <div class="container-fluid">
                    <div class="mx-5">
                        <div class="col-md-12">
                            <div class="card card-widget widget-user">
                                <div class="widget-user-header text-white" style="background-color:#20c997;">
                                    <h3 class="widget-user-username text-right"><?php echo $row['faculty_fname'].' '.$row['faculty_mname'].' '.$row['faculty_lname']; ?></h3>
                                    <h5 class="widget-user-desc text-right"><?php echo $row['faculty_role'] ?></h5>
                                </div>  
                                <div class="widget-user-image">
                                    <img class="img-circle" src="../assets/img/avatar/avatar2.png" alt="User Avatar">
                                </div>  
                                <div class="card-footer">
                                    <div class="row">
                                        <ul class="nav col-md-12" id="custom-content-above-tab" role="tablist">

                                            <li class="nav-item col-md-3">
                                                <a class="nav-link" id="update-tab" data-toggle="pill" href="#user-update" role="tab" aria-controls="user-update" aria-selected="false">
                                                    <div class="border-right">
                                                        <div class="description-block">
                                                            <h1 class="text-warning"><i class="fa fa-cog"></i></h1>
                                                            <span class="description-text text-teal">UPDATE RECORD</span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>

                                            <li class="nav-item col-md-3">
                                                <a class="nav-link" id="activity-tab" data-toggle="pill" href="#user-activity" role="tab" aria-controls="user-activity" aria-selected="false">
                                                    <div class="border-right">
                                                        <div class="description-block">
                                                            <h1 class="text-warning"><i class="fa fa-history"></i></h1>
                                                            <span class="description-text text-teal">ACTIVITY LOGS</span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>

                                            <li class="nav-item col-md-3">
                                                <a class="nav-link" data-toggle="modal" data-target="<?php echo $row['faculty_role'] == 'DSA-Admin' ? '' : '#deactivateUser'; ?>" style="cursor:<?php echo $row['faculty_role'] == 'DSA-Admin' ? 'not-allowed' : 'pointer'; ?>;" >
                                                    <div class="border-right">
                                                        <div class="description-block">
                                                            <h1 class="text-danger"><i class="fa fa-user-times"></i></h1>
                                                            <span class="description-text text-teal">DEACTIVATE</span>
                                                        </div>
                                                    </div>
                                                </a>
                                                
                                                <div class="modal fade" id="deactivateUser" tabindex="-1" role="dialog" aria-labelledby="deactivateModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                    <div class="modal-header btn-danger">
                                                        <h5 class="modal-title" id="deactivateModalLabel"><i class="fa fa-user-times"></i> Deactivate Account:</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="script/deactivateUser.php" method="POST">
                                                        <div class="modal-body">
                                                            <h1 class="text-center"><i class="fa fa-exclamation-triangle text-danger"></i></h1>
                                                            <h5 class="text-center text-danger">Are you sure you want to deactivate your account? Please enter your password to confirm.</h5>
                                                            <input type="hidden" name="userID" class="form-control" value="<?php echo $row['userID'];?>" readonly required>
                                                            <input type="password" name="admin_password" class="form-control" placeholder="Enter your password">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                            <button type="submit" class="btn btn-danger" name="deactivate">Deactivate</button>
                                                        </div>
                                                    </form>
                                                    </div>
                                                </div>
                                                </div>
                                            
                                            </li>
                                            <li class="nav-item col-md-3">
                                                <a class="nav-link" href="<?php echo $_SESSION['role'] == 'DSA-User' ? 'dashboard.php' : 'manage_user.php'; ?>">
                                                    <div>
                                                        <div class="description-block">
                                                            <h1 class="text-warning"><i class="fa fa-share-square"></i></h1>
                                                            <span class="description-text text-teal">GO BACK</span>
                                                        </div>
                                                        <!-- /.description-block -->
                                                    </div>
                                                    <!-- /.col -->
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- /.row -->
                                </div>
                            </div>
                            <!-- /.widget-user -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
                 <div class="mx-5 px-3">
                    <div class="card card-success card-outline" style="min-height: 500px;">                        
                        <div class="card-body">                            
                            <div class="tab-content" id="custom-content-above-tabContent">
                                <div class="tab-pane fade active show" id="user-update" role="tabpanel" aria-labelledby="update-tab">
                                    <div class="tab-custom-content">
                                        <label class="lead mb-0 text-green"> <i class="fa fa-user"> </i>  User Information:</label>
                                    </div>                          
                                    
                                    <form action="script/updateFaculty.php" method="POST">
                                        <div class="modal-body">
                                            <input type="text" name="userID" id="userID" class="form-control" value="<?php echo $row['userID'] ?>" required readonly hidden>
                                            <div class="form-group col-md-4">
                                                <label> 
                                                    Faculty ID: 
                                                    <span class="text-bold text-sm text-danger">* </span>
                                                </label>
                                                <input type="text" name="facultyNum" id="facultyNum" class="form-control" value="<?php echo $row['faculty_number'] ?>" required readonly>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-4">
                                                    <label> 
                                                        First Name: 
                                                        <span class="text-bold text-sm text-danger">* </span> 
                                                    </label>
                                                    <input type="text" name="facultyfName" id="facultyfName" class="form-control" value="<?php echo $row['faculty_fname'] ?>" required>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label> 
                                                        Middle Name 
                                                        <span class="text-bold text-sm text-danger">* </span>
                                                    </label>
                                                    <input type="text" name="facultymName" id="facultymName" class="form-control" value="<?php echo $row['faculty_mname'] ?>" required>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label> 
                                                        Last Name 
                                                        <span class="text-bold text-sm text-danger">* </span>
                                                    </label>
                                                    <input type="text" name="facultylName" id="facultylName" class="form-control"  value="<?php echo $row['faculty_lname'] ?>" required>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label> 
                                                        Ext. Name 
                                                    </label>
                                                    <input type="text" name="facultyeName" id="facultyeName" class="form-control"  value="<?php echo $row['faculty_extname'] ?>">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-3">
                                                    <label> 
                                                        Contact No.
                                                        <span class="text-bold text-sm text-danger">*</span> 
                                                    </label>
                                                    <input type="text" name="facultyContact" id="facultyContact" class="form-control" value="<?php echo $row['faculty_contact'] ?>" pattern="^09\d{9}$" title="Please enter a valid phone no. (e.g., 09123456789)" required>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label> 
                                                        Email address
                                                        <span class="text-bold text-sm text-danger">*</span> 
                                                    </label>
                                                    <input type="email" name="facultyEmail" id="facultyEmail" class="form-control" value="<?php echo $row['faculty_email'] ?>" required>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label> 
                                                        Faculty Address 
                                                        <span class="text-bold text-sm text-danger">* </span>
                                                        <i class="text-italic text-sm text-danger"> (Write complete address)</i>
                                                    </label>
                                                    <input type="text" name="facultyAddress" id="facultyAddress" class="form-control" value="<?php echo $row['faculty_address'] ?>" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <label> 
                                                        Old Password: 
                                                        <span class="text-bold text-sm text-danger">* </span>
                                                    </label>
                                                    <input type="password" name="facultyOldpassword" id="facultyOldpassword" class="form-control" <?php echo $row['userID'] != $_SESSION['uid'] ? 'disabled' : ''; ?>>
                                                </div>
                                                <div class="col-md-4">
                                                    <label> 
                                                        New Password: 
                                                        <span class="text-bold text-sm text-danger">* </span>
                                                    </label>
                                                    <input type="password" name="facultyNewpassword" id="facultyNewpassword" class="form-control" pattern="(?=.*[a-z])(?=.*[A-Z])[A-Za-z\d]{8,}" <?php echo $row['userID'] != $_SESSION['uid'] ? 'disabled' : ''; ?> title="Must contain at least 8 characters, including one uppercase letter, one lowercase letter, and one number">
                                                </div>
                                                <div class="col-md-4">
                                                    <label> 
                                                        Confirm New Password: 
                                                        <span class="text-bold text-sm text-danger">* </span>
                                                    </label>
                                                    <input type="password" name="confPassword" id="confPassword" class="form-control" <?php echo $row['userID'] != $_SESSION['uid'] ? 'disabled' : ''; ?>>
                                                </div>
                                            </div>
                                        </div>

                                        <button type="submit" name="update" class="btn btn-success form-control">UPDATE ACCOUNT INFORMATION</button>
                                    </form>
                                </div>
                                <div class="tab-pane fade" id="user-activity" role="tabpanel" aria-labelledby="activity-tab">
                                    <div class="tab-custom-content">
                                        <label class="lead mb-0 text-info"> <i class="fa fa-user"> </i>  Activity logs:</label>
                                    </div>
                                    <br>
                                    <!-- Registered user table -->
                                    <table id="activity_tbl" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Activity</th>
                                                <th>Remarkscode </th>
                                                <th>Timestamp</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if(mysqli_num_rows($activity) > 0) {
                                                while($log = mysqli_fetch_assoc($activity)) { ?>

                                                    <tr>
                                                        
                                                        <td class="text-center" >
                                                            #
                                                        </td>
                                                        <td> <?php echo $log['_activity']; ?> </td>
                                                        <td> <?php echo $log['_status']; ?> </td>
                                                        <td> <?php echo $log['activity_created_at'];?> </td>
                                                    </tr>
                                                    <?php
                                                }
                                            } ?>
                                        </tbody>
                                        
                                        <tbody>
                                                                                        
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>

                <?php }?>
  
        </section>
        <!-- /.content -->
    </div>
            
<?php
include('includes/scripts.php');
?>