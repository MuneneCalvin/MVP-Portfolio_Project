<?php
include '../db_connect.php';
if(!isset($_SESSION["username"])){
    header("location:../login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Records - Top Touch Car Wash</title>
    <link rel="stylesheet" type="text/css" href="../resources/css/header.css">
    <link rel="stylesheet" type="text/css" href="../resources/css/user/customerrecords.css">
</head>

<body>
    <?php
    include "../userheader.php";
    $sql = "SELECT * FROM cars";
    $result = $connect->query($sql);
    ?>
    <main class="main-container">
        <table>
            <tr>
                <th>Plate No</th>
                <th>Model</th>
                <th>Colour</th>
                <th>Owner's Name</th>
                <th>Phone No</th>
                <th>Date Added</th>
            </tr>
            <?php 
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                echo "<tr>" .
                "<td>" . $row["plate_no"] . "</td>" .
                "<td>" . $row["model"] . "</td>" .
                "<td>" . $row["colour"] . "</td>" .
                "<td>" . $row["owner_name"] . "</td>" .
                "<td>" . $row["phone_no"] . "</td>" .
                "<td>" . $row["date_added"] . "</td>" .
                "</tr>";
                }
            }
            ?>
        </table>
    </main>
</body>

</html>