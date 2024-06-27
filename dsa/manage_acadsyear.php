<?php
$pageTitle = 'Academic Year Management';
include('sessions.php');
include('includes/header.php');
include('includes/navbar.php');

$getAcadsyr = "SELECT * FROM academic_year_tbl";
$acads = mysqli_query($connection, $getAcadsyr);

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
                        <a class="btn btn-primary float-right" data-toggle="modal" data-target="#newAcadsyr">
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
                                        <div class="form-group col-md-6">
                                           
                                        </div>
                                                                            
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal" id="cancelButton">Cancel</button>
                                        <button type="submit" name="submitForm" class="btn btn-primary">Save</button>
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
                                if(mysqli_num_rows($acads) > 0)
                                {
                                    while($acadsYr = mysqli_fetch_assoc($acads))
                                    { ?>
                                  
                                        <tr>
                                            <td> School Year: <?php echo $acadsYr['_from'].' - '.$acadsYr['_to']; ?> </td>
                                            <td>
                                               
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
<!-- Add your preferred JavaScript for modal functionality here -->
<script>
        // Get the modal
        var modal = document.getElementById("newAcadsyr");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // Get the cancel button
        var cancelButton = document.getElementById("cancelButton");

        // Get the form
        var form = document.getElementById("modalForm");

        // Get the inputs
        var fromInput = document.getElementById("_from");
        var toInput = document.getElementById("_to");

        // Set the initial min and max values for the fromInput
        var currentYear = new Date().getFullYear();
        fromInput.max = currentYear;
        fromInput.min = currentYear;

        // Set the initial min and max values for the toInput
        toInput.max = currentYear + 1;

        // Add an event listener to the fromInput to update the toInput's min value
        fromInput.addEventListener('input', function() {
            toInput.min = parseInt(fromInput.value) + 1;
        });

        // When the user clicks on <span> (x), close the modal and reset the form
        span.onclick = function() {
            modal.style.display = "none";
            form.reset();
        }

        // When the user clicks on the cancel button, close the modal and reset the form
        cancelButton.onclick = function() {
            modal.style.display = "none";
            form.reset();
        }

        // You can also add additional code to open the modal if needed
        // For example, when clicking a button to open the modal
        // document.getElementById("openModalButton").onclick = function() {
        //     modal.style.display = "block";
        // }
    </script>

<script>
    //script for data tables
    $(function () 
    {
        $("#acads_tbl").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#acads_tbl_wrapper .col-md-6:eq(0)');
        
    });






</script>