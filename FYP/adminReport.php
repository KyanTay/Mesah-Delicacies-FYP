<!DOCTYPE html>
<?php
include "dbFunction.php";
session_start();

if (!isset($_SESSION['user_id']) && empty($_SESSION['user_id'])) {
    header("Location: Account.php");
} else {
    $usertype = $_SESSION['usertype'];
    echo $usertype;
}

/*Completed Orders Count*/
$query = "SELECT * FROM completedorders";
$result = mysqli_query($link, $query) or die(mysqli_errno($link));

while ($row = mysqli_fetch_array($result)) {
    $response[] = $row;
}

$row_cntO = count($response);

/*User Count*/
$queryU = "SELECT * FROM user WHERE usertype = 'user'";
$resultU = mysqli_query($link, $queryU) or die(mysqli_errno($link));

while ($rowU = mysqli_fetch_array($resultU)) {
    $responseU[] = $rowU;
}

$row_cntU = count($responseU);

/*Question Count*/
$queryQ = "SELECT * FROM contact";
$resultQ = mysqli_query($link, $queryQ) or die(mysqli_errno($link));

while ($rowQ = mysqli_fetch_array($resultQ)) {
    $responseQ[] = $rowQ;
}

$row_cntQ = count($responseQ);
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
        $(document).ready(function() {
            $.ajax({
                type: "GET",
                url: "getReadingCO.php",
                cache: false,
                dataType: "JSON",
                success: function(response) {
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
                error: function(obj, textStatus, errorThrown) {
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
                    <a class="box box1" href="adminFullCO.php" style="text-decoration:none">
                        <i class="uil uil-utensils-alt"></i>
                        <span class="text">Orders Completed</span>
                        <span class="number"><?php echo $row_cntO ?></span>
                    </a>

                    <a class="box box2" href="adminUserR.php" style="text-decoration:none">
                        <i class="uil uil-user"></i>
                        <span class="text">Number of Users</span>
                        <span class="number"><?php echo $row_cntU ?></span>
                    </a>

                    <a class="box box3" href="adminQuestion.php" style="text-decoration:none">
                        <i class="uil uil-comments"></i>
                        <span class="text">Questions from Users</span>
                        <span class="number"><?php echo $row_cntQ ?></span>
                    </a>
                </div>
            </div>
            <div class="activity">
                <div class="title">
                    <i class="uil uil-clock-three"></i>
                    <span class="text">Recent Activity</span>
                </div>

                <div class="small-container cart-page">
                    <table>
                        <tr>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Total Price</th>
                            <th>Date</th>
                            <th>Order ID</th>
                            <th>View Items</th>
                        </tr>
                        <tbody class="checkoutInsert"></tbody>
                    </table>
                    <form action="adminFullCO.php">
                        <button class='btnMain' type='submit'>View All</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <script src="script/script.js"></script>
</body>

</html>