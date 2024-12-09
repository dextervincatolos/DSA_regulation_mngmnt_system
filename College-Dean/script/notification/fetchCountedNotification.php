<?php
include('../../sessions.php');

$uid = $_SESSION['uid'];
$deptID =$_SESSION['department'];
$sql = "SELECT COUNT(*) AS unreadNotification FROM notification_tbl WHERE notif_Status = 0 AND deptID = $deptID AND userID = $uid";
$result = $connection->query($sql);
$notification = $result->fetch_assoc()['unreadNotification'];

// Return the data as JSON
header('Content-Type: application/json');
echo json_encode([
    'notification' => $notification
]);

$connection->close();
?>





