<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--links -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" />

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <script src="https://unpkg.com/fullpage.js/dist/fullpage.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer">


    <title>Document</title>
</head>


<body class="Background">

    <!--PART 1-->
    <div class="section">
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
                <div class="contact">
                    <h1>CONTACT US</h1>
                    <h6>Email us or call +65 96976961 for any inquiries or feedback. <br>We would be happy to answer your questions and improve! </h6>
                </div>
                <div class="col-6">


                    <!--Left side -->

                    <div>
                        <!-- below the three text on left side -->

                        <p class="text-left">
                            Mesahdelicacies@gmail.com</p>

                        <p class="text-left"> +65 12345678</p>
                        <p class="text-left"> Delivery hours 10.00am - 6.00pm</p>
                        <p class="text-left">Come visit our sociaL media page:</p>
                        <li><i id="inst" class="fa-brands fa-instagram-square"><a
                                    href="https://www.instagram.com/mesahdelicacies" target="_blank"></i> Mesahdelicacies@instagramlink
                        </li>
                        </a>
                        <li><i id="face" class="fa-brands fa-facebook-square"><a
                                    href="https://www.facebook.com/mesah.delicacies" target="_blank"></i> Mesahdelicacies@facebook.com
                        </li>
                        </a>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>



                    </div>
                </div>
                <!--Right side -->
                <div class="col-6">
                    <div>
                        <br>
                        <br>
                        <div class="contactForm">
                            <form>
                                <div class="row">
                                    <div class="formContact">

                                        <p> NAME:
                                            <input class="inputC" type="text" id="name" required>
                                        </p>



                                    </div>
                                    <div class="formContact">

                                        <p> Email:
                                            <input class="inputC" type="text" id="number" required>
                                        </p>



                                    </div>

                                    <div class="formContact">

                                        <p> SUBJECT:
                                            <input class="inputC" type="text" id="email" required>
                                        </p>



                                    </div>
                                    <div class="formContact">
                                        <p> MESSAGE:
                                            <textarea id="message" rows="8" required></textarea>
                                        </p>


                                    </div>
                                </div>
                                <div class="btn btn-outline-success text-light " role="button">Submit</div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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