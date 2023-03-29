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
    <title>Billing - Top Touch Car Wash</title>
    <link rel="stylesheet" type="text/css" href="../resources/css/header.css">
    <link rel="stylesheet" type="text/css" href="../resources/css/user/billing.css">
</head>

<body>

    <?php
    include "../userheader.php";

    //CALCULATING TOTAL, COMMISSION AND GETTING WHAT SERVICE TO DISPLAY ON INVOICE
    if(isset($_POST['proceed'])) {
        
        $_SESSION['datetime'] = $_POST['datetime'];
        $_SESSION['empnatid'] = $_POST['empnatid'];
        $_SESSION['plateno'] = $_POST['plateno'];
        $_SESSION['model'] = $_POST['model'];
        $_SESSION['colour'] = $_POST['colour'];
        $_SESSION['ownername'] = $_POST['ownername'];
        $_SESSION['phonno'] = $_POST['phoneno'];
        


        $total = 0;

        if(isset($_POST['service_1'])) {
            $service1 = $_POST['service_1'];
            $total +=$service1;
            
            $sql = "SELECT * FROM services WHERE service_no=1";
            $result = mysqli_query($connect, $sql);
            $row = $result->fetch_assoc();
            $_SESSION[0] = $row['name'] . " " . $row['description'] . " @" . $row['cost'] . "/=";
            $_SESSION[10] = $row['service_id']; //FOR GETTING ID TO PUT IN CART
        }
        if(isset($_POST['service_2'])) {
            $service2 = $_POST['service_2'];
            $total +=$service2;

            $sql = "SELECT * FROM services WHERE service_no=2";
            $result = mysqli_query($connect, $sql);
            $row = $result->fetch_assoc();
            $_SESSION[1] = $row['name'] . " " . $row['description'] . " @" . $row['cost'] . "/=";
            $_SESSION[11] = $row['service_id'];
        }
        if(isset($_POST['service_3'])) {
            $service3 = $_POST['service_3'];
            $total +=$service3;

            $sql = "SELECT * FROM services WHERE service_no=3";
            $result = mysqli_query($connect, $sql);
            $row = $result->fetch_assoc();
            $_SESSION[2] = $row['name'] . " " . $row['description'] . " @" . $row['cost'] . "/=";
            $_SESSION[12] = $row['service_id'];
        }
        if(isset($_POST['service_4'])) {
            $service4 = $_POST['service_4'];
            $total +=$service4;
            
            $sql = "SELECT * FROM services WHERE service_no=4";
            $result = mysqli_query($connect, $sql);
            $row = $result->fetch_assoc();
            $_SESSION[3] = $row['name'] . " " . $row['description'] . " @" . $row['cost'] . "/=";
            $_SESSION[13] = $row['service_id'];
        } 
        if(isset($_POST['service_5'])) {
            $service5 = $_POST['service_5'];
            $total +=$service5;

            $sql = "SELECT * FROM services WHERE service_no=5";
            $result = mysqli_query($connect, $sql);
            $row = $result->fetch_assoc();
            $_SESSION[4] = $row['name'] . " " . $row['description'] . " @" . $row['cost'] . "/=";
            $_SESSION[14] = $row['service_id'];
        }
        if(isset($_POST['service_6'])) {
            $service6 = $_POST['service_6'];
            $total +=$service6;

            $sql = "SELECT * FROM services WHERE service_no=6";
            $result = mysqli_query($connect, $sql);
            $row = $result->fetch_assoc();
            $_SESSION[5] = $row['name'] . " " . $row['description'] . " @" . $row['cost'] . "/=";
            $_SESSION[15] = $row['service_id'];
        }
        if(isset($_POST['service_7'])) {
            $service7 = $_POST['service_7'];
            $total +=$service7;

            $sql = "SELECT * FROM services WHERE service_no=7";
            $result = mysqli_query($connect, $sql);
            $row = $result->fetch_assoc();
            $_SESSION[6] = $row['name'] . " " . $row['description'] . " @" . $row['cost'] . "/=";
            $_SESSION[16] = $row['service_id'];
        }
        if(isset($_POST['service_8'])) {
            $service8 = $_POST['service_8'];
            $total +=$service8;

            $sql = "SELECT * FROM services WHERE service_no=8";
            $result = mysqli_query($connect, $sql);
            $row = $result->fetch_assoc();
            $_SESSION[7] = $row['name'] . " " . $row['description'] . " @" . $row['cost'] . "/=";
            $_SESSION[17] = $row['service_id'];
        }
        if(isset($_POST['service_9']) && intval($_POST['service_9']) != 0) {
            $service9 = $_POST['service_9'];
            $service9 = intval( $service9 );
            $total +=$service9;

            $sql = "SELECT * FROM services WHERE service_no=9";
            $result = mysqli_query($connect, $sql);
            $row = $result->fetch_assoc();
            $_SESSION[8] = $row['name'] . " " . $row['description'] . " @" . $service9 . "/=";
            $_SESSION[18] = $row['service_id'];
        }
        if(isset($_POST['service_10']) && intval($_POST['service_10']) != 0 ){
            $service10 = $_POST['service_10'];
            $service10 = intval( $service10 );
            $total +=$service10;

            $sql = "SELECT * FROM services WHERE service_no=10";
            $result = mysqli_query($connect, $sql);
            $row = $result->fetch_assoc();
            $_SESSION[9] = $row['name'] . " " . $row['description'] . " @" . $service10 . "/=";
            $_SESSION[19] = $row['service_id'];
        }
        
        $_SESSION['total'] = $total;
        $_SESSION['commission'] = ($total * 30 ) / 100;  //COMMISSION IS ALWAYS FIXED ...admin adjusts prices to increase profits
        
        $_SESSION['invoice'] = $total;  //FLAG FOR DISPLAYING INVOICE
    }

    //POSTING TO BILL TABLE AND CART TABLE ON THE DATABASE
    if(isset($_POST['confirm'])) {
        
        $plateNo = $_SESSION['plateno']; 
        $model = $_SESSION['model']; 
        $colour = $_SESSION['colour']; 
        $ownerName = $_SESSION['ownername']; 
        $phoneNo = $_SESSION['phonno']; 
        $total = $_SESSION['total'];
        $commission = $_SESSION['commission'];
        $dateTime = $_SESSION['datetime'];
        

        //INSERTING NEW CUSTOMER RECORD
        $sql = "INSERT IGNORE INTO cars SET plate_no = '$plateNo', model = '$model', colour = '$colour', owner_name = '$ownerName', phone_no = '$phoneNo', date_added = '$dateTime'";
        $result = mysqli_query($connect, $sql) or die($mysqli -> error);

        //INSERTING BILL INFO

        $nationalId = $_SESSION['empnatid'];
        $sql = "SELECT * FROM employees WHERE national_id = '$nationalId'";
        $result = mysqli_query($connect, $sql) or die($mysqli -> error);
        $row = $result->fetch_assoc();
        $empId = $row['emp_id'];

        $plateNo = $_SESSION['plateno'];
        $sql = "SELECT * FROM cars WHERE plate_no = '$plateNo'";
        $result = mysqli_query($connect, $sql) or die($mysqli -> error);
        $row = $result->fetch_assoc();
        $carId = $row['car_id'];

        $sql = "INSERT INTO billing (emp_id, car_id, date_time, total_cost, commission) VALUES ('$empId', '$carId', '$dateTime', '$total', '$commission')";
        $result = mysqli_query($connect, $sql) or die($mysqli -> error);


        
        //GET THE NEW BILL ENTRY'S ID
        $sql = "SELECT * FROM billing ORDER BY bill_id DESC LIMIT 1";
        $result = mysqli_query($connect, $sql);
        $row = $result->fetch_assoc();
        $billId = $row['bill_id'];            
    }    

        //INCERTING INSERTING CART INFO
        for ($i = 1; $i < 11; $i++) { //STARTING FROM 1 BECAUSE SERVECES START FROM 1 AND END AT 10
            if(isset($_POST[$i])) {
                $serviceId = $_POST[$i];
                $sql = "INSERT INTO cart (bill_id, service_id, date_time_added) VALUES ('$billId', '$serviceId', '$dateTime')";
                $result = mysqli_query($connect, $sql) or die($mysqli -> error);
                $_SESSION['status'] = "Billing Successful"; 
                
            }
            
    }
    ?>

    <main>
        <?php if(isset($_SESSION['invoice'])){
            echo "<p class='invoice-title'>Invoice:</p>";
            echo "<table class='invoice-table'>";
                echo "<tr>" .
                "<th>Bill Details:</th>" .
                "</tr>";
                echo "<tr>" .
                "<td>" . "car plate: " . $_SESSION['plateno'] . "</td>" .
                "</tr>" .
                "<tr>" .
                "<td>" . "Emp National Id: " . $_SESSION['empnatid'] . "</td>" .
                "</tr>" . 
                "<tr>" . 
                "<td>" . "Date-time: " . $_SESSION['datetime'] . "</td>" .
                "</tr>" . 
                "<tr>" .
                "<th>Services Provided:</th>" .
                "</tr>";
                for ($i = 0; $i < 10; $i++) {
                    if(isset($_SESSION[$i])) {
                        echo "<tr>" . 
                        "<td>" . $_SESSION[$i] . "</td>" .
                        "</tr>";
                    }
                }
                echo "<tr>" .
                "<th>Totals:</th>" .
                "</tr>" . 
                "<tr>" .
                "<td>" . "Total: " . $_SESSION['total'] . "/=" . "</td>" .
                "</tr>" . 
                "<tr>" . 
                "<td>" . "Commission: " . $_SESSION['commission'] . "/=" . "</td>" .
                "</tr>"; 
            echo "</table>";
            
            echo "<form action='#' method='POST' class='confirm-form'>";
            //TRANSFERS SERVICE IDS FROM SESSION TO POST VARRABLES
            for ($i = 10; $i < 20; $i++) {
                if(isset($_SESSION[$i])) {
                    echo "<input type='hidden' value='$_SESSION[$i]' name='$_SESSION[$i]' />";  
                }
            }
            echo "<div class='confirm-inputBtn'>" .
                "<input type='submit' value='Confirm' class='confirm-btn' name='confirm' />" .
                "</div>" . 
                "</form>";
            unset($_SESSION['invoice']);
        } 
        if(isset($_SESSION['status'])) {
            echo "<p class='alert-success'>" . $_SESSION['status'] . "</p>";
            unset($_SESSION['status']);
        }
        ?>
        <div class="register">
                <div class="title">Bill Customer</div>
                <form action="#" method="POST" class="form">
                    <div class="inputfield">
                        <label>Date</label>
                        <input type="datetime-local" class="input" name="datetime"  required/>
                    </div>
                    <div class="inputfield">
                        <label>Employee National Id</label>
                        <input type="number" class="input" name="empnatid"  placeholder="Employee National Id" required/>
                    </div>    
                <div class="sub-title">Enter Customer Details</div>
                    <div class="inputfield">
                        <label>Plate No</label>
                        <input type="text" class="input" name="plateno"  placeholder="Plate No" required/>
                    </div>
                    <div class="inputfield">
                        <label>Model</label>
                        <input type="text" class="input" name="model"  placeholder="Model" required/>
                    </div>
                    <div class="inputfield">
                        <label>colour</label>
                        <input type="text" class="input" name="colour"  placeholder="Colour" required/>
                    </div>
                    <div class="inputfield">
                        <label>Owner Name</label>
                        <input type="text" class="input" name="ownername"  placeholder="Owner's Name" required/>
                    </div>
                    <div class="inputfield">
                        <label>Phone No</label>
                        <input type="number" class="input" name="phoneno"  placeholder="Phone No" required/>
                    </div>
                    <div class="sub-title">Select Services</div>
                    <div class="inputfield-chk">
                        <?php 
                            $sql = "SELECT * FROM services WHERE service_no = 1";
                            $result = $connect->query($sql);
                            $row = $result->fetch_assoc();
                        ?>
                        <input type="checkbox" class="input-chk" name="service_1" value="<?php echo $row['cost'] ?>"/>
                        <label for="service_1"><?php echo $row["name"] . " - " . $row['description'] . " @" . $row['cost'] . "/=" ?></label>
                    </div>
                    <div class="inputfield-chk">
                        <?php 
                            $sql = "SELECT * FROM services WHERE service_no = 2";
                            $result = $connect->query($sql);
                            $row = $result->fetch_assoc();
                        ?>
                        <input type="checkbox" class="input-chk" name="service_2" value="<?php echo $row['cost'] ?>"/>
                        <label for="service_2"><?php echo $row["name"] . " - " . $row['description'] . " @" . $row['cost'] . "/=" ?></label>
                    </div>
                    <div class="inputfield-chk">
                        <?php 
                            $sql = "SELECT * FROM services WHERE service_no = 3";
                            $result = $connect->query($sql);
                            $row = $result->fetch_assoc();
                        ?>
                        <input type="checkbox" class="input-chk" name="service_3" value="<?php echo $row['cost'] ?>"/>
                        <label for="service_3"><?php echo $row["name"] . " - " . $row['description'] . " @" . $row['cost'] . "/=" ?></label>
                    </div>
                    <div class="inputfield-chk">
                        <?php 
                            $sql = "SELECT * FROM services WHERE service_no = 4";
                            $result = $connect->query($sql);
                            $row = $result->fetch_assoc();
                        ?>
                        <input type="checkbox" class="input-chk" name="service_4" value="<?php echo $row['cost'] ?>"/>
                        <label for="service_4"><?php echo $row["name"] . " - " . $row['description'] . " @" . $row['cost'] . "/=" ?></label>
                    </div>
                    <div class="inputfield-chk">
                        <?php 
                            $sql = "SELECT * FROM services WHERE service_no = 5";
                            $result = $connect->query($sql);
                            $row = $result->fetch_assoc();
                        ?>
                        <input type="checkbox" class="input-chk" name="service_5" value="<?php echo $row['cost'] ?>"/>
                        <label for="service_5"><?php echo $row["name"] . " - " . $row['description'] . " @" . $row['cost'] . "/=" ?></label>
                    </div>
                    <div class="inputfield-chk">
                        <?php 
                            $sql = "SELECT * FROM services WHERE service_no = 6";
                            $result = $connect->query($sql);
                            $row = $result->fetch_assoc();
                        ?>
                        <input type="checkbox" class="input-chk" name="service_6" value="<?php echo $row['cost'] ?>"/>
                        <label for="service_6"><?php echo $row["name"] . " - " . $row['description'] . " @" . $row['cost'] . "/=" ?></label>
                    </div>
                    <div class="inputfield-chk">
                        <?php 
                            $sql = "SELECT * FROM services WHERE service_no = 7";
                            $result = $connect->query($sql);
                            $row = $result->fetch_assoc();
                        ?>
                        <input type="checkbox" class="input-chk" name="service_7" value="<?php echo $row['cost'] ?>"/>
                        <label for="service_7"><?php echo $row["name"] . " - " . $row['description'] . " @" . $row['cost'] . "/=" ?></label>
                    </div>
                    <div class="inputfield-chk">
                        <?php 
                            $sql = "SELECT * FROM services WHERE service_no = 8";
                            $result = $connect->query($sql);
                            $row = $result->fetch_assoc();
                        ?>
                        <input type="checkbox" class="input-chk" name="service_8" value="<?php echo $row['cost'] ?>"/>
                        <label for="service_8"><?php echo $row["name"] . " - " . $row['description'] . " @" . $row['cost'] . "/=" ?></label>
                    </div>
                    <div class="sub-title-special">Some services require manual cost entry when billing:</div>
                    <div class="inputfield-2">
                        <?php 
                            $sql = "SELECT * FROM services WHERE service_no = 9";
                            $result = $connect->query($sql);
                            $row = $result->fetch_assoc();
                        ?>
                        <label for="service_9"><?php echo $row["name"] . " - " . $row['description']?></label>
                        <input type="number" class="input" name="service_9"  placeholder="Enter the service amount"/>
                    </div>
                    <div class="inputfield-2">
                        <?php 
                            $sql = "SELECT * FROM services WHERE service_no = 10";
                            $result = $connect->query($sql);
                            $row = $result->fetch_assoc();
                        ?>
                        <label for="service_10"><?php echo $row["name"] . " - " . $row['description']?></label>
                        <input type="number" class="input" name="service_10"  placeholder="Enter the service amount"/>
                    </div>
                    
                    <div class="inputBtn">
                        <input type="submit" value="Proceed>>>" class="btn" name="proceed" />
                        <input type="reset" value="Clear" class="btn" />
                    </div>
                </form>
            </div>
    </main>
</body>

</html>