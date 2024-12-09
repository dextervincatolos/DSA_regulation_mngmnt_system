<?php
    $pageTitle = 'Student Management';
    include('sessions.php');
    include('includes/header.php');
    include('includes/navbar.php');
    include('includes/sidebar.php'); 


    $getStudents = "SELECT student_tbl.*, course_tbl.course_name, department_tbl.dept_name 
                    FROM student_tbl 
                    JOIN course_tbl ON student_tbl.courseID = course_tbl.courseID 
                    JOIN department_tbl ON student_tbl.college = department_tbl.deptID
                    WHERE student_tbl.college = $department AND _isActive != 'deactivated'";
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
                   
                    <!-- Registered student table -->
                    <table id="student_tbl" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Student name</th>
                                <th>Department</th>
                                <th>Program</th>
                                <th>Gender</th>
                                <th>Contact</th>
                                <th>Email</th>
                                <th>Added by</th>
                                <th>View record</th>

                                <!-- name,department,gender, ID program -->
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
include('script/datatables/student_tbl.php');
include('includes/footer.php');
?>