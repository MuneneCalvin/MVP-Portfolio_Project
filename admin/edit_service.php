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
    <title>Edit Services - Top Touch Car Wash</title>
    <link rel="stylesheet" type="text/css" href="../resources/css/header.css">
    <link rel="stylesheet" type="text/css" href="../resources/css/admin/edit_services.css">
</head>

<body>
    <?php
    include "../adminheader.php";

    if (isset($_GET['edit'])) {
        $service_id = $_GET['edit'];
        $sql = "SELECT * FROM services WHERE service_id=$service_id";
        $result = mysqli_query($connect, $sql);

        while($row = mysqli_fetch_array($result)) {
        $serviceNo = $row["service_no"];
        $name = $row["name"];
        $description = $row["description"];
        $cost = $row["cost"];
        }   
    }

    if (isset($_POST["update"])) {
        $service_id = $_POST["serviceid"];
        $serviceNo = $_POST["serviceno"];
        $name = $_POST["name"];
        $description = $_POST["description"];
        $cost = $_POST["cost"];

        $sql = "UPDATE services SET service_no='$serviceNo', name='$name', description='$description', cost=$cost WHERE service_id= $service_id";
        $result = mysqli_query($connect, $sql);

        if ($result) {
            $_SESSION['status'] = "Record has been updated successfully";
            header("location:services.php");
        } else {
            die($mysqli -> error);
        }
    }

    ?>
    <main>
        <div class="register">
            <div class="title">Edit Service</div>
            <form action="" method="POST" class="form">
                <input type="hidden" name="serviceid" value="<?php echo $service_id ?>"/>
                <div class="inputfield">
                    <label>Service No</label>
                    <input type="number" class="input" name="serviceno" value="<?php echo $serviceNo ?>" placeholder="Service No" required/>
                </div>
                <div class="inputfield">
                    <label>Name</label>
                    <input type="text" class="input" name="name" value="<?php echo $name ?>" placeholder="Service Name" required/>
                </div>
                <div class="inputfield">
                    <label>Description</label>
                    <input type="text" class="input" name="description" value="<?php echo $description ?>" placeholder="Description" required/>
                </div>
                <div class="inputfield">
                    <label>Cost</label>
                    <input type="number" class="input" name="cost" value="<?php echo $cost ?>" placeholder="Cost" required/>
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