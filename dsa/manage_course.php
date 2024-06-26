<?php
$pageTitle = 'Course Management';
include('sessions.php');
include('includes/header.php');
include('includes/navbar.php');

$getCourses = "SELECT * FROM course_tbl JOIN department_tbl ON course_tbl.deptID = department_tbl.deptID";
$courses = mysqli_query($connection, $getCourses);

// $colleges = [];
// if ($department->num_rows > 0) {
//     while($row = $department->fetch_assoc()) {
//         $colleges[] = $row;
//     }
// }
// $dept = "SELECT * FROM department_tbl";
// $res = mysqli_query($connection, $dept);

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
                        <a class="btn btn-primary float-right" data-toggle="modal" data-target="#addDept">
                        <i class="fa fa-university fa-sm"></i>
                        </a>
                        <!-- add user modal -->
                        <div class="modal fade" id="addDept" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-sm" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title text-bold" id="exampleModalLabel"><i class="fa fa-university"></i> Register Department</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="script/newDepartment.php" method="POST">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label> 
                                                Department Name: 
                                                <span class="text-bold text-sm text-danger">* </span>
                                            </label>
                                            <input type="text" name="dept_name" id="dept_name" class="form-control" required placeholder="Enter Abbreviation">
                                        </div>
                                        <div class="form-group">
                                            <label> 
                                                Description: 
                                                <span class="text-bold text-sm text-danger">* </span>
                                                <i class="text-italic text-sm text-danger"> (Write complete Description)</i>
                                            </label>
                                            <input type="text" name="dept_desc" id="dept_desc" class="form-control" required>
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
                                if(mysqli_num_rows($res) > 0)
                                {
                                    while($course = mysqli_fetch_assoc($courses))
                                    { ?>

                                        <tr>
                                            <td> <?php echo $course['course_name'];?> </td>
                                            <td> <?php echo $row['course_desc']; ?> </td>
                                            <td> <?php echo $row['dept_desc']; ?> </td>
                                            <td>
                                                <a class="btn btn-primary form-control col-md-5" data-toggle="modal" data-target="#editDept<?php echo $row['deptID']; ?>"> <i class="fa fa-edit"></i> </a>
                    
                                                
                                                
                                                <!-- Edit Department -->
                                                    <div class="modal fade" id="editDept<?php echo $row['deptID']; ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel<?php echo $row['deptID']; ?>" aria-hidden="true">
                                                        <div class="modal-dialog modal-sm" role="document">
                                                            <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title text-bold" id="editModalLabel<?php echo $row['deptID']; ?>"><i class="fa fa-university"></i> Update Department</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <form id="editForm<?php echo $row['deptID']; ?>" action="script/updateDept.php" method="POST">
                                                                <input type="text" name="dept_id"class="form-control" value="<?php echo $row['deptID']; ?>" readonly hidden>
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <label> 
                                                                            Department Name: 
                                                                            <span class="text-bold text-sm text-danger">* </span>
                                                                        <input type="text" name="dept_name" class="form-control" value="<?php echo $row['dept_name']; ?>" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label> 
                                                                            Description: 
                                                                            <span class="text-bold text-sm text-danger">* </span>
                                                                            <i class="text-italic text-sm text-danger"> (Write complete Description)</i>
                                                                        </label>
                                                                        <input type="text" name="dept_desc" class="form-control" value="<?php echo $row['dept_desc']; ?>" required>
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


                                                <a class="btn btn-danger form-control col-md-5" href="script/deleteDepartment.php?id=<?php echo$row['deptID']; ?>" onclick="return confirm('Are you sure you want to delete this department?');"> <i class="fa fa-trash"></i> </a>
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