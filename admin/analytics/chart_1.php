<?php
 if (isset($startDate) && isset($endDate)) {
    
//SERVICE 1 =========================================================================

//For getting the service name
$sql = "SELECT * FROM services WHERE service_id = 1";
$result = mysqli_query($connect, $sql);
$row = $result->fetch_assoc();
$name1 = $row['name'] . " " . $row['description'];

//For counting the number of times a particular service was offered
$service1 = 0;
$sql = "SELECT services.name, services.description FROM cart INNER JOIN services ON cart.service_id=services.service_id WHERE cart.service_id = 1 AND DATE(cart.date_time_added) BETWEEN '$startDate' AND '$endDate'" ;
$result = mysqli_query($connect, $sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $service1 ++;
    }
}

//SERVICE 2 =========================================================================

//For getting the service name
$sql = "SELECT * FROM services WHERE service_id = 2";
$result = mysqli_query($connect, $sql);
$row = $result->fetch_assoc();
$name2 = $row['name'] . " " . $row['description'];

//For counting the number of times a particular service was offered
$service2 = 0;
$sql = "SELECT services.name, services.description FROM cart INNER JOIN services ON cart.service_id=services.service_id WHERE cart.service_id = 2 AND DATE(cart.date_time_added) BETWEEN '$startDate' AND '$endDate'";
$result = mysqli_query($connect, $sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $service2 ++;
    }
}

//SERVICE 3 =========================================================================

//For getting the service name
$sql = "SELECT * FROM services WHERE service_id = 3";
$result = mysqli_query($connect, $sql);
$row = $result->fetch_assoc();
$name3= $row['name'] . " " . $row['description'];

//For counting the number of times a particular service was offered
$service3 = 0;
$sql = "SELECT services.name, services.description FROM cart INNER JOIN services ON cart.service_id=services.service_id WHERE cart.service_id = 3 AND DATE(cart.date_time_added) BETWEEN '$startDate' AND '$endDate'";
$result = mysqli_query($connect, $sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $service3 ++;
    }
}

//SERVICE 4 =========================================================================

//For getting the service name
$sql = "SELECT * FROM services WHERE service_id = 4";
$result = mysqli_query($connect, $sql);
$row = $result->fetch_assoc();
$name4 = $row['name'] . " " . $row['description'];

//For counting the number of times a particular service was offered
$service4 = 0;
$sql = "SELECT services.name, services.description FROM cart INNER JOIN services ON cart.service_id=services.service_id WHERE cart.service_id = 4 AND DATE(cart.date_time_added) BETWEEN '$startDate' AND '$endDate'";
$result = mysqli_query($connect, $sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $service4 ++;
    }
}

//SERVICE 5 =========================================================================

//For getting the service name
$sql = "SELECT * FROM services WHERE service_id = 5";
$result = mysqli_query($connect, $sql);
$row = $result->fetch_assoc();
$name5 = $row['name'] . " " . $row['description'];

//For counting the number of times a particular service was offered
$service5 = 0;
$sql = "SELECT services.name, services.description FROM cart INNER JOIN services ON cart.service_id=services.service_id WHERE cart.service_id = 5 AND DATE(cart.date_time_added) BETWEEN '$startDate' AND '$endDate'";
$result = mysqli_query($connect, $sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $service5 ++;
    }
}

//SERVICE 6 =========================================================================

//For getting the service name
$sql = "SELECT * FROM services WHERE service_id = 6";
$result = mysqli_query($connect, $sql);
$row = $result->fetch_assoc();
$name6 = $row['name'] . " " . $row['description'];

//For counting the number of times a particular service was offered
$service6 = 0;
$sql = "SELECT services.name, services.description FROM cart INNER JOIN services ON cart.service_id=services.service_id WHERE cart.service_id = 6 AND DATE(cart.date_time_added) BETWEEN '$startDate' AND '$endDate'";
$result = mysqli_query($connect, $sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $service6 ++;
    }
}

//SERVICE 7 =========================================================================

//For getting the service name
$sql = "SELECT * FROM services WHERE service_id = 7";
$result = mysqli_query($connect, $sql);
$row = $result->fetch_assoc();
$name7 = $row['name'] . " " . $row['description'];

//For counting the number of times a particular service was offered
$service7 = 0;
$sql = "SELECT services.name, services.description FROM cart INNER JOIN services ON cart.service_id=services.service_id WHERE cart.service_id = 7 AND DATE(cart.date_time_added) BETWEEN '$startDate' AND '$endDate'";
$result = mysqli_query($connect, $sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $service7 ++;
    }
}

//SERVICE 8 =========================================================================

//For getting the service name
$sql = "SELECT * FROM services WHERE service_id = 8";
$result = mysqli_query($connect, $sql);
$row = $result->fetch_assoc();
$name8 = $row['name'] . " " . $row['description'];

//For counting the number of times a particular service was offered
$service8 = 0;
$sql = "SELECT services.name, services.description FROM cart INNER JOIN services ON cart.service_id=services.service_id WHERE cart.service_id = 8 AND DATE(cart.date_time_added) BETWEEN '$startDate' AND '$endDate'";
$result = mysqli_query($connect, $sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $service8 ++;
    }
}

//SERVICE 9 =========================================================================

//For getting the service name
$sql = "SELECT * FROM services WHERE service_id = 9";
$result = mysqli_query($connect, $sql);
$row = $result->fetch_assoc();
$name9 = $row['name'] . " " . $row['description'];

//For counting the number of times a particular service was offered
$service9 = 0;
$sql = "SELECT services.name, services.description FROM cart INNER JOIN services ON cart.service_id=services.service_id WHERE cart.service_id = 9 AND DATE(cart.date_time_added) BETWEEN '$startDate' AND '$endDate'";
$result = mysqli_query($connect, $sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $service9 ++;
    }
}

//SERVICE 10 =========================================================================

//For getting the service name
$sql = "SELECT * FROM services WHERE service_id = 10";
$result = mysqli_query($connect, $sql);
$row = $result->fetch_assoc();
$name10 = $row['name'] . " " . $row['description'];

//For counting the number of times a particular service was offered
$service10 = 0;
$sql = "SELECT services.name, services.description FROM cart INNER JOIN services ON cart.service_id=services.service_id WHERE cart.service_id = 10 AND DATE(cart.date_time_added) BETWEEN '$startDate' AND '$endDate'";
$result = mysqli_query($connect, $sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $service10 ++;
    }
}
} else {
//SERVICE 1 =========================================================================

//For getting the service name
$sql = "SELECT * FROM services WHERE service_id = 1";
$result = mysqli_query($connect, $sql);
$row = $result->fetch_assoc();
$name1 = $row['name'] . " " . $row['description'];

//For counting the number of times a particular service was offered
$service1 = 0;
$sql = "SELECT services.name, services.description FROM cart INNER JOIN services ON cart.service_id=services.service_id WHERE cart.service_id = 1";
$result = mysqli_query($connect, $sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $service1 ++;
    }
}

//SERVICE 2 =========================================================================

//For getting the service name
$sql = "SELECT * FROM services WHERE service_id = 2";
$result = mysqli_query($connect, $sql);
$row = $result->fetch_assoc();
$name2 = $row['name'] . " " . $row['description'];

//For counting the number of times a particular service was offered
$service2 = 0;
$sql = "SELECT services.name, services.description FROM cart INNER JOIN services ON cart.service_id=services.service_id WHERE cart.service_id = 2";
$result = mysqli_query($connect, $sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $service2 ++;
    }
}

//SERVICE 3 =========================================================================

//For getting the service name
$sql = "SELECT * FROM services WHERE service_id = 3";
$result = mysqli_query($connect, $sql);
$row = $result->fetch_assoc();
$name3= $row['name'] . " " . $row['description'];

//For counting the number of times a particular service was offered
$service3 = 0;
$sql = "SELECT services.name, services.description FROM cart INNER JOIN services ON cart.service_id=services.service_id WHERE cart.service_id = 3";
$result = mysqli_query($connect, $sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $service3 ++;
    }
}

//SERVICE 4 =========================================================================

//For getting the service name
$sql = "SELECT * FROM services WHERE service_id = 4";
$result = mysqli_query($connect, $sql);
$row = $result->fetch_assoc();
$name4 = $row['name'] . " " . $row['description'];

//For counting the number of times a particular service was offered
$service4 = 0;
$sql = "SELECT services.name, services.description FROM cart INNER JOIN services ON cart.service_id=services.service_id WHERE cart.service_id = 4";
$result = mysqli_query($connect, $sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $service4 ++;
    }
}

//SERVICE 5 =========================================================================

//For getting the service name
$sql = "SELECT * FROM services WHERE service_id = 5";
$result = mysqli_query($connect, $sql);
$row = $result->fetch_assoc();
$name5 = $row['name'] . " " . $row['description'];

//For counting the number of times a particular service was offered
$service5 = 0;
$sql = "SELECT services.name, services.description FROM cart INNER JOIN services ON cart.service_id=services.service_id WHERE cart.service_id = 5";
$result = mysqli_query($connect, $sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $service5 ++;
    }
}

//SERVICE 6 =========================================================================

//For getting the service name
$sql = "SELECT * FROM services WHERE service_id = 6";
$result = mysqli_query($connect, $sql);
$row = $result->fetch_assoc();
$name6 = $row['name'] . " " . $row['description'];

//For counting the number of times a particular service was offered
$service6 = 0;
$sql = "SELECT services.name, services.description FROM cart INNER JOIN services ON cart.service_id=services.service_id WHERE cart.service_id = 6";
$result = mysqli_query($connect, $sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $service6 ++;
    }
}

//SERVICE 7 =========================================================================

//For getting the service name
$sql = "SELECT * FROM services WHERE service_id = 7";
$result = mysqli_query($connect, $sql);
$row = $result->fetch_assoc();
$name7 = $row['name'] . " " . $row['description'];

//For counting the number of times a particular service was offered
$service7 = 0;
$sql = "SELECT services.name, services.description FROM cart INNER JOIN services ON cart.service_id=services.service_id WHERE cart.service_id = 7";
$result = mysqli_query($connect, $sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $service7 ++;
    }
}

//SERVICE 8 =========================================================================

//For getting the service name
$sql = "SELECT * FROM services WHERE service_id = 8";
$result = mysqli_query($connect, $sql);
$row = $result->fetch_assoc();
$name8 = $row['name'] . " " . $row['description'];

//For counting the number of times a particular service was offered
$service8 = 0;
$sql = "SELECT services.name, services.description FROM cart INNER JOIN services ON cart.service_id=services.service_id WHERE cart.service_id = 8";
$result = mysqli_query($connect, $sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $service8 ++;
    }
}

//SERVICE 9 =========================================================================

//For getting the service name
$sql = "SELECT * FROM services WHERE service_id = 9";
$result = mysqli_query($connect, $sql);
$row = $result->fetch_assoc();
$name9 = $row['name'] . " " . $row['description'];

//For counting the number of times a particular service was offered
$service9 = 0;
$sql = "SELECT services.name, services.description FROM cart INNER JOIN services ON cart.service_id=services.service_id WHERE cart.service_id = 9";
$result = mysqli_query($connect, $sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $service9 ++;
    }
}

//SERVICE 10 =========================================================================

//For getting the service name
$sql = "SELECT * FROM services WHERE service_id = 10";
$result = mysqli_query($connect, $sql);
$row = $result->fetch_assoc();
$name10 = $row['name'] . " " . $row['description'];

//For counting the number of times a particular service was offered
$service10 = 0;
$sql = "SELECT services.name, services.description FROM cart INNER JOIN services ON cart.service_id=services.service_id WHERE cart.service_id = 10";
$result = mysqli_query($connect, $sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $service10 ++;
    }
}
}
?>