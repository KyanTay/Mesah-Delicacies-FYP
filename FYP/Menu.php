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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer"
              />
        <script>
            $(document).ready(function () {
                $.ajax({
                    type: "GET",
                    url: "getReading.php",
                    cache: false,
                    dataType: "JSON",
                    success: function (response) {
                        var table = "";
                        var x = 0;
                        for (i = 0; i < response.length; i++) {
                            if (x <= 2) {
                                table += "<form " + "class='col-4'" + "action='Details.php'method='post'" + ">"
                                        + "<input class='inputFood' id='foodid' name='foodid' value='" + response[i].FoodID + "'>"
                                        + "<img src='images/" + response[i].Image + "'>"
                                        + "<h4>" + response[i].FoodName + "</h4>"
                                        + "<p>$" + response[i].Price + "</p>"
                                        + "<button type='submit'class='btnMenu'>Shop Now</button>"
                                        + "</form>";
                                x = x + 1;
                                $(".menuFF").html(table);
                            } else if (x > 2) {
                                table += "<form " + "class='col-4'" + "action='Details.php'method='post'" + ">"
                                        + "<input class='inputFood' id='foodid' name='foodid' value='" + response[i].FoodID + "'>"
                                        + "<img src='images/" + response[i].Image + "'>"
                                        + "<h4>" + response[i].FoodName + "</h4>"
                                        + "<p>$" + response[i].Price + "</p>"
                                        + "<button type='submit'class='btnMenu'>Shop Now</button>"
                                        + "</form> <div class='row'>";
                                x = x - 3;
                                $(".menuFF").html(table);
                            }
                        }
                    },
                    error: function (obj, textStatus, errorThrown) {
                        console.log("Error " + textStatus + ": " + errorThrown);
                    }
                });
            }
            );
        </script>
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
                            <li><a href="Profile.php"><?php echo $username?></a></li>
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

        <div class="small-container">
            <div class="row row-2">
                <h2>Menu</h2>
            </div>
            <div class="row menuFF"></div>
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
            </script>
    </body>
</html>