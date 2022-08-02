<!DOCTYPE html>
<?php
session_start();

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
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <style>
            * {
                box-sizing: border-box;
                font-family: 'Poppins', sans-serif;
            }

            /* Style inputs */

            .inputCo[type=text],
            select,
            textarea {
                width: 100%;
                padding: 12px;
                border: 1px solid #ccc;
                margin-top: 6px;
                margin-bottom: 16px;
                resize: vertical;
            }

            .inputCo[type=submit] {
                background-color: #04AA6D;
                color: white;
                padding: 12px 20px;
                border: none;
                cursor: pointer;
            }

            .inputCo[type=submit]:hover {
                background-color: #45a049;
            }

            /* Create two columns that float next to eachother */

            .columnC {
                float: left;
                width: 50%;
                margin-top: 6px;
                padding: 20px;
            }

            /* Clear floats after the columns */

            .rowC:after {
                content: "";
                display: table;
                clear: both;
            }

            /* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */

            @media screen and (max-width: 600px) {

                .columnC,
                .inputCo[type=submit] {
                    width: 100%;
                    margin-top: 0;
                }
            }

            .inputD {
                width: 100%;
                padding: 10px;
                outline: 0;
                color: white;
                background: transparent;
                font-size: 15px;
            }

            .email {
                color: #fff;
            }

            #map {
                height: 400px;
                /* The height is 400 pixels */
                width: 100%;
                /* The width is the width of the web page */
            }
        </style>
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
        </div>

        <div style="text-align:center">
            <h2>Contact Us</h2>
            <p>Email us or call +65 96976961 for any inquiries or feedback. <br>We would be happy to answer your questions and improve! </p>
        </div>
        <div class="rowC">
            <div class="columnC">
                <div id="map"></div>
            </div>
            <div class="columnC">
                <form action="contactInsert.php" method="post">
                    <label for="fname">Full Name</label>
                    <input class="inputCo" type="text" id="fname" name="fullname" placeholder="Your name..">
                    <label for="lname">Email</label>
                    <input class="inputCo" type="text" id="lname" name="email" placeholder="Your email..">
                    <label for="country">Subject</label>
                    <input class="inputCo" type="text" id="country" name="subject" placeholder="Subject..">
                    <br>
                    <label for="subject">Message</label>
                    <textarea id="subject" name="message" placeholder="Write something.." style="height:170px"></textarea>
                    <input class="inputCo" type="submit" value="Submit">
                </form>
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

        function initMap() {
            // The location of Uluru
            const uluru = {
                lat: -25.344,
                lng: 131.031
            };
            // The map, centered at Uluru
            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 4,
                center: uluru,
            });
            // The marker, positioned at Uluru
            const marker = new google.maps.Marker({
                position: uluru,
                map: map,
            });
        }

        window.initMap = initMap;
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB41DRUbKWJHPxaFjMAwdrzWzbVKartNGg&callback=initMap&v=weekly" defer></script>
</body>

</html>