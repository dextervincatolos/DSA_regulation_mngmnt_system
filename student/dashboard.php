<?php
$pageTitle = 'Student Dashboard';
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
            <h1>Dashboard</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User Dashboard</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <div class="content">
     
    <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle" src="../assets/img/team/team-2.jpg" alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">Nina Mcintire</h3>

                <p class="text-muted text-center">Student</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Policy Violated</b> <a class="float-right">5</a>
                  </li>
                  <li class="list-group-item">
                    <b>Setteled Violation(s)</b> <a class="float-right">3</a>
                  </li>
                  <li class="list-group-item">
                    <b>Unsetteled Violation(s)</b> <a class="float-right">2</a>
                  </li>
                </ul>

                <div class="text-center text-bold"><i>Academic year 2024 - 2025 second semester</i></div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">About Me</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-book mr-1"></i> Program</strong>
                <p class="text-muted"> Bachelor of Science in Information Technology </p>
                <hr>
                <strong><i class="fas fa-map-marker-alt mr-1"></i> Address</strong>
                <p class="text-muted">San Jose Baggao Cagayan</p>
                <hr>
                <strong><i class="fas fa-pencil-alt mr-1"></i> Organization</strong>

                <p class="text-muted"> <span class="tag tag-danger">Alliance of Computer Enthusiast(ACE)</span> </p>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#overview" data-toggle="tab"><i class="fa fa-leaf"></i></a></li>
                  <li class="nav-item"><a class="nav-link" href="#events" data-toggle="tab"><i class="fa fa-calendar"></i></a></li>
                  <li class="nav-item"><a class="nav-link" href="#history" data-toggle="tab"><i class="fa fa-history"></i></a></li>
                  <li class="nav-item"><a class="nav-link" href="#org" data-toggle="tab"><i class="fa fa-sitemap"></i></a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="tab-pane active" id="overview">

                    <div class="row card-body">
                      <div class=" col-md-3 text-center">
                        <div class="col-md-12 text-center">
                          <canvas id="pieChart1" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 713px;" width="763" height="240" class="chartjs-render-monitor"></canvas>
                          <div class="knob-label" style="margin-top: 8px;">Setteled & Unsettled Violations</div>
                        </div>
                      </div>

                      <div class=" col-md-3 text-center">
                        <div class="col-md-12 text-center">
                          <canvas id="pieChart2" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 713px;" width="763" height="250" class="chartjs-render-monitor"></canvas>
                          <div class="knob-label" style="margin-top: 8px;">Violated Policy chart</div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="row">
                          <div class="col-12">
                            <div class="card">
                              
                              <div class="card-body table-responsive p-0" style="height: 300px;">
                                <table class="table table-head-fixed text-nowrap">
                                  <thead>
                                    <tr>
                                      <th>PolicyID</th>
                                      <th>Rule</th>
                                      <th>Date issued</th>
                                      <th></th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <tr>
                                      <td>183</td>
                                      <td>03</td>
                                      <td>11-7-2014</td>
                                      <td class="project-actions text-center">
                                        <a class="btn btn-primary btn-sm" href="#">
                                            <i class="fas fa-folder"> </i>
                                            View
                                        </a>              
                                      </td>
                                    </tr>
                                    <tr>
                                      <td>219</td>
                                      <td>06</td>
                                      <td>11-7-2014</td>
                                      <td class="project-actions text-center">
                                        <a class="btn btn-primary btn-sm" href="violation_details.php">
                                            <i class="fas fa-folder"> </i> View
                                        </a>
                                      </td>
                                    </tr>
                                  </tbody>
                                </table>
                              </div>
                              <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-12">
                      <div class="card card-default">
                        <div class="card-body">
                          <div class="chart"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                            <canvas id="lineChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 763px;" width="763" height="250" class="chartjs-render-monitor"></canvas>
                          </div>
                        </div>
                        <!-- /.card-body -->
                      </div>
                      <!-- /.card -->
                    </div>
                  </div>

                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="events">

                    <div class="row card-body">

                      <div class=" col-md-3 text-center">
                        <div class="col-md-12 text-center">
                          <canvas id="pieChart3" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 713px;" width="763" height="240" class="chartjs-render-monitor"></canvas>
                          <div class="knob-label">Event Attendance</div>
                        </div>
                      </div>
             
                      <div class="col-md-9">
                        <table class="table table-bordered">
                          <thead>
                            <tr>
                              <th style="width: 10px">#</th>
                              <th>Event</th>
                              <th>Schedule</th>
                              <th colspan="2" style="width: 500px">Status</th>
                            </tr>
                          </thead>
                          <tbody>
                          <tr >
                              <td>1.</td>
                              <td>Foundation Day</td>
                              <td>06-12-2024</td>
                              <td >
                                <div class="progress progress-xs">
                                  <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
                                </div>
                              </td>
                              <td style="width: 10px"><span class="badge bg-danger" >55%</span></td>
                            </tr>
                            <tr>
                              <td>2.</td>
                              <td>Intramurals</td>
                              <td>07-18-2024</td>
                              <td>
                                <div class="progress progress-xs">
                                  <div class="progress-bar bg-warning" style="width: 70%"></div>
                                </div>
                              </td>
                              <td><span class="badge bg-warning">70%</span></td>
                            </tr>
                            <tr >
                              <td>1.</td>
                              <td>Foundation Day</td>
                              <td>06-12-2024</td>
                              <td >
                                <div class="progress progress-xs">
                                  <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
                                </div>
                              </td>
                              <td style="width: 10px"><span class="badge bg-danger" >55%</span></td>
                            </tr>
                            <tr>
                              <td>2.</td>
                              <td>Intramurals</td>
                              <td>07-18-2024</td>
                              <td>
                                <div class="progress progress-xs">
                                  <div class="progress-bar bg-warning" style="width: 70%"></div>
                                </div>
                              </td>
                              <td><span class="badge bg-warning">70%</span></td>
                            </tr>
                            <tr >
                              <td>1.</td>
                              <td>Foundation Day</td>
                              <td>06-12-2024</td>
                              <td >
                                <div class="progress progress-xs">
                                  <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
                                </div>
                              </td>
                              <td style="width: 10px"><span class="badge bg-danger" >55%</span></td>
                            </tr>
                            
                          </tbody>
                        </table>
                      </div>
                      
                    </div>

                    <div class="col-md-12">
                      <div class="row">
                        <div class="col-12">
                          <h3 class="card-title text-danger"><i class="fas fa-bullhorn"></i> Events you violated!</h3><br> <br>
                          <div class="card">
                            
                            <div class="card-body table-responsive p-0" style="height: 250px;">
                              <table class="table table-head-fixed text-nowrap">
                                <thead>
                                  <tr>
                                    <th>PolicyID</th>
                                    <th>EventID</th>
                                    <th>Date issued</th>
                                    <th>Issued by</th>
                                    <th></th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td>183</td>
                                    <td>03</td>
                                    <td>11-7-2014</td>
                                    <td>Leader</td>
                                    <td class="project-actions text-center">
                                      <a class="btn btn-primary btn-sm" href="#">
                                          <i class="fas fa-folder"> </i>
                                          View
                                      </a>              
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>219</td>
                                    <td>06</td>
                                    <td>11-7-2014</td>
                                    <td>Leader</td>
                                    <td class="project-actions text-center">
                                      <a class="btn btn-primary btn-sm" href="#">
                                          <i class="fas fa-folder">
                                          </i>
                                          View
                                      </a>
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                            <!-- /.card-body -->
                          </div>
                          <!-- /.card -->
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="history">

                    <h5>Violation History:</h5>
                    
                    <div class="card">
                      <table id="violation_history" class="table table-bordered table-hover">
                          <thead>
                            <tr>
                              <th>Policy</th>
                              <th>Rule Violated</th>
                              <th>Sanction imposed</th>
                              <th>Issued date</th>
                              <th>Issued by</th>
                              <th>Status</th>
                                
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td> Event that CiCS must be present</td>
                              <td>Attendance is a must</td>
                              <td>One notebook</td>
                              <td>04-26-2024</td>
                              <td>Arvy Baingan</td>
                              <td class="text-warning">Unsettled</td>

                            </tr>
                          </tbody>
                      </table>
                    </div>
                    <div class="col-md-12">
                      <div class="card card-default">
                        <div class="card-body">
                          <div class="chart"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                            <canvas id="lineChart1" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 763px;" width="763" height="250" class="chartjs-render-monitor"></canvas>
                          </div>
                        </div>
                        <!-- /.card-body -->
                      </div>
                      <!-- /.card -->
                    </div>
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="org">
                   
                    <h5>My organization(s): <br><br> <b>ACE </b><i><small>Alliance of Computer Enthusiast</small></i> | <b>President</b></h5>
                    
                    <table class="table table-striped projects">
                      <tbody>
                        <tr>
                            
                          <td>
                            <ul class="list-inline">
                              <li class="list-inline-item">
                                <img alt="Avatar" class="table-avatar" src="../assets/img/avatar/avatar.png">
                              </li>
                              <li class="list-inline-item">
                                <img alt="Avatar" class="table-avatar" src="../assets/img/avatar/avatar4.png">
                              </li>
                              <li class="list-inline-item">
                                <img alt="Avatar" class="table-avatar" src="../assets/img/avatar/avatar2.png">
                              </li>
                              <li class="list-inline-item">
                                <img alt="Avatar" class="table-avatar" src="../assets/img/avatar/avatar3.png">
                              </li>
                            </ul>
                          </td>
                            
                        </tr>
                      </tbody>
                    </table>

                    <div class="col-12">
                      <h6 class="text-danger"><i class="fas fa-bullhorn"></i> Officers on duty Violation:</h6>
                      <div class="card">
                        
                        <div class="card-body table-responsive p-0" style="height: 200px;">
                          <table class="table table-head-fixed text-nowrap">
                            <thead>
                              <tr>
                                <th>PolicyID</th>
                                <th>Organization</th>
                                <th>Date issued</th>
                                <th>Issued by</th>
                                <th>Status</th>
                                <th></th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>183</td>
                                <td>ACE</td>
                                <td>11-7-2014</td>
                                <td>Management</td>
                                <td>Unsettled</td>
                                <td class="project-actions text-center">
                                  <a class="btn btn-primary btn-sm" href="#">
                                      <i class="fas fa-folder"> </i>
                                      View
                                  </a>              
                                </td>
                              </tr>
                              <tr>
                                <td>219</td>
                                <td>ACE</td>
                                <td>11-10-2024</td>
                                <td>Org Adviser</td>
                                <td>Unsettled</td>
                                <td class="project-actions text-center">
                                  <a class="btn btn-primary btn-sm" href="#">
                                      <i class="fas fa-folder">
                                      </i>
                                      View
                                  </a>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                        <!-- /.card-body -->
                      </div>
                      <!-- /.card -->
                    </div>

                    <div class="col-12">
                      <h6 class="text-danger"><i class="fas fa-bullhorn"></i> Manage members: (Assigned Leader)</h6>
                      <div class="card">
                        <div class="card-body table-responsive p-0" style="height: 200px;">
                          <table class="table table-head-fixed text-nowrap">
                            <thead>
                              <tr>
                              <th>Event</th>
                              <th>Academic Year</th>
                                <th>Members Violated</th>
                                <th>Event Date</th>
                                <th></th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>Intramurals</td>
                                <td>Second Semester(2023-2024)</td>
                                <td>0</td>
                                <td>11-7-2024</td>
                                <td class="project-actions text-center">
                                  <a class="btn btn-primary btn-sm" href="#">
                                      <i class="fas fa-folder"> </i>
                                      View
                                  </a>              
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                        <!-- /.card-body -->
                      </div>
                      <!-- /.card -->
                    </div>

                  </div>
                  <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>


    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


<!-- ./wrapper -->

</body>



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