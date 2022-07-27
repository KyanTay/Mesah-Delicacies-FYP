<!DOCTYPE html>
<?php
session_start();
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
                            total = subtotal + delivery;

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
                                    + "<td><input type='number' value='" + response[i].Quantity + "'></td>"
                                    + "<td>$" + subtotalC + "</td>"
                                    + "</tr>";

                            $(".cartItemInsert").html(table);
                        }
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
                    <a href="home.php"><img src="images/banana.png" width="63px"></a>
                </div>
                <nav>
                    <ul id="MenuItems">
                        <li><a href="home.html">Home</a></li>
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
