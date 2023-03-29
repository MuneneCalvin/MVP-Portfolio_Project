<?php

require 'db_connect.php';

if($_SERVER["REQUEST_METHOD"]=="POST") {
    $username=$_POST["username"];
    $password=$_POST["password"];

    $stmt = $connect->prepare("SELECT * FROM privileges WHERE username = ?");
    $stmt->bind_param("s", $username);
    
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($privilegeId, $empId, $uname, $pw, $userType);
    // $row=$stmt->fetch();

    if ($stmt->num_rows == 1) {
        $stmt->fetch();
        if (password_verify($password, $pw)) {
            if($userType=="user")
            {	
            $_SESSION["username"]=$username;

            header("location:user/home.php");
            }

            elseif($userType=="admin")
            {
            $_SESSION["username"]=$username;
            
            header("location:admin/home.php");
            }

            else
            {
            echo "<p class='errormsg'>error loging in</p>";
            }
        } else {
            echo "<p class='errormsg'>username or password incorrect!</p>";
        }
    } else {
        echo "<p class='errormsg'>username or password incorrect!</p>";
    }
    
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Top Touch</title>
    <link rel="stylesheet" href="resources/css/login.css">
</head>

<body>
    <main>
        <form action = "#" method = "POST">
            <div class="logo-container"><a href="index.php"><img class="logo" src="resources/images/squarelogo.png"
                        alt="a photo of a water droplet with a car inside it and the words top touch carwash beside it"></a>
            </div>
            <div class="form-input"><label for="username"><input type="text" class="login-text-input" name="username" required
                        placeholder="Username"></label></div>
            <div class="form-input"><label for="password"><input type="password" class="login-text-input" name="password" required
                        placeholder="Password"></label>
            </div>
            <div class="form-iput submit-button"><input type="submit" class="form-submit-button" name="submit-button"></div>
        </form>
    </main>
</body>

</html>