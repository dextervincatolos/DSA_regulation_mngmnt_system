<?php
include('../sessions.php');
$deptID =$_SESSION['department'];

header('Content-Type: application/json');

$today = date('Y-m-d');

function getCountFromQuery($connection, $query) {
    $result = $connection->query($query);
    if ($result) {
        $row = $result->fetch_assoc();
        return $row ? $row['count'] : 0;
    } else {
        return 0;
    }
}

$daily_query = "SELECT COUNT(*) AS count
                FROM violation_tbl
                JOIN student_tbl ON violation_tbl.studID = student_tbl.studID 
                
                WHERE student_tbl.college = $deptID AND DATE(created_at) = '$today' AND violation_status = 'Open'";
$daily_count = getCountFromQuery($connection, $daily_query);

$weekly_query = "SELECT COUNT(*) AS count
                 FROM violation_tbl
                 JOIN student_tbl ON violation_tbl.studID = student_tbl.studID 
                 WHERE student_tbl.college = $deptID AND YEARWEEK(created_at, 0) = YEARWEEK('$today', 0)  AND violation_status = 'Open'";
$weekly_count = getCountFromQuery($connection, $weekly_query);

$monthly_query = "SELECT COUNT(*) AS count
                  FROM violation_tbl
                  JOIN student_tbl ON violation_tbl.studID = student_tbl.studID 
                  WHERE student_tbl.college = $deptID AND DATE_FORMAT(created_at, '%Y-%m') = DATE_FORMAT(NOW(), '%Y-%m') AND violation_status = 'Open'";
$monthly_count = getCountFromQuery($connection, $monthly_query);

$alltime_query = "SELECT COUNT(*) AS count
                  FROM violation_tbl
                  JOIN student_tbl ON violation_tbl.studID = student_tbl.studID 
                  WHERE student_tbl.college = $deptID ";
                  
$alltime_count = getCountFromQuery($connection, $alltime_query);

$connection->close();

// Return counts as JSON
echo json_encode([
    'daily_count' => $daily_count,
    'weekly_count' => $weekly_count,
    'monthly_count' => $monthly_count,
    'alltime_count' => $alltime_count
]);

?>
