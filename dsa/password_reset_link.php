<?php
include('../dbconfig/dbconn.php'); // Include your database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $identifier = $_POST['identifier'];
    $token = bin2hex(random_bytes(16)); // Generate a unique token
    $expiry = date("Y-m-d H:i:s", strtotime('+1 hour')); // Token expires in 1 hour

    // Find the user by email or contact number
    $query = "SELECT userID, faculty_email, faculty_contact FROM user_tbl WHERE faculty_email = ? OR faculty_contact = ?";
    $stmt = $connection->prepare($query);
    $stmt->bind_param('ss', $identifier, $identifier);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        $userId = $user['userID'];

        // Store the token in the database
        $insertTokenQuery = "INSERT INTO password_resets (userID, token, expires_at) VALUES (?, ?, ?)";
        $stmt = $connection->prepare($insertTokenQuery);
        $stmt->bind_param('iss', $userId, $token, $expiry);
        $stmt->execute();

        // Display the reset link (for localhost)
        $resetLink = "reset_password.php?token=" . $token;
        echo "<h5>Click the following link to reset your password:</h5><h4><a  href='$resetLink'>Reset Password Link</a> </h4>";
    } else {
        echo '
        <h5 class="text-danger"> No user found with that email or contact number.</h5>
        <a href="login.php"> Go back to Login page</a>
        ';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SJCBI_DSA | Reset password</title>

  <link href="../assets/img/school-logo.png" rel="icon">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../assets/css/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../assets/css/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../assets/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">


<!-- jQuery -->
<script src="../assets/js/jquery/jquery.min.js"></script>

<!-- Bootstrap 4 -->
<script src="../assets/js/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../assets/js/adminlte.js"></script>
</body>
</html>
