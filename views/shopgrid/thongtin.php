<?php
require_once('database/start_session.php');
require_once('database/config.php');
require_once('database/dbhelper.php');
require_once('models/shopgrid.php');
if (isset($_POST['atcbtn'])) {
    $id = $_POST['pid'];
    $qty = $_POST['qty'];
    $iduser=(int)$_SESSION['id_user'];
    // Example insert query
    $insertSql = "INSERT INTO cart ( iduser, idproduct, number) VALUES ($iduser, $id,$qty)";
    // Execute the insert query
    $insertedId = executeInsert($insertSql);

    // them san pham vao gio hang
    if ($insertedId == 0) {
        echo "Insertion Fail";
    }

    header("Location: index.php?controller=shopcart");
}
?>
<!-- Hero Section Begin -->
<section class="hero hero-normal">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="hero__categories">
                    <div class="hero__categories__all">
                        <i class="fa fa-bars"></i>
                        <span>Danh Mục</span>
                    </div>
                    <ul>
                        <?php
                        $sql = 'select * from category';
                        $categoryList = executeResult($sql);
                        $index = 1;
                        foreach ($categoryList as $item) {
                            echo '
                        <li><a href="index.php?controller=shopgrid&action=get_product&id=' . $item['id'] . '">' . $item['name'] . '</a></li>
                    
                    ';
                        } ?>
                    </ul>
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
                    <h2>Sản Phẩm</h2>
                    <div class="breadcrumb__option">
                        <a href="./index.html">Home</a>
                        <a href="./index.html">Vegetables</a>
                        <span>Vegetable’s Package</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Product Details Section Begin -->
<section class="product-details spad">
    <div class="container">
        <div class="row"><?php
                            if (isset($_GET['id'])) {
                                $id_category = trim(strip_tags($_GET['id']));
                            } else {
                                $id_category = 0;
                            }
                            $sql = "select * from product where id='$id_category'";
                            $categoryList = executeResult($sql);
                            foreach ($categoryList as $item) {
                                echo '
                <div class="col-lg-6 col-md-6">
                    
                    <div class="product__details__pic">
                        <div class="product__details__pic__item">
                            <img class="product__details__pic__item--large" src="admin/' . $item['thumbnail'] . '" alt="">
                        </div>
                        <div class="product__details__pic__slider owl-carousel">
                            <img data-imgbigurl="admin/assets/' . $item['thumbnail'] . '" src="admin/' . $item['thumbnail'] . '" alt="">
                            <img data-imgbigurl="admin/assets/' . $item['thumbnail'] . '" src="admin/' . $item['thumbnail'] . '" alt="">
                            <img data-imgbigurl="img/product/details/product-details-5.jpg" src="admin/' . $item['thumbnail'] . '" alt="">
                            <img data-imgbigurl="img/product/details/product-details-4.jpg" src="admin/' . $item['thumbnail'] . '" alt="">
                        </div>
                    </div>
                    
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__text">
                        <h3>' . $item['title'] . '</h3>
                        <div class="product__details__rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half-o"></i>
                            <span>(18 reviews)</span>
                        </div>
                        <div class="product__details__price">' . $item['title'] . '</div>
                        <p>' . $item['content'] . '</p>
                        <form method="post">
                            <div class="product__details__quantity">
                                <div class="quantity">
                                    <div class="pro-qty">
                                        <input type="text" value="1" name="qty">
                                    </div>
                                    <input type="hidden" name="pid" value=" '. $item['id'] .' ">
                                </div>
                            </div>
                            <button class="primary-btn" name="atcbtn">Thêm vào giỏ hàng</button>
                        </form>
                        <ul>
                            <li><b>Giá</b> <span>' . number_format($item['price'], 0, ',', '.') . ' VNĐ</span></li>
                            <li><b>Vận Chuyển</b> <span>01 giờ sau khi đặt <samp>Free Ship today</samp></span></li>
                            <li><b>Số Lượng</b> <span>' . $item['number'] . '</span></li>
                            <li><b>Share on</b>
                                <div class="share">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                    <a href="#"><i class="fa fa-pinterest"></i></a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="product__details__tab">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab" aria-selected="true">Description</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab" aria-selected="false">Information</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab" aria-selected="false">Reviews <span>(1)</span></a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    <h6>Products Infomation</h6>
                                    <p>Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.
                                        Pellentesque in ipsum id orci porta dapibus. Proin eget tortor risus. Vivamus
                                        suscipit tortor eget felis porttitor volutpat. Vestibulum ac diam sit amet quam
                                        vehicula elementum sed sit amet dui. Donec rutrum congue leo eget malesuada.
                                        Vivamus suscipit tortor eget felis porttitor volutpat. Curabitur arcu erat,
                                        accumsan id imperdiet et, porttitor at sem. Praesent sapien massa, convallis a
                                        pellentesque nec, egestas non nisi. Vestibulum ac diam sit amet quam vehicula
                                        elementum sed sit amet dui. Vestibulum ante ipsum primis in faucibus orci luctus
                                        et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam
                                        vel, ullamcorper sit amet ligula. Proin eget tortor risus.</p>
                                    <p>Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Lorem
                                        ipsum dolor sit amet, consectetur adipiscing elit. Mauris blandit aliquet
                                        elit, eget tincidunt nibh pulvinar a. Cras ultricies ligula sed magna dictum
                                        porta. Cras ultricies ligula sed magna dictum porta. Sed porttitor lectus
                                        nibh. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a.
                                        Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Sed
                                        porttitor lectus nibh. Vestibulum ac diam sit amet quam vehicula elementum
                                        sed sit amet dui. Proin eget tortor risus.</p>
                                </div>
                            </div>
                            <div class="tab-pane" id="tabs-2" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    <h6>Products Infomation</h6>
                                    <p>Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.
                                        Pellentesque in ipsum id orci porta dapibus. Proin eget tortor risus.
                                        Vivamus suscipit tortor eget felis porttitor volutpat. Vestibulum ac diam
                                        sit amet quam vehicula elementum sed sit amet dui. Donec rutrum congue leo
                                        eget malesuada. Vivamus suscipit tortor eget felis porttitor volutpat.
                                        Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Praesent
                                        sapien massa, convallis a pellentesque nec, egestas non nisi. Vestibulum ac
                                        diam sit amet quam vehicula elementum sed sit amet dui. Vestibulum ante
                                        ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;
                                        Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula.
                                        Proin eget tortor risus.</p>
                                    <p>Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Lorem
                                        ipsum dolor sit amet, consectetur adipiscing elit. Mauris blandit aliquet
                                        elit, eget tincidunt nibh pulvinar a. Cras ultricies ligula sed magna dictum
                                        porta. Cras ultricies ligula sed magna dictum porta. Sed porttitor lectus
                                        nibh. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a.</p>
                                </div>
                            </div>
                            <div class="tab-pane" id="tabs-3" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    <h6>Products Infomation</h6>
                                    <p>Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.
                                        Pellentesque in ipsum id orci porta dapibus. Proin eget tortor risus.
                                        Vivamus suscipit tortor eget felis porttitor volutpat. Vestibulum ac diam
                                        sit amet quam vehicula elementum sed sit amet dui. Donec rutrum congue leo
                                        eget malesuada. Vivamus suscipit tortor eget felis porttitor volutpat.
                                        Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Praesent
                                        sapien massa, convallis a pellentesque nec, egestas non nisi. Vestibulum ac
                                        diam sit amet quam vehicula elementum sed sit amet dui. Vestibulum ante
                                        ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;
                                        Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula.
                                        Proin eget tortor risus.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            ';
                            } ?>
            <div class="fb-comments" data-href="http://localhost/mvc/index.php?controller=shopgrid&action=details&id=" data-width="750" data-numposts="5"></div>
            <style>
                .product__details__text .heart-icon {
                    display: inline-block;
                    font-size: 16px;
                    color: #6f6f6f;
                    padding: 13px 16px 13px;
                    border-block: #ddd8a1;
                    border: black;
                }
            </style>
        </div>
</section>
<!-- Product Details Section End -->

<!-- Related Product Section Begin -->
<section class="related-product">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title related__product__title">
                    <h2>Sản Phẩm Tương Tự</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <?php
            if (isset($_GET['id'])) {
                $id_category = trim(strip_tags($_GET['id']));
            } else {
                $id_category = 0;
            }

            $sql = 'SELECT id_category FROM product WHERE id =' . $id_category;
            $temm = executeSingleResult($sql);
            $sql = 'SELECT * FROM product WHERE id_category =' . $temm['id_category'] . ' ORDER BY RAND() LIMIT 4';
            $productList = executeResult($sql);
            // Tiếp tục xử lý $productList theo ý đồ của bạn
            foreach ($productList as $item) {
                echo '
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="product__item">
                    <div class="product__item__pic set-bg" data-setbg="admin/' . $item['thumbnail'] . '">
                        <ul class="product__item__pic__hover">
                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                            <li><a href="index.php?controller=shopgrid&action=details&id=' . $item['id'] . '"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                    </div>
                    <div class="product__item__text">
                        <h6><a href="#">' . $item['title'] . '</a></h6>
                        <h5>$' . $item['price'] . '</h5>
                    </div>
                </div>
            </div>';
            } ?>
        </div>
    </div>
</section>
<!-- Related Product Section End -->