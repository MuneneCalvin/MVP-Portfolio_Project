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
    <title>Edit Employee - Top Touch Car Wash</title>
    <link rel="stylesheet" type="text/css" href="../resources/css/header.css">
    <link rel="stylesheet" type="text/css" href="../resources/css/admin/edit_employee.css">
</head>

<body>
    <?php
    include "../adminheader.php";

    if (isset($_GET['edit'])) {
        $empId = $_GET['edit'];
        $sql = "SELECT * FROM employees WHERE emp_id=$empId";
        $result = mysqli_query($connect, $sql);

        while($row = mysqli_fetch_array($result)) {
        $empId = $row["emp_id"];
        $firstName = $row["first_name"];
        $lastName = $row["last_name"];
        $nationalId = $row["national_id"];
        $phoneNo = $row["phone_no"];
        $hireDate = $row["hire_date"];
        }   
    }

    if (isset($_POST["update"])) {
        $empId = $_POST["empId"];
        $firstName = $_POST["firstName"];
        $lastName = $_POST["lastName"];
        $nationalId = $_POST["nationalId"];
        $phoneNo = $_POST["phoneNo"];
        $hireDate = $_POST["hireDate"];

        $sql = "UPDATE employees SET emp_id='$empId', first_name='$firstName', last_name='$lastName', national_id=$nationalId, phone_no='$phoneNo', hire_date='$hireDate' WHERE emp_id= $empId";
        $result = mysqli_query($connect, $sql);

        if ($result) {
            $_SESSION['status'] = "Record has been updated successfully";
            header("location:employeerecords.php");
        } else {
            die($mysqli -> error);
        }
    }

    ?>
    <main>
        <div class="register">
            <div class="title">Edit Employee</div>
            <form action="" method="POST" class="form">
                <input type="hidden" name="empId" value="<?php echo $empId ?>"/>
                <div class="inputfield">
                    <label>First Name</label>
                    <input type="text" class="input" name="firstName" value="<?php echo $firstName ?>" placeholder="First Name" required/>
                </div>
                <div class="inputfield">
                    <label>Last Name</label>
                    <input type="text" class="input" name="lastName" value="<?php echo $lastName ?>" placeholder="Last Name" required/>
                </div>
                <div class="inputfield">
                    <label>National Id</label>
                    <input type="number" class="input" name="nationalId" value="<?php echo $nationalId ?>" placeholder="National Id" required/>
                </div>
                <div class="inputfield">
                    <label>Phone No</label>
                    <input type="number" class="input" name="phoneNo" value="<?php echo $phoneNo ?>" placeholder="Phone No" required/>
                </div>
                <div class="inputfield">
                    <label>Hire date</label>
                    <input type="date" class="input" name="hireDate" value="<?php echo $hireDate ?>" placeholder="mm/dd/yyyy" required/>
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