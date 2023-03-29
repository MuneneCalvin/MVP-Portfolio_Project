<?php
 if (isset($startDate) && isset($endDate)) {


$totalCh3 = array();
for ($i=0; $i < 12 ; $i++) {
    $sql = "SELECT MONTH(billing.date_time), billing.total_cost FROM billing WHERE YEAR(billing.date_time) = YEAR('$startDate') AND MONTH(billing.date_time) = $i+1";
    $result = mysqli_query($connect, $sql);
    $totalCh3[$i] = 0;
    while($row = $result->fetch_assoc()) {
        $totalCh3[$i] += $row['total_cost'];

    } 
}

} else {


    $totalCh3 = array();
    for ($i=0; $i < 12 ; $i++) {
    $sql = "SELECT MONTH(billing.date_time), billing.total_cost FROM billing WHERE YEAR(billing.date_time) = YEAR('$defaultDate') AND MONTH(billing.date_time) = $i+1";
    $result = mysqli_query($connect, $sql);
    $totalCh3[$i] = 0;
    while($row = $result->fetch_assoc()) {
        $totalCh3[$i] += $row['total_cost'];

    } 
    }
}

?>


