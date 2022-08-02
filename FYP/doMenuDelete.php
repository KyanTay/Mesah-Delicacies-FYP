<?php

include "dbFunction.php";

$itemID = $_POST['itemID'];

$queryDelete = "DELETE FROM fooditem WHERE FoodID = $itemID";

$status = mysqli_query($link, $queryDelete) or die(mysqli_error($link));

if ($status) {
    $message = "$Item has been deleted.";
    
    header("Location: seconddeletemenu.php");
} else {
    $message = "Item delete failed.";
}
?>
