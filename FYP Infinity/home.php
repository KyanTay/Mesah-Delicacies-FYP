<?php
/*
  This page is the main page. It allows user to enter sugar level readings, and view previous entries entered.
  This page is deliberately left blank.
 */
session_start();

if (!isset($_SESSION['email']) && empty($_SESSION['email'])) {
    header("Location: Login.php");
} else {
    
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="test">
    <title>Mesah Delicacies - Home</title>
    <link rel="stylesheet" href="css/style.css">
    <script type="module" src="main.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer"
    />
</head>

<body>
    <div class="header">
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
            <div class="row">
                <div class="col-2">
                    <h1>TAGLINE</h1>
                    <p>MESSAGE</p>
                    <a href="Menu.html" class="btn">Shop Now</a>
                </div>
                <div class="col-2">
                    <img src="images/banana.png">
                </div>
            </div>
        </div>
    </div>


    <div class="categories">
        <div class="small-container">
            <div class="row">
                <div class="col-3">
                    <img src="images/food.jpeg">
                    <a href="Menu.html" class="btn-col">Main Dish</a>
                </div>
                <div class="col-3">
                    <img src="images/food.jpeg">
                    <a href="Menu.html" class="btn-col">Add Ons</a>
                </div>
            </div>
        </div>
    </div>


    <div class="small-container">
        <h2 class="title">Featured Products</h2>
        <div class="row">
            <div class="col-4">
                <img src="images/food.jpeg">
                <h4>PRODUCT NAME</h4>
                <div class="ratings">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                </div>
                <p>$50.00</p>
            </div>
            <div class="col-4">
                <img src="images/food.jpeg">
                <h4>PRODUCT NAME</h4>
                <div class="ratings">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                </div>
                <p>$50.00</p>
            </div>
            <div class="col-4">
                <img src="images/food.jpeg">
                <h4>PRODUCT NAME</h4>
                <div class="ratings">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                </div>
                <p>$50.00</p>
            </div>
            <div class="col-4">
                <img src="images/food.jpeg">
                <h4>PRODUCT NAME</h4>
                <div class="ratings">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                </div>
                <p>$50.00</p>
            </div>
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
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
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