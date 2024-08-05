<?php
    $pageTitle = 'Academic Year Management';
    include('sessions.php');
    include('includes/header.php');
    include('includes/navbar.php');

    $getAcadsyr = "SELECT * FROM academic_year_tbl";
    $acads = mysqli_query($connection, $getAcadsyr);

    $getSemester = "SELECT * FROM semester_tbl";
    $semester = mysqli_query($connection, $getSemester);

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
                    <div class="col-lg-12 col-md-12 col-12 pb-5  <?php echo $_SESSION['role'] == 'DSA-User' ? 'hiddenTouser' : ''; ?>">
                        <a class="btn btn-success float-right" data-toggle="modal" data-target="#newAcadsyr">
                            <i class="fa fa-calendar-check"></i>
                        </a>
                        <!-- Create new Academic Year modal -->
                        <div class="modal fade" id="newAcadsyr" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-md" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title text-bold" id="exampleModalLabel">
                                        <i class="fa fa-calendar-check"></i> Register New Academic Year</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="script/newAcadsyr.php" method="POST" id="modalForm">
                                        <div class="modal-body">
                                            <div class="form-group row">
                                                <div>
                                                    <p>Input Values are set automatically by the system. Just click save to create new school year.</p>
                                                </div>
                                                <div class="col-md-6">
                                                    <label> 
                                                        From: 
                                                        <span class="text-bold text-sm text-danger">* </span>
                                                    </label>
                                                    <input type="number" class="form-control" name="_from" id="_from" value="<?php echo date("Y") ?>" readonly required>
                                                </div>
                                                <div class="col-md-6">
                                                    <label> 
                                                        To: 
                                                        <span class="text-bold text-sm text-danger">* </span>
                                                    </label>
                                                    <input type="number" class="form-control" name="_to" id="_to" value="<?php echo date("Y")+1 ?>" readonly required >
                                                </div>                                                
                                            </div>                    
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal" id="cancelButton">Cancel</button>
                                            <button type="submit" name="submitForm" class="btn btn-success">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                    <table id="acads_tbl" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Academic Years</th>
                                <th>Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                if(mysqli_num_rows($acads) > 0) {
                                    while($acadsYr = mysqli_fetch_assoc($acads)) { ?>
                                        <tr>
                                            <td> School Year: <?php echo $acadsYr['_from'].' - '.$acadsYr['_to']; ?> </td>
                                            <td>  </td>
                                        </tr>
                                        <?php
                                    }
                                } ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                <hr>
                <!-- /.card-header -->
                <div class="card-body">
                    <h4>Semester:</h4>
                    <div class="col-lg-12 col-md-12 col-12 pb-5  <?php echo $_SESSION['role'] == 'DSA-User' ? 'hiddenTouser' : ''; ?>">
                        <a class="btn btn-success float-right" data-toggle="modal" data-target="#newSem">
                            <i class="fa fa-leaf"></i>  
                        </a>
                        <!-- Create new Academic Year modal -->
                        <div class="modal fade" id="newSem" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-md" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title text-bold" id="exampleModalLabel">
                                        <i class="fa fa-leaf"></i> New Semester</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="script/newSem.php" method="POST" id="modalForm">
                                        <div class="modal-body">
                                            <div class="form-group row">
                                                <label> 
                                                    Semester: 
                                                    <span class="text-bold text-sm text-danger">* </span>
                                                </label>
                                                <input type="text" class="form-control" name="sem" id="sem" required >
                                            </div>                       
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal" id="cancelButton">Cancel</button>
                                            <button type="submit" name="submitForm" class="btn btn-success">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <table id="semester_tbl" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Semester</th>
                                <th class="col-md-2  <?php echo $_SESSION['role'] == 'DSA-User' ? 'hiddenTouser' : ''; ?>">Option</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php
                            if(mysqli_num_rows($semester) > 0) {
                                while($sem = mysqli_fetch_assoc($semester)) { ?>
                                    <tr>
                                        <td><?php echo $sem['semester']; ?> </td>
                                        <td class=" <?php echo $_SESSION['role'] == 'DSA-User' ? 'hiddenTouser' : ''; ?>">
                                            <a class="btn btn-success form-control" data-toggle="modal" data-target="#editYearlvl<?php echo $sem['semID']; ?>"> <i class="fa fa-edit"></i> </a>
                                            <!-- Edit year level -->
                                            <div class="modal fade" id="editYearlvl<?php echo $sem['semID']; ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel<?php echo $sem['semID']; ?>" aria-hidden="true">
                                                <div class="modal-dialog modal-md" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title text-bold" id="editModalLabel<?php echo $sem['semID']; ?>">
                                                                <i class="fa fa-leaf"></i>  
                                                                Update Semester
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form id="editForm<?php echo $sem['semID']; ?>" action="script/updateSem.php" method="POST">
                                                            <input type="text" name="sem_id" class="form-control" value="<?php echo $sem['semID']; ?>" readonly hidden>
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label> 
                                                                        Year Level: 
                                                                        <span class="text-bold text-sm text-danger">* </span>
                                                                    </label>
                                                                    <input type="text" name="sem" id="sem" class="form-control" required value="<?php echo $sem['semester'];?>">
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
include('script/datatables/academicYear_tbl.php');
include('script/datatables/semester_tbl.php');
include('includes/footer.php');
?>