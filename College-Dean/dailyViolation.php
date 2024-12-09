<?php
    $pageTitle = 'Daily Report';
    include('sessions.php');
    include('includes/header.php');
    include('includes/navbar.php');

    $today = date('Y-m-d');

    $getViolations = "SELECT violation_tbl.*, student_tbl.*,academic_year_tbl.*,semester_tbl.*,sanction_tbl.*,schoolpolicy_tbl.policy_title,yearlvl_tbl.year_lvl,department_tbl.dept_name,course_tbl.course_name FROM violation_tbl 
        JOIN student_tbl ON violation_tbl.studID = student_tbl.studID 
        JOIN academic_year_tbl ON violation_tbl.acadsyrID = academic_year_tbl.acadsyrID 
        JOIN semester_tbl ON violation_tbl.semID = semester_tbl.semID 
        JOIN sanction_tbl ON violation_tbl.sanctionID = sanction_tbl.sanctionID 
        JOIN schoolpolicy_tbl ON violation_tbl.spID = schoolpolicy_tbl.spID 
        JOIN yearlvl_tbl ON violation_tbl.yearlvlID = yearlvl_tbl.yearlvlID 
        JOIN department_tbl ON student_tbl.college = department_tbl.deptID
        JOIN course_tbl ON student_tbl.courseID = course_tbl.courseID
        WHERE DATE(created_at) = '$today'";

    $violationlist = mysqli_query($connection, $getViolations);
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

                    <table id="dailyViolation_tbl" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>S.Y</th>
                                <th>Semester</th>
                                <th>Violator</th>
                                <th>Year level</th>
                                <th>Violation</th>
                                <th>Sanction</th>
                                <th>College</th>
                                <th>Course</th>
                                <th>Added by</th>
                                <th>Date Issued</th>
                                <th>Updated by</th>
                                <th>updated_at</th>
                                <th>Status</th>
                                
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
                                        <td> <?php echo $violation['policy_title'];?> </td>
                                        <td> <?php echo $violation['sanction'];?> </td>
                                        <td> <?php echo $violation['dept_name']; ?> </td>
                                        <td> <?php echo $violation['course_name']; ?> </td>
                                        <td> <?php echo $violation['violation_added_by']; ?> </td>
                                        <td> <?php echo date('Y-m-d', strtotime($violation['created_at'])); ?> </td>
                                        <td> <?php echo $violation['violation_updated_by']; ?> </td>
                                        <td> <?php echo date('Y-m-d', strtotime($violation['created_at'])); ?> </td>
                                        <td> <?php echo $violation['violation_status']; ?> </td>
                                        
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
include('script/datatables/dailyViolation_tbl.php');
?>
