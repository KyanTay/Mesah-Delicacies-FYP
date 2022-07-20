<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/login.css">
    <script type="module" src="modules/Login.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer">
</head>

<body class="LoginBackground">
    <!-- Nav Bar -->
    <div class="registerHeader">
        <div class="container">
            <div class="navbar">
                <div class="logo">
                    <a href="home.php"><img src="images/banana.png" width="63px"></a>
                </div>
                <nav>
                    <ul id="MenuItems">
                        <li><a href="home.php">Home</a></li>
                        <li><a href="Menu.php">Menu</a></li>
                        <li><a href="About.php">About</a></li>
                        <li><a href="Contact.php">Contact</a></li>
                        <li><a href="Login.php">Profile</a></li>
                    </ul>
                </nav>
                <a href="Cart.php"><img src="images/cart.png" width="30px" height="30px"></a>
                <img src="images/menu.png" class="menu-icon" onclick="menutoggle()">
            </div>
        </div>
    </div>
    <!-- Log in -->
    <div class="LoginBox">
        <div class="row">
            <div class="col-6" id="Login">
                <button class="formLoginButton"><a href="Login.php" class="">Log in</a></button>
            </div>
            <div class="col-6" id="Register">
                <button class="formRegisterbutton"><a href="Register.php">Register</a></button>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="formTitle">Log into your account</div>
            <form class="LoginForm" method="post" action="dologin.php">
                <br>
                <label for="LoginEmail">Email Address:</label><br>
                <input type="email" id="LoginEmail" name="LoginEmail"><br><br>
                <label for="LoginPassword">Password:</label><br>
                <input type="password" id="LoginPassword" name="LoginPassword">
        </div>
        <div class="forgotPassword">Forgot your password?</div>
        <div class="row" id="checkboxRow">
            <div class="loginCheckBox">
                <input type="checkbox" id="rememberMe" name="rememberMe" value="remembered">
                <label for="rememberMe">Keep me signed in</label>
                <div><button class="loginButton" id="loginBtn">LOG IN</button></div>
            </div>
            </form>
        </div>

        <div class="TOStext">By creating your account or signing in, you agree to our Terms and Conditions & Privacy Policy
        </div>
    </div>
    <div class="loginSpacingBetween"></div>
    <!-- Footer -->
    <footer class="footer">
        <div class="container-foot">
            <div class="row-foot">
                <div class="footer-col">
                    <ul>
                        <h4>Mesah Delicacies</h4>
                        <li><a href="#">about us</a></li>
                        <li><a href="#">our services</a></li>
                        <li><a href="#">privacy policy</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <ul>
                        <h4>get help</h4>

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
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="footer-col">
                    <ul>
                        <h4>Subscirbe to us</h4>

                        <li>
                            <p>To get the latest menu and news on Mesah Delicacies</p>
                        </li>
                        <div class="form-group">
                            <input class="inputD" placeholder="Email" class="email" type="text">
                        </div>
                        <button type="submit" class="btn-sub">Subscribe</button>
                    </ul>
                </div>
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
    </script>
</body>

</html>