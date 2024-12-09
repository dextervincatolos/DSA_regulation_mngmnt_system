<?php
    $pageTitle = 'Violation Report';
    include('sessions.php');
    include('includes/header.php');
    include('includes/navbar.php');

    $today = date('Y-m-d');

    $getViolations = "SELECT violation_tbl.*, student_tbl.*,academic_year_tbl.*,semester_tbl.*,sanction_tbl.*,schoolpolicy_tbl.policy_title,schoolpolicy_tbl.policy_type,yearlvl_tbl.year_lvl,department_tbl.dept_name,course_tbl.course_name,course_tbl.course_desc
        FROM violation_tbl 
        JOIN student_tbl ON violation_tbl.studID = student_tbl.studID 
        JOIN academic_year_tbl ON violation_tbl.acadsyrID = academic_year_tbl.acadsyrID 
        JOIN semester_tbl ON violation_tbl.semID = semester_tbl.semID 
        JOIN sanction_tbl ON violation_tbl.sanctionID = sanction_tbl.sanctionID 
        JOIN schoolpolicy_tbl ON violation_tbl.spID = schoolpolicy_tbl.spID 
        JOIN yearlvl_tbl ON violation_tbl.yearlvlID = yearlvl_tbl.yearlvlID 
        JOIN department_tbl ON student_tbl.college = department_tbl.deptID
        JOIN course_tbl ON student_tbl.courseID = course_tbl.courseID";

    $violationlist = mysqli_query($connection, $getViolations);

    $prefectQuery = "SELECT faculty_fname, faculty_mname, faculty_lname, faculty_extname FROM user_tbl WHERE faculty_role = 'DSA-Admin' LIMIT 1";
    $prefectResult = $connection->query($prefectQuery);

    $prefect =[];
    if ($prefectResult->num_rows > 0) {
        $prefect = $prefectResult->fetch_assoc();
    }
?>
    <!-- Content Wrapper. Contains page content -->
    <div class="wrapper" style="min-height: 870px;">
        <!-- Content Header (Page header) -->
        <?php include('includes/breadcrumb.php'); ?>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            
            <div class="card">
                <!-- /.card-header -->
                <div class="card-body">

                    <table id="alltimeViolation_tbl" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>S.Y</th>
                                <th>Semester</th>
                                <th>Violator</th>
                                <th>Year level</th>
                                <th>Updated by</th>
                                <th>updated_at</th>
                                <th>Status</th>
                                <th>Option</th>
                                
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php
                            if(mysqli_num_rows($violationlist) > 0) {
                                while($violation = mysqli_fetch_assoc($violationlist)) { ?>

                                    <tr>
                                        <td> <?php echo $violation['_from'].'-'.$violation['_to']; ?> </td>
                                        <td> <?php echo $violation['semester'];?> </td>
                                        <td> <?php echo $violation['student_fname'].', '.$violation['student_mname'].', '.$violation['student_lname'].' '.$violation['student_extname']; ?> </td>
                                        <td> <?php echo $violation['year_lvl']; ?> </td>
                                        <td> <?php echo $violation['violation_updated_by']; ?> </td>
                                        <td> <?php echo date('Y-m-d', strtotime($violation['updated_at'])); ?> </td>
                                        <td> <?php echo $violation['violation_status']; ?> </td>
                                        <td >
                                            <a class="btn btn-sm btn-outline-primary text-xs" data-toggle="modal" data-target="#violation<?php echo $violation['violationID']; ?>" >View Report</a>
                                       
                                            <!-- Modal for processing the request -->
                                            <div class="modal fade" id="violation<?php echo $violation['violationID']; ?>" tabindex="-1" role="dialog" aria-labelledby="violationModalLabel<?php echo $violation['violationID']; ?>" aria-hidden="true">
                                                <div class="modal-dialog modal-xl" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title text-warning" id="violationModalLabel<?php echo $violation['violationID']; ?>">
                                                                <i class="fa fa-file"> </i>
                                                                Violation Report
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        
                                                        <div class="modal-body text-dark">
                                            
                                                            <div class="col-md-12 mt-2">
                                                                <div class="container row  text-center">
                                                                    <div class="col-md-4 schoolLogo">
                                                                        <img src="../assets/img/school-logo.png" alt="School-logo" width="20%">
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <p class="formHead text-sm"> Tuguegarao Archdiocesan Schools System</p>
                                                                        <h5 class="formSchoolname">Saint Joseph's College of Baggao, Inc.</h5>
                                                                        <p class="text-sm">Baggao Cagayan Philippines</p>
                                                                        <p class="formVision">Transforming Lives, Shaping the Future</p>
                                                                    </div>
                                                                    
                                                                    <div class="col-md-4 schoolsysLogo">
                                                                        <img src="../assets/img/archdiocesan-logo.png" alt="School-logo"  width="20%">
                                                                    </div>
                                                                </div>

                                                                <h4 class="text-center text-lg"><?php echo $violation['policy_type'] == '0' ? 'MINOR' : 'MAJOR' ?> OFFENSE NOTIFICATION FORM</h4>
                                                                <table class="table">
                                                                    <tr>
                                                                        <td width="70%" rowspan="2" style=" border: none;">
                                                                        <p class="text-right"> Date:</p>
                                                                        </td>
                                                                        <td style=" border:none; border-bottom: 1px solid black;"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style=" border:none;"></td>
                                                                    </tr>
                                                                </table>
                                                                <table class="table">
                                                                    <tr>
                                                                        <td width="50%" style=" border: 1px solid black;">
                                                                            NAME OF STUDENT: </br>
                                                                            <?php echo $violation['student_fname'].' '. substr($violation['student_mname'], 0, 1) . '. '.$violation['student_lname'].' '.$violation['student_extname']; ?>
                                                                        </td>
                                                                        <td width="50%" style=" border: 1px solid black;">
                                                                            GRADE/STRAND: </br>
                                                                            <?php echo $violation['course_desc']; ?>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                                <table class="table">
                                                                    <tr class="text-center" style=" border: 1px solid black;">
                                                                        <td width="50%" style=" border: 1px solid black;">Violation/Offence</td>
                                                                        <td width="20%" style=" border: 1px solid black;">Date</td>
                                                                        <td width="30%" style=" border: 1px solid black;">Reported By</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style=" border: 1px solid black;"><?php echo $violation['policy_title']; ?></br><i class="ml-5"> - <?php echo $violation['sanction']; ?></i></td>
                                                                        <td style=" border: 1px solid black;"><?php echo (new DateTime($violation['created_at']))->format('F d, Y');?></td>
                                                                        <td style=" border: 1px solid black;"><?php echo $violation['violation_added_by']; ?></td>
                                                                    </tr>
                                                                    
                                                                </table>
                                                                <table class="table">
                                                                    <?php
                                                                    $dept = $violation['college'];
                                                                    $deanQuery = "SELECT faculty_fname, faculty_mname, faculty_lname, faculty_extname FROM user_tbl WHERE faculty_role = 'College-Dean' AND faculty_department = $dept LIMIT 1";
                                                                    $deanResult = $connection->query($deanQuery);
                                                                
                                                                    $dean =[];
                                                                    if ($deanResult->num_rows > 0) {
                                                                        $dean = $deanResult->fetch_assoc();
                                                                    }
                                                                    
                                                                    
                                                                    
                                                                    ?>
                                                                    <tr>
                                                                        <td colspan="7" style=" border: none; border-left: 1px solid black; border-right: 1px solid black; border-top: 1px solid black; font-style:italic"><i>Reviewed & Evaluated by:</i></td>
                                                                    </tr>
                                                                
                                                                    <tr class="signatories" style="border: none;">
                                                                        <td style=" border: none; border-left: 1px solid black;"></td>
                                                                        <td style=" border: none; "><?php echo $prefect['faculty_fname'].' '.substr($prefect['faculty_mname'], 0, 1).'. '.$prefect['faculty_lname'].' '.$prefect['faculty_extname']; ?></td>
                                                                        <td style=" border: none; "></td>
                                                                        <td style=" border: none; ">
                                                                            <?php

                                                                                if (!empty($dean)) {
                                                                                    
                                                                                    echo $dean['faculty_fname'] . ' ' . 
                                                                                        (!empty($dean['faculty_mname']) ? substr($dean['faculty_mname'], 0, 1) . '.' : '') . ' ' . 
                                                                                        $dean['faculty_lname'] . ' ' . 
                                                                                        $dean['faculty_extname'];
                                                                                } else {
                                                                                    // If no dean is assigned, display default text
                                                                                    echo "No Dean Assigned";
                                                                                }
                                                                             ?>
                                                                        </td>
                                                                        <td style=" border: none; "></td>
                                                                        <td style=" border: none; "><?php echo $violation['violation_status'] == 'Open' ? '' : (new DateTime($violation['updated_at']))->format('F d, Y'); ?></td>
                                                                        <td style=" border: none; border-right: 1px solid black;"></td>
                                                                    </tr>
                                                                    <tr class="text-center" style="border: none; border-bottom: 1px solid black;">
                                                                        <td style=" border: none; border-left: 1px solid black;"></td>
                                                                        <td style=" border: none; border-top: 1px solid black;">Prefect Of Discipline</td>
                                                                        <td style=" border: none; "></td>
                                                                        <td style=" border: none; border-top: 1px solid black;">Principal</td>
                                                                        <td style=" border: none; "></td>
                                                                        <td style=" border: none; border-top: 1px solid black;">Date</td>
                                                                        <td style=" border: none; border-right: 1px solid black;"></td>
                                                                    </tr>
                                                        
                                                                </table>
                                                                <p><i>Office of the Student Affairs</i></p>

                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
                                                        </div>
                                                       
                                                         
                                                   
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        
                                    </tr>
                                    <?php
                                }
                            } ?>
                            
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

<?php
include('includes/scripts.php');
include('script/manageStudentScript.php');
include('script/datatables/alltimeViolation_tbl.php');
?>
