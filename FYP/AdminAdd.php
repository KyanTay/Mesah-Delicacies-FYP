<!DOCTYPE html>
<?php
session_start();
?>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--links -->
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
              rel="stylesheet">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
              integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
              crossorigin="anonymous" referrerpolicy="no-referrer">


        <title>Document</title>
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
                margin-top: 30px;
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

            .changepic {
                width: 100%;
                background-color: #04AA6D;
                color: white;
                height: 50px;
            }

            .adminnav {
                display: flex;
                align-items: center;
                justify-self: center;
                padding-left: 33%;
                padding-right: 25%;
            }

            .adminnav ul {
                display: inline-block;
                list-style-type: none;
            }

            .adminnav ul li {
                display: inline-block;
                margin-right: 40px;
                margin-left: 0px;
            }
        </style>
    </head>


    <body class="Background">
        <div class="container">
            <div class="navbar">
                <div class="logo">
                    <a href="home.php"><img src="images/banana.png" width="63px"></a>
                </div>
                <nav>
                    <ul id="MenuItems">
                        <li><a href="home.php">Home</a></li>
                        <li><a href="Menu.php">Menu</a>
                            <ul>
                                <li><a href="MenuMD.php">Main Dish</a></li>
                                <li><a href="MenuAO.php">Add On</a></li>
                            </ul>
                        </li>
                        <li><a href="About.php">About</a></li>
                        <li><a href="Contact.php">Contact</a></li>
                        <li><a href="Account.php">Profile</a></li>
                    </ul>
                </nav>
                <a href="Cart.php"><img src="images/cart.png" width="30px" height="30px"></a>
                <img src="images/menu.png" class="menu-icon" onclick="menutoggle()">
            </div>
            <div style="text-align:center">
                <h2>Admin page</h2>
                <br>
            </div>
            <div class="rowC">

                <form method="post" action="doAdminInsert.php" enctype="multipart/form-data">
                    <label for="fname">New Item name</label>
                    <input class="inputCo" type="text" id="fname" name="itemName" placeholder="Item name" required>
                    <label for="lname">New Price:</label>
                    <input class="inputCo" type="text" id="lname" name="itemPrice" placeholder="Price: " required>
                    <br>
                    <label for="subject">New Description</label>
                    <textarea id="subject" name="itemDesc" placeholder="Food descriptions"
                              style="height:170px" required></textarea>
                    <label for="subject">Picture:</label>
                    <input type="hidden" name="size" value="1000000">
                    <div>
                        <input type="file" name="image" required>
                    </div>
                    <br>
                    <input class="inputCo" name="upload" type="submit" value="Submit">
                </form>
                <br>
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