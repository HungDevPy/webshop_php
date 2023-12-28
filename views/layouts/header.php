<?php
require_once('database/start_session.php');
require_once('database/config.php');
require_once('database/dbhelper.php');
$numCart = 0;
if (isset($_SESSION['id_user'])) {
    $id = $_SESSION['id_user'];
    $sql = "SELECT *  FROM cart WHERE iduser = $id";
    $cartList = executeResult($sql);
    $numCart = count($cartList);
}
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ogani | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="assets/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="assets/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="assets/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="assets/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="assets/css/style.css" type="text/css">
    <script>
        function goToPage(page) {
            document.getElementById('currentPage').value = page;
            document.getElementById('paginationForm').submit();
        }
    </script>
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="/index.php"><img src="assets/img/logo.png" alt=""></a>
        </div>
        <form method="post">
            <div class="product__details__quantity">
                <div class="quantity">
                    <div class="pro-qty">
                        <input type="text" value="1">
                        <input type="hidden" value="1" name="qty">
                    </div>
                    <input type="hidden" name="pid" value="<?= $idsp ?>">
                </div>
            </div>
            <button class="primary-btn" name="atcbtn">Thêm vào giỏ hàng</button>
        </form>
        <div class="humberger__menu__widget">
            <div class="header__top__right__language">
                <img src="assets/img/language.png" alt="">
                <div>English</div>
                <span class="arrow_carrot-down"></span>
                <ul>
                    <li><a href="#">Spanis</a></li>
                    <li><a href="#">English</a></li>
                </ul>
            </div>
            <div class="header__top__right__auth">
                <a href="index.php?controller=login"><i class="fa fa-user"></i> <?php isset($_SESSION['username']) ?></a>
            </div>
        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li class="active"><a href="index.php">Home</a></li>
                <li><a href="index.php?controller=shopgrid">Sản Phẩm</a></li>
                <li><a href="#">Thực Đơn</a>
                    <ul class="header__menu__dropdown">
                        <?php
                        $sql = 'select * from category';
                        $categoryList = executeResult($sql);
                        $index = 1;
                        foreach ($categoryList as $item) {
                            echo '
                                    <li><a href="thucdon.php?id_category=' . $item['id'] . '>' . $item['name'] . '</a></li>
                                    ';
                        } ?>
                    </ul>
                </li>
                <li><a href="blog.php">Trang</a></li>
                <li><a href="contact.php">Liên Hệ</a></li>
                <li><a>Quản Trị</a>
                    <ul class="header__menu__dropdown">
                        <li><a href="./shop-details.html">Shop Details</a></li>
                        <li><a href="./shoping-cart.html">Shoping Cart</a></li>
                        <li><a href="./checkout.html">Check Out</a></li>
                        <li><a href="./blog-details.html">Blog Details</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="header__top__right__social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
            <a href="#"><i class="fa fa-pinterest-p"></i></a>
        </div>
        <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa fa-envelope"></i> hello@colorlib.com</li>
                <li>Free Shipping for all Order of $99</li>
            </ul>
        </div>
    </div>
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i> hello@colorlib.com</li>
                                <li>Free Shipping for all Order of $99</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                                <a href="#"><i class="fa fa-pinterest-p"></i></a>
                            </div>
                            <div class="header__top__right__language">
                                <img src="assets/img/language.png" alt="">
                                <div>English</div>
                                <span class="arrow_carrot-down"></span>
                                <ul>
                                    <li><a href="#">Spanis</a></li>
                                    <li><a href="#">English</a></li>
                                </ul>
                            </div>
                            <?php
                            $login = "login";
                            $loginEcho = "Login";
                            if (isset($_SESSION['username'])) {
                                $login = "logout";
                                $loginEcho = $_SESSION['username'];
                                // Check if the action is "logout" and unset the session variable
                                if (isset($_GET['action']) && $_GET['action'] === 'logout') {
                                    unset($_SESSION['username']);
                                    $login = "login";
                                    $loginEcho = "Login";
                                    // Optionally, regenerate the session ID for security reasons
                                    // session_regenerate_id(true);
                                    // Redirect to some page after logout (e.g., the home page)
                                    // header('Location: index.php');
                                    // exit();
                                }
                            }
                            ?>
                            <div class="header__top__right__auth">
                                <a href="index.php?controller=login&action=<?php echo $login; ?>"><i class="fa fa-user"></i><?php echo $loginEcho; ?></a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="index.php"><img src="assets/img/logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li class="active"><a href="index.php">Home</a></li>
                            <li><a href="index.php?controller=shopgrid">Sản Phẩm</a></li>
                            <li><a href="index.php?controller=shopcart">Giỏ hàng</a></li>
                            <li><a href="index.php?controller=contact">Liên Hệ</a></li>
                            <li><a href="#">Thêm</a>
                                <ul class="header__menu__dropdown">
                                    <?php
                                    if (isset($_SESSION['username']) && $_SESSION['username'] == 'admin') {
                                        echo '<li><a href="admin/index.php">Quản Trị</a></li>';
                                    } else {
                                        echo '<li><a href="index.php?controller=login&action=resetpass">Đổi Mật Khẩu</a></li>';
                                    }

                                    ?>
                                    <li><a href="index.php?controller=shopcart&action=order">Đơn Hàng</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        <ul>
                            <li><a href="#"><i class="fa fa-heart"></i>

                            <li><a href="index.php?controller=shopcart"><i class="fa fa-shopping-bag"></i>
                                    <span><?= $numCart ?></span>
                                </a></li>
                        </ul>
                        <!-- <div class="header__cart__price">item: <span>$150.00</span></div>
                    </div> -->
                    </div>
                </div>
                <div class="humberger__open">
                    <i class="fa fa-bars"></i>
                </div>
            </div>
    </header>
    <!-- Header Section End -->