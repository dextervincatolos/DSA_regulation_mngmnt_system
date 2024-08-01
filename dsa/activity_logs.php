<?php
$pageTitle = 'Activity Logs';
include('sessions.php');
include('includes/header.php');
include('includes/navbar.php');


$logs = "SELECT * FROM activity_logs_tbl JOIN user_tbl ON activity_logs_tbl.userID=user_tbl.userID WHERE user_tbl.userID =".$_SESSION['uid'];
$res = mysqli_query($connection, $logs);

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
                    
                    <!-- Registered user table -->
                    <table id="user_tbl" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                
                                <th>#</th>
                                <th>executed_by</th>
                                <th>Logged activity</th>
                                <th>created_at</th>
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
                                            <h5><?php echo $row['_status'] == 'successful' ? '<i class="fa fa-check-circle text-success"> </i>' : '<i class="fa fa-window-close text-danger"></i>'; ?>
                                            </h5>
                                        </td>
                                        <td> <?php echo $row['faculty_fname'].' '.$row['faculty_mname'].' '.$row['faculty_lname']; ?> </td>
                                        <td> <?php echo $row['_activity'];?> </td>
                                        <td> <?php echo $row['activity_created_at'];?> </td>
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
        
        $("#user_tbl").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'excelHtml5',
                title: 'DSA user Report ' + formattedDate
            },
            {
                extend: 'csvHtml5',
                title: 'DSA user Report ' + formattedDate
            },
            {
                extend: 'pdfHtml5',
                title: 'DSA user Report ' + formattedDate,
                customize: function (doc) {
                    doc.content.splice(0, 1, {
                        text: [
                            { text: 'DSA user Report\n', fontSize: 14, bold: true,alignment: 'center'},
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
                            '<div style="text-align: center; font-size: 14pt;">DSA user Report</div>' +
                            '<div style="text-align: center; font-size: 12pt;">System Generated Report</div>' +
                            '<div style="text-align: center; font-size: 12pt;">Date: ' + formattedDate + '</div><br>'
                        );
                }
            },
            {
                 extend:'colvis'
            }
        ],
        }).buttons().container().appendTo('#user_tbl_wrapper .col-md-6:eq(0)');
        
    });
</script>