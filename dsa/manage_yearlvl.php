<?php
$pageTitle = 'Year-level Management';
include('sessions.php');
include('includes/header.php');
include('includes/navbar.php');

$getyearlvl = "SELECT * FROM yearlvl_tbl";
$yrlvl = mysqli_query($connection, $getyearlvl);

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
                        <a class="btn btn-success float-right" data-toggle="modal" data-target="#newYearlvl">
                        <i class="fa fa-calendar"></i>
                        </a>
                        <!-- register year level modal -->
                        <div class="modal fade" id="newYearlvl" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-md" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title text-bold" id="exampleModalLabel">
                                    <i class="fa fa-calendar"></i> Add Year Level</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="script/newYrlvl.php" method="POST">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label> 
                                                Year level: 
                                                <span class="text-bold text-sm text-danger">* </span>
                                            </label>
                                            <input type="text" name="yearlvl" id="yearlvl" class="form-control" required placeholder="year level">
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
                
                    </div>
                  
                   
                    <table id="yearlvl_tbl" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                
                                <th>Year level</th>
                                <th>View record</th>
                                
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php
                                if(mysqli_num_rows($yrlvl) > 0)
                                {
                                    while($yearlvl = mysqli_fetch_assoc($yrlvl))
                                    { ?>

                                        <tr>
                                            <td> <?php echo $yearlvl['year_lvl'];?> </td>
                                            <td>
                                                <a class="btn btn-success form-control col-md-5" data-toggle="modal" data-target="#editYearlvl<?php echo $yearlvl['yearlvlID']; ?>"> <i class="fa fa-edit"></i> </a>
                    
                                                <!-- Edit year level -->
                                                    <div class="modal fade" id="editYearlvl<?php echo $yearlvl['yearlvlID']; ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel<?php echo $yearlvl['yearlvlID']; ?>" aria-hidden="true">
                                                        <div class="modal-dialog modal-md" role="document">
                                                            <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title text-bold" id="editModalLabel<?php echo $yearlvl['yearlvlID']; ?>"><i class="fa fa-graduation-cap"></i> Update Course</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <form id="editForm<?php echo $yearlvl['yearlvlID']; ?>" action="script/updateYearlvl.php" method="POST">

                                                                <input type="text" name="yearlvl_id" class="form-control" value="<?php echo $yearlvl['yearlvlID']; ?>" readonly hidden>
                                                                
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <label> 
                                                                            Year Level: 
                                                                            <span class="text-bold text-sm text-danger">* </span>
                                                                        </label>
                                                                        <input type="text" name="yearlvl" id="yearlvl" class="form-control" required value="<?php echo $yearlvl['year_lvl'];?>">
                                                                    </div>
                                                                </div>

                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                                    <button type="submit" name="update" class="btn btn-success">Update</button>
                                                                </div>

                                                            </form>

                                                            </div>
                                                        </div>
                                                    </div>


                                                <a class="btn btn-danger form-control col-md-5" href="script/deleteYearlvl.php?id=<?php echo $yearlvl['yearlvlID']; ?>" onclick="return confirm('Are you sure you want to delete this Year level?');"> <i class="fa fa-trash"></i> </a>
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
        $("#yearlvl_tbl").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#yearlvl_tbl_wrapper .col-md-6:eq(0)');
        
    });






</script>