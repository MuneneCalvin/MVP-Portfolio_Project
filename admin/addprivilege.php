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
    <title>Add Privilege - Top Touch Car Wash</title>
    <link rel="stylesheet" type="text/css" href="../resources/css/header.css">
    <link rel="stylesheet" type="text/css" href="../resources/css/admin/addprivilege.css">
</head>

<body>
<?php
    include "../adminheader.php";

    if (isset($_POST["send"])) {
        $employeeId = $_POST["empid"];
        $username = $_POST["username"];
        $password = $_POST["password"];

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO privileges (emp_id, username, password) VALUES ('$employeeId', '$username', '$hashedPassword')";
        $result = mysqli_query($connect, $sql);

        if ($result) {
            $_SESSION['status'] = "Privileged user has been created successfully";
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
            <div class="title">Add Privilege</div>
            <form action="" method="POST" class="form">
               <div class="inputfield">
                    <label>Employee Id</label>
                    <input type="number" class="input" name="empid" placeholder="Employee Id" required/>
                </div>
                <div class="inputfield">
                    <label>New User Name</label>
                    <input type="text" class="input" name="username" placeholder="Username" required/>
                </div>
                <div class="inputfield">
                    <label>New Password</label>
                    <input type="text" class="input" name="password" placeholder="Password" required/>
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