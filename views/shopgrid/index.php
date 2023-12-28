<?php
require_once('database/config.php');
require_once('database/dbhelper.php');
require_once('models/shopgrid.php')
?>
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
<!-- Breadcrumb Section End -->

<!-- Product Section Begin -->
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
                <div class="product__discount">
                    <div class="section-title product__discount__title">
                        <h2>Giảm Giá</h2>
                    </div>
                    <div class="row">
                        <div class="product__discount__slider owl-carousel">
                            <?php
                            $sql = 'select * from product  ORDER BY id DESC LIMIT 8';
                            $categoryList = executeResult($sql);
                            $discountedPrice = $item['price'] - ($item['price'] * 0.2);
                            foreach ($categoryList as $item) {
                                echo '
                            <div class="col-lg-4">
                                <div class="product__discount__item">
                                    <div class="product__discount__item__pic set-bg" data-setbg="admin/' . $item['thumbnail'] . '">
                                        <div class="product__discount__percent">-20%</div>
                                        <ul class="product__item__pic__hover">
                                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                            <li><a href="index.php?controller=shopgrid&action=details&id=' . $item['id'] . '"><i class="fa fa-shopping-cart"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="product__discount__item__text">
                                        <span>Dried Fruit</span>
                                        <h5><a href="#">' . $item['title'] . '</a></h5>
                                        <div class="product__item__price">$' . $discountedPrice . ' <span>$' . $item['price'] . '</span></div>
                                    </div>
                                </div>
                            </div>';
                            } ?>
                        </div>
                    </div>
                </div>
                <div class="filter__item">
                    <div class="row">
                        <div class="col-lg-4 col-md-5">
                            <div class="filter__sort">
                                <span>Danh Mục</span>
                                <select>
                                    <option value="0">ALL</option>
                                    <?php
                                    $sql = 'select * from category';
                                    $categoryList = executeResult($sql);
                                    foreach ($categoryList as $item) {
                                        echo '
                                    <option value="' . $item['id'] . '">' . $item['name'] . '</option>
                                    ';
                                    } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-7">
                            <div class="filter__option">
                                <span class="icon_grid-2x2"></span>
                                <span class="icon_ul"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php
                    try {
                        // Số sản phẩm trên mỗi trang và trang hiện tại
                        $limit = 6;
                        $currentPage = isset($_POST['page']) ? $_POST['page'] : 1;
                        $start = ($currentPage - 1) * $limit;
                        $productList = getProductsForPage($currentPage, $limit);

                        // Hiển thị sản phẩm
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
                </div>
                <!-- Thêm vào phần body của trang HTML của bạn -->
                <form id="paginationForm" method="post">
                    <!-- Thêm vào các trường ẩn cần thiết -->
                    <input type="hidden" id="currentPage" name="page" value="<?php echo $currentPage; ?>">
                </form>

                <!-- Thêm vào phần body của trang HTML của bạn -->
                <div class="product__pagination">
                    <?php
                    $totalProducts = executeSingleResult("SELECT COUNT(*) as total FROM product")['total'];
                    $totalPages = ceil($totalProducts / $limit);

                    // Liên kết "Previous"
                    if ($currentPage > 1) {
                        $previousPage = $currentPage - 1;
                        echo '<a href="javascript:void(0);" onclick="goToPage(' . $previousPage . ')"><i class="fa fa-long-arrow-left"></i></a>';
                    }

                    // Liên kết trang
                    for ($i = 1; $i <= $totalPages; $i++) {
                        if ($i == $currentPage) {
                            echo '<span class="current-page">' . $i . '</span>';
                        } else {
                            echo '<a href="javascript:void(0);" onclick="goToPage(' . $i . ')">' . $i . '</a>';
                        }
                    }
                    // Liên kết "Next"
                    if ($currentPage < $totalPages) {
                        $nextPage = $currentPage + 1;
                        echo '<a href="javascript:void(0);" onclick="goToPage(' . $nextPage . ')"><i class="fa fa-long-arrow-right"></i></a>';
                    }
                    ?>
                </div>
            </div>

            <style>
                .current-page {
                    display: inline-block;
                    background-color: #808080;
                    width: 30px;
                    height: 30px;
                    border: 1px solid #b2b2b2;
                    font-size: 14px;
                    color: #b2b2b2;
                    font-weight: 700;
                    line-height: 28px;
                    text-align: center;
                    margin-right: 16px;
                    -webkit-transition: all, 0.3s;
                    -moz-transition: all, 0.3s;
                    -ms-transition: all, 0.3s;
                    -o-transition: all, 0.3s;
                    transition: all, 0.3s;
                }
            </style>
        </div>
    </div>
    </div>
    </div>
</section>
<!-- Product Section End -->