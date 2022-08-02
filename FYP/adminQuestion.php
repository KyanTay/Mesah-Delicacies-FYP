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

$query = "SELECT * FROM contact";
$result = mysqli_query($link, $query) or die(mysqli_errno($link));

while ($row = mysqli_fetch_array($result)) {
    $response[] = $row;
}

$row_cntQ = count($response);
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
        <script src="https://code.jquery.com/jquery-2.2.4.min.js" type="text/javascript"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/assets/owl.carousel.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/assets/owl.theme.default.min.css">
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
                        <i class="uil uil-tachometer-fast-alt"></i>
                        <span class="text">Questions</span>
                    </div>

                    <div class="boxes">
                        <div class="box box4">
                            <i class="uil uil-comments"></i>
                            <span class="text">Number of Questions</span>
                            <span class="number"><?php echo $row_cntQ ?></span>
                        </div>
                    </div>
                </div>
                <div class="activity">
                    <div class="small-container">
                        <section id="testimonial_area" class="section_padding">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="testmonial_slider_area text-center owl-carousel">
                                            <?php
                                            for ($i = 0; $i < count($response); $i++) {
                                                $fullname = $response[$i]['FullName'];
                                                $email = $response[$i]['Email'];
                                                $subject = $response[$i]['Subject'];
                                                $message = $response[$i]['Message'];
                                                $cid = $response[$i]['contactID'];
                                                ?>
                                                <div class="box-area">		
                                                    <h5><?php echo $fullname;?></h5>
                                                    <span><?php echo $subject?></span>
                                                    <span><?php echo $email?></span>	
                                                    <p class="content">
                                                        <?php echo $message?>
                                                    </p>
                                                    <form action="deleteContact.php" method="post">
                                                        <input type="hidden" name="contactID" value="<?php echo $cid?>">
                                                        <button class="btnMenu" type="submit">Remove</button>
                                                    </form>
                                                </div>                 
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </section>
        <script src="script/script.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.min.js"></script>
        <script>
            $(".testmonial_slider_area").owlCarousel({
                autoplay: true,
                slideSpeed: 1000,
                items: 3,
                loop: true,
                nav: true,
                navText: ['<i class="fa fa-arrow-left"></i>', '<i class="fa fa-arrow-right"></i>'],
                margin: 30,
                dots: true,
                responsive: {
                    320: {
                        items: 1
                    },
                    767: {
                        items: 2
                    },
                    600: {
                        items: 2
                    },
                    1000: {
                        items: 3
                    }
                }

            });
        </script>
    </body>
</html>