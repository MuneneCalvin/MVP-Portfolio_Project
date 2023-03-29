<?php
include '../db_connect.php';
if(!isset($_SESSION["username"])) {
    header("location:../login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Records - Top Touch Car Wash</title>
    <link rel="stylesheet" type="text/css" href="../resources/css/header.css">
    <link rel="stylesheet" type="text/css" href="../resources/css/admin/paymentrecords.css">
</head>

<body>
    <?php
    include "../adminheader.php";
    $sql = "SELECT DATE(payments.paydate), payments.payment_id, payments.emp_id, employees.first_name, employees.last_name, DATE(payments.date_start), DATE(payments.date_end), payments.total_pay  FROM payments INNER JOIN employees ON payments.emp_id=employees.emp_id ORDER BY payment_id DESC";
    $result = $connect->query($sql);
    ?>
    <main>
        <table>
            <tr>
                <th>Pay Date</th>
                <th>Pay Id</th>
                <th>Emp Id</th>
                <th>Employee Name</th>
                <th>Period</th>
                <th>Total Pay</th>
            </tr>
            <?php 
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                echo "<tr>" .
                "<td>" . $row["DATE(payments.paydate)"] . "</td>" .
                "<td>" . $row["payment_id"] . "</td>" .
                "<td>" . $row["emp_id"] . "</td>" .
                "<td>" . $row["first_name"] . " " . $row["last_name"] ."</td>" .
                "<td>" . $row["DATE(payments.date_start)"] . " to " . $row["DATE(payments.date_end)"] ."</td>" .
                "<td>" . $row["total_pay"] . "/=" ."</td>" .
                "</tr>";
                }
            }
            ?>
        </table>
    </main>
</body>

</html>