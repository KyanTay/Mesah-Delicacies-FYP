<?php
include "dbFunction.php";

session_start();

$contactID = $_POST['contactID'];

$queryDelete = "DELETE FROM contact WHERE contactID = $contactID";

$status = mysqli_query($link, $queryDelete) or die(mysqli_error($link));

if ($status) {    
    header("Location: adminQuestion.php");
} else {
    $message = "Item delete failed.";
}
?>

