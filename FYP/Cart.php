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
        <title>Mesah Delicacies - Menu</title>
        <link rel="stylesheet" href="css/style.css">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" type="text/javascript"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js" type="text/javascript"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer"
              />
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
                        var subtotalC = 0;
                        var subtotal = 0;
                        var delivery = 10;
                        var total = 0;
                        for (i = 0; i < response.length; i++) {
                            if (subtotalC == 0) {
                                subtotalC += response[i].Quantity * response[i].Price;
                            } else if (subtotalC > 0) {
                                subtotalC -= subtotalC;
                                subtotalC += response[i].Quantity * response[i].Price;
                            }

                            subtotal += subtotalC;

                            table += "<tr>"
                                    + "<td>"
                                    + "<div class='cart-info'>"
                                    + "<img src='images/" + response[i].Image + "'>"
                                    + "<form action='cartDelete.php' method='POST'>"
                                    + "<p>" + response[i].Name + "<p>"
                                    + "<small>Price: $" + response[i].Price + "</small>"
                                    + "<br>"
                                    + "<input type='hidden' name='itemID' value='" + response[i].CartID + "'/>"
                                    + "<button class='btnRemoveC' type='submit'>Remove</button>"
                                    + "</form>"
                                    + "</div>"
                                    + "</td>"
                                    + "<td>" + response[i].Quantity + "</td>"
                                    + "<td>$" + subtotalC + "</td>"
                                    + "</tr>";

                            $(".cartItemInsert").html(table);
                        }
                        total = subtotal + delivery;
                        subtotalT += "$" + subtotal;
                        totalT += "$" + total;
                        $(".cartItemInsertST").html(subtotalT);
                        $(".cartItemInsertT").html(totalT);
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

        <!--Cart Details-->
        <div class="small-container cart-page">
            <table>
                <tr>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>SubTotal</th>
                </tr>
                <tbody class="cartItemInsert"></tbody>
            </table>
            <div class="total-price">
                <table>
                    <tr>
                        <td>Subtotal</td>
                        <td class="cartItemInsertST"></td>
                    </tr>
                    <tr>
                        <td>Delivery Fee</td>
                        <td class="child">$10.00</td>
                    </tr>
                    <tr>
                        <td>Total</td>
                        <td class="cartItemInsertT"></td>
                    </tr>
                </table>
            </div>
            <div class="checkout-btn">
                <a href="Checkout.php" class="btn-cart">Checkout</a>
            </div>
        </div>

        <!--Footer-->
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
        </script>
    </body>

</html>
