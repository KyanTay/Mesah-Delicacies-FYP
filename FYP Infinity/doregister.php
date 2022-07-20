<?php
/*
  This page registers user for the website.
  This page is deliberately left blank.
 */

include "dbFunction.php";
$firstname = $_POST['firstName'];
$lastname = $_POST['lastName'];
$email = $_POST['registerEmail'];
$password = $_POST['registerPassword'];
$contact = $_POST['registerContact'];
$address = $_POST['registerHomeAddress'];


$duplicatequery = "SELECT * FROM user WHERE Email = '$email'";
$duplicate = mysqli_query($link, $duplicatequery);

if (mysqli_num_rows($duplicate) == 0) {
    $query = "INSERT INTO user
          (FirstName,LastName,Email,Password,Contact,Address) 
          VALUES 
          ('$firstname', '$lastname', '$email',SHA1('$password'),'$contact',
           '$address')";
    
    $status = mysqli_query($link, $query); 
    
    $message = "<p>Your new account has been successfully created. 
                You are now ready to <a href='login.php'>login</a>.</p>";
        header("Location: Login.php");
        
} else {
    $message = "Your Email " . $email . " already exists";
}


mysqli_close($link);

?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" >
        <meta charset="UTF-8">
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <script src="js/jquery-3.6.0.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.bundle.min.js" type="text/javascript"></script>
        <link rel="stylesheet" href="css/Checkout.css">
        <title>doRegister page</title>
    </head>
   <body class="Background">
        <div class="jumbotron text-black"">
            <p class="lead">Error,This email already exist</p>
            <hr class="my-4" style="background-color: white;">
            <p>You may click the button below go back to try register again.</p>
            <a href="Register.php" class="btn btn-outline-success btn-lg">Register again</a>
        </div>

    </body>
</html>