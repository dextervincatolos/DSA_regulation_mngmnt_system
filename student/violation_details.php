<?php
$pageTitle = 'Violation Details';
include('includes/header.php');
include('includes/navbar.php');
?>


    <body class="layout-top-nav" style="height: auto;">
<div class="wrapper">

 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="min-height: 1344px;">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Violation details</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Violation Detaiks</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- <div class="callout callout-info">
                        <h5 class="text-info"><i class="fas fa-info"></i> Management Note:</h5>
                        <i> Note here!</i>
                    </div> -->

                    <!-- Main content -->
                    <div class=" p-5 mb-3">
                        <!-- title row -->
                        <div class="row">
                            <div class="col-12 text-center">
                                <h4>
                                    <img src="../assets/img/cics-logo.png" alt="CICS Logo" width="3%">
                                    College of Information and Computing Sciences 
                                    <img src="../assets/img/school-logo.png" alt="CICS Logo" width="3%">
                                </h4>
                                <medium><i>St. Joseph College of Baggao Inc</i></medium><br>
                                <medium><i>San Jose, Baggao, Cagayan Philippines, 3506</i></medium>
                            </div>
                        </div>
                        <!-- Table row -->
                        <div class="" style="margin:50px; padding-left:100px ;">

                            <!-- 2/10/2024
                            <br> -->
                            <!-- <br>
                            Arvy Baingan
                            <br>
                            Barsat West 
                            <br>
                            Baggao Cagayan, 3506
                            <br>
                            <br> -->
                            Dear Mr. Baingan,
                            <br>
                            <br>
                            <p>
                                <strong>Violation Notice - No Attendance at Required Event</strong>
                            </p>
                            <p>
                                We are writing to inform you that you have been found in violation of the <strong>[Policy Title: Events that Students are Required to Attend] </strong>policy for the following incident:
                            </p>
                            
                            <ul>
                                <li>
                                    Violation: No Attendance/Absent at [Event Name] on [Event Date]
                                </li>
                            </ul>

                            <p>
                                According to our records, you were required to attend the aforementioned event as per the policy guidelines. However, you failed to attend, resulting in a violation of the policy.
                            </p>
                            <!-- <br> -->
                            <strong>Sanctions:</strong>
                            <!-- <br>
                            <br> -->
                            <p>
                                In accordance with the policy, the following sanctions have been imposed:
                            </p>
                            <ol>
                                <li>
                                    First Offense: Warning - You are hereby issued a formal warning regarding this violation. Please be advised that repeated violations may result in further disciplinary action.
                                </li>
                                <li>
                                    Additional Educational Requirement - You are required to [specify any additional educational requirements or remedial actions, if applicable].
                                </li>
                            </ol>
                            <!-- <br> -->

                            <p> 
                                Please be aware that failure to comply with the imposed sanctions may result in further disciplinary measures.
                            </p>

                            <p>
                                If you wish to contest this violation or have any questions regarding the sanctions imposed, you may contact [Name/Department] at [Contact Information] within [Number of Days] days of receiving this notice.
                            
                            </p>
                            <!-- <br> -->
                            <!-- <br>
                            <br> -->
                            
                            Sincerely,
                            <br>
                            <br>    
                            <strong><u>Juan Dela Cruz</u></strong>
                            <br>
                            Issuing Authority
                            <br>
                            Alliance of Computer Enthusiast
                            <br>
                            +63 976 0000 000
                                    
                                
                        </div>
                        <!-- /.row -->

                        <!-- this row will not appear when printing -->
                        <div class="row">
                            <div class="col-12">
                                <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                                    Settle Violation
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- /.invoice -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>

  </div>
   




<?php
include('includes/scripts.php');
include('includes/footer.php');
?>

<script>
    //script for data tables
    $(function () 
    {
        $("#violation_history").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#violation_history_wrapper .col-md-6:eq(0)');
        
    });

</script>