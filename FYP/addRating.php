<?php

session_start();

include "dbFunction.php";

$foodID = $_POST['foodID'];
$rateScore = $_POST['rating'];

$countTest = 1;

$queryItems = "UPDATE fooditem SET rateNo = rateNo + '$countTest' WHERE FoodID = '$foodID'";

$resultItems = mysqli_query($link, $queryItems) or die(mysqli_error($link));

$query = "SELECT * FROM fooditem WHERE FoodID = '$foodID'";

$result = mysqli_query($link, $query) or die(mysqli_error($link));

while ($row = mysqli_fetch_assoc($result)) {
    $OGRATE = $row['Rating'];
    $count = $row['rateNo'];
    $ogCount = $count - 1;
}
$avgScore = (((float)$OGRATE * (float)$ogCount) + (float)$rateScore)/(float)$count;

$queryR = "UPDATE fooditem SET Rating = '$avgScore' WHERE FoodID = '$foodID'";

$result = mysqli_query($link, $queryR) or die(mysqli_error($link));

header("Location: secondRateItem.php")
?>