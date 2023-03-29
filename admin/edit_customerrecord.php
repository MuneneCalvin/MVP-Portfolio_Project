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
    <title>Edit Customer Record - Top Touch Car Wash</title>
    <link rel="stylesheet" type="text/css" href="../resources/css/header.css">
    <link rel="stylesheet" type="text/css" href="../resources/css/admin/edit_customerrecord.css">
</head>

<body>
    <?php
    include "../adminheader.php";

    if (isset($_GET['edit'])) {
        $carId = $_GET['edit'];
        $sql = "SELECT * FROM cars WHERE car_id=$carId";
        $result = mysqli_query($connect, $sql);

        while($row = mysqli_fetch_array($result)) {
        $carId = $row["car_id"];
        $plateNo = $row["plate_no"];
        $model = $row["model"];
        $colour = $row["colour"];
        $ownerName = $row["owner_name"];
        $phoneNo = $row["phone_no"];
        }   
    }

    if (isset($_POST["update"])) {
        $carId = $_POST["carId"];
        $plateNo = $_POST["plateNo"];
        $model = $_POST["model"];
        $colour = $_POST["colour"];
        $ownerName = $_POST["ownerName"];
        $phoneNo = $_POST["phoneNo"];

        $sql = "UPDATE cars SET plate_no='$plateNo', model='$model', colour='$colour', owner_name='$ownerName', phone_no='$phoneNo' WHERE car_id= '$carId'";
        $result = mysqli_query($connect, $sql);

        if ($result) {
            $_SESSION['status'] = "Record has been updated successfully";
            header("location:customerrecords.php");
        } else {
            die($mysqli -> error);
        }
    }

    ?>
    <main>
        <div class="register">
            <div class="title">Edit Customer</div>
            <form action="" method="POST" class="form">
                <input type="hidden" name="carId" value="<?php echo $carId ?>"/>
                <div class="inputfield">
                    <label>Plate No</label>
                    <input type="text" class="input" name="plateNo" value="<?php echo $plateNo ?>" placeholder="Plate No" required/>
                </div>
                <div class="inputfield">
                    <label>Model</label>
                    <input type="text" class="input" name="model" value="<?php echo $model ?>" placeholder="Model" required/>
                </div>
                <div class="inputfield">
                    <label>colour</label>
                    <input type="text" class="input" name="colour" value="<?php echo $colour ?>" placeholder="Colour" required/>
                </div>
                <div class="inputfield">
                    <label>Owner Name</label>
                    <input type="text" class="input" name="ownerName" value="<?php echo $ownerName ?>" placeholder="Owner's Name" required/>
                </div>
                <div class="inputfield">
                    <label>Phone No</label>
                    <input type="number" class="input" name="phoneNo" value="<?php echo $phoneNo ?>" placeholder="Phone No" required/>
                </div>
                <div class="inputBtn">
                    <input type="submit" value="Update" class="btn" name="update" />
                    <input type="reset" value="Clear" class="btn" />
                </div>
            </form>
        </div>
    </main>
</body>
 
</html>