<?php
session_start();

include "dbFunction.php";
$userCheck = $_POST['userid'];

$queryItems = "SELECT * FROM admincart WHERE userID = '$userCheck'";


$resultItems = mysqli_query($link, $queryItems) or die(mysqli_error($link));

$response = array();
while ($row = mysqli_fetch_assoc($resultItems)) {
    $response[] = $row;
}
mysqli_close($link);
echo json_encode($response);
?>
