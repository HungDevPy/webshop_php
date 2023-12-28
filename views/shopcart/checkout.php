<?php
require_once('database/start_session.php');
require_once('database/config.php');
require_once('database/dbhelper.php');
require_once('models/shopcart.php');
$id = $_SESSION['id_user'];
$sql = "SELECT cart.*,thumbnail,price,title  FROM cart 
        INNER JOIN product on product.id=cart.idproduct 
        WHERE iduser = $id";
$cartList = executeResult($sql);

if (isset($_POST['btnCheckout'])) {
  $name = $_POST['name'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];
  $address = $_POST['address'];
  $note = $_POST['note'];
  $order_date = date('Y-m-d H:i:s');
  $iduser = (int)$_SESSION['id_user'];

  //insert order
  $query = "INSERT INTO `orders` (`fullname`, `phone_number`, `email`, `address`, `note`, `order_date`) 
  VALUES ('$name', '$phone', '$email', '$address', '$note', '$order_date')";
  $idOrder = executeInsert($query);
  //insert order 
  if ($idOrder > 0) {
    $sql = "SELECT cart.*,thumbnail,price,title  FROM cart 
            INNER JOIN product on product.id=cart.idproduct 
            WHERE iduser = $id";
    $cartList = executeResult($sql);
    foreach ($cartList as $item) {
      $product_id = $item["idproduct"];
      $number = $item["number"];
      $price = $item["price"];
      $query = "INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `id_user`, `num`, `price`, `status`) 
      VALUES (NULL, '$idOrder', '$product_id', '$iduser', '$number', '$price', 'Đang xử lý');";
      $idOrder_details = executeInsert($query);
      if ($idOrder_details < 0) {
        echo 'insert Order_details fail';
      }
    }
    $sql = "DELETE FROM cart WHERE iduser = $iduser";
    $check = execute($sql);
    header("Location: index.php");
  } else {
    echo 'insert fail';
  }
}
?>
<!-- Hero Section Begin -->
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

  <!-- Hero Section Begin -->
  <section class="hero hero-normal">
    <div class="container">
      <div class="row">
        <div class="col-lg-3">
          <div class="hero__categories">
            <div class="hero__categories__all">
              <i class="fa fa-bars"></i>
              <span>Danh Mục Sản Phẩm</span>
            </div>
            <ul><?php
                $sql = 'select * from category';
                $categoryList = executeResult($sql);
                $index = 1;
                foreach ($categoryList as $item) {
                  echo '
                            <li><a href="index.php?controller=shopgrid&action=get_product&id=' . $item['id'] . '">' . $item['name'] . '</a></li>
                    
                    ';
                } ?></ul>
          </div>
        </div>
        <div class="col-lg-9">
          <div class="hero__search">
            <div class="hero__search__form">
              <form action="#">
                <div class="hero__search__categories">
                  All Categories
                  <span class="arrow_carrot-down"></span>
                </div>
                <input type="text" placeholder="What do yo u need?">
                <button type="submit" class="site-btn">SEARCH</button>
              </form>
            </div>
            <div class="hero__search__phone">
              <div class="hero__search__phone__icon">
                <i class="fa fa-phone"></i>
              </div>
              <div class="hero__search__phone__text">
                <h5>+65 11.188.888</h5>
                <span>support 24/7 time</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Hero Section End -->

  <!-- Breadcrumb Section Begin -->
  <section class="breadcrumb-section set-bg" data-setbg="assets/img/breadcrumb.jpg">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <div class="breadcrumb__text">
            <h2>Thanh Toán</h2>
            <div class="breadcrumb__option">
              <a href="index.php">Home</a>
              <span>Checkout</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Breadcrumb Section End -->

  <!-- Checkout Section Begin -->
  <section class="checkout spad">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h6><span class="icon_tag_alt"></span> Have a coupon? <a href="#">Click here</a> to enter your code
          </h6>
        </div>
      </div>
      <div class="checkout__form">
        <h4>Thông Tin</h4>
        <form action="#" method="post">
          <div class="row">
            <div class="col-lg-8 col-md-6">
              <div class="row">
                <div class="col-lg-6">
                  <div class="checkout__input">
                    <p>Ho ten:<span>*</span></p>
                    <input id="name" name="name" placeholder="Nguyễn Văn A" required type="text" />
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="checkout__input">
                    <p>SDT<span>*</span></p>
                    <input id="phone" name="phone" placeholder="123456789" required type="text" />
                  </div>
                </div>
              </div>
              <div class="checkout__input">
                <p>Email<span>*</span></p>
                <input id="email" name="email" placeholder="example@gmail.com" required type="text" />
              </div>
              <div class="checkout__input">
                <p>Dia chi<span>*</span></p>
                <input id="address" name="address" placeholder="Address . . ." required type="text" />
              </div>
              <div class="checkout__input">
                <p>Ghi chu<span>*</span></p>
                <input id="note" name="note" placeholder="Note . . ." required type="text" />
              </div>

            </div>
            <div class="col-25">
              <div class="container">
                <h2 class="receipt-heading">Hóa Đơn Thanh Toán</h2>
                <div>
                  <table class="table">
                    <?php
                    $tong = 0;
                    foreach ($cartList as $item) {
                      $thanhtien = $item['number'] * $item['price'];
                      $tong += $thanhtien;
                      echo '<tr>
                    <td>' . $item['number'] . ' ' . $item['title'] . '</td>
                    <td class="price">' . $thanhtien . '</td></tr>';
                    }
                    ?>

                    <tr class="total">
                      <td>Tổng</td>
                      <td class="price"><?php echo $tong; ?></td>
                    </tr>
                  </table>
                </div>
                <p>Đừng để đồ ăn lấn áp lý trí</p>
                <div class="checkout__input__checkbox">
                  <label for="payment">
                    Thanh toán khi nhận hàng
                    <input type="checkbox" id="payment">
                    <span class="checkmark"></span>
                  </label>
                </div>
                <div class="checkout__input__checkbox">
                  <label for="paypal">
                    Chuyển Khoản(Đang Bảo Trì)
                    <input type="checkbox" id="paypal">
                    <span class="checkmark"></span>
                  </label>
                </div>
                <button class="btn" id="btnCheckout" name="btnCheckout">
                  <i class="fa-solid fa-bag-shopping"></i> Thanh Toán
                </button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </section>
  <!-- Checkout Section End -->

  <!-- Footer Section Begin -->
  <footer class="footer spad">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="footer__about">
            <div class="footer__about__logo">
              <a href="./index.html"><img src="assets/img/logo.png" alt=""></a>
            </div>
            <ul>
              <li>Address: 60-49 Road 11378 New York</li>
              <li>Phone: +65 11.188.888</li>
              <li>Email: hello@colorlib.com</li>
            </ul>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
          <div class="footer__widget">
            <h6>Useful Links</h6>
            <ul>
              <li><a href="#">About Us</a></li>
              <li><a href="#">About Our Shop</a></li>
              <li><a href="#">Secure Shopping</a></li>
              <li><a href="#">Delivery infomation</a></li>
              <li><a href="#">Privacy Policy</a></li>
              <li><a href="#">Our Sitemap</a></li>
            </ul>
            <ul>
              <li><a href="#">Who We Are</a></li>
              <li><a href="#">Our Services</a></li>
              <li><a href="#">Projects</a></li>
              <li><a href="#">Contact</a></li>
              <li><a href="#">Innovation</a></li>
              <li><a href="#">Testimonials</a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-4 col-md-12">
          <div class="footer__widget">
            <h6>Join Our Newsletter Now</h6>
            <p>Get E-mail updates about our latest shop and special offers.</p>
            <form action="#">
              <input type="text" placeholder="Enter your mail">
              <button type="submit" class="site-btn">Subscribe</button>
            </form>
            <div class="footer__widget__social">
              <a href="#"><i class="fa fa-facebook"></i></a>
              <a href="#"><i class="fa fa-instagram"></i></a>
              <a href="#"><i class="fa fa-twitter"></i></a>
              <a href="#"><i class="fa fa-pinterest"></i></a>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <div class="footer__copyright">
            <div class="footer__copyright__text">
              <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                Copyright &copy;<script>
                  document.write(new Date().getFullYear());
                </script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
            </div>
            <div class="footer__copyright__payment"><img src="assets/img/payment-item.png" alt=""></div>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- Footer Section End -->

  <!-- Js Plugins -->
  <script src="assets/js/jquery-3.3.1.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/jquery.nice-select.min.js"></script>
  <script src="assets/js/jquery-ui.min.js"></script>
  <script src="assets/js/jquery.slicknav.js"></script>
  <script src="assets/js/mixitup.min.js"></script>
  <script src="assets/js/owl.carousel.min.js"></script>
  <script src="assets/js/main.js"></script>



</body>

</html>