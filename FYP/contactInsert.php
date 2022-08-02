<?php
session_start();
include "dbFunction.php";

$fullname = $_POST['fullname'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

$query = "INSERT INTO contact (FullName, Email, Subject, Message) VALUES ('$fullname','$email','$subject','$message')";

$status = mysqli_query($link, $query) or die($link);

header("location: secondContact.php")
?>