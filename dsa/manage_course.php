<?php
$pageTitle = 'Course Management';
include('sessions.php');
include('includes/header.php');
include('includes/navbar.php');

$getCourses = "SELECT * FROM course_tbl JOIN department_tbl ON course_tbl.deptID = department_tbl.deptID";
$courses = mysqli_query($connection, $getCourses);

$getCollege = "SELECT deptID, dept_desc FROM department_tbl";
$department = $connection->query($getCollege);

$colleges = [];
if ($department->num_rows > 0) {
    while($row = $department->fetch_assoc()) {
        $colleges[] = $row;
    }
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
                        <a class="btn btn-primary float-right" data-toggle="modal" data-target="#newCourse">
                        <i class="fa fa-graduation-cap"></i>
                        </a>
                        <!-- register course modal -->
                        <div class="modal fade" id="newCourse" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-md" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title text-bold" id="exampleModalLabel">
                                    <i class="fa fa-graduation-cap"></i> Register Course</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="script/newCourse.php" method="POST">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label> 
                                                Course Name: 
                                                <span class="text-bold text-sm text-danger">* </span>
                                            </label>
                                            <input type="text" name="course_name" id="course_name" class="form-control" required placeholder="Enter Abbreviation">
                                        </div>
                                        <div class="form-group">
                                            <label> 
                                                Description: 
                                                <span class="text-bold text-sm text-danger">* </span>
                                                <i class="text-italic text-sm text-danger"> (Write complete Description)</i>
                                            </label>
                                            <input type="text" name="course_desc" id="course_desc" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label> Department/College <span class="text-bold text-sm text-danger">*</span></label>
                                            <select name="dept_name" id="dept_name" class="form-control" required>
                                                <option value="">Select College</option>
                                                <?php foreach($colleges as $college): ?>
                                                    <option value="<?php echo $college['deptID']; ?>"><?php echo $college['dept_desc']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                       
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                        <button type="submit" name="submitForm" class="btn btn-primary">Save</button>
                                    </div>

                                </form>

                                </div>
                            </div>
                        </div>
                        <!-- register course modal -->
                    </div>
                  
                   
                    <table id="course_tbl" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                
                                <th>Course Name</th>
                                <th>Description</th>
                                <th>Department</th>
                                <th>View record</th>
                                
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php
                                if(mysqli_num_rows($courses) > 0)
                                {
                                    while($course = mysqli_fetch_assoc($courses))
                                    { ?>

                                        <tr>
                                            <td> <?php echo $course['course_name'];?> </td>
                                            <td> <?php echo $course['course_desc']; ?> </td>
                                            <td> <?php echo $course['dept_desc']; ?> </td>
                                            <td>
                                                <a class="btn btn-primary form-control col-md-5" data-toggle="modal" data-target="#editCourse<?php echo $course['courseID']; ?>"> <i class="fa fa-edit"></i> </a>
                    
                                                <!-- Edit Course -->
                                                    <div class="modal fade" id="editCourse<?php echo $course['courseID']; ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel<?php echo $course['courseID']; ?>" aria-hidden="true">
                                                        <div class="modal-dialog modal-md" role="document">
                                                            <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title text-bold" id="editModalLabel<?php echo $course['courseID']; ?>"><i class="fa fa-graduation-cap"></i> Update Course</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <form id="editForm<?php echo $course['courseID']; ?>" action="script/updateCourse.php" method="POST">

                                                                <input type="text" name="course_id"class="form-control" value="<?php echo $course['courseID']; ?>" readonly hidden>
                                                                
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <label> 
                                                                            Course Name: 
                                                                            <span class="text-bold text-sm text-danger">* </span>
                                                                        </label>
                                                                        <input type="text" name="course_name" id="course_name" class="form-control" required placeholder="Enter Abbreviation" value="<?php echo $course['course_name'];?>">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label> 
                                                                            Description: 
                                                                            <span class="text-bold text-sm text-danger">* </span>
                                                                            <i class="text-italic text-sm text-danger"> (Write complete Description)</i>
                                                                        </label>
                                                                        <input type="text" name="course_desc" id="course_desc" class="form-control" value="<?php echo $course['course_desc'];?>"  required placeholder="Enter Description">
                                                                    </div>      
                                                                    <div class="form-group">
                                                                        <label> Department/College <span class="text-bold text-sm text-danger">*</span></label>
                                                                        <select name="dept_name" id="dept_name" class="form-control" required>
                                                                            <option value="">Select College</option>
                                                                            <?php foreach($colleges as $college): ?>
                                                                                <option value="<?php echo $college['deptID']; ?>" <?php echo $course['deptID'] ==  $college['deptID'] ? 'Selected' : ''; ?> ><?php echo $college['dept_desc']; ?></option>
                                                                            <?php endforeach; ?>
                                                                        </select>
                                                                    </div>
                                                            
                                                                </div>

                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                                    <button type="submit" name="update" class="btn btn-primary">Update</button>
                                                                </div>

                                                            </form>

                                                            </div>
                                                        </div>
                                                    </div>


                                                <a class="btn btn-danger form-control col-md-5" href="script/deleteCourse.php?id=<?php echo $course['courseID']; ?>" onclick="return confirm('Are you sure you want to delete this Course?');"> <i class="fa fa-trash"></i> </a>
                                            </td>

                                        </tr>

                                          
                                        <?php
                                    }
                                }
                            ?>
                            
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

include('includes/footer.php');
?>

<script>
    //script for data tables
    $(function () 
    {
        $("#course_tbl").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#course_tbl_wrapper .col-md-6:eq(0)');
        
    });






</script>