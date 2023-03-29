<?php
include "../db_connect.php";
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
    <title>Add Employee - Top Touch Car Wash</title>
    <link rel="stylesheet" type="text/css" href="../resources/css/header.css">
    <link rel="stylesheet" type="text/css" href="../resources/css/admin/addemployee.css">
</head>

<body>
    <?php
    include "../adminheader.php";

    if (isset($_POST["send"])) {
        $firstName = $_POST["firstname"];
        $lastName = $_POST["lastname"];
        $nationalId = $_POST["nationalid"];
        $phoneNo = $_POST["phoneno"];
        $hireDate = $_POST["hiredate"];

        $sql = "INSERT INTO employees (first_name, last_name, national_id, phone_no, hire_date) VALUES ('$firstName', '$lastName', '$nationalId', '$phoneNo', '$hireDate')";
        $result = mysqli_query($connect, $sql);

        if ($result) {
            $_SESSION['status'] = "Record has been added successfully";
        } else {
            die($mysqli -> error);
        }
    }
    ?>
    <main>
        <?php if(isset($_SESSION['status'])){
            echo "<p class='alert-success'>" . $_SESSION['status'] . "</p>";
            unset($_SESSION['status']);
        } 
        ?>
        <div class="register">
            <div class="title">Add Employee</div>
            <form action="" method="POST" class="form">
                <div class="inputfield">
                    <label>First Name</label>
                    <input type="text" class="input" name="firstname" placeholder="First Name" required/>
                </div>
                <div class="inputfield">
                    <label>Last Name</label>
                    <input type="text" class="input" name="lastname" placeholder="Last Name" required/>
                </div>
                <div class="inputfield">
                    <label>National ID</label>
                    <input type="number" class="input" name="nationalid" placeholder="ID No" required/>
                </div>
                <div class="inputfield">
                    <label>Phone No</label>
                    <input type="number" class="input" name="phoneno" placeholder="Phone No" required/>
                </div>
                <div class="inputfield">
                    <label>Hire Date</label>
                    <input type="date" class="input" name="hiredate" placeholder="mm/dd/yyyy" required/>
                </div>
                <div class="inputBtn">
                    <input type="submit" value="Send" class="btn" name="send" />
                    <input type="reset" value="Clear" class="btn" />
                </div>
            </form>
        </div>
    </main>
</body>

</html>