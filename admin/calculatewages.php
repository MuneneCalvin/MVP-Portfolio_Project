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
    <title>Calculate Wages - Top Touch Car Wash</title>
    <link rel="stylesheet" type="text/css" href="../resources/css/header.css">
    <link rel="stylesheet" type="text/css" href="../resources/css/admin/calculatewages.css">
</head>

<body>
    <?php
    include "../adminheader.php";
    if(isset($_POST['calculate'])) {
        $paydate = $_POST['paydate'];
        $empId = $_POST['empid'];
        $startDate = $_POST['startdate'];
        $endDate = $_POST['enddate'];

        $sql = "SELECT * FROM billing WHERE emp_id='$empId' AND DATE(date_time)
        BETWEEN '$startDate' AND '$endDate'";
        $result = mysqli_query($connect, $sql);
        
        //CALCULATING COMMISSION
        $commission = 0;
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $value = $row['commission'];
                $commission += $value;
            }
        }

        $sql = "SELECT * FROM employees WHERE emp_id='$empId'";
        $result = mysqli_query($connect, $sql);
        $row = $result->fetch_assoc();

        $_SESSION['empid'] = $empId;
        $_SESSION['firstname'] = $row['first_name'];
        $_SESSION['lastname'] = $row['last_name'];
        $_SESSION['natid'] = $row['national_id'];
        $_SESSION['phoneno'] = $row['phone_no'];
        $_SESSION['paydate'] = $paydate;
        $_SESSION['startdate'] = $startDate;
        $_SESSION['enddate'] = $endDate;

        $_SESSION['commission'] = $commission;
        $_SESSION['confirm'] = $commission;
    }

    //SENDING PAYMENT INFO TO DATABASE
    if(isset($_POST['confirm'])) {
        $empId = $_POST['empid'];
        $startDate = $_POST['startdate'];
        $endDate = $_POST['enddate'];
        $payDate = $_POST['paydate'];
        $commission = $_POST['commission'];

        $sql = "INSERT INTO payments (emp_id, date_start, date_end, paydate, total_pay) VALUES ('$empId', '$startDate', '$endDate', '$payDate', '$commission')";
        $result = mysqli_query($connect, $sql) or die($mysqli -> error);

        $_SESSION['status'] = "Payment Record Saved"; 
    }
    ?>


    
    <main>
        <?php 
        
        if(isset($_SESSION['confirm'])){
            echo "<table class='invoice-table'>";
                echo "<tr>" .
                "<th>RESULTS:</th>" .
                "</tr>";
                echo "<tr>" .
                "<td>" . "National Id: " . $_SESSION['natid'] . "</td>" .
                "</tr>" .
                "<tr>" .
                "<td>" . "Name : " . $_SESSION['firstname'] . " " .$_SESSION['lastname'] . "</td>" .
                "</tr>" . 
                "<tr>" . 
                "<td>" . "Phon No: " . $_SESSION['phoneno'] . "</td>" .
                "</tr>" . 
                "<tr>" . 
                "<td>" . "Date Between: " . $_SESSION['startdate'] . " and " . $_SESSION['enddate'] . "</td>" .
                "</tr>" . 
                "<tr>" . 
                "<td>" . "TOTAL PAY: " .$_SESSION['commission'] . "/=" . "</td>" .
                "</tr>";  
            echo "</table>";
            $empId = $_SESSION['empid'];
            $startDate = $_SESSION['startdate'];
            $endDate = $_SESSION['enddate'];
            $paydate = $_SESSION['paydate'];
            $commission = $_SESSION['commission'];
            echo "<form action='#' method='POST' class='confirm-form'>";
            echo "<input type='hidden' value='$empId' name='empid' />";
            echo "<input type='hidden' value='$startDate' name='startdate' />";
            echo "<input type='hidden' value='$endDate' name='enddate' />";
            echo "<input type='hidden' value='$paydate' name='paydate' />";
            echo "<input type='hidden' value='$commission' name='commission' />";
            echo "<div class='confirm-inputBtn'>" .
                "<input type='submit' value='Save as Payment' class='confirm-btn' name='confirm' />" .
                "</div>" . 
                "</form>";
            unset($_SESSION['confirm']);
        } 
        
        if(isset($_SESSION['status'])){
            echo "<p class='alert-success'>" . $_SESSION['status'] . "</p>";
            unset($_SESSION['status']);
        } 
        ?>
        <div class="register">
            <div class="title">Calculate Wages</div>
            <form action="" method="POST" class="form">
                <div class="inputfield">
                    <label>Pay Date</label>
                    <input type="date" class="input" name="paydate" placeholder="mm/dd/yyyy" required/>
                </div>
                <div class="inputfield">
                    <label>Employee ID</label>
                    <input type="number" class="input" name="empid" placeholder="Employee database ID" required/>
                </div>
                <div class="inputfield">
                    <label>Start Date</label>
                    <input type="date" class="input" name="startdate" placeholder="mm/dd/yyyy" required/>
                </div>
                <div class="inputfield">
                    <label>End Date</label>
                    <input type="date" class="input" name="enddate" placeholder="mm/dd/yyyy" required/>
                </div>
                <div class="inputBtn">
                    <input type="submit" value="Calculate" class="btn" name="calculate" />
                    <input type="reset" value="Clear" class="btn" />
                </div>
            </form>
        </div>
    </main>
</body>

</html>