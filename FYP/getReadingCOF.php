<?php
session_start();

include "dbFunction.php";

$queryItems = "SELECT * FROM completedorders ORDER BY Date DESC";

$resultItems = mysqli_query($link, $queryItems) or die(mysqli_error($link));

$response = array();
while ($row = mysqli_fetch_assoc($resultItems)) {
    $response[] = $row;
}
mysqli_close($link);
echo json_encode($response);
?>
