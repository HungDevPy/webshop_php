<?php
require_once('database/start_session.php');
require_once('database/config.php');
require_once('database/dbhelper.php');
require_once('models/shopcart.php');
?>

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
                        <form method="post" action="index.php?controller=shopgrid&action=get_product">
                            <input type="text" name="searchTerm" placeholder="Tìm Sản Phẩm">
                            <button type="submit" class="site-btn">Tìm Kiếm</button>
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
</section>
<!-- Hero Section End -->

<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="assets/img/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Giỏ Hàng</h2>
                    <div class="breadcrumb__option">
                        <a href="index.php">Home</a>
                        <span>Giỏ Hàng</span>
                    </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Shoping Cart Section Begin -->
<section class="shoping-cart spad">
    <div class="container">
        <?php
        if (isset($_SESSION['id_user'])) {
            $id = $_SESSION['id_user'];
            $sql = "SELECT cart.*,thumbnail,price,title  FROM cart 
            INNER JOIN product on product.id=cart.idproduct 
            WHERE iduser = $id";
            $cartList = executeResult($sql);
        ?>
            <table class="table">
                <tr>
                    <th>STT</th>
                    <th>Tên sản phẩm</th>
                    <th>Hình ảnh</th>
                    <th>Số lượng</th>
                    <th>Đơn giá</th>
                    <th>Thành tiền</th>
                </tr>
                <?php
                $count = 0;
                $total = 0;
                foreach ($cartList as $item) {
                    $num = $item['number']; 
                    
                    $total += $num * $item['price'];
                    echo '
                        <tr style="text-align: left;">
                            <td width="50px">' . (++$count) . '</td>
                            <td>
                                 <span>' . $item['title'] . '</span>
                            </td>
                            <td><img src="admin/' . $item['thumbnail'] . '" alt="" style="width: 100px;"></td>
                            <td width="100px">' . $num . '</td>
                            <td width="100px">' . $item['price'] . '</td>
                            <td class="b-500 red">' . number_format($num * $item['price'], 0, ',', '.') . '<span> VNĐ</span></td>
                        </tr>';
                }
                ?>
                
            </table>
            <p>Tổng đơn hàng: <span class="bold red"><?= number_format($total, 0, ',', '.') ?><span> VNĐ</span></span></p>
            <a href="index.php?controller=shopcart&action=checkout"><button class="btn btn-success">Đặt hàng</button></a>
            <a href="index.php?controller=shopcart&action=del"><button class="btn btn-danger">Xóa giỏ hàng</button></a>
        <?php } else {
            echo "<p>Đăng nhập để xem giỏ hàng.</p>";
        } ?>
    </div>
</section>

<!-- Shoping Cart Section End -->