<?php

include "dbFunction.php";

$theID = $_POST['itemID'];

$queryDelete = "DELETE FROM fooditemcart WHERE CartID = $theID";

$status = mysqli_query($link, $queryDelete) or die(mysqli_error($link));

if ($status) {
    $message = "$Item has been deleted.";
    
    header("Location: Cart.php");
} else {
    $message = "Item delete failed.";
}

?>
