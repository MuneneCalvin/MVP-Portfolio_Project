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
    <title>View Commissions - Top Touch Car Wash</title>
    <link rel="stylesheet" type="text/css" href="../resources/css/header.css">
    <link rel="stylesheet" type="text/css" href="../resources/css/admin/viewcommissions.css">
</head>

<body>
<?php
    include "../adminheader.php";
    $sql = "SELECT billing.date_time, billing.bill_id, cars.plate_no, billing.emp_id, employees.first_name, employees.last_name, billing.total_cost, billing.commission  FROM billing INNER JOIN cars ON billing.car_id=cars.car_id INNER JOIN employees ON billing.emp_id=employees.emp_id ORDER BY bill_id DESC";
    $result = $connect->query($sql);
    ?>
    <main>
        <table>
            <tr>
                <th>Date Time</th>
                <th>Bill Id</th>
                <th>Plate No</th>
                <th>Emp Id</th>
                <th>Name</th>
                <th>Total</th>
                <th>Commission</th>
            </tr>
            <?php 
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                echo "<tr>" .
                "<td>" . $row["date_time"] . "</td>" .
                "<td>" . $row["bill_id"] . "</td>" .
                "<td>" . $row["plate_no"] . "</td>" .
                "<td>" . $row["emp_id"] . "</td>" .
                "<td>" . $row["first_name"] . " " . $row["last_name"] ."</td>" .
                "<td>" . $row["total_cost"] . "/=" ."</td>" .
                "<td>" . $row["commission"] . "/=" ."</td>" .
                "</tr>";
                }
            }
            ?>
        </table>
    </main>
</body>

</html>