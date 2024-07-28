<?php
    $pageTitle = 'Violation Management';
    include('sessions.php');
    include('includes/header.php');
    include('includes/navbar.php');

    $getViolations = "SELECT violation_tbl.*, student_tbl.*,academic_year_tbl.*,semester_tbl.*,sanction_tbl.*,schoolpolicy_tbl.policy_title,yearlvl_tbl.year_lvl,department_tbl.dept_name,course_tbl.course_name FROM violation_tbl 
        JOIN student_tbl ON violation_tbl.studID = student_tbl.studID 
        JOIN academic_year_tbl ON violation_tbl.acadsyrID = academic_year_tbl.acadsyrID 
        JOIN semester_tbl ON violation_tbl.semID = semester_tbl.semID 
        JOIN sanction_tbl ON violation_tbl.sanctionID = sanction_tbl.sanctionID 
        JOIN schoolpolicy_tbl ON violation_tbl.spID = schoolpolicy_tbl.spID 
        JOIN yearlvl_tbl ON violation_tbl.yearlvlID = yearlvl_tbl.yearlvlID 
        JOIN department_tbl ON student_tbl.college = department_tbl.deptID
        JOIN course_tbl ON student_tbl.courseID = course_tbl.courseID
        WHERE violation_status = 'Open'";

    $violationlist = mysqli_query($connection, $getViolations);
    //Get Students
    $getstudents = "SELECT * FROM student_tbl";
    $studentList = $connection->query($getstudents);
    $students = [];
    if ($studentList->num_rows > 0) {
        while($stud = $studentList->fetch_assoc()) {
            $students[] = $stud;
        }
    }

    //Get Policy
    $getPolicy = "SELECT * FROM schoolpolicy_tbl";
    $policyList = $connection->query($getPolicy);
    $policy = [];
    if ($policyList->num_rows > 0) {
        while($sp = $policyList->fetch_assoc()) {
            $policy[] = $sp;
        }
    }

    // Get Sanctions
    $getSanctions = "SELECT * FROM sanction_tbl";
    $policySanctions = $connection->query($getSanctions);

    $sanctions = array();
    while ($ps = $policySanctions->fetch_assoc()) {
        $sanctions[] = $ps;
    }

    //Get Year level
    $yearlvl = "SELECT * FROM yearlvl_tbl";
    $studyearlvl = $connection->query($yearlvl);
    $yearlvlOptions = [];
    if ($studyearlvl->num_rows > 0) {
        while($yrlvl = $studyearlvl->fetch_assoc()) {
            $yearlvlOptions[] = $yrlvl;
        }
    }

    //Get Semester
    $getSemester = "SELECT * FROM semester_tbl";
    $semconn = $connection->query($getSemester);
    $a = [];
    if ($semconn->num_rows > 0) {
        while($semList = $semconn->fetch_assoc()) {
            $a[] = $semList;
        }
    }

    //Get School year
    $getSy = "SELECT * FROM academic_year_tbl ORDER BY acadsyrID DESC limit 1";

    $Sy = $connection->query($getSy);

    if ($Sy && $Sy->num_rows > 0) {
        $schoolyear = $Sy->fetch_assoc();
    } 
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
            <div class="card">
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="col-lg-12 col-md-12 col-12 pb-5">
                        <a class="btn btn-success float-right" data-toggle="modal" data-target="#newStudent">
                            <i class="fa fa-paw"></i>
                        </a>
                        <!-- add student modal -->
                        <div class="modal fade" id="newStudent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title text-bold" id="exampleModalLabel"><i class="fa fa-paw"></i> New Violation</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="script/newViolation.php" method="POST">
                                        <div class="modal-body">
                                            <!-- Violation Message -->
                                            <div class="card-body" id="violationMessage"> </div>
                                            <!-- Violation Message -->
                                            <div class="row">
                                                <div class="form-group col-md-4">
                                                    <label>Current S.Y:<span class="text-bold text-sm text-danger">*</span></label>
                                                    <input type="text" name="sy" id="sy" class="form-control" value="<?php echo $schoolyear['acadsyrID'];  ?>" required readonly hidden>
                                                    <input type="text" class="form-control" value="<?php echo $schoolyear['_from'] .'-'. $schoolyear['_to'];  ?>" required readonly>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label>Current Semester:<span class="text-bold text-sm text-danger">*</span></label>
                                                    <select class="form-control" name="semester" id="semester" required>
                                                        <option value="">Select Semester</option>
                                                        <?php foreach($a as $Current_sem): ?>
                                                        <option value="<?php echo $Current_sem['semID']; ?>"><?php echo $Current_sem['semester']; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label>Student Year Level:<span class="text-bold text-sm text-danger">*</span></label>
                                                    <select class="form-control" name="yearlvl" id="yearlvl" required>
                                                        <option value="">Select Year level</option>
                                                        <?php foreach($yearlvlOptions as $year): ?>
                                                        <option value="<?php echo $year['yearlvlID']; ?>"><?php echo $year['year_lvl']; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Student Name:<span class="text-bold text-sm text-danger">*</span></label>
                                                <select class="form-control selectpicker" name="student" id="student" data-live-search="true" data-size="5" title="Search student name..." data-width="100%" required>
                                                    <?php foreach($students as $student): ?>
                                                    <option data-tokens="<?php echo $student['studID']; ?>" value="<?php echo $student['studID']; ?>"><?php echo $student['student_fname'].' '.$student['student_mname'].' '.$student['student_lname'].' '.$student['student_extname']; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Violated School Policy:<span class="text-bold text-sm text-danger">*</span></label>
                                                <select class="form-control selectpicker" name="violatedPolicy" id="violatedPolicy" data-live-search="true" data-size="5" title="Search Policy..." data-width="100%" required disabled>
                                                    <?php foreach($policy as $schoolpolicy): ?>
                                                    <option data-tokens="<?php echo $schoolpolicy['spID']; ?>" value="<?php echo $schoolpolicy['spID']; ?>"><?php echo $schoolpolicy['policy_title']; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Sanction:<span class="text-bold text-sm text-danger">*</span></label>
                                                <select class="form-control selectpicker" name="policySanction" id="policySanction" data-live-search="true" data-size="5" title="Search Sanction..." data-width="100%" required>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Reamarks: <small class="text-danger"> <i> (Example: First Offense)</i> </small> </label>
                                                <textarea class="form-control" name="remarks" id="remarks" rows="2"></textarea>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                            <button type="submit" name="submitForm" class="btn btn-success">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- add student modal -->
                    </div>
                    <!-- Registered student table -->
                    <table id="violation_tbl" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>S.Y</th>
                                <th>Semester</th>
                                <th>Violator</th>
                                <th>Year</th>
                                <th>Violation</th>
                                <th>Sanction</th>
                                <th>College</th>
                                <th>Course</th>
                                <th>Remarks</th>
                                <th>Added by</th>
                                <th>Date Issued</th>
                                <th><i class="fa fa-cog"></i></th>
                                
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
                                        <td> <?php echo $violation['remarks']; ?> </td>
                                        <td> <?php echo $violation['violation_added_by']; ?> </td>
                                        <td> <?php echo date('Y-m-d', strtotime($violation['created_at'])); ?> </td>
                                        <td>
                                            <a class="btn btn-warning form-control" data-toggle="modal" data-target="#resolveViolation_<?php echo $violation['violationID']; ?>" title="Manage Violation"> Process</a>
                                                
                                            <div class="modal fade" id="resolveViolation_<?php echo $violation['violationID']; ?>" tabindex="-1" role="dialog" aria-labelledby="deactivateModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                <div class="modal-header btn-success">
                                                    <h5 class="modal-title" id="deactivateModalLabel"> <i class="fa fa-check-square"></i> Close Violation:</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="script/updateViolation.php" method="POST">
                                                    <div class="modal-body">
                                                        <h1 class="text-center"><i class="fa fa-question-circle text-success"></i></h1>
                                                        <h5 class="text-center text-success">Resolve Violation?</h5>
                                                        <input type="hidden" name="violationID" class="form-control" value="<?php echo $violation['violationID']; ?>" readonly required>
                                                        <input type="password" name="user_password" class="form-control" placeholder="Enter your password">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                        <button type="submit" class="btn btn-success" name="processViolation">Resolve</button>
                                                    </div>
                                                </form>
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
    include('script/manageViolationScript.php');
    include('includes/footer.php');
?>

<script>

    $(function () 
{
    var currentDate = new Date();
    var formattedDate = currentDate.toLocaleDateString('en-GB', {
        year: 'numeric',
        month: 'long',
        day: 'numeric'
    });
    
    $("#violation_tbl").DataTable({
    "responsive": true, "lengthChange": false, "autoWidth": false,
    dom: 'Bfrtip',
    buttons: [
        {
            extend: 'excelHtml5',
            title: 'DSA Student violations report ' + formattedDate
        },
        {
            extend: 'csvHtml5',
            title: 'DSA Student violations report ' + formattedDate
        },
        {
            extend: 'pdfHtml5',
            title: 'DSA Student violations report ' + formattedDate,
            customize: function (doc) {
                doc.content.splice(0, 1, {
                    text: [
                        { text: 'DSA Student violations report\n', fontSize: 14, bold: true,alignment: 'center'},
                        { text: 'System Generated Report\n\n', fontSize: 12,alignment: 'center' },
                        { text: 'Generated Date: ' + formattedDate, fontSize: 9,alignment: 'center' }
                    ],
                    margin: [0, 0, 0, 12]
                });
            }
        },
        {
            extend: 'print',
            title: '',
            customize: function (win) {
                $(win.document.body)
                    .css('font-size', '10pt')
                    .prepend(
                        '<div style="text-align: center; font-size: 14pt;">DSA Student violations report</div>' +
                        '<div style="text-align: center; font-size: 12pt;">System Generated Report</div>' +
                        '<div style="text-align: center; font-size: 12pt;">Date: ' + formattedDate + '</div><br>'
                    );
            }
        },
        {
             extend:'colvis'
        }
    ],
    }).buttons().container().appendTo('#violation_tbl_wrapper .col-md-6:eq(0)');
    
});
</script>