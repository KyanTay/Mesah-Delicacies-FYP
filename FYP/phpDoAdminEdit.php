<?php

session_start();
include "dbFunction.php";
$msg = "";
$target = "images/" . basename($_FILES['image']['name']);

$image = $_FILES['image']['name'];
$newName = $_POST['itemName'];
$newPrice = $_POST['itemPrice'];
$newDesc = $_POST['itemDesc'];
$itemID = $_POST['itemID'];

if ($_FILES['image']['size'] > 0) {
    $sql = "UPDATE fooditem SET FoodName='$newName', Price='$newPrice', Description='$newDesc', Image='$image' WHERE FoodID='$itemID'";

    mysqli_query($link, $sql);

    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        $msg = "image Uploaded Successfully";
    } else {
        $msg = "There was a problem uploading the image";
    }
    header("Location: adminMenu.php");
} else if ($_FILES['image']['size'] == 0){
    $sql = "UPDATE fooditem SET FoodName='$newName', Price='$newPrice', Description='$newDesc' WHERE FoodID='$itemID'";

    mysqli_query($link, $sql);
    header("Location: secondadminEdit.php");
}
?>

