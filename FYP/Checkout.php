<!DOCTYPE html>
<?php
session_start();

if (isset($_SESSION['username']) && isset($_SESSION['user_id'])) {
    $username = $_SESSION['username'];
    $fullname = $_SESSION['fullname'];
    $email = $_SESSION['email'];
    $address = $_SESSION['address'];
    $phoneno = $_SESSION['phoneno'];
} else if (isset($_SESSION['user_id'])) {
    $uniqId = $_SESSION['user_id'];
} else {
    $uniqId = time();
    $_SESSION['user_id'] = $uniqId;
}
?>
<html>

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Mesah Delicacies - Menu</title>
        <link rel="stylesheet" href="css/Checkout.css">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" type="text/javascript"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js" type="text/javascript"></script>
        <script>
            $(document).ready(function () {
                $.ajax({
                    type: "GET",
                    url: "getCartReading.php",
                    cache: false,
                    dataType: "JSON",
                    success: function (response) {
                        var table = "";
                        var subtotalT = "";
                        var totalT = "";
                        var totalQ = "";
                        var totalCheck = ""
                        var subtotalC = 0;
                        var subtotal = 0;
                        var delivery = 10;
                        var total = 0;
                        var totalC = 0;
                        for (i = 0; i < response.length; i++) {
                            if (subtotalC == 0) {
                                subtotalC += response[i].Quantity * response[i].Price;
                            } else if (subtotalC > 0) {
                                subtotalC -= subtotalC;
                                subtotalC += response[i].Quantity * response[i].Price;
                            }

                            totalC += parseInt(response[i].Quantity);
                            subtotal += subtotalC;
                            total = subtotal + delivery;

                            table += "<p>" + response[i].Name + " (" + response[i].Quantity + ")<span class = 'price'>" +
                                    "$" + subtotalC + "</span></p>"

                            $(".checkout_cart").html(table);
                        }

                        totalT += "<p>Total <span class = 'price' style='color:black'> <b>" +
                                "$" + total + "</b></span></p>";
                        $(".insertTotal").html(totalT);

                        totalQ += "<h4>Cart <span class='price' style='color:black'>" +
                                "<i class='fa fa-shopping-cart'></i><b>" + totalC + "</b></span>";
                        $(".insertTotalQuantity").html(totalQ);

                        totalCheck = "<input type='hidden' name='total' value='" + total + "'>"
                        $(".totalCheckout").html(totalCheck);

                    },
                    error: function (obj, textStatus, errorThrown) {
                        console.log("Error " + textStatus + ": " + errorThrown);
                    }
                });
            });
        </script>
        <script>
            function showQR() {
                var image = document.getElementById('qrImage');
                var payNow = document.getElementById('payNow');
                var cash = document.getElementById('cash');

                if (payNow.checked && image.style.display === "none") {
                    image.style.display = "block";
                } else if (cash.checked && image.style.display === "block") {
                    image.style.display = "none";
                }
            }
        </script>
    </head>

    <body>


        <div class="navbarcontainer">
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




        <div class="row">
            <div class="col-75">
                <div class="container">
                    <form action="insertCheckout.php" method="post">
                        <h3>Billing Address</h3>
                        <div class="row">
                            <?php if (isset($_SESSION['username']) && isset($_SESSION['user_id'])) { ?>
                                <label for="fname"><i class="fa fa-user"></i> Full Name</label>
                                <input type="text" id="fname" name="fullname" placeholder="John M. Doe" value="<?php echo $fullname ?>">
                                <label for="email"><i class="fa fa-envelope"></i> Email</label>
                                <input type="text" id="email" name="email" placeholder="john@example.com" value="<?php echo $email ?>">
                                <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
                                <input type="text" id="adr" name="address" placeholder="Republic poly" value="<?php echo $address ?>">
                                <label for="city"><i class="fa-solid fa-phone"></i> Phone No</label>
                                <input type="text" id="phone" name="phoneNo" placeholder="98765432" value="<?php echo $phoneno ?>">
                            <?php } else { ?>
                                <label for="fname"><i class="fa fa-user"></i> Full Name</label>
                                <input type="text" id="fname" name="fullname" placeholder="John M. Doe">
                                <label for="email"><i class="fa fa-envelope"></i> Email</label>
                                <input type="text" id="email" name="email" placeholder="john@example.com">
                                <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
                                <input type="text" id="adr" name="address" placeholder="Republic poly">
                                <label for="city"><i class="fa-solid fa-phone"></i> Phone No</label>
                                <input type="text" id="phone" name="phoneNo" placeholder="98765432">
                            <?php } ?>
                        </div>
                        <h3>Payment</h3>

                        <label for="payment">Payment method</label>
                        <input type="radio" id="payNow" name="paymentMethod" placeholder="PAYNOW" value="paynow" onclick='showQR()'>Paynow
                        <input type="radio" id="cash" name="paymentMethod" placeholder="Cash" value="cash" onclick="showQR()">Cash
                        <br>
                        <br>
                        <div id='qr'>
                            <img src="images/Kyan's paynow QR.jpg" style='display:none' id="qrImage" alt="QR Code">
                        </div>
                        <label for="ccnum">Message:</label>
                        <input type="text" id="ccnum" name="message" placeholder="Happy birthday to ....">

                        <label>
                            <div class="totalCheckout"></div>
                            <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
                        </label>
                        <input type="submit" value="Place order" class="btn">
                    </form>
                </div>
            </div>

            <div class="col-25">
                <div class="container">
                    <div class="insertTotalQuantity"></div>
                    </h4>
                    <div class="checkout_cart"></div>
                    <p>Delivery <span class="price">$10</span></p>
                    <hr>
                    <div class="insertTotal"></div>
                </div>
            </div>
        </div>
        <br>
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