<?php
$pageTitle = 'User Management';
include('sessions.php');
include('includes/header.php');
include('includes/navbar.php');
include('includes/sidebar.php'); 

$faculty = "SELECT * FROM user_tbl";
$res = mysqli_query($connection, $faculty);

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
                        <a class="btn btn-success float-right" data-toggle="modal" data-target="#adduserprofile">
                            <i class="fa fa-user-plus"></i>
                        </a>
                        <!-- add user modal -->
                        <div class="modal fade" id="adduserprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title text-bold" id="exampleModalLabel"><i class="fa fa-user-plus"></i> Register User</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="script/newFaculty.php" method="POST">
                                    <div class="modal-body">
                                        
                                            <div class="form-group col-md-4">
                                                <label> 
                                                    Faculty ID
                                                    <span class="text-bold text-sm text-danger">*</span> 
                                                </label>
                                                <input type="text" name="facultyNum" id="facultyNum" class="form-control" required>
                                            </div>
                                        
                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <label> 
                                                    First Name: 
                                                    <span class="text-bold text-sm text-danger">* </span> 
                                                </label>
                                                <input type="text" name="facultyfName" id="facultyfName" class="form-control" required>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label> 
                                                    Middle Name 
                                                    <span class="text-bold text-sm text-danger">* </span>
                                                </label>
                                                <input type="text" name="facultymName" id="facultymName" class="form-control" required>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label> 
                                                    Last Name 
                                                    <span class="text-bold text-sm text-danger">* </span>
                                                </label>
                                                <input type="text" name="facultylName" id="facultylName" class="form-control" required>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label> 
                                                    Ext. Name 
                                                </label>
                                                <input type="text" name="facultyeName" id="facultyeName" class="form-control">
                                            </div>

                                        </div>
                                        <div class="row">
                                            
                                            <div class="form-group col-md-6">
                                                <label> 
                                                    Contact No.
                                                    <span class="text-bold text-sm text-danger">*</span> 
                                                </label>
                                                <input type="number" name="facultyContact" id="facultyContact" class="form-control" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                            <label> 
                                                    Email address
                                                    <span class="text-bold text-sm text-danger">*</span> 
                                                </label>
                                                <input type="email" name="facultyEmail" id="facultyEmail" class="form-control" required>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label> 
                                                Faculty Address 
                                                <span class="text-bold text-sm text-danger">* </span>
                                                <i class="text-italic text-sm text-danger"> (Write complete address)</i>
                                            </label>
                                            <input type="text" name="facultyAddress" id="facultyAddress" class="form-control" required>
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
                        <!-- add user modal -->
                    </div>
                    <!-- Registered user table -->
                    <table id="user_tbl" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th width="20px"></th>
                                <th>Role</th>
                                <th>Faculty Name</th>
                                <th>Contact</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>View record</th>
                                
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php
                                if(mysqli_num_rows($res) > 0)
                                {
                                    while($row = mysqli_fetch_assoc($res))
                                    { ?>

                                        <tr>
                                           
                                            <td class="text-center" >
                                                <h5>
                                                    <i class="fa fa-circle 
                                                        <?php 
                                                            switch ($row['user_status']) {
                                                                case 'online':
                                                                    echo 'text-success';
                                                                    break;
                                                                case 'offline':
                                                                    echo 'text-warning';
                                                                    break;
                                                                case 'deactivated':
                                                                    echo 'text-danger';
                                                                    break;
                                                                default:
                                                                    echo 'text-light';
                                                            }
                                            
                                                        ?>">
                                                    </i>
                                                </h5>
                                            </td>
                                            <td> <?php echo $row['faculty_role']; ?> </td>
                                            <td> <?php echo $row['faculty_fname'].' '.$row['faculty_mname'].' '.$row['faculty_lname']; ?> </td>
                                            <td> <?php echo $row['faculty_contact'];?> </td>
                                            <td> <?php echo $row['faculty_email']?> </td>
                                            <td> <?php echo $row['faculty_address'];?> </td>
                                            <td>
                                                <a class="btn btn-warning form-control" href="view_faculty.php?id=<?php echo$row['userID']; ?>"> View <i class="fa fa-user-circle"></i> </i></a>
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
        $("#user_tbl").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#user_tbl_wrapper .col-md-6:eq(0)');
        
    });

</script>