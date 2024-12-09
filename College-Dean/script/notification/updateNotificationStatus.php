<?php
include('../../sessions.php');

if (isset($_POST['notification_id'])) {
    $notificationID = $_POST['notification_id'];

    // Update query to set notification status as 'read'
    $query = "UPDATE notification_tbl SET notif_Status = 1 WHERE notifID = ?";
    
    // Prepare and execute the statement
    $stmt = $connection->prepare($query);
    $stmt->bind_param('i', $notificationID);
    if ($stmt->execute()) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'error' => $stmt->error]);
    }

    // Close statement and connection
    $stmt->close();
    $connection->close();
} else {
    echo json_encode(['success' => false, 'error' => 'No notification ID provided']);
}
?>
