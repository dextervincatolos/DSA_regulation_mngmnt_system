<?php
    $pageTitle = 'Student Profile';
    include('sessions.php');
    include('includes/header.php');
    include('includes/navbar.php');

    $getStud = "SELECT * FROM  student_tbl 
                JOIN department_tbl ON student_tbl.college=department_tbl.deptID 
                JOIN course_tbl ON student_tbl.courseID=course_tbl.courseID
                WHERE studID =".$_GET['id'];
    $res = mysqli_query($connection, $getStud);

    $getCollege = "SELECT deptID, dept_desc FROM department_tbl";
    $department = $connection->query($getCollege);

    $colleges = [];
    if ($department->num_rows > 0) {
        while($row = $department->fetch_assoc()) {
            $colleges[] = $row;
        }
    }

?>
    <!-- Content Wrapper. Contains page content -->
    <div class="wrapper" style="min-height: 870px;">
        
        <!-- Content Header (Page header) -->
        <?php include('includes/breadcrumb.php'); ?>
        <!-- /.content-header -->
        <section class="content">
            <?php            
                while($row = mysqli_fetch_assoc($res)) { 
                    $getCourses = "SELECT deptID,courseID, course_desc FROM course_tbl WHERE deptID =". $row['deptID'];
                    $courselist = $connection->query($getCourses);
                
                    $courses = [];
                    if ($courselist->num_rows > 0) {
                        while($courseArray = $courselist->fetch_assoc()) {
                            $courses[] = $courseArray;
                        }
                    }?>

                    <div class="watermark <?php echo $row['_isActive'] == 'deactivated' ? 'Isdeactivated' : ''; ?>" id="watermark">
                        <h1><i class="fa fa-ban"></i></h1>
                        <h1 class="deactivation-text">This account is permanently deactivated!</h1>
                        <a class="nav-link" href="manage_student.php">                                  
                            <h5 class="text-primary"> <span class="description-text">GO BACK</span> <i class="fa fa-share-square"></i></h1>
                        </a>
                    </div>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-3">
                                <!-- Profile Image -->
                                <div class="card card-primary card-outline">
                                    <div class="card-body box-profile">
                                        <div class="text-center">
                                            <img class="profile-user-img img-fluid img-circle" src="../assets/img/avatar/profile.svg" alt="User profile picture">
                                        </div>
                                        <h3 class="profile-username text-center"><?php echo $row['student_fname'].' '.$row['student_lname']; ?></h3>
                                        <p class="text-center text-success"><?php echo $row['student_number']; ?></p>
                                        <a href="#" class="btn btn-danger btn-block" data-toggle="modal" data-target="<?php echo $_SESSION['role'] == 'DSA-Admin' ? '#deactivateStudent' : ''; ?>" style="cursor:<?php echo $_SESSION['role'] == 'DSA-Admin' ? 'pointer' : 'not-allowed'; ?>;" ><b>Deactivate</b></a>


                                    
                                        <div class="modal fade" id="deactivateStudent" tabindex="-1" role="dialog" aria-labelledby="deactivateModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                <div class="modal-header btn-danger">
                                                    <h5 class="modal-title" id="deactivateModalLabel"><i class="fa fa-user-times"></i> Deactivate Account:</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="script/deactivateStudent.php" method="POST">
                                                    <div class="modal-body">
                                                        <h1 class="text-center"><i class="fa fa-exclamation-triangle text-danger"></i></h1>
                                                        <h5 class="text-center text-danger">Are you sure you want to deactivate this account? Please enter Administrator password to confirm.</h5>
                                                        <input type="hidden" name="studID" class="form-control" value="<?php echo $row['studID'];?>" readonly required>
                                                        <input type="hidden" name="studname" class="form-control" value="<?php echo $row['student_fname'].' '.$row['student_lname'];?>" readonly required>
                                                        
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
                                    </div>
                                </div>
                                <!-- /.card -->
                                <!-- About Me Box -->
                                <div class="card card-success">
                                    <div class="card-header">
                                        <h3 class="card-title">About Me</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <strong><i class="fas fa-book mr-1"></i> Course</strong>
                                        <p class="text-teal"> <?php echo $row['course_desc'];?> </p>
                                        <hr>
                                        <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>
                                        <p class="text-teal"><?php echo $row['student_address']; ?></p>
                                        <hr>
                                        <strong><i class="fas fa-phone mr-1"></i> Contact</strong>
                                        <p class="text-teal"><?php echo $row['student_contact'];?></p>
                                        <hr>
                                        <strong><i class="far fa-file-alt mr-1"></i> Email</strong>
                                        <p class="text-teal"><?php echo $row['student_email']; ?></p>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>
                            <!-- /.col -->
                            <div class="col-md-9">
                                <div class="card">
                                <div class="card-header p-2">
                                    <ul class="nav nav-pills">
                                    <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Violation Timeline</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Update</a></li>
                                    <li class="nav-item"><a class="nav-link" href="manage_student.php">Go Back <i class="fa fa-share-square"> </i></a></li>
                                    </ul>
                                </div><!-- /.card-header -->
                                <div class="card-body">
                                    <div class="tab-content">
                                    <div class="tab-pane active" id="activity">
                                    
                                        
                                            <div class="row">
                                                <!-- health chart -->
                                                <div class="col-md-12">
                                                    <div class="card card-green card-outline">
                                                    <div class="card-header">
                                                        <h3 class="card-title">Violation Report</h3>

                                                        <div class="card-tools">
                                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                            <i class="fas fa-minus"></i>
                                                        </button>
                                                        </div>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="chart">
                                                        <canvas id="studentViolationChart"  style="min-height: 400px; height: 400px; max-height: 400px; max-width: 100%;"></canvas>
                                                        </div>
                                                    </div>
                                                    <!-- /.card-body -->
                                                    </div>
                                                    <!-- /.card -->
                                                </div>
                                            </div>
                                            <!-- /.row -->
                                            <div id="studentid" data-student-id="<?php echo isset($row['studID']) ? htmlspecialchars($row['studID']) : ''; ?>"></div>


                                    </div>

                                    <div class="tab-pane" id="settings">
                                        <form class="form-horizontal" action="script/updateStudent.php" method="POST">
                                            <div class="form-group row">
                                                <input type="hidden" class="form-control" name="studID" value="<?php echo $row['studID'];?>" readonly required>
                                                <label for="studFName" class="col-sm-2 col-form-label">Name</label>
                                                <div class="col-sm-3">
                                                    <input type="text" class="form-control" name="studFName" value="<?php echo $row['student_fname'];?>" required>
                                                </div>
                                                <div class="col-sm-3">
                                                    <input type="text" class="form-control" name="studMName" value="<?php echo $row['student_mname'];?>" required>
                                                </div>
                                                <div class="col-sm-3">
                                                    <input type="text" class="form-control" name="studLName" value="<?php echo $row['student_lname'];?>" required>
                                                </div>
                                                <div class="col-sm-1">
                                                    <input type="text" class="form-control" name="studEName" value="<?php echo $row['student_extname'];?>" placeholder="Ext.">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="studEmail" class="col-sm-2 col-form-label">Email</label>
                                                <div class="col-sm-10">
                                                    <input type="email" class="form-control" name="studEmail" value="<?php echo $row['student_email'];?>" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="studContact" class="col-sm-2 col-form-label">Contact</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name="studContact" pattern="^09\d{9}$" title="Please enter a valid phone no. (e.g., 09123456789)" value="<?php echo $row['student_contact'];?>" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="stuDAddress" class="col-sm-2 col-form-label">Adddress</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" name="stuDAddress" value="<?php echo $row['student_address'];?>" required></input>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="studentCollege" class="col-sm-2 col-form-label">College</label>
                                                <div class="col-sm-10">             
                                                    <select class="form-control selectpicker" name="studentCollege" id="studentCollege" data-live-search = "true" data-size="5" title="Search Department..." data-width="100%" required>
                                                        <?php foreach($colleges as $college): ?>
                                                            <option data-tokens="<?php echo $college['deptID']; ?>" value="<?php echo $college['deptID']; ?>"  <?php echo $row['deptID'] == $college['deptID'] ? 'selected' : '' ?> ><?php echo $college['dept_desc']; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="studentCourse" class="col-sm-2 col-form-label">Course</label>
                                                <div class="col-sm-10">  
                                                    <select class="form-control selectpicker" name="studentCourse" id="studentCourse" data-live-search = "true" data-size="5" title="Search student name..." data-width="100%" required>
                                                        <?php foreach($courses as $course): ?>
                                                            <option data-tokens="<?php echo $course['courseID']; ?>" value="<?php echo $course['courseID']; ?>"  <?php echo $row['courseID'] == $course['courseID'] ? 'selected' : '' ?> ><?php echo $course['course_desc']; ?></option>
                                                        <?php endforeach; ?>
                                                        <!-- Course options will be populated here -->
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="offset-sm-2 col-sm-10">
                                                    <button type="submit" class="btn btn-success float-right" name="update">Update</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- /.tab-pane -->
                                    </div>
                                    <!-- /.tab-content -->
                                </div><!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div><!-- /.container-fluid -->
            <?php
                }?>
        </section>
    </div>
<?php
include('includes/scripts.php');
include('script/manageStudentScript.php');
include('script/violationGraphStudent.php');
?>