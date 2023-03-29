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
    <title>Employee Records - Top Touch Car Wash</title>
    <link rel="stylesheet" type="text/css" href="../resources/css/header.css">
    <link rel="stylesheet" type="text/css" href="../resources/css/admin/employeerecords.css">
</head>

<body>
    <?php
    include "../adminheader.php";
    $sql = "SELECT * FROM employees";
    $result = $connect->query($sql);
    ?>
    <main class="main-container">
        <?php if(isset($_SESSION['status'])){
            echo "<p class='alert-success'>" . $_SESSION['status'] . "</p>";
            unset($_SESSION['status']);
        } 
        ?>
        <table>
            <tr>
                <th>Emp Id</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>National Id</th>
                <th>Phone No</th>
                <th>Hire Date</th>
                <th></th>
            </tr>
            <?php 
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                echo "<tr>" .
                "<td>" . $row["emp_id"] . "</td>" .
                "<td>" . $row["first_name"] . "</td>" .
                "<td>" . $row["last_name"] . "</td>" .
                "<td>" . $row["national_id"] . "</td>" .
                "<td>" . $row["phone_no"] . "</td>" .
                "<td>" . $row["hire_date"] . "</td>" .
                "<td>" . "<a class='edit-btn' href='edit_employee.php?edit=" . $row['emp_id'] . "'>Edit</a>" . "</td>" .
                "</tr>";
                }
            }
            ?>
        </table>
    </main>
</body>


</html>