<!DOCTYPE html>
<?php
include "dbFunction.php";

session_start();

if (!isset($_SESSION['user_id']) && empty($_SESSION['user_id'])) {
    header("Location: Account.php");
} else if ($_SESSION['usertype'] == 'user' || !isset($_SESSION['usertype'])) {
    header("Location: Account.php");
}


$userIDView = $_POST['userid'];
$orderID = $_POST['orderid'];

$query = "SELECT * FROM admincart WHERE userID = '$userIDView' and orderID = '$orderID'";
$result = mysqli_query($link, $query) or die(mysqli_errno($link));

while ($row = mysqli_fetch_array($result)) {
    $response[] = $row;
}

$queryU = "SELECT * FROM checkout WHERE Status = 'pending'";
$resultU = mysqli_query($link, $queryU) or die(mysqli_errno($link));

while ($rowU = mysqli_fetch_array($resultU)) {
    $responseU[] = $rowU;
}

$row_cnt = count((array) $responseU);
?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="CSS/styleA.css">
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" type="text/javascript"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js" type="text/javascript"></script>
        <title>Admin Dashboard Panel</title> 
    </head>
    <body>
        <nav>
            <div class="logo-name">
                <span class="logo_name">MesahDelicacies</span>
            </div>

            <div class="menu-items">
                <ul class="nav-links">
                    <li><a href="adminReport.php">
                            <i class="uil uil-estate"></i>
                            <span class="link-name">Dahsboard</span>
                        </a></li>
                    <li><a href="adminMain.php">
                            <i class="uil uil-files-landscapes"></i>
                            <span class="link-name">Pending Orders</span>
                        </a></li>
                    <li><a href="adminCheck.php">
                            <i class="uil uil-truck"></i>
                            <span class="link-name">Delivering Orders</span>
                        </a></li>
                    <li><a href="adminFullCO.php">
                            <i class="uil uil-check-circle"></i>
                            <span class="link-name">Completed Orders</span>
                        </a></li>
                    <li><a href="adminMenu.php">
                            <i class="uil uil-book-alt"></i>
                            <span class="link-name">Menu</span>
                        </a></li>
                    <li><a href="adminMenuAdd.php">
                            <i class="uil uil-book-medical"></i>
                            <span class="link-name">Menu Add</span>
                        </a></li>
                    <li><a href="adminQuestion.php">
                            <i class="uil uil-comments"></i>
                            <span class="link-name">Question</span>
                        </a></li>
                </ul>

                <ul class="logout-mode">
                    <li><a href="adminLogout.php">
                            <i class="uil uil-signout"></i>
                            <span class="link-name">Logout</span>
                        </a></li>

                    <li class="mode">
                        <a href="#">
                            <i class="uil uil-moon"></i>
                            <span class="link-name">Dark Mode</span>
                        </a>

                        <div class="mode-toggle">
                            <span class="switch"></span>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>

        <section class="dashboard">
            <div class="top">
                <i class="uil uil-bars sidebar-toggle"></i>

                <img src="MDLogo.svg" alt="">
            </div>

            <div class="dash-content">
                <div class="overview">
                    <div class="title">
                        <i class="uil uil-tachometer-fast-alt"></i>
                        <span class="text">Items bought by customer</span>
                    </div>

                    <div class="boxes">
                        <div class="box box4">
                            <i class="uil uil-comments"></i>
                            <span class="text">Number of Pending Orders</span>
                            <span class="number"><?php echo $row_cnt ?></span>
                        </div>
                    </div>
                    <div class="activity">
                        <div class="title">
                            <i class="uil uil-clock-three"></i>
                            <span class="text">Food Items purchased</span>

                        </div>
                        <div class="small-container cart-page">
                            <table>
                                <tr>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>SubTotal</th>
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
                                        <td><?php echo $quantity ?></td>
                                        <td><?php echo $subtotalC ?></td>
                                    </tr>                
                                <?php } ?>
                            </table>
                            <div class="total-price">
                                <table>
                                    <tr>
                                        <td>Subtotal</td>
                                        <td>$<?php echo $subtotal ?></td>
                                    </tr>
                                    <tr>
                                        <td>Delivery Fee</td>
                                        <td class="child">$10.00</td>
                                    </tr>
                                    <tr>
                                        <td>Total</td>
                                        <td>$<?php echo $total ?></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="checkout-btn">
                                <a href="adminMain.php" class="btn-cart">GO BACK</a>
                            </div>
                        </div>
                    </div>
                </div>
        </section>

        <script src="script/script.js"></script>
    </body>
</html>