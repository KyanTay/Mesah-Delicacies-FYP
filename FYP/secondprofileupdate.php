<!DOCTYPE html>
<?php
session_start();
if (isset($_SESSION['user_id'])) {
    $username = $_SESSION['username'];
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
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer"
              />
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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

        <div class="sttngs">
            <h2>SETTINGS</h2>
            <div class="tabordion">
                <section id="section1">
                    <input class="t" type="radio" name="sections" id="option1" checked>
                    <label for="option1" class="trr">Account</label>
                    <article>
                        <form method="post" action="profileUpdate.php">
                            <div class="frm">     
                                <div class="tr">
                                    <label class="label" for="input">FULLNAME</label>
                                    <input class="input" type="text" id="input" name="fullname" value="<?php echo $fullname ?>" required>

                                    <label class="label" for="input">USERNAME</label>	
                                    <input class="input" type="text" id="input"  name="username" value="<?php echo $username ?>" required>

                                    <label class="label" for="input">ADDRESS</label>	
                                    <input class="input" type="text" id="input"  name="address" value="<?php echo $address ?>" required>

                                    <label class="label" for="input">PHONE NO</label>	
                                    <input class="input" type="text" id="input"  name="phoneno" value="<?php echo $phoneno ?>" required>

                                    <label class="label" for="input">EMAIL</label>	
                                    <input class="input" type="text" id="input"  name="email" value="<?php echo $email ?>" required>
                                </div>
                                <br>
                                <button type="submit">Update profile</button>
                            </div>
                        </form>
                    </article>
                </section>
                <section id="section2">
                    <input class="t" type="radio" name="sections" id="option2">
                    <label for="option2" class="trr">ORDER DETAILS</label>
                    <article>
                        <div class="small-container cart-page">
                            <table>
                                <tr>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>SubTotal</th>
                                </tr>
                                <tbody class="cartItemInsert"></tbody>
                            </table>
                        </div>
                    </article>
                </section>
                <section id="section3">
                    <input class="t" type="radio" name="sections" id="option3">
                    <label for="option3" class="trr">Password</label>
                    <article>
                        <form method="post" action="profilePassword.php">
                            <div class="tr wwq">
                                <label class="label" for="input">current Password</label>	
                                <input class="input e" type="password" id="input" name="currentpassword">

                                <label class="label" for="input">new password</label>	
                                <input class="input e" type="password" id="input" name="newpassword">
                            </div> 
                            <button type="submit">Change Password</button>
                        </form>
                    </article>
                </section>
                <section id="section4">
                    <input class="t" type="radio" name="sections" id="option4">
                    <label for="option4" class="trr">
                        <form action="doLogOut.php">
                            <button type="submit">Logout</button>
                        </form>
                    </label>
                </section>
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
            swal({
                title: "Updated",
                text: "Your details have been successfully updated",
                icon: "success",
                button: "Back",
            });

        </script>

    </body>
</html>