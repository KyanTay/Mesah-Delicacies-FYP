<?php
session_start();
include "dbFunction.php";
$msg = "";
$target = "images/".basename($_FILES['image']['name']);

$image = $_FILES['image']['name'];
$newName = $_POST['itemName'];
$newPrice = $_POST['itemPrice'];
$newDesc = $_POST['itemDesc'];

$sql = "INSERT INTO fooditem (FoodName, Price, Description, Image) VALUES ('$newName','$newPrice','$newDesc','$image')";

mysqli_query($link, $sql);

if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
    $msg = "image Uploaded Successfully";
    header("Location: secondadminadd.php");
} else {
    $msg = "There was a problem uploading the image";
}
?>
