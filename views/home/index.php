<?php
require_once('database/config.php');
require_once('database/dbhelper.php');
?>
<section class="hero">
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
                <div class="hero__item set-bg" data-setbg="assets/img/hero/banner1.jpg">
                    <div class="hero__text">
                        <span>SIÊU HÓT</span>
                        <h2>MÓN NGON <br />100% FREE SHIP</h2>
                        <!-- <p>Còn chần trờ gì nữa mà !</p> -->
                        <a href="index.php?controller=shopgrid" class="primary-btn">SHOP NOW</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Hero Section End -->

<!-- Categories Section Begin -->
<section class="categories">
    <div class="container">
        <div class="row">
            <div class="categories__slider owl-carousel">
                <?php
                $sql = 'SELECT * from product ';
                $productList = executeResult($sql);
                $index = 1;
                foreach ($productList as $item) {
                    echo '
                <div class="col-lg-3">
                    <div class="categories__item set-bg" data-setbg="admin/' . $item['thumbnail'] . '">
                        <h5><a href="#">' . $item['title'] . '</a></h5>
                    </div>
                </div>
                ';
                }
                ?>

            </div>
        </div>
    </div>
</section>
<!-- Categories Section End -->

<!-- Featured Section Begin -->
<section class="featured spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Sản Phẩm Nổi Bật</h2>
                </div>

                <div class="featured__controls">
                    <ul>
                        <li class="active" data-filter="*">All</li>
                        <?php
                        $sql = 'select * from category';
                        $categoryList = executeResult($sql);
                        foreach ($categoryList as $item) {
                            echo '
                        <li data-filter=.oranges' . $item['id'] . '>' . $item['name'] . '</li>
                    
                    ';
                        } ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row featured__filter">
            <?php
            $sql = 'select * from product  ORDER BY id DESC
            LIMIT 8';
            $categoryList = executeResult($sql);
            foreach ($categoryList as $item) {
                echo '
            <div class="col-lg-3 col-md-4 col-sm-6 mix oranges' . $item['id_category'] . '">
                <div class="featured__item">
                    <div class="featured__item__pic set-bg" data-setbg="admin/' . $item['thumbnail'] . '">
                        <ul class="featured__item__pic__hover">
                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                            <li><a href="index.php?controller=shopgrid&action=details&id=' . $item['id'] . '"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                    </div>
                    <div class="featured__item__text">
                        <h6><a href="#">' . $item['title'] . '</a></h6>
                        <h5>$' . $item['price'] . '</h5>
                    </div>
                </div>
                </div>';
            } ?>
        </div>
    </div>
    </div>
</section>
<!-- Featured Section End -->

<!-- Banner Begin -->
<div class="banner">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="banner__pic">
                    <img src="assets/img/banner/banner-1.jpg" alt="">
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="banner__pic">
                    <img src="assets/img/banner/banner-2.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Banner End -->
<!-- Latest Product Section Begin -->
<!-- Latest Product Section End -->
<!-- Blog Section Begin -->
<section class="from-blog spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title from-blog__title">
                    <h2>Bài Viết </h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="blog__item">
                    <div class="blog__item__pic">
                        <img src="assets/img/blog/blog-1.jpg" alt="">
                    </div>
                    <div class="blog__item__text">
                        <ul>
                            <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                            <li><i class="fa fa-comment-o"></i> 5</li>
                        </ul>
                        <h5><a href="#">Cooking tips make cooking simple</a></h5>
                        <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="blog__item">
                    <div class="blog__item__pic">
                        <img src="assets/img/blog/blog-2.jpg" alt="">
                    </div>
                    <div class="blog__item__text">
                        <ul>
                            <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                            <li><i class="fa fa-comment-o"></i> 5</li>
                        </ul>
                        <h5><a href="#">6 ways to prepare breakfast for 30</a></h5>
                        <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="blog__item">
                    <div class="blog__item__pic">
                        <img src="assets/img/blog/blog-3.jpg" alt="">
                    </div>
                    <div class="blog__item__text">
                        <ul>
                            <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                            <li><i class="fa fa-comment-o"></i> 5</li>
                        </ul>
                        <h5><a href="#">Visit the clean farm in the US</a></h5>
                        <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>