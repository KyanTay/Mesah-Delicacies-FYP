<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/ShoppingCart.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <title>Shopping Cart</title>
</head>

<body>
    <div class="header">
        <div class="container">
            <div class="navbar">
                <div class="logo">
                    <a href="home.html"><img src="images/banana.png" width="63px"></a>
                </div>
                <nav>
                    <ul id="MenuItems">
                        <li><a href="home.html">Home</a></li>
                        <li><a href="Menu.html">Menu</a></li>
                        <li><a href="About.html">About</a></li>
                        <li><a href="Contact.html">Contact</a></li>
                        <li><a href="Login.html">Profile</a></li>
                    </ul>
                </nav>
                <a href="Cart.html"><img src="images/cart.png" width="30px" height="30px"></a>
                <img src="images/menu.png" class="menu-icon" onclick="menutoggle()">
            </div>
        </div>
    </div>
    <div class="topBox">
        <div class="container">
            <di v class="row">
                <div class="col" id="selectAllBtn">
                    <input type="checkbox" onClick="toggle(this)" /> Select all
                </div>
                <div class="col">
                    Product
                </div>
                <div class="col">
                    Quantity
                </div>
                <div class="col">
                    Total Price
                </div>
                <div class="col">
                    Actions
                </div>
            </div>

        </div>
    </div>
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
        // To toggle check all
        function toggle(source) {
            checkboxes = document.getElementsByTagName('products');
            for (var i = 0, n = checkboxes.length; i < n; i++) {
                checkboxes[i].checked = source.checked;
            }
        }
    </script>
</body>

</html>