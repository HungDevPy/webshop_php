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
                    <h2>Đơn Hàng Của tôi</h2>
                    <div class="breadcrumb__option">
                        <a href="index.php">Home</a>
                        <span>Đơn Hàng</span>
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
            $tong=0;
            $sql = "SELECT * FROM `orders`
            INNER JOIN order_details on order_details.order_id=orders.id
            WHERE id_user=$id";
            $tblOrders = executeResult($sql);
        ?>
            <table class="table">
                <tr>
                    <th>STT</th>
                    <th>Họ tên</th>
                    <th>Số điện thoại</th>
                    <th>Email</th>
                    <th>Địa chỉ</th>
                    <th>Ghi chú</th>
                    <th>Trạng thái đơn</th>
                    <th>Ngày đặt</th>
                    <th>Thanh toán</th>
                </tr>
                <?php
                $count=0;
                foreach ($tblOrders as $item) {
                    $fullname = $item['fullname']; 
                    $phone_number = $item['phone_number']; 
                    $email = $item['email']; 
                    $address = $item['address']; 
                    $note = $item['note']; 
                    $order_date = $item['order_date']; 
                    $status = $item['status']; 
                    
                    $tong+=$item["num"]*$item["price"];
                    echo '
                        <tr style="text-align: left;">
                            <td>' . (++$count) . '</td>
                            <td> <span>' . $fullname . '</span></td>
                            <td> <span>' . $phone_number . '</span></td>
                            <td> <span>' . $email . '</span></td>
                            <td> <span>' . $address . '</span></td>
                            <td> <span>' . $note . '</span></td>
                            <td> <span>' . $status . '</span></td>
                            <td> <span>' . $order_date . '</span></td>
                            <td> <span>' . $tong . '</span></td>
                        </tr>';
                }
                ?>
                
            </table>
        <?php } else {
            echo "<p>Đăng nhập để xem đơn hàng.</p>";
        } ?>
    </div>
</section>

<!-- Shoping Cart Section End -->