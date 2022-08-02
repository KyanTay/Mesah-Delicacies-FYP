<?php
session_start();
include "dbFunction.php";

date_default_timezone_set("Asia/Singapore");
$date = date('y-m-d');
$dateM = date('m');

$fullname = $_POST['fullname'];
$email = $_POST['email'];
$phoneno = $_POST['phoneno'];
$totalprice = $_POST['totalprice'];
$orderID = $_POST['orderid'];
$checkID = $_POST['checkid'];
$userID = $_POST['userid'];

$coCount = 1;

$query = "INSERT INTO completedorders (Email, PhoneNo, FullName, amountSpent, orderID, Date, dateMonth) VALUES ('$email','$phoneno','$fullname','$totalprice', '$orderID', '$date', '$dateM')";


$status = mysqli_query($link, $query) or die($link);

$deleteD = "DELETE FROM checkout WHERE CheckoutID = $checkID";

$status = mysqli_query($link, $deleteD) or die($link);

$duplicateItem = "SELECT * FROM adminuser WHERE userID = '$userID'";
$duplicate = mysqli_query($link, $duplicateItem);

if (mysqli_num_rows($duplicate) > 0) {
    $queryDuplicate = "UPDATE adminuser SET TotalPrice = TotalPrice + '$totalprice' WHERE userID = '$userID'";

    $statusD = mysqli_query($link, $queryDuplicate);
} else if (mysqli_num_rows($duplicate) == 0) {
    $query = "INSERT INTO adminuser (FullName, userID, Email, PhoneNo, TotalPrice) VALUES ('$fullname', '$userID','$email','$phoneno','$totalprice')";

    $status = mysqli_query($link, $query) or die($link);
}

header("location: seconddelivercheck.php")
?>

