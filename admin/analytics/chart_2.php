<?php
 if (isset($startDate) && isset($endDate)) {

$hourCh2 = array();
$totalCh2 = array();
for ($i=0; $i < 24 ; $i++) {
    $sql = "SELECT HOUR(billing.date_time), billing.total_cost FROM billing WHERE DAY(billing.date_time) = DAY('$startDate') AND HOUR(billing.date_time) = $i";
    $result = mysqli_query($connect, $sql);
    $hourCh2[$i] = $i;
    $totalCh2[$i] = 0;
    while($row = $result->fetch_assoc()) {
        $totalCh2[$i] += $row['total_cost'];
    } 
}

} else {


$hourCh2 = array();
$totalCh2 = array();
for ($i=0; $i < 24 ; $i++) {
    $sql = "SELECT HOUR(billing.date_time), billing.total_cost FROM billing WHERE DAY(billing.date_time) = DAY('$defaultDate') AND HOUR(billing.date_time) = $i";
    $result = mysqli_query($connect, $sql);
    $hourCh2[$i] = $i;
    $totalCh2[$i] = 0;
    while($row = $result->fetch_assoc()) {
        $totalCh2[$i] += $row['total_cost'];
    } 
}
}
?>