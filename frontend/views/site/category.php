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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
          integrity="sha512-MJ/56pBrhygBp+g9tOxTE4Z1BF7kfyuHXsKo+va4sfMq4P6IKdZDzNNhYHKrkBLclD9Sx8E86QZko2NCl1prA=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flaticon@latest/css/flaticon.css">


    <link rel="stylesheet" href="asset/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="asset/css//animate.css">

    <link rel="stylesheet" href="asset/css/owl.carousel.min.css">
    <link rel="stylesheet" href="asset/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="asset/css/magnific-popup.css">

    <link rel="stylesheet" href="asset/css/aos.css">

    <link rel="stylesheet" href="asset/css/ionicons.min.css">

    <link rel="stylesheet" href="asset/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">


    <link rel="stylesheet" href="asset/css/flaticon.css">
    <link rel="stylesheet" href="asset/css/icomon.css">
    <link rel="stylesheet" href="asset/css/style.css">


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
                        <a href="index.php?r=site/view&id=<?= $product->id ?>">
                            <img src="<?= $product->image ?>" alt="img" style="width: 200px; height: 290px;">
                            <div class="text">
                                <span><?= $product->name ?></span>
                                <p><?php $s = number_format($product->price); echo 'Giá : ' . $s . ' VNĐ'; ?></p>
                            </div>
                        </a>
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
        const articles = document.querySelectorAll(".articles .col-md-4");

        searchInput.addEventListener("input", function () {
            const searchTerm = searchInput.value.trim().toLowerCase();

            articles.forEach(function (article) {
                const name = article.querySelector(".text span").innerText.toLowerCase();

                if (name.includes(searchTerm)) {
                    article.style.display = "block";
                } else {
                    article.style.display = "none";
                }
            });
        });
    });
</script>


<!--prize-->
</html>
<!--end-prize-->
<!--footer-->