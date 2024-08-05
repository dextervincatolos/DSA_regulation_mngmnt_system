<?php
    $pageTitle = 'Department Management';
    include('sessions.php');
    include('includes/header.php');
    include('includes/navbar.php');

    $dept = "SELECT * FROM department_tbl";
    $res = mysqli_query($connection, $dept);
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
                        <a class="btn btn-success float-right" data-toggle="modal" data-target="#addDept">
                            <i class="fa fa-university"></i>
                        </a>
                        <!-- add department modal -->
                        <div class="modal fade" id="addDept" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-md" role="document">
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
                                            <button type="submit" name="submitForm" class="btn btn-success">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- add department modal -->
                    </div>
                  
                    <!-- Department table -->
                    <table id="dept_tbl" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Department Name</th>
                                <th>Description</th>
                                <th class=" <?php echo $_SESSION['role'] == 'DSA-User' ? 'hiddenTouser' : ''; ?>"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if(mysqli_num_rows($res) > 0) {
                                while($row = mysqli_fetch_assoc($res)) { ?>
                                    <tr>
                                        <td> <?php echo $row['dept_name'];?> </td>
                                        <td> <?php echo $row['dept_desc']; ?> </td>
                                        <td class=" <?php echo $_SESSION['role'] == 'DSA-User' ? 'hiddenTouser' : ''; ?>">
                                            <a class="btn btn-warning form-control" data-toggle="modal" data-target="#editDept<?php echo $row['deptID']; ?>"> <i class="fa fa-edit"></i> </a>
                                        </td>
                                    </tr>
                                     <!-- Edit Department -->
                                     <div class="modal fade" id="editDept<?php echo $row['deptID']; ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel<?php echo $row['deptID']; ?>" aria-hidden="true">
                                                    <div class="modal-dialog modal-md" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title text-bold" id="editModalLabel<?php echo $row['deptID']; ?>"><i class="fa fa-university"></i> Update Department</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <!-- Edit department -->
                                                            <form id="editForm<?php echo $row['deptID']; ?>" action="script/updateDept.php" method="POST">
                                                                <input type="text" name="dept_id" class="form-control" value="<?php echo $row['deptID']; ?>" readonly hidden>
                                                                <div class="modal-body">                                                                    
                                                                    <div class="form-group">
                                                                        <label> 
                                                                            Department Name:  
                                                                            <span class="text-bold text-sm text-danger">* </span>
                                                                        </label>
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
                                                                    <button type="submit" name="update" class="btn btn-success">Update</button>
                                                                </div>
                                                            </form>
                                                            <!-- /Edit department -->
                                                        </div>
                                                    </div>
                                                </div>
                                    <?php
                                }
                            } ?>
                        </tbody>
                    </table>
                    <!-- Department table -->
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

    $(function () 
{
    var currentDate = new Date();
    var formattedDate = currentDate.toLocaleDateString('en-GB', {
        year: 'numeric',
        month: 'long',
        day: 'numeric'
    });
    
    $("#dept_tbl").DataTable({
    "responsive": true, "lengthChange": false, "autoWidth": false,
    dom: 'Bfrtip',
    buttons: [
        {
            extend: 'excelHtml5',
            title: 'DSA Department/College Report ' + formattedDate
        },
        {
            extend: 'csvHtml5',
            title: 'DSA Department/College Report ' + formattedDate
        },
        {
            extend: 'pdfHtml5',
            title: 'DSA Department/College Report ' + formattedDate,
            customize: function (doc) {
                doc.content.splice(0, 1, {
                    text: [
                        { text: 'DSA Department/College Report\n', fontSize: 14, bold: true,alignment: 'center'},
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
                        '<div style="text-align: center; font-size: 14pt;">DSA Department/College Report</div>' +
                        '<div style="text-align: center; font-size: 12pt;">System Generated Report</div>' +
                        '<div style="text-align: center; font-size: 12pt;">Date: ' + formattedDate + '</div><br>'
                    );
            }
        },
        {
             extend:'colvis'
        }
    ],
    }).buttons().container().appendTo('#dept_tbl_wrapper .col-md-6:eq(0)');
    
});
    
</script>