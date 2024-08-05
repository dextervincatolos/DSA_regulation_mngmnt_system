<?php
    $pageTitle = 'Student Management';
    include('sessions.php');
    include('includes/header.php');
    include('includes/navbar.php');
    include('includes/sidebar.php'); 

    $getStudents = "SELECT student_tbl.*, course_tbl.course_name, department_tbl.dept_name 
                    FROM student_tbl 
                    JOIN course_tbl ON student_tbl.courseID = course_tbl.courseID 
                    JOIN department_tbl ON course_tbl.deptID = department_tbl.deptID
                    WHERE _isActive != 'deactivated'";
    $studentlist = mysqli_query($connection, $getStudents);

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
                            <i class="fa fa-user-plus"></i>
                        </a>
                        <!-- add student modal -->
                        <div class="modal fade" id="newStudent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title text-bold" id="exampleModalLabel"><i class="fa fa-user-plus"></i> New student</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="script/newStudent.php" method="POST">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label> 
                                                        Student ID
                                                        <span class="text-bold text-sm text-danger">*</span> 
                                                    </label>
                                                    <input type="text" name="studentNum" id="studentNum" class="form-control" required>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label> 
                                                        Gender
                                                        <span class="text-bold text-sm text-danger">*</span> 
                                                    </label>
                                                    <select class="form-control" name="studentGender" id="studentGender" required>
                                                        <option value="">Select Gender</option>
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-4">
                                                    <label> 
                                                        First Name: 
                                                        <span class="text-bold text-sm text-danger">* </span> 
                                                    </label>
                                                    <input type="text" name="studentfName" id="studentfName" class="form-control" required>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label> 
                                                        Middle Name 
                                                        <span class="text-bold text-sm text-danger">* </span>
                                                    </label>
                                                    <input type="text" name="studentmName" id="studentmName" class="form-control" required>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label> 
                                                        Last Name 
                                                        <span class="text-bold text-sm text-danger">* </span>
                                                    </label>
                                                    <input type="text" name="studentlName" id="studentlName" class="form-control" required>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label> 
                                                        Ext. Name 
                                                    </label>
                                                    <input type="text" name="studenteName" id="studenteName" class="form-control">
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label> 
                                                        Contact No.
                                                        <span class="text-bold text-sm text-danger">*</span> 
                                                    </label>
                                                    <input type="text" name="studentContact" id="studentContact" class="form-control" pattern="^09\d{9}$" title="Please enter a valid phone no. (e.g., 09123456789)" required>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label> 
                                                        Email address
                                                        <span class="text-bold text-sm text-danger">*</span> 
                                                    </label>
                                                    <input type="email" name="studentEmail" id="studentEmail" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label> 
                                                        College
                                                        <span class="text-bold text-sm text-danger">*</span> 
                                                    </label>
                                                    <select class="form-control selectpicker" name="studentCollege" id="studentCollege" data-live-search = "true" data-size="5" title="Search Department..." data-width="100%" required>
                                                        <?php foreach($colleges as $college): ?>
                                                        <option data-tokens="<?php echo $college['deptID']; ?>" value="<?php echo $college['deptID']; ?>"><?php echo $college['dept_desc']; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label> 
                                                        Course
                                                        <span class="text-bold text-sm text-danger">*</span> 
                                                    </label>
                                                    <select class="form-control selectpicker" name="studentCourse" id="studentCourse" data-live-search = "true" data-size="5" title="Search student name..." data-width="100%" required>
                                                        <!-- Course options will be populated here -->
                                                    </select>
                                                </div>
                                            </div>
                                        
                                            <div class="form-group">
                                                <label> 
                                                    Student Address 
                                                    <span class="text-bold text-sm text-danger">* </span>
                                                    <i class="text-italic text-sm text-danger"> (Write complete address)</i>
                                                </label>
                                                <input type="text" name="studentAddress" id="studentAddress" class="form-control" required>
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
                    <table id="student_tbl" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Student name</th>
                                <th>Department</th>
                                <th>Course</th>
                                <th>Gender</th>
                                <th>Contact</th>
                                <th>Email</th>
                                <th>Added by</th>
                                <th>View record</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if(mysqli_num_rows($studentlist) > 0) {
                                while($student = mysqli_fetch_assoc($studentlist)) { ?>

                                    <tr>
                                        <td> <?php echo $student['student_number']; ?> </td>
                                        <td> <?php echo $student['student_fname'].', '.$student['student_mname'].', '.$student['student_lname'].' '.$student['student_extname']; ?> </td>
                                        <td> <?php echo $student['dept_name'];?> </td>
                                        <td> <?php echo $student['course_name'];?> </td>
                                        <td> <?php echo $student['student_gender']?> </td>
                                        <td> <?php echo $student['student_contact']; ?> </td>
                                        <td> <?php echo $student['student_email']; ?> </td>
                                        <td> <?php echo $student['added_by']; ?> </td>
                                        <td>
                                            <a class="btn btn-warning form-control" href="view_student.php?id=<?php echo$student['studID']; ?>"> View <i class="fa fa-user-circle"></i> </i></a>
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
    
    $("#student_tbl").DataTable({
    "responsive": true, "lengthChange": false, "autoWidth": false,
    dom: 'Bfrtip',
    buttons: [
        {
            extend: 'excelHtml5',
            title: 'DSA Student Record ' + formattedDate
        },
        {
            extend: 'csvHtml5',
            title: 'DSA Student Record ' + formattedDate
        },
        {
            extend: 'pdfHtml5',
            title: 'DSA Student Record ' + formattedDate,
            customize: function (doc) {
                doc.content.splice(0, 1, {
                    text: [
                        { text: 'DSA Student Record\n', fontSize: 14, bold: true,alignment: 'center'},
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
                        '<div style="text-align: center; font-size: 14pt;">DSA Student Record</div>' +
                        '<div style="text-align: center; font-size: 12pt;">System Generated Report</div>' +
                        '<div style="text-align: center; font-size: 12pt;">Date: ' + formattedDate + '</div><br>'
                    );
            }
        },
        {
             extend:'colvis'
        }
    ],
    }).buttons().container().appendTo('#student_tbl_wrapper .col-md-6:eq(0)');
    
});
</script>