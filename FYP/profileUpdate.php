<?php
session_start();
include "dbFunction.php";
$msg = "";

$userCheck =  $_SESSION['user_id'];

$fullname = $_POST['fullname'];
$email = $_POST['email'];
$username = $_POST['username'];
$address = $_POST['address'];
$phoneno = $_POST['phoneno'];

$sql = "UPDATE user SET Username='$username', Email='$email', FullName='$fullname', Contact='$phoneno', Address='$address' WHERE UserID='$userCheck'";

$resultCheck = mysqli_query($link, $sql) or die(mysqli_error($link));
    
header("Location: secondprofileupdate.php");

?>

