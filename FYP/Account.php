<!DOCTYPE html>
<?php
session_start();

include "dbFunction.php";

if (isset($_SESSION['user_id'])) {
    $username = $_SESSION['username'];
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mesah Delicacies - Menu</title>
    <link rel="stylesheet" href="CSS/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js" type="text/javascript"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="Background">
    <div class="container">
        <div class="navbar">
            <div class="logo">
                <a href="home.php"><img src="images/MDLogo.svg" width="63px"></a>
            </div>
            <nav>
                <ul id="MenuItems">
                    <li><a href="home.php">Home</a></li>
                    <li><a href="Menu.php">Menu</a>
                    </li>
                    <li><a href="About.php">About</a></li>
                    <li><a href="Contact.php">Contact</a></li>
                    <?php
                    if (isset($_SESSION['user_id'])) {
                    ?>
                        <li><a href="Profile.php"><?php echo $username ?></a></li>
                    <?php } else {
                    ?>
                        <li><a href="Account.php">Login/Register</a></li>
                    <?php
                    }
                    ?>
                </ul>
            </nav>
            <a href="Cart.php"><img src="images/cart.png" width="30px" height="30px"></a>
            <img src="images/menu.png" class="menu-icon" onclick="menutoggle()">
        </div>


        <div class="form-box">
            <div class="button-box">
                <div id="btn"></div>
                <button type="button" class="toggle-btn" onclick="login()">Log In</button>
                <button type="button" class="toggle-btn" onclick="register()">Register</button>
            </div>
            <form class="input-group" action="dologin.php" method="POST" id="login">
                <input type="text" class="input-field" name="LoginEmail" placeholder="Email" required>
                <input type="password" class="input-field" name="LoginPassword" placeholder="Password" required>
                <input type="checkbox" name="checkbox" class="check-box" id="clickC"><label class="rmbPass" for="clickC">Remember Password</label>
                <button type="submit" class="submit-btn" name="login">Log In</button>
            </form>
            <form class="input-groupR" action="doregister.php" method="POST" id="register">
                <input type="text" class="input-field" name="registerUsername" placeholder="Username" required>
                <input type="text" class="input-field" name="registerFullname" placeholder="Full Name" required>
                <input type="email" class="input-field" name="registerEmail" placeholder="Email" required>
                <input type="number" class="input-field" name="registerContact" placeholder="Contact No" required>
                <input type="password" class="input-field" name="registerPassword" placeholder="Password" required>
                <input type="text" class="input-field" name="registerHomeAddress" placeholder="Address" required>
                <input type="checkbox" name="checkbox" class="check-box" id="clickC" required><label class="rmbPass" for="clickC">I agree with the terms and condition</label>
                <button type="submit" class="submit-btn" name="register">Register</button>
            </form>
        </div>
    </div>
    <footer class="footer">
        <div class="container-foot">
            <div class="row-foot">
                <div class="footer-col">
                    <h4>Mesah Delicacies</h4>
                    <ul>
                        <li><a href="#">about us</a></li>
                        <li><a href="#">our services</a></li>
                        <li><a href="#">privacy policy</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>get help</h4>
                    <ul>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">shipping</a></li>
                        <li><a href="#">returns</a></li>
                        <li><a href="#">order status</a></li>
                        <li><a href="#">payment options</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>social media</h4>
                    <div class="social-links">
                         <a href="https://www.facebook.com/MesahwithDelicacies/" target="_blank"><i class="fab fa-facebook-f"></i></a>  
                        <a href="https://www.instagram.com/mesahdelicacies/?hl=en" target="_blank"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
                <div class="footer-col">
                    <h4>Subscirbe to us</h4>
                    <ul>
                        <li>
                            <p>To get the latest menu and news on Mesah Delicacies</p>
                        </li>
                        <div class="form-group">
                            <input class="inputD" placeholder="Email" class="email" type="text">
                        </div>
                        <button type="submit" class="btn-sub">Subscribe</button>
                </div>
                </ul>
            </div>
        </div>
    </footer>
    <script>
        var MenuItems = document.getElementById("MenuItems");

        MenuItems.style.maxHeight = "0px";

        function menutoggle() {
            if (MenuItems.style.maxHeight == "0px") {
                MenuItems.style.maxHeight = "200px";
            } else {
                MenuItems.style.maxHeight = "0px";
            }
        }

        var x = document.getElementById("login");
        var y = document.getElementById("register");
        var z = document.getElementById("btn");

        function register() {
            x.style.left = "-400px";
            y.style.left = "50px";
            z.style.left = "110px";
        }

        function login() {
            x.style.left = "50px";
            y.style.left = "450px";
            z.style.left = "0";
        }
    </script>
</body>

</html>