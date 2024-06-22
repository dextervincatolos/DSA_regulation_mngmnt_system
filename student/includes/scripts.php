<!-- jQuery -->
<script src="../assets/js/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../assets/js/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>

<!-- Bootstrap 4 -->
<script src="../assets/js/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="../assets/js/chart.js/Chart.min.js"></script>

<!-- JQVMap -->
<script src="../assets/js/jqvmap/jquery.vmap.min.js"></script>
<script src="../assets/js/jqvmap/maps/jquery.vmap.usa.js"></script>

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
<!-- AdminLTE App -->
<script src="../assets/js/adminlte.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js" integrity="sha512-n/4gHW3atM3QqRcbCn6ewmpxcLAHGaDjpEBu4xZd47N0W2oQ+6q7oc3PXstrJYXcbNU1OHdQ1T7pAP+gi5Yu8g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


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
<script src="js/flot/jquery.flot.js"></script>
<!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
<script src="js/flot/plugins/jquery.flot.resize.js"></script>
<!-- FLOT PIE PLUGIN - also used to draw donut charts -->
<script src="../assets/js/flot/plugins/jquery.flot.pie.js"></script>
<!-- jQuery Knob Chart -->
<script src="../assets/js/jquery-knob/jquery.knob.min.js"></script>
<!-- Sparkline -->
<script src="../assets/js/sparklines/sparkline.js"></script>

<!-- SweetAlert -->
<script src="../assets/js/sweetalert.min.js"></script>

<script>
  $(function () {
    /* jQueryKnob */

    $('.knob').knob({
      /*change : function (value) {
       //console.log("change : " + value);
       },
       release : function (value) {
       console.log("release : " + value);
       },
       cancel : function () {
       console.log("cancel : " + this.value);
       },*/
      draw: function () {

        // "tron" case
        if (this.$.data('skin') == 'tron') {

          var a   = this.angle(this.cv)  // Angle
            ,
              sa  = this.startAngle          // Previous start angle
            ,
              sat = this.startAngle         // Start angle
            ,
              ea                            // Previous end angle
            ,
              eat = sat + a                 // End angle
            ,
              r   = true

          this.g.lineWidth = this.lineWidth

          this.o.cursor
          && (sat = eat - 0.3)
          && (eat = eat + 0.3)

          if (this.o.displayPrevious) {
            ea = this.startAngle + this.angle(this.value)
            this.o.cursor
            && (sa = ea - 0.3)
            && (ea = ea + 0.3)
            this.g.beginPath()
            this.g.strokeStyle = this.previousColor
            this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sa, ea, false)
            this.g.stroke()
          }

          this.g.beginPath()
          this.g.strokeStyle = r ? this.o.fgColor : this.fgColor
          this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sat, eat, false)
          this.g.stroke()

          this.g.lineWidth = 2
          this.g.beginPath()
          this.g.strokeStyle = this.o.fgColor
          this.g.arc(this.xy, this.xy, this.radius - this.lineWidth + 1 + this.lineWidth * 2 / 3, 0, 2 * Math.PI, false)
          this.g.stroke()

          return false
        }
      }
    })
    /* END JQUERY KNOB */

  })

</script>

<script>
  $(function () {
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */

    //-------------
    //- LINE CHART -
    //--------------
    var lineChartCanvas = $('#lineChart').get(0).getContext('2d')

    var lineChartData = {
      labels  : ['Event 1', 'Event 2', 'Event 3', 'Event 4', 'Event 5', 'Event 6', 'Event'],
      datasets: [
        {
          label               : 'Events Without Violation',
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [0,0,1,0,1,1,0]
        },
        {
          label               : 'Events with Violation',
          backgroundColor     : 'rgba(210, 214, 222, 1)',
          borderColor         : 'rgba(210, 214, 222, 1)',
          pointRadius         : false,
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [1,1,1,0,0,1,1]
        },
      ]
    }

    var lineChartOptions = {
      maintainAspectRatio : false,
      responsive : true,
      legend: {
        display: true
      },
      scales: {
        xAxes: [{
          gridLines : {
            display : false,
          }
        }],
        yAxes: [{
          gridLines : {
            display : false,
          }
        }]
      }
    }
    
    lineChartData.datasets[0].fill = false;
    lineChartData.datasets[1].fill = false;
    lineChartOptions.datasetFill = false

    var lineChart = new Chart(lineChartCanvas, {
      type: 'line',
      data: lineChartData,
      options: lineChartOptions
    })



    var lineChartCanvas1 = $('#lineChart1').get(0).getContext('2d')

    var lineChartData1 = {
      labels  : ['Event 1', 'Event 2', 'Event 3', 'Event 4', 'Event 5', 'Event 6', 'Event'],
      datasets: [
        {
          label               : 'Settled',
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [0,0,1,0,1,1,0]
        },
        {
          label               : 'Unsettled',
          backgroundColor     : 'rgba(210, 214, 222, 1)',
          borderColor         : 'rgba(210, 214, 222, 1)',
          pointRadius         : false,
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [1,1,1,0,0,1,1]
        },
      ]
    }

    var lineChartOptions1 = {
      maintainAspectRatio : false,
      responsive : true,
      legend: {
        display: true
      },
      scales: {
        xAxes: [{
          gridLines : {
            display : false,
          }
        }],
        yAxes: [{
          gridLines : {
            display : false,
          }
        }]
      }
    }
    
    lineChartData1.datasets[0].fill = false;
    lineChartData1.datasets[1].fill = false;
    lineChartOptions1.datasetFill = false

    var lineChart1 = new Chart(lineChartCanvas1, {
      type: 'line',
      data: lineChartData1,
      options: lineChartOptions1
    })



    //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas1 = $('#pieChart1').get(0).getContext('2d')
    var pieData1        = {
      labels: [
          'Settled',
          'Unsettled'
      ],
      datasets: [
        {
          data: [3,2],
          backgroundColor : ['#E7D2CC', '#EEEDE7'],
        }
      ]
    }
    var pieOptions1     = {
      maintainAspectRatio : false,
      responsive : true,
      legend: {
        display: false
      },
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(pieChartCanvas1, {
      type: 'pie',
      data: pieData1,
      options: pieOptions1
    })

    
    //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas2 = $('#pieChart2').get(0).getContext('2d')
    var pieData2       = {
      labels: [
          'Violation1',
          'Violation2',
          'Violation3',
          'Violation4',
      ],
      datasets: [
        {
          data: [1,2,3,4],
          backgroundColor : ['#E7F2F8', '#74BDCB', '#FFA384', '#EFE7BC'],
        }
      ]
    }
    var pieOptions2     = {
      maintainAspectRatio : false,
      responsive : true,
      legend: {
        display: false
      },
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(pieChartCanvas2, {
      type: 'pie',
      data: pieData2,
      options: pieOptions2
    })
    
    
    //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas3 = $('#pieChart3').get(0).getContext('2d')
    var pieData3       = {
      labels: [
          'Attended',
          'Absent'
      ],
      datasets: [
        {
          data: [1,4],
          backgroundColor : ['#E7D2CC', '#EEEDE7'],
        }
      ]
    }
    var pieOptions3     = {
      maintainAspectRatio : false,
      responsive : true,
      legend: {
        display: false
      },
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(pieChartCanvas3, {
      type: 'pie',
      data: pieData3,
      options: pieOptions3
    })
 
  })
</script>


<script>
      
      $(document).ready(function(){

        $(".create_new_rule").click(function(e){
            e.preventDefault();
            $("#add_rule").append(`<div class="row">
                                    <div class="form-group col-md-8">
                                      <input type="text" name="policy_rule[]" class="form-control" required placeholder="Write rule here">
                                    </div>
                                    <div class="form-group col-md-2">
                                      <select class="form-control" name="rule_gender[]" id="">
                                        <option value="">Gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                      </select>
                                    </div>
                                    <div class="form-group col-md-2">
                                      <button class="form-control btn btn-danger btn-sm discard_new_rule"> Discard Rule</button>
                                    </div>
                                  </div>`);
        });
        $(document).on('click', '.discard_new_rule', function(e){
            e.preventDefault();
            let row_children = $(this).parent().parent();
            $(row_children).remove();
        });




        $(".create_new_sanction").click(function(e){
            e.preventDefault();
            $("#add_sanction").append(`<div class="row">
                                    <div class="form-group col-md-8">
                                      <input type="text" name="policy_sanction[]" id="contact" class="form-control" required placeholder="Write rule here">
                                    </div>
                                    <div class="form-group col-md-2">
                                      <select class="form-control" name="sanction_gender[]" id="">
                                        <option value="">Gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                      </select>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <button class="form-control btn btn-danger btn-sm discard_new_sanction"> Remove</button>
                                    </div>

                                        </div>`);
        });
        $(document).on('click', '.discard_new_sanction', function(e){
            e.preventDefault();
            let row_children = $(this).parent().parent();
            $(row_children).remove();
        });




    });
</script>

<?php
  if(isset($_SESSION['status']) && $_SESSION['status'] !='')
  {
    ?>
      <script>
        // script for adding users
        swal({
          title: "<?php echo $_SESSION['status']; ?>",
          icon: "<?php echo $_SESSION['status_code']; ?>",
        });
      </script>
    <?php
    unset($_SESSION['status']);
  }
?>

