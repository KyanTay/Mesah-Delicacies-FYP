<!DOCTYPE html>
<?php
session_start();

if (!isset($_SESSION['user_id']) && empty($_SESSION['user_id'])) {
    header("Location: Account.php");
} else if ($_SESSION['usertype'] == 'user' || !isset($_SESSION['usertype'])) {
    header("Location: Account.php");
}
include "dbFunction.php";

$query = "SELECT * FROM fooditem";
$result = mysqli_query($link, $query) or die(mysqli_errno($link));

while ($row = mysqli_fetch_array($result)) {
    $response[] = $row;
}

$row_cnt = count((array) $response);
?>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <link rel="stylesheet" href="CSS/styleA.css">
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" type="text/javascript"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js" type="text/javascript"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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
                        <span class="text">Menu Add</span>
                    </div>

                    <div class="boxes">
                        <div class="box box4">
                            <i class="uil uil-comments"></i>
                            <span class="text">Items on menu</span>
                            <span class="number"><?php echo $row_cnt ?></span>
                        </div>
                    </div>
                </div>
                <div class="activity">
                    <div class="small-container">
                        <header>ADD TO MENU</header>
                        <form id="form" class="topBefore" action="doAdminInsert.php" enctype="multipart/form-data" method="post">
                            <input id="name" type="text" name="itemName" placeholder="FOOD NAME" required="">
                            <input id="price" type="text" name="itemPrice" placeholder="FOOD PRICE" required="">
                            <br>
                            <input id="price" type="text" placeholder="IMAGE" disabled="">
                            <input type="hidden" name="size" value="1000000">
                            <div>
                                <input type="file" name="image" required>
                            </div>
                            <textarea id="message" type="text" placeholder="DESCRIPTION" name="itemDesc" required=""></textarea>
                            <input id="submitForm" name="upload" type="submit" value="GO!">
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <script>
            swal({
                title: "Unsuccessful",
                text: "Error adding item",
                icon: "warning",
                button: "Try Again",
            });
        </script>
        <script src="script/script.js"></script>
    </body>

</html>