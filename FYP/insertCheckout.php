<?php
include "dbFunction.php";

session_start();

$userID = $_SESSION['user_id'];

$fullname = $_POST['fullname'];
$email = $_POST['email'];
$address = $_POST['address'];
$phoneNo = $_POST['phoneNo'];
$paymentMethod = $_POST['paymentMethod'];
$message = $_POST['message'];
$total = $_POST['total'];
$uniqOId = time().'_'.rand();
$status = "pending";
$Dstatus = "pending";

$query = "INSERT INTO checkout
          (FullName,Address,Email,PhoneNo,PaymentMethod,Message,Status,UserID,TotalPrice,DStatus,orderID) 
          VALUES 
          ('$fullname','$address','$email','$phoneNo',
           '$paymentMethod', '$message','$status','$userID','$total','$Dstatus','$uniqOId')";

$status = mysqli_query($link, $query);
 
$cartAdmin = "SELECT * FROM fooditemcart WHERE user_id = '$userID'";
 
$result = mysqli_query($link, $cartAdmin);

while($row = mysqli_fetch_array($result)) {
    $food_name = $row['Name'];
    $food_quantity = $row['Quantity'];
    $food_price = $row['Price'];
    $food_id = $row['FoodID'];
    
    $cartInsert = "INSERT INTO admincart
          (userID,FoodName,FoodQuantity,FoodPrice,orderID,FoodID) 
          VALUES 
          ('$userID','$food_name','$food_quantity','$food_price','$uniqOId','$food_id')";
    
    $insert = mysqli_query($link, $cartInsert);
}

$delete = "DELETE FROM fooditemcart WHERE user_id = '$userID'";

$cartDelete = mysqli_query($link, $delete);

if ($cartDelete) {
    header("Location: secondCheckout.php");
} else {
    $message = "Item delete failed.";
}
?>

