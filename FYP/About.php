<!DOCTYPE html>
<?php
session_start();

if (isset($_SESSION['username']) && isset($_SESSION['user_id'])) {
    $username = $_SESSION['username'];
} else if (isset($_SESSION['user_id'])) {
    $uniqId = $_SESSION['user_id'];
} else {
    $uniqId = time();
    $_SESSION['user_id'] = $uniqId;
}
?>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Mesah Delicacies - Home</title>
        <link rel="stylesheet" href="css/style.css">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />


        <style>
            * {
                box-sizing: border-box
            }

            body {
                font-family: 'Poppins', sans-serif;
            }

            .mySlides {
                display: none
            }

            img {
                vertical-align: middle;
            }

            /* Slideshow container */

            .slideshow-container {
                max-width: 1000px;
                position: relative;
                margin: auto;
            }

            /* Next & previous buttons */

            .prev,
            .next {
                cursor: pointer;
                position: absolute;
                top: 50%;
                width: auto;
                padding: 16px;
                margin-top: -22px;
                color: black;
                font-weight: bold;
                font-size: 18px;
                transition: 0.6s ease;
                border-radius: 0 3px 3px 0;
                user-select: none;
            }

            /* Position the "next button" to the right */

            .next {
                right: 0;
                border-radius: 3px 0 0 3px;
            }

            /* On hover, add a black background color with a little bit see-through */

            .prev:hover,
            .next:hover {
                background-color: rgba(0, 0, 0, 0.8);
            }

            /* Caption text */

            .text {
                color: #000000;
                font-size: 15px;
                padding: 8px 12px;
                position: absolute;
                bottom: 8px;
                width: 100%;
                text-align: center;
            }

            /* Number text (1/3 etc) */

            .numbertext {
                color: #000000;
                font-size: 12px;
                padding: 8px 12px;
                position: absolute;
                top: 0;
            }

            /* The dots/bullets/indicators */

            .dot {
                cursor: pointer;
                height: 15px;
                width: 15px;
                margin: 0 2px;
                background-color: #bbb;
                border-radius: 50%;
                display: inline-block;
                transition: background-color 0.6s ease;
            }

            .active,
            .dot:hover {
                background-color: #717171;
            }

            /* Fading animation */

            .fade {
                animation-name: fade;
                animation-duration: 1.5s;
            }

            @keyframes fade {
                from {
                    opacity: .4
                }

                to {
                    opacity: 1
                }
            }

            /* On smaller screens, decrease text size */

            @media only screen and (max-width: 300px) {

                .prev,
                .next,
                .text {
                    font-size: 11px
                }
            }

            h2 {
                text-align: center;
            }

            .story {
                text-align: center;
            }

            .header {
                background-image: url("images/LeafBackground.jpg");
            }
        </style>
    </head>

    <body class="Background">
        <div class="header">
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
                            if (!isset($_SESSION['username'])) {
                                ?>
                                <li><a href="Account.php">Login/Register</a></li>
                            <?php } else { ?>
                                <li><a href="Profile.php"><?php echo $username ?></a></li>
                            <?php } ?>
                        </ul>
                    </nav>
                    <a href="Cart.php"><img src="images/cart.png" width="30px" height="30px"></a>
                    <img src="images/menu.png" class="menu-icon" onclick="menutoggle()">
                </div>
            </div>
        </div>
        <img style="display: block; margin-left: auto; margin-right: auto; width: 55%;" src="images/food.jpeg" alt="img" height="250px">
        <br />
        <h2>OUR STORY</h2>
        <br />
        <div class="story">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut</p>
            <p>labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco</p>
            <p>laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in</p>
            <p>voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat</p>
            <p>non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </p>
        </div>
        <br /><br />
        <h2 style="font-size: 40px;">Testimonials</h2>
        <br /><br />
        <div class="slideshow-container">

            <div class="mySlides fade">
                <p style="font-family: raleway; font-size: 40px; text-align: center;">It was brilliant! Peopple loved the food. You
                    <br />might have a few more orders soon.
                </p>
                <br /><br /><br />
                <div class="text">- Mr Celab</div>
            </div>

            <div class="mySlides fade">
                <p style="font-family: raleway; font-size: 40px; text-align: center;">It was brilliant! Peopple loved the food. You
                    <br />might have a few more orders soon.
                </p>
                <div class="text">- Ms Celab</div>
            </div>

            <div class="mySlides fade">
                <p style="font-family: raleway; font-size: 40px; text-align: center;">It was brilliant! Peopple loved the food. You
                    <br />might have a few more orders soon.
                </p>
                <div class="text">- Dr Celab</div>
            </div>

            <a class="prev" onclick="plusSlides(-1)">❮</a>
            <a class="next" onclick="plusSlides(1)">❯</a>

        </div>

        <div style="text-align:center">
            <span class="dot" onclick="currentSlide(1)"></span>
            <span class="dot" onclick="currentSlide(2)"></span>
            <span class="dot" onclick="currentSlide(3)"></span>
        </div>

        <script>
            let slideIndex = 1;
            showSlides(slideIndex);

            function plusSlides(n) {
                showSlides(slideIndex += n);
            }

            function currentSlide(n) {
                showSlides(slideIndex = n);
            }

            function showSlides(n) {
                let i;
                let slides = document.getElementsByClassName("mySlides");
                let dots = document.getElementsByClassName("dot");
                if (n > slides.length) {
                    slideIndex = 1
                }
                if (n < 1) {
                    slideIndex = slides.length
                }
                for (i = 0; i < slides.length; i++) {
                    slides[i].style.display = "none";
                }
                for (i = 0; i < dots.length; i++) {
                    dots[i].className = dots[i].className.replace(" active", "");
                }
                slides[slideIndex - 1].style.display = "block";
                dots[slideIndex - 1].className += " active";
            }
        </script>
        <br /><br /><br />

        <footer class="footer">
            <div class="container-foot">
                <div class="row-foot">
                    <div class="footer-col">
                        <h4>Mesah Delicacies</h4>
                        <ul>
                            <li><a href="About.php">about us</a></li>
                            <li><a href="Contact.php">contact us</a></li>
                        </ul>
                    </div>
                    <div class="footer-col">
                        <h4>payment methods</h4>
                        <ul>
                            <li><a>cash</a></li>
                            <li><a href="https://abs.org.sg/consumer-banking/pay-now" target="_blank">paynow</a></li>
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
        </script>
    </body>

</html>