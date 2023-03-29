<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services - Top Touch Car Wash</title>
    <link rel="stylesheet" type="text/css" href="resources/css/header.css">
    <link rel="stylesheet" type="text/css" href="resources/css/publicservices.css">
</head>

<body>
    <?php
    include "publicheader.php";
    include 'db_connect.php';
    $sql = "SELECT * FROM services";
    $result = $connect->query($sql);
    ?>
    <main class="main-container">
        <table>
            <tr>
                <th>Service No</th>
                <th>Name</th>
                <th>Description</th>
                <th>Cost</th>
            </tr>
            <?php 
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                echo "<tr>" .
                "<td>" . $row["service_no"] . "</td>" .
                "<td>" . $row["name"] . "</td>" .
                "<td>" . $row["description"] . "</td>" .
                "<td>" . $row["cost"] . "</td>" .
                "</tr>";
                }
            }
            ?>
        </table>
    </main>
</body> 

</html>