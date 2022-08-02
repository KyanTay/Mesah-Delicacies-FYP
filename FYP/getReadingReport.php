<?php
session_start();

include "dbFunction.php";

$dateM = date('m');

$queryItems = "SELECT * FROM completedorders WHERE dateMonth = '$dateM'";

$resultItems = mysqli_query($link, $queryItems) or die(mysqli_error($link));

$response = array();
while ($row = mysqli_fetch_assoc($resultItems)) {
    $response[] = $row;
}
mysqli_close($link);
echo json_encode($response);
?>


