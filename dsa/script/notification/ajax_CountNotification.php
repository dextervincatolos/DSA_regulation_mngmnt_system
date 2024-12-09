<script>
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

    // Call function every 3 seconds to auto-refresh
    setInterval(countNotification, 3000);

    // Initial load
    countNotification();
</script>
