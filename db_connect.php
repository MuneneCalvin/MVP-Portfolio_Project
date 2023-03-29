<?php
$host="localhost:3306";
$user="root";
$password="aonmysql";
$database="carwash";

session_start();

$connect=mysqli_connect($host,$user,$password,$database);  
if($connect===false) {
    die("Connection error");
}
?>