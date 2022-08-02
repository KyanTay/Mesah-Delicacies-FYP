<?php
session_start();
include "dbFunction.php";

$checkID = $_POST['checkid'];
$deliverS = "Delivering";
$paymentS = "Confirmed";

$sql = "UPDATE checkout SET Status='$paymentS', DStatus='$deliverS' WHERE CheckoutID='$checkID'";

mysqli_query($link, $sql);

header("Location: secondadminMain.php");
?>
