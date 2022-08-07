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


include "dbFunction.php";

$email = $_SESSION['email'];

$queryCheck = "SELECT * FROM user WHERE Email = '$email'";

$resultCheck = mysqli_query($link, $queryCheck) or die(mysqli_error($link));

if (mysqli_num_rows($resultCheck) == 1) {

    $row = mysqli_fetch_array($resultCheck);

    $email = $_SESSION['email'];
    $username = $_SESSION['username'];
    $fullname = $_SESSION['fullname'];
    $address = $_SESSION['address'];
    $phoneno = $_SESSION['phoneno'];
}

$orderID = $_POST['orderid'];
$query = "SELECT * FROM admincart WHERE orderID = '$orderID'";
$result = mysqli_query($link, $query) or die(mysqli_errno($link));

while ($rowU = mysqli_fetch_array($result)) {
    $response[] = $rowU;
}
?>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="test">
        <title>Mesah Delicacies - Home</title>
        <link rel="stylesheet" href="CSS/profilestyle.css">
        <script type="module" src="main.js"></script>
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" type="text/javascript"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js" type="text/javascript"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>

    <body>
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

        <div class="sttngs">
            <h2>Rate Ordered Items</h2>
            <div class="tabordion">
                <div class="small-container cart-page">
                    <table>
                        <tr>
                            <th>Product</th>
                            <th>SubTotal</th>
                            <th>Rating</th>
                            <th>Submit Rating</th>
                        </tr>
                        <?php
                        $subtotalC = 0;
                        $subtotal = 0;
                        $delivery = 10;
                        $total = 0;
                        for ($i = 0; $i < count($response); $i++) {
                            $name = $response[$i]['FoodName'];
                            $price = $response[$i]['FoodPrice'];
                            $quantity = $response[$i]['FoodQuantity'];
                            $foodID = $response[$i]['FoodID'];


                            if ($subtotalC == 0) {
                                $subtotalC += $quantity * $price;
                            } else if ($subtotalC > 0) {
                                $subtotalC -= $subtotalC;
                                $subtotalC += $quantity * $price;
                            }

                            $subtotal += $subtotalC;
                            $total = $subtotal + $delivery;
                            ?>
                            <tr>
                                <td><?php echo $name ?></td>
                                <td>$<?php echo $subtotalC ?></td>
                                <td>
                                    <form action='addRating.php' method='post'>
                                        <div class="rateyo" id= "rating"
                                             data-rateyo-rating="4"
                                             data-rateyo-num-stars="5"
                                             data-rateyo-score="3">
                                        </div>
                                        <input type="hidden" name="rating">
                                        </td>
                                        <td>
                                            <input type='hidden' name='foodID' value='<?php echo $foodID ?>'/>
                                            <button class='btnMain' type='submit' name="btnConfirm">Confirm</button>
                                    </form>
                                </td>
                            </tr>                
                        <?php } ?>
                    </table>
                    <div class="checkout-btn">
                        <a href="Profile.php" class="btn-cart">GO BACK</a>
                    </div>
                </div>
            </div>
        </div>

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

            $(function () {
                $(".rateyo").rateYo().on("rateyo.change", function (e, data) {
                    var rating = data.rating;
                    $(this).parent().find('.result').text(rating);
                    $(this).parent().find('input[name=rating]').val(rating); //add rating value to input field
                });
            });
        </script>
    </body>

</html>