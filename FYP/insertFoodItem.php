<!DOCTYPE html>
<?php
include "dbFunction.php";

session_start();

$userID = $_SESSION['user_id'];
$foodItemName = $_SESSION['food_nameDS'];
$foodItemPrice = $_SESSION['food_priceDS'];
$foodItemImage = $_SESSION['food_imageDS'];

$quantityItem = $_POST['quantity'];

$food_idD = $_SESSION['food_idDS'];
$food_nameD = $_SESSION['food_nameDS'];
$food_priceD = $_SESSION['food_priceDS'];
$food_descD = $_SESSION['food_descDS'];
$food_imageD = $_SESSION['food_imageDS'];

if (isset($_SESSION['user_id'])) {
    $username = $_SESSION['username'];
}

$duplicateItem = "SELECT * FROM fooditemcart WHERE user_id = '$userID' AND Name = '$foodItemName'";
$duplicate = mysqli_query($link, $duplicateItem);

if (mysqli_num_rows($duplicate) > 0) {
    $queryDuplicate = "UPDATE fooditemcart SET Quantity = Quantity + '$quantityItem' WHERE user_id = '$userID' AND Name = '$foodItemName'";

    $statusD = mysqli_query($link, $queryDuplicate);
} else if (mysqli_num_rows($duplicate) == 0) {
    $query = "INSERT INTO fooditemcart (Quantity, Price, Image, Name, user_id) VALUES ('$quantityItem','$foodItemPrice','$foodItemImage','$foodItemName', '$userID')";

    $status = mysqli_query($link, $query) or die($link);
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
        <script>
            $(document).ready(function () {
                $.ajax({
                    type: "GET",
                    url: "getReadingDetails.php",
                    cache: false,
                    dataType: "JSON",
                    success: function (response) {
                        var table = "";
                        for (i = 0; i < response.length; i++) {
                            table += "<form " + "class='col-4'" + "action='Details.php'method='post'" + ">" +
                                    "<input class='inputFood' id='foodid' name='foodid' value='" + response[i].FoodID + "'>" +
                                    "<img src='images/" + response[i].Image + "'>" +
                                    "<h4>" + response[i].FoodName + "</h4>" +
                                    "<p>$" + response[i].Price + "</p>" +
                                    "<button type='submit'class='btnMenu'>Shop Now</button>" +
                                    "</form>";
                            $(".menuFF").html(table);
                        }
                    },
                    error: function (obj, textStatus, errorThrown) {
                        console.log("Error " + textStatus + ": " + errorThrown);
                    }
                });
            });
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
                        <li><a href="Menu.php">Menu</a></li>
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
            <a href="Menu.php" class="left-arrow"><i class="fa-solid fa-angle-left fa-2x"></i></a>
        </div>
        <!--Details-->
        <div class="small-container food-items">
            <div class="row">
                <div class="col-2">
                    <img src="images/<?php echo $food_imageD ?>" width="100%" id="foodImg">
                </div>
                <form class="col-2" action="insertFoodItem.php" method="POST">
                    <p>Menu/Main Dish</p>
                    <h1><?php echo $food_nameD ?></h1>
                    <h4>$<?php echo $food_priceD ?></h4>
                    <h3>Quantity:</h3>
                    <input type="number" value="1" id="quantity" name="quantity">
                    <button class="btnCart" type="submit">Add to Cart</button>
                    <h3>Product Details</h3>
                    <br>
                    <p><?php echo $food_descD ?></p>
                </form>
            </div>
        </div>
        <!--Other food items title-->
        <div class="small-container">
            <div class="row row-2">
                <h2>Related Dishes</h2>
                <a class="ViewMore" href="Menu.php">View More</a>
            </div>
        </div>

        <!--Other food items-->
        <div class="small-container">
            <div class="row">
                <div class="row menuFF"></div>
            </div>
        </div>

        <!--Footer-->
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
            /*Menu Script*/
            var MenuItems = document.getElementById("MenuItems");

            MenuItems.style.maxHeight = "0px";

            function menutoggle() {
                if (MenuItems.style.maxHeight == "0px") {
                    MenuItems.style.maxHeight = "200px";
                } else {
                    MenuItems.style.maxHeight = "0px";
                }
            }

            swal({
                title: "Successful",
                text: "You item is added to cart",
                icon: "success",
                button: "Back",
            });

        </script>
    </body>

</html>