<?php

session_start();

include "dbFunction.php";

$user_email = $_POST['LoginEmail'];
$user_password = $_POST['LoginPassword'];

$msg = "";

$queryCheck = "SELECT * FROM user
            WHERE Email = '$user_email'
            AND Password = SHA1('$user_password')";

$resultCheck = mysqli_query($link, $queryCheck) or die(mysqli_error($link));

if (mysqli_num_rows($resultCheck) == 1) {
    
    $row = mysqli_fetch_array($resultCheck);

    $_SESSION['user_id'] = $row['UserID'];
    $_SESSION['email'] = $row['Email'];
    $_SESSION['password'] = $row['Password'];
    $_SESSION['firstname'] = $row['FirstName'];
    $_SESSION['lastname'] = $row['LastName'];
    $_SESSION['contact'] = $row['Contact'];
    $_SESSION['address'] = $row['Address'];
    
    header("Location: Home.php");
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <script src="js/jquery-3.6.0.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.bundle.min.js" type="text/javascript"></script>
        <title>doLogin</title>
    </head>
    <body>
            <p class="lead">Sorry, you must enter a valid username and password to log in.</p>
            <hr class="my-4" style="background-color: white;">
            <p>Click on the button to go back to the Login page.</p>
            <a href="Register.php" class="btn btn-outline-success btn-lg" role="login_back_button">Go Back</a>
        </div>

    </body>
</html>
