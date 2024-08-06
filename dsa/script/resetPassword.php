<?php
include('../../dbconfig/dbconn.php');

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $token = $_POST['token'];
    $newPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $current_time = date('Y-m-d H:i:s');

    $query = "SELECT userID FROM password_resets WHERE token = ? AND expires_at > ?";
    $stmt = $connection->prepare($query);

    if ($stmt === false) {

        $_SESSION['status'] = htmlspecialchars($connection->error);
        $_SESSION['status_code'] = "error";
        header('Location: ../login.php');
        exit();
    }

    $stmt->bind_param('ss', $token, $current_time);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        $userId = $user['userID'];

        $updatePasswordQuery = "UPDATE user_tbl SET faculty_password = ? WHERE userID = ?";
        $stmt = $connection->prepare($updatePasswordQuery);

        $stmt->bind_param('si', $newPassword, $userId);
        $stmt->execute();

        $deleteTokenQuery = "DELETE FROM password_resets WHERE token = ?";
        $stmt = $connection->prepare($deleteTokenQuery);

        $stmt->bind_param('s', $token);
        $stmt->execute();

        session_start();
        $_SESSION['status'] = "Your password has been successfully reset.";
        $_SESSION['status_code'] = "success";
        header('Location: ../login.php');
        
    } else {
        session_start();
        $_SESSION['status'] = "Invalid or expired token.";
        $_SESSION['status_code'] = "error";
        header('Location: ../login.php');
        exit();
    }
}
?>
