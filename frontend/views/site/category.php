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
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flaticon@latest/css/flaticon.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


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
<body>
<!-- END nav -->
<div class="container header">
    <nav id="myNavbar" class="navbar navbar-expand-lg navbar-dark bg-dark ftco-navbar-light" role="navigation">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <i class="fas fa-book" style="font-size: 30px; margin-right: 5px;"></i>
                <span style="font-size: 20px;">Book Store OLD</span>
            </a>
            <div class="collapse navbar-collapse" id="navbarContent">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item active"><a href="index.php" class="nav-link"><i class="fas fa-home"></i> Trang
                            chủ</a></li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"><i class="fas fa-book"></i>
                            Loại Sách</a>
                        <div class="dropdown-menu">
                            <input type="text" id="searchCategoryInput" class="dropdown-item"
                                   placeholder="Tìm kiếm theo loại sách...">
                            <?php $categories = Category::find()->all(); ?>
                            <?php foreach ($categories as $category): ?>
                                <a class="dropdown-item"
                                   href="index.php?r=site/category&id=<?= $category->id ?>"><?= $category->name ?></a>
                            <?php endforeach; ?>
                        </div>
                    </li>
                    <li class="nav-item"><a href="index.php?r=cart" class="nav-link"><i
                                    class="fas fa-shopping-cart"></i> Giỏ hàng</a></li>
                    <li class="nav-item"><a href="index.php?r=site/about" class="nav-link"><i
                                    class="fas fa-info-circle"></i> Giới thiệu</a></li>
                    <li class="nav-item"><a href="index.php?r=site/contact" class="nav-link"><i
                                    class="fas fa-envelope"></i> Liên hệ</a></li>
                </ul>
            </div>
        </div>
    </nav>
</div>

<section class="home-slider owl-carousel">

    <div class="slider-item" style="background-image: url();"
         data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row slider-text justify-content-center align-items-center">

                <div class="col-md-7 col-sm-12 text-center ftco-animate">
                    <h1 class="mb-3 mt-5 bread">About Us</h1>
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>About</span>
                    </p>
                </div>

            </div>
        </div>
    </div>
</section>

<div style="height: 100px; background-image: url(asset/images/pexels-ivo-rainha-527110-1290141.jpg) "></div>
<!-- shop-page -->
<!-- Rest of the code remains the same -->
<div class="row" style="right: 100px">
        <div class="search-bar-container">
            <input type="text" id="searchInput" placeholder="Tìm kiếm theo tên sách...">
        </div>
</div>


<div class="row content">
    <div class="col-md-9 shop-section">
        <div class="row">
            <div class="col-md-12 latest">
                <h4 class="pull-left"><?php echo 'Có tổng cộng '.$count.' sách'; ?></h4>
                <ul class="pagination-lít pull-right">

                </ul>
            </div>
        </div>
        <br>
        <!--articles-->
        <div class="row articles">
            <?php foreach($products as $product):?>
                <div class="col-md-4 col-sm-6">
                    <a href="index.php?r=site/view&id=<?=$product->id?>">

                        <img src="<?= $product->image ?>" alt="img" style="width: 262px;height: 290px">
                        <div class="text">
                        <span>
                        <?=$product->name?> </span>
                            <p>
                                <?php $s= number_format($product->price); echo 'Giá : '.$s.' VNĐ'; ?>
                            </p>
                        </div>
                    </a>
                </div>
            <?php endforeach;?>
        </div>
    </div>
    <!-- Add this search input above the articles section -->

    <!--end-articles-->
    <div class="col-md-3 shop-sidebar">
        <div class="sidebar-widgets">

            <div class="shop-widget">
                <h4>Categories</h4>
                <ul class="category-shop-list">
                    <?php $category = backend\models\Category::find()->all();?>
                    <?php foreach ($category as $item): ?>
                        <?php $count = backend\models\Product::find()->where(['category_id'=>$item->id])->count();?>
                        <li>
                            <a class="accordion-link" href="index.php?r=site/category&id=<?=$item->id?>"><?=$item->name?> <span>(<?=$count?>)</span></a>
                            <ul class="accordion-list-content">
                            </ul>
                        </li>
                    <?php endforeach; ?>

                </ul>
            </div>

        </div>
    </div>
</div>
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
</body>


<!--prize-->

<!--end-prize-->
<!--footer-->
