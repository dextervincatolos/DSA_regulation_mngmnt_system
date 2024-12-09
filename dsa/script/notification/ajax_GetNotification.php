<script>
    // Global variable to store the interval ID
    var notificationInterval;


    // Function to load notifications via AJAX
    function loadNotification() {
        $.ajax({
            url: 'script/notification/fetchNotification.php',
            method: 'GET',
            dataType: 'json',
            success: function (response) {
                var data = response.data;
                var prefect = response.prefect;

                var notifications = '';
                var modals = '';

                if (data.length === 0) {
                    notifications = `
                        <div class="media">
                            <div class="media-body text-danger text-center m-3">
                                <h3 class="dropdown-item-title">
                                    - No unread Notification -
                                </h3>
                            </div>
                        </div>
                        <div class="dropdown-divider"></div>
                    `;
                } else {
                    data.forEach(function (notification) {
                        // Generate notification item
                        notifications += `
                            <a href="#" class="dropdown-item" data-toggle="modal" data-target="#viewMessage${notification.notifID}" data-id="${notification.notifID}">
                                <!-- Message Start -->
                                <div class="media">
                                    <img src="../assets/img/item_req1.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                                    <div class="media-body">
                                        <h3 class="dropdown-item-title text-bold">New Violation Report</h3>
                                        <p class="text-sm">${notification.notif_Content}</p>
                                        <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> ${notification.created_at}</p>
                                    </div>
                                </div>
                                <!-- Message End -->
                            </a>
                            <div class="dropdown-divider"></div>
                        `;

                        // Generate modal structure separately
                        modals += `
                            <div class="modal fade" id="viewMessage${notification.notifID}" tabindex="-1" role="dialog" aria-labelledby="viewMessageModalLabel${notification.notifID}" aria-hidden="true" data-backdrop="false">
                                <div class="modal-dialog modal-xl" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title text-warning" id="viewMessageModalLabel${notification.notifID}">
                                                <i class="fa fa-file"> </i>
                                                Violation Report
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body text-dark">
                                            <!-- Put your modal body content here -->
                                            
                                            <div class="col-md-12 mt-2">
                                                <div class="container row  text-center">
                                                    <div class="col-md-4 schoolLogo">
                                                        <img src="../assets/img/school-logo.png" alt="School-logo" width="20%">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <p class="formHead text-sm"> Tuguegarao Archdiocesan Schools System</p>
                                                        <h5 class="formSchoolname">Saint Joseph's College of Baggao, Inc.</h5>
                                                        <p class="text-sm">Baggao Cagayan Philippines</p>
                                                        <p class="formVision">Transforming Lives, Shaping the Future</p>
                                                    </div>
                                                    
                                                    <div class="col-md-4 schoolsysLogo">
                                                        <img src="../assets/img/archdiocesan-logo.png" alt="School-logo"  width="20%">
                                                    </div>
                                                </div>

                                                <h4 class="text-center text-lg">${notification.policy_type == '0' ? 'MINOR' : 'MAJOR'} OFFENSE NOTIFICATION FORM</h4>
                                                <table class="table">
                                                    <tr>
                                                        <td width="70%" rowspan="2" style=" border: none;">
                                                           <p class="text-right"> Date:</p>
                                                        </td>
                                                        <td style=" border:none; border-bottom: 1px solid black; text-right"></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                    </tr>
                                                </table>
                                                <table class="table">
                                                    <tr>
                                                        <td width="50%" style=" border: 1px solid black;">
                                                            NAME OF STUDENT: </br>
                                                            ${notification.student_fname} ${notification.student_mname.charAt(0)}. ${notification.student_lname} ${notification.student_extname}
                                                        </td>
                                                        <td width="50%" style=" border: 1px solid black;">
                                                            GRADE/STRAND: </br>
                                                            ${notification.dept_desc} (${notification.dept_name})
                                                        </td>
                                                    </tr>
                                                </table>
                                                <table class="table">
                                                    <tr class="text-center" style=" border: 1px solid black;">
                                                        <td width="50%" style=" border: 1px solid black;">Violation/Offence</td>
                                                         <td width="20%" style=" border: 1px solid black;">Date</td>
                                                        <td width="30%" style=" border: 1px solid black;">Reported By</td>
                                                    </tr>
                                                    <tr>
                                                        <td style=" border: 1px solid black;">${notification.policy_title}</br><i class="ml-5"> - ${notification.sanction}</i></td>
                                                         <td style=" border: 1px solid black;">${notification.created_at}</td>
                                                        <td style=" border: 1px solid black;">${notification.violation_added_by}</td>
                                                    </tr>
                                                    
                                                </table>
                                                <table class="table">
                                                    <tr>
                                                        <td colspan="7" style=" border: none; border-left: 1px solid black; border-right: 1px solid black; border-top: 1px solid black; font-de:italic"><i>Reviewed & Evaluated by:</i></td>
                                                    </tr>
                                                   
                                                    <tr class="signatories" style="border: none;">
                                                        <td style=" border: none; border-left: 1px solid black;"></td>
                                                        <td style=" border: none; ">${prefect.faculty_fname} ${prefect.faculty_mname.charAt(0)}. ${prefect.faculty_lname} ${prefect.faculty_extname || ''}</td>
                                                        <td style=" border: none; "></td>
                                                        <td style=" border: none; ">${notification.dean_fname} ${notification.dean_mname.charAt(0)}. ${notification.dean_lname} ${notification.dean_extname}</td>
                                                        <td style=" border: none; "></td>
                                                        <td style=" border: none; ">${notification.violation_status == 'Open' ? '' : notification.updated_at }</td>
                                                        <td style=" border: none; border-right: 1px solid black;"></td>
                                                    </tr>
                                                    <tr class="text-center" style="border: none; border-bottom: 1px solid black;">
                                                        <td style=" border: none; border-left: 1px solid black;"></td>
                                                        <td style=" border: none; border-top: 1px solid black;">Prefect Of Discipline</td>
                                                        <td style=" border: none; "></td>
                                                        <td style=" border: none; border-top: 1px solid black;">Principal</td>
                                                        <td style=" border: none; "></td>
                                                        <td style=" border: none; border-top: 1px solid black;">Date</td>
                                                        <td style=" border: none; border-right: 1px solid black;"></td>
                                                    </tr>
                                                   
                                                    
                                                </table>
                                            <p><i>Office of the Student Affairs</i></p>

                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        `;
                    });
                }

                // Update the notification dropdown content
                $('#notification').html(notifications);

                // Update the separate modal container with new modals
                $('#modalContainer').html(modals);
            }
        });
    }

    function countNotification() {
        $.ajax({
            url: 'script/notification/fetchCountedNotification.php',
            method: 'GET',
            dataType: 'json',
            success: function (data) {
                // Update the numbers in the info-boxes
                $('#notifCount').text(data.notification);

                if (data.notification == 0) {
                $('#notifCount').hide();  // Hide the badge
            } else {
                $('#notifCount').show();  // Show the badge
            }
            
            },
            error: function (xhr, status, error) {
                console.error("Error fetching data: " + status + " " + error);
            }
        });
    }

   
    // Function to start the auto-refresh
    function startNotificationAutoRefresh() {
        notificationInterval = setInterval(loadNotification, 5000); // Auto-refresh every 3 seconds
    }

    // Function to stop the auto-refresh
    function stopNotificationAutoRefresh() {
        clearInterval(notificationInterval);
    }

    // Initial load of notifications and start the auto-refresh
    loadNotification();
    countNotification(); // Initial count load
    startNotificationAutoRefresh();

    // Use event delegation to handle click events on dynamically generated elements
    $(document).on('click', '.dropdown-item[data-toggle="modal"]', function (e) {
        e.preventDefault(); // Prevent default action of the <a> tag
        var notificationID = $(this).data('id'); // Get the notification ID
        var targetModal = $(this).data('target');

        $.ajax({
            url: 'script/notification/updateNotificationStatus.php',
            method: 'POST',
            data: { notification_id: notificationID },
            success: function (response) {
                var result = JSON.parse(response);
                if (result.success) {
                    console.log('Notification status updated successfully');
                } else {
                    console.log('Failed to update notification status: ' + result.error);
                }
            },
            error: function () {
                console.error('Error in updating notification status');
            }
        });


        $(targetModal).modal('show');
    });

    // Stop auto-refresh when any modal is opened
    $(document).on('shown.bs.modal', '.modal', function () {
        stopNotificationAutoRefresh();
    });

    // Restart auto-refresh when any modal is closed
    $(document).on('hidden.bs.modal', '.modal', function () {
        startNotificationAutoRefresh();
    });
</script>
