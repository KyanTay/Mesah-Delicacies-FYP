<!DOCTYPE html>
<?php
include "dbFunction.php";
session_start();


if (!isset($_SESSION['user_id']) && empty($_SESSION['user_id'])) {
    header("Location: Account.php");
} else if ($_SESSION['usertype'] == 'user' || !isset($_SESSION['usertype'])) {
    header("Location: Account.php");
}

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
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="CSS/styleA.css">
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" type="text/javascript"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js" type="text/javascript"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <title>Admin Dashboard Panel</title> 
        <script>
            $(document).ready(function () {
                $.ajax({
                    type: "GET",
                    url: "getMenuAReading.php",
                    cache: false,
                    dataType: "JSON",
                    success: function (response) {
                        var table = "";
                        for (i = 0; i < response.length; i++) {

                            table += "<form " + "class='col-4'" + "action='menuEdit.php'method='post'" + ">"
                                    + "<input class='inputFood' id='foodid' name='foodid' type='hidden' value='" + response[i].FoodID + "'>"
                                    + "<img src='images/" + response[i].Image + "'>"
                                    + "<h4>" + response[i].FoodName + "</h4>"
                                    + "<p>$" + response[i].Price + "</p>"
                                    + "<button type='submit'class='btnMain'>Edit</button>"
                                    + "</form>";

                            $(".menuFF").html(table);

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
                        <span class="text">Menu</span>
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
                    <div class="title">
                        <i class="uil uil-clock-three"></i>
                        <span class="text">All items</span>
                    </div>

                    <div class="small-container">
                        <div class="row menuFF"></div>
                    </div>
                </div>
            </div>
        </section>
        <script>
            swal({
                title: "Deleted",
                text: "Item has been Deleted",
                icon: "success",
                button: "View Menu",
            });

        </script>
        <script src="script/script.js"></script>
    </body>
</html>