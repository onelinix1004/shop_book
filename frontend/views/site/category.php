<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use backend\models\Category;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Category</title>
    <style>
        /* CSS for centering the search bar */
        .search-bar-container {
            display: flex;
            justify-content: left;
            align-items: flex-end;
            margin: 20px auto;
            width: 100%;
        }

        .search-bar-container input[type="text"] {
            width: 100%;
            padding: 12px 20px;
            font-size: 18px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: width 0.3s;
        }

        .search-bar-container input[type="text"]:focus {
            width: 100%; /* Keep it at 100% width on focus */
        }

        .menu-entry .img {
            display: block;
            width: 100%;
            height: 350px; /* Set a fixed height */
            background-size: cover;
            background-position: center center;
        }

        .product-name {
            height: 50px; /* Set a fixed height for the product name */
            overflow: hidden;
            margin-bottom: 10px;
        }

        .price {
            margin-bottom: 10px;
        }
    </style>


</head>
<!--end-navbar-->

<section class="home-slider owl-carousel">

    <div class="slider-item" style="background-image: url(asset/images/pexels-ivo-rainha-527110-1290141.jpg);"
         data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row slider-text justify-content-center align-items-center">

                <div class="col-md-7 col-sm-12 text-center ftco-animate">
                    <h1 class="mb-3 mt-5 bread">Novels</h1>
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Category</span>
                    </p>
                </div>

            </div>
        </div>
    </div>
</section>

<!-- shop-page -->
<!-- Rest of the code remains the same -->
<section class="ftco-section" style="padding: 0">
    <div class="container">
        <div class="row" style="margin-top: 10px">
            <div class="col-md-12 latest">
                <h4 class="pull-left"><?php echo 'Có tổng cộng ' . $count . ' sách'; ?></h4>
                <ul class="pagination-lít pull-right">

                </ul>
            </div>
            <div class="col-xl-8 ftco-animate">
                <?php $counter = 0; ?>
                <?php foreach ($products as $product): ?>
                    <?php if ($counter % 3 == 0): ?>
                        <div class="row">
                    <?php endif; ?>
                    <div class="col-md-4 col-sm-6">
                        <div class="menu-entry">
                            <a href="index.php?r=site/view&id=<?= $product->id ?>" class="img"
                               style="background-image: url(<?= $product->image ?>);"></a>
                            <div class="text text-center pt-4">
                                <h3 class="product-name"><a href="#"><?= $product->name ?></a></h3>
                                <p class="price"><span><?php $s = number_format($product->price);
                                        echo 'Giá : ' . $s . ' VNĐ'; ?></span></p>
                                <div style="display: flex; justify-content: center; gap: 10px;">
                                    <a href="<?= Yii::$app->urlManager->createUrl(['site/flipbook', 'id' => $product->id]) ?>"
                                       class="btn btn-primary btn-outline-primary">Read Book</a>
                                    <form action="<?= Yii::$app->urlManager->createUrl(['cart/add-cart', 'id' => $product->id]) ?>"
                                          method="POST"
                                          style="display: inline;">
                                        <input type="number" name="quantity" value="1" class="form-control input-number"
                                               min="1" max="100" style="display: none;">
                                        <button type="submit" class="btn btn-primary btn-outline-primary">
                                            Add to Cart
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php $counter++; ?>
                    <?php if ($counter % 3 == 0): ?>
                        </div> <!-- .row -->
                    <?php endif; ?>
                <?php endforeach; ?>
                <?php if ($counter % 3 != 0): ?>
            </div> <!-- .row (closing for the last row if not complete) -->
            <?php endif; ?>
        </div> <!-- .col-md-8 -->


        <div class="col-xl-4 sidebar ftco-animate">
            <div class="sidebar-box">
                <form action="#" class="search-form">
                    <div class="form-group">
                        <div class="icon">
                            <span class="icon-search"></span>
                        </div>
                        <input type="text" class="form-control" id="searchInput" placeholder="Search...">
                    </div>
                </form>
            </div>
            <div class="sidebar-box ftco-animate">
                <div class="categories">
                    <h3>Categories</h3>
                    <?php $category = backend\models\Category::find()->all(); ?>
                    <?php foreach ($category as $item): ?>
                        <?php $count = backend\models\Product::find()->where(['category_id' => $item->id])->count(); ?>
                        <li><a href="index.php?r=site/category&id=<?= $item->id ?>"><?= $item->name ?>
                                <span>(<?= $count ?>)</span></a></li>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

    </div>
    </div>
</section> <!-- .section -->

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const searchInput = document.getElementById("searchInput");
        const productItems = document.querySelectorAll(".col-xl-8 .col-md-4"); // Chọn các mục sản phẩm đúng

        searchInput.addEventListener("input", function () {
            const searchTerm = searchInput.value.trim().toLowerCase();

            productItems.forEach(function (item) {
                const productName = item.querySelector(".product-name a").innerText.toLowerCase(); // Tìm tên sản phẩm

                if (productName.includes(searchTerm)) {
                    item.style.display = "block"; // Hiển thị sản phẩm nếu tên chứa từ khóa tìm kiếm
                } else {
                    item.style.display = "none"; // Ẩn sản phẩm nếu không chứa từ khóa tìm kiếm
                }
            });
        });
    });
</script>



<!--prize-->
</html>
<!--end-prize-->
<!--footer-->