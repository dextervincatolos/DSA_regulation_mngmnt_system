<!-- jQuery -->
<script src="../assets/js/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../assets/js/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>

<!-- ChartJS -->
<script src="../assets/js/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="../assets/js/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="../assets/js/jqvmap/jquery.vmap.min.js"></script>
<script src="../assets/js/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="../assets/js/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../assets/js/moment/moment.min.js"></script>
<script src="../assets/js/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../assets/js/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="../assets/js/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="../assets/js/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../assets/js/adminlte.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js" integrity="sha512-n/4gHW3atM3QqRcbCn6ewmpxcLAHGaDjpEBu4xZd47N0W2oQ+6q7oc3PXstrJYXcbNU1OHdQ1T7pAP+gi5Yu8g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- Bootstrap 4 -->
<script src="../assets/js/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../assets/js/bootstrap/js/bootstrap-select.min.js"></script>

<!-- DataTables  & Plugins -->
<script src="../assets/js/datatables/jquery.dataTables.min.js"></script>
<script src="../assets/js/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../assets/js/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../assets/js/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../assets/js/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../assets/js/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../assets/js/jszip/jszip.min.js"></script>
<script src="../assets/js/pdfmake/pdfmake.min.js"></script>
<script src="../assets/js/pdfmake/vfs_fonts.js"></script>
<script src="../assets/js/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../assets/js/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../assets/js/datatables-buttons/js/buttons.colVis.min.js"></script>

<!-- dependent dropdown for address -->
<script src="../assets/js/addresses.js"></script>

<!-- FLOT CHARTS -->
<!-- <script src="js/flot/jquery.flot.js"></script> -->
<!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
<!-- <script src="js/flot/plugins/jquery.flot.resize.js"></script> -->
<!-- FLOT PIE PLUGIN - also used to draw donut charts -->
<!-- <script src="../assets/js/flot/plugins/jquery.flot.pie.js"></script> -->

<!-- SweetAlert -->
<script src="../assets/js/sweetalert.min.js"></script>


<?php
  if(isset($_SESSION['status']) && $_SESSION['status'] !='')
  {
    ?>
      <script>
        swal({
          title: "<?php echo $_SESSION['status']; ?>",
          icon: "<?php echo $_SESSION['status_code']; ?>",
        });
      </script>
    <?php
    unset($_SESSION['status']);
  }

  include('script/notification/ajax_GetNotification.php');
  include('script/notification/ajax_CountNotification.php');
?>


