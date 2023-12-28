<?php
require_once('database/config.php');
require_once('database/dbhelper.php');
require_once('models/shopgrid.php')

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
<section class="breadcrumb-section set-bg" data-setbg="assets/img/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Sản Phẩm Shop</h2>
                    <div class="breadcrumb__option">
                        <a href="./index.html">Home</a>
                        <span>Shop</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-5">
                <div class="sidebar">
                    <div class="sidebar__item">
                        <h4>Danh Mục</h4>
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
                    <div class="sidebar__item">
                        <h4>Giá</h4>
                        <div class="price-range-wrap">
                            <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content" data-min="10" data-max="540">
                                <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                            </div>
                            <div class="range-slider">
                                <div class="price-input">
                                    <input type="text" id="minamount">
                                    <input type="text" id="maxamount">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="sidebar__item sidebar__item__color--option">
                        <h4>Colors</h4>
                        <div class="sidebar__item__color sidebar__item__color--white">
                            <label for="white">
                                White
                                <input type="radio" id="white">
                            </label>
                        </div>
                        <div class="sidebar__item__color sidebar__item__color--gray">
                            <label for="gray">
                                Gray
                                <input type="radio" id="gray">
                            </label>
                        </div>
                        <div class="sidebar__item__color sidebar__item__color--red">
                            <label for="red">
                                Red
                                <input type="radio" id="red">
                            </label>
                        </div>
                        <div class="sidebar__item__color sidebar__item__color--black">
                            <label for="black">
                                Black
                                <input type="radio" id="black">
                            </label>
                        </div>
                        <div class="sidebar__item__color sidebar__item__color--blue">
                            <label for="blue">
                                Blue
                                <input type="radio" id="blue">
                            </label>
                        </div>
                        <div class="sidebar__item__color sidebar__item__color--green">
                            <label for="green">
                                Green
                                <input type="radio" id="green">
                            </label>
                        </div>
                    </div>
                    <div class="sidebar__item">
                        <h4>Popular Size</h4>
                        <div class="sidebar__item__size">
                            <label for="large">
                                Large
                                <input type="radio" id="large">
                            </label>
                        </div>
                        <div class="sidebar__item__size">
                            <label for="medium">
                                Medium
                                <input type="radio" id="medium">
                            </label>
                        </div>
                        <div class="sidebar__item__size">
                            <label for="small">
                                Small
                                <input type="radio" id="small">
                            </label>
                        </div>
                        <div class="sidebar__item__size">
                            <label for="tiny">
                                Tiny
                                <input type="radio" id="tiny">
                            </label>
                        </div>
                    </div>
                    <div class="sidebar__item">
                        <div class="latest-product__text">
                            <h4>Sản Phẩm Hot</h4>
                            <div class="latest-product__slider owl-carousel">
                                <?php
                                $sql = 'select * from product ORDER BY id DESC LIMIT 6';
                                $productList = executeResult($sql);
                                // Split the product list into chunks of 2 items each
                                $chunks = array_chunk($productList, 3);

                                foreach ($chunks as $chunk) {
                                    echo '<div class="latest-prdouct__slider__item">';

                                    foreach ($chunk as $item) {
                                        echo '
                                        <a href="#" class="latest-product__item">
                                            <div class="latest-product__item__pic">
                                                <img src="admin/' . $item['thumbnail'] . '" alt="">
                                            </div>
                                            <div class="latest-product__item__text">
                                                <h6>' . $item['title'] . '</h6>
                                                <span>$' . $item['price'] . '</span>
                                            </div>
                                        </a>';
                                    }
                                    echo '</div>';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-7">
                <div class="row">
                    <?php
                    try {
                        if (isset($_GET['id'])) {
                            $id_category = trim(strip_tags($_GET['id']));
                        } else {
                            $id_category = 0;
                        }
                        // Số sản phẩm trên mỗi trang và trang hiện tại
                        $sql = "select * from product where id_category='$id_category'";
                        // $sql = 'select * from category';
                        $productList = executeResult($sql);
                        // $categoryList = executeResult($sql);
                        $index = 1;
                        foreach ($productList as $item) {
                            echo '
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="product__item">
                                    <div class="product__item__pic set-bg" data-setbg="admin/' . $item['thumbnail'] . '">
                                        <ul class="product__item__pic__hover">
                                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                            <li><a href="index.php?controller=shopgrid&action=details&id=' . $item['id'] . '"><i class="fa fa-shopping-cart"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="product__item__text">
                                        <h6><a href="#">' . $item['title'] . '</a></h6>
                                        <h5>$' . number_format($item['price'], 0, ',', '.') . '</h5>
                                    </div>
                                </div>
                            </div>';
                        }
                    } catch (Exception $e) {
                        die("Lỗi thực thi SQL: " . $e->getMessage());
                    }
                    ?>
                    <?php
                    try {
                        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                            $searchTerm = isset($_POST['searchTerm']) ? $_POST['searchTerm'] : '';
                            $sql = "SELECT * from product where title like '%$searchTerm%'";
                            $listSearch = executeResult($sql);
                            foreach ($listSearch as $item) {
                                echo '
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="product__item">
                                    <div class="product__item__pic set-bg" data-setbg="admin/' . $item['thumbnail'] . '">
                                        <ul class="product__item__pic__hover">
                                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                            <li><a href="index.php?controller=shopgrid&action=details&id=' . $item['id'] . '"><i class="fa fa-shopping-cart"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="product__item__text">
                                        <h6><a href="#">' . $item['title'] . '</a></h6>
                                        <h5>$' . number_format($item['price'], 0, ',', '.') . '</h5>
                                    </div>
                                </div>
                            </div>';
                            }
                        }
                        else{
                            echo 'Khong co san pham ban muon tim kiem';
                        }
                    } catch (Exception $e) {
                        die("Lỗi thực thi SQL: " . $e->getMessage());
                    }
                    ?>
                </div>
            </div>