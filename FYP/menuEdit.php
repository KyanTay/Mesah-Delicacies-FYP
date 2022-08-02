<!DOCTYPE html>
<?php
session_start();

if (!isset($_SESSION['user_id']) && empty($_SESSION['user_id'])) {
    header("Location: Account.php");
} else {
    $usertype = $_SESSION['usertype'];
    echo $usertype;
}

include "dbFunction.php";

$food_ID = $_POST['foodid'];

$queryCheck = "SELECT * FROM fooditem WHERE FoodID = '$food_ID'";

$resultCheck = mysqli_query($link, $queryCheck) or die(mysqli_error($link));

if (mysqli_num_rows($resultCheck) == 1) {

    $row = mysqli_fetch_array($resultCheck);
    $_SESSION['food_idDS'] = $row['FoodID'];
    $_SESSION['food_nameDS'] = $row['FoodName'];
    $_SESSION['food_priceDS'] = $row['Price'];
    $_SESSION['food_descDS'] = $row['Description'];
    $_SESSION['food_imageDS'] = $row['Image'];

    $food_idD = $_SESSION['food_idDS'];
    $food_nameD = $_SESSION['food_nameDS'];
    $food_priceD = $_SESSION['food_priceDS'];
    $food_descD = $_SESSION['food_descDS'];
    $food_imageD = $_SESSION['food_imageDS'];
}

$query = "SELECT * FROM fooditem";
$result = mysqli_query($link, $query) or die(mysqli_errno($link));

while ($row = mysqli_fetch_array($result)) {
    $response[] = $row;
}

$row_cnt = count($response);
?>
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
                    <i class="uil uil-book-alt"></i>
                        <span class="text">Edit Item</span>
                    </div>

                    <div class="boxes">
                        <div class="box box4">
                        <i class="uil uil-book-alt"></i>
                            <span class="text">Items on menu</span>
                            <span class="number"><?php echo $row_cnt ?></span>
                        </div>
                    </div>
                </div>
                <div class="activity">
                    <div class="small-container">
                        <header>EDIT MENU ITEM</header>    
                        <form id="form" class="topBefore" action="phpDoAdminEdit.php" enctype="multipart/form-data" method="post">
                            <input id="name" type="text" name="itemName" placeholder="<?php echo $food_nameD ?>" required>
                            <input id="price" type="text" name="itemPrice" placeholder="<?php echo $food_priceD ?>" required>
                            <input type="hidden" name="itemID" value="<?php echo $food_idD ?>" >
                            <br>
                            <input id="price" type="text" placeholder="IMAGE" disabled="">
                            <input type="hidden" name="size" value="1000000">
                            <img src="images/<?php echo $food_imageD ?>" class="editImg">
                            <div>
                                <input type="file" name="image">
                            </div>
                            <textarea id="message" type="text" placeholder="<?php echo $food_descD ?>" name="itemDesc" required></textarea>      
                            <input id="submitForm" name="upload" type="submit" value="EDIT">
                        </form>
                        <form id="form" class="topAfter" action="doMenuDelete.php" enctype="multipart/form-data" method="post">  
                            <input type="hidden" name="itemID" value="<?php echo $food_idD ?>" >
                            <input id="submitForm2" name="upload" type="submit" value="REMOVE">
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <script src="script/script.js"></script>
    </body>
</html>