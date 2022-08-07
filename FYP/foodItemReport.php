<!DOCTYPE html>
<?php
include "dbFunction.php";
session_start();

if (!isset($_SESSION['user_id']) && empty($_SESSION['user_id'])) {
    header("Location: Account.php");
} else if ($_SESSION['usertype'] == 'user' || !isset($_SESSION['usertype'])) {
    header("Location: Account.php");
}

/* Graph */
date_default_timezone_set("Asia/Singapore");
$dateY = date('y');
$sql = "SELECT * FROM fooditem";
$resultG = mysqli_query($link, $sql);
while ($rowG = mysqli_fetch_array($resultG)) {

    $rating[] = $rowG['Rating'];
    $foodname[] = $rowG['FoodName'];
}
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.2/chart.min.js" integrity="sha512-zjlf0U0eJmSo1Le4/zcZI51ks5SjuQXkU0yOdsOBubjSmio9iCUp8XPLkEAADZNBdR9crRy3cniZ65LF2w8sRA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <title>Admin Dashboard Panel</title>
        <script>
            $(document).ready(function () {
                $.ajax({
                    type: "GET",
                    url: "getReadingCO.php",
                    cache: false,
                    dataType: "JSON",
                    success: function (response) {
                        var table = "";
                        for (i = 0; i < response.length; i++) {
                            table += "<tr>" +
                                    "<td>" + response[i].FullName + "</td>" +
                                    "<td>" + response[i].Email + "</td>" +
                                    "<td>" + response[i].PhoneNo + "</td>" +
                                    "<td>$" + response[i].amountSpent + "</td>" +
                                    "<td>" + response[i].Date + "</td>" +
                                    "<td>" + response[i].orderID + "</td>" +
                                    "<td>" +
                                    "<form action='adminCO.php' method='post'>" +
                                    "<input type='hidden' name='orderid' value='" + response[i].orderID + "'/>" +
                                    "<button class='btnMain' type='submit'>View</button>" +
                                    "</form>" +
                                    "</td>" +
                                    "</tr>" +
                                    "<hr>";
                            $(".checkoutInsert").html(table);
                        }
                    },
                    error: function (obj, textStatus, errorThrown) {
                        console.log("Error " + textStatus + ": " + errorThrown);
                    }
                });
            });
        </script>
        <style>
            .boxes .box.box1:hover {
                background: #272822;
            }

            .boxes .box.box2:hover {
                background: #272822;
            }

            .boxes .box.box3:hover {
                background: #272822;
            }
        </style>
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
                        <span class="text">Dashboard</span>
                    </div>
                    <div class="boxes">
                        <a class="box box1" href="adminReport.php" style="text-decoration:none">
                            <i class="uil uil-bill"></i>
                            <span class="text">Revenue Report</span>
                        </a>

                        <a class="box box2" href="adminUserR.php" style="text-decoration:none">
                            <i class="uil uil-user"></i>
                            <span class="text">Users Report</span>
                        </a>

                        <a class="box box3" href="foodItemReport.php" style="text-decoration:none">
                            <i class="uil uil-utensils-alt"></i>
                            <span class="text">Food Item Report</span>
                        </a>
                    </div>
                </div>
                <div class="activity">
                    <div class="title">
                        <i class="uil uil-clock-three"></i>
                        <span class="text">Recent Activity</span>
                    </div>

                    <div class="small-container cart-page">
                        <div style="width:auto;height:5%;text-align:center">
                            <canvas id="chartjs_line"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <script src="//code.jquery.com/jquery-1.9.1.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
        <script type="text/javascript">
            var ctx = document.getElementById("chartjs_line").getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: <?php echo json_encode($foodname); ?>,
                    datasets: [{
                            backgroundColor: [
                                "#4DA3FF"
                            ],
                            data: <?php echo json_encode($rating); ?>,
                        }]
                },
            });
        </script>

        <script src="script/script.js"></script>
    </body>

</html>