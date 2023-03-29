<?php
//FOR COUNTING THE NUMBER OF EMPLOYEE RECORDS AND STORING THEIR UNIQUE DETAILS
$empCounter = 0;
$empId = array();
$empFirstName = array();
$empLastName = array();
$empNoBills = array();
$sql = "SELECT * FROM employees" ;
$result = mysqli_query($connect, $sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $empCounter ++;
        array_push($empId, $row['emp_id']);
        array_push($empFirstName, $row['first_name']);
        array_push($empLastName, $row['last_name']);
    }
}

if (isset($startDate) && isset($endDate)) {

//FOR COUNTING THE NUMBER OF BILLS UNDER EACH EMPLOYEE

for ($i=0; $i<$empCounter; $i++) {
$billCounter = 0;
$sql = "SELECT * FROM billing WHERE billing.emp_id = '$empId[$i]' AND DATE(billing.date_time) BETWEEN '$startDate' AND '$endDate'";
$result = mysqli_query($connect, $sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $billCounter ++;
    }
    array_push($empNoBills, $billCounter);
} else {
    array_push($empNoBills, 0);
}
}

} else {

for ($i=0; $i<$empCounter; $i++) {
    $billCounter = 0;
    $sql = "SELECT * FROM billing WHERE billing.emp_id = '$empId[$i]'" ;
    $result = mysqli_query($connect, $sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $billCounter ++;
        }
        array_push($empNoBills, $billCounter);
    } else {
        array_push($empNoBills, 0);
    }
    }
}



?>

