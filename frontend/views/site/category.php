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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-MJ/56pBrhygBp+g9tOxTE4Z1BF7kfyuHXsKo+va4sfMq4P6IKdZDzNNhYHKrkBLclD9Sx8E86QZko2NCl1prA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet">

    <style>
        /* CSS for centering the search bar */
        .search-bar-container {
            display: flex;
            justify-content: left;
            align-items: left;
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

<section style="height: 100px; background-image: url(asset/images/pexels-ivo-rainha-527110-1290141.jpg);" >
</section>

<!-- shop-page -->
<!-- Rest of the code remains the same -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="search-bar-container">
                <input type="text" id="searchInput" placeholder="Tìm kiếm theo tên sách...">
            </div>
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
</div>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const searchInput = document.getElementById("searchInput");
        const articles = document.querySelectorAll(".articles .col-md-4");

        searchInput.addEventListener("input", function() {
            const searchTerm = searchInput.value.trim().toLowerCase();

            articles.forEach(function(article) {
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