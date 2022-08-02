<?php
/*
  This page registers user for the website.
  This page is deliberately left blank.
 */

include "dbFunction.php";
$username = $_POST['registerUsername'];
$fullname = $_POST['registerFullname'];
$email = $_POST['registerEmail'];
$password = $_POST['registerPassword'];
$contact = $_POST['registerContact'];
$address = $_POST['registerHomeAddress'];
$usertype = "user";


$duplicatequery = "SELECT * FROM user WHERE Email = '$email'";
$duplicate = mysqli_query($link, $duplicatequery);

if (mysqli_num_rows($duplicate) == 0) {
    $query = "INSERT INTO user
          (FullName,Username,Email,Password,Contact,Address,usertype) 
          VALUES 
          ('$fullname','$username','$email',SHA1('$password'),'$contact',
           '$address', '$usertype')";
    
    $status = mysqli_query($link, $query); 
    
    $message = "<p>Your new account has been successfully created. 
                You are now ready to <a href='login.php'>login</a>.</p>";
        header("Location: secondAccount.php");
        
} else {
    $message = "Your Email " . $email . " already exists";
    header("Location: failedAccount.php");
}


mysqli_close($link);

?>
