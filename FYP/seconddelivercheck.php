<!DOCTYPE html>
<?php
include "dbFunction.php";
session_start();


if (!isset($_SESSION['user_id']) && empty($_SESSION['user_id'])) {
    header("Location: Account.php");
} else if ($_SESSION['usertype'] == 'user' || !isset($_SESSION['usertype'])) {
    header("Location: Account.php");
}

$query = "SELECT * FROM checkout WHERE DStatus = 'Delivering'";
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
        <script>
            $(document).ready(function () {
                $.ajax({
                    type: "GET",
                    url: "getReadingDeliver.php",
                    cache: false,
                    dataType: "JSON",
                    success: function (response) {
                        var table = "";
                        for (i = 0; i < response.length; i++) {
                            table += "<tr>" +
                                    "<td>" + response[i].FullName + "</td>" +
                                    "<td>" + response[i].Email + "</td>" +
                                    "<td>" + response[i].PhoneNo + "</td>" +
                                    "<td>$" + response[i].TotalPrice + "</td>" +
                                    "<td>" + response[i].Status + "</td>" +
                                    "<td>" + response[i].DStatus + "</td>" +
                                    "<td>" + response[i].PaymentMethod + "</td>" +
                                    "<td>" +
                                    "<form action='deliveredCheck.php' method='post'>" +
                                    "<input type='hidden' name='fullname' value='" + response[i].FullName + "'/>" +
                                    "<input type='hidden' name='checkid' value='" + response[i].CheckoutID + "'/>" +
                                    "<input type='hidden' name='email' value='" + response[i].Email + "'/>" +
                                    "<input type='hidden' name='phoneno' value='" + response[i].PhoneNo + "'/>" +
                                    "<input type='hidden' name='totalprice' value='" + response[i].TotalPrice + "'/>" +
                                    "<input type='hidden' name='orderid' value='" + response[i].orderID + "'/>" +
                                    "<input type='checkbox' name='checkbox' class='check-box2' id='clickC' required>" +
                                    "<button class='btnMain' type='submit'>Completed</button>" +
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
                        <i class="uil uil-truck"></i>
                        <span class="text">Delivering Orders</span>
                    </div>

                    <div class="boxes">
                        <div class="box box4">
                            <i class="uil uil-truck"></i>
                            <span class="text">Number of items delivering</span>
                            <span class="number"><?php echo $row_cnt ?></span>
                        </div>
                    </div>
                    <div class="activity">
                        <div class="title">
                            <i class="uil uil-truck"></i>
                            <span class="text">Recent Activity</span>

                        </div>
                        <div class="small-container cart-page">
                            <table>
                                <tr>
                                    <th>Full Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Total Price</th>
                                    <th>Payment status</th>
                                    <th>Delivery Status</th>
                                    <th>Payment Method</th>
                                    <th>Delivered check</th>

                                </tr>
                                <tbody class="checkoutInsert"></tbody>
                            </table>
                        </div>
                    </div>
                </div>
        </section>
        <script>
            swal({
                title: "Delivery Completed",
                text: "Update successful",
                icon: "success",
                button: "Back",
            });
        </script>

        <script src="script/script.js"></script>
    </body>

</html>