<?php

session_start();

include "dbFunction.php";
$userCheck = $_SESSION['user_id'];
$pass = $_SESSION['password'];

$currentPass = SHA1($_POST['currentpassword']);
$newPass = $_POST['newpassword'];

if ($pass == $currentPass) {$sql = "UPDATE user SET Password = SHA1('$newPass') WHERE UserID='$userCheck'";

    $resultCheck = mysqli_query($link, $sql) or die(mysqli_error($link));

    header("Location: passwordprofilealert.php");
} else {
    header("Location: passwordprofilealertfail.php");
}

?>
