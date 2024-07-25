<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap5\ActiveForm;
use backend\models\User;
use backend\models\Comment;
use frontend\models\CommentForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\CommentForm */
/* @var $product app\models\Product */

?>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
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

        .product-description {
            height: 60px; /* Set a fixed height for the product description */
            overflow: hidden;
            margin-bottom: 10px;
        }

        .price {
            margin-bottom: 10px;
        }

    </style>

</head>
<section class="home-slider owl-carousel">

    <div class="slider-item" style="background-image: url(asset/images/pexels-ivo-rainha-527110-1290141.jpg);"
         data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row slider-text justify-content-center align-items-center">

                <div class="col-md-7 col-sm-12 text-center ftco-animate">
                    <h1 class="mb-3 mt-5 bread">Book Detail</h1>
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Detail</span>
                    </p>
                </div>

            </div>
        </div>
    </div>
</section>


<section class="ftco-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mb-5 ftco-animate">
                <a href="images/menu-2.jpg" class="image-popup"><img src="<?= $product->image ?>" class="img-fluid"
                                                                     style="height: 500px;" alt="Colorlib Template"></a>
            </div>
            <div class="col-lg-6 product-details pl-md-5 ftco-animate">
                <h3><?= $product->name ?></h3>
                <p class="price"><span>$<?= $product->price ?></span></p>
                <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a
                    paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
                <p>On her way she met a copy. The copy warned the Little Blind Text, that where it came from it would
                    have been rewritten a thousand times and everything that was left from its origin would be the word
                    "and" and the Little Blind Text should turn around and return to its own, safe country. But nothing
                    the copy said could convince her and so it didn’t take long until a few insidious Copy Writers
                    ambushed her, made her drunk with Longe and Parole and dragged her into their agency, where they
                    abused her for their.
                </p>
                <form action="index.php?r=cart/add-cart&id=<?= $product->id ?>" method="POST"
                      style="display: flex; align-items: center;">
                    <div class="qtyminus" style="flex-grow: 1;">
                        <!-- Các phần tử HTML cho phần tăng/giảm số lượng sản phẩm nếu có -->
                    </div>
                    <input type="number" name="quantity" value="1" class="form-control input-number" min="1" max="100"
                           style="margin-left: 10px;">
                    <input type="submit" value="Add to Cart" class="btn btn-primary py-3 px-5">
                </form>
                <p><a href="<?= Yii::$app->urlManager->createUrl(
                        ['site/flipbook', 'id' => $product->id]) ?>" class="btn btn-primary py-3 px-5"
                      style="margin-left: 10px;">Read Book</a></p>
            </div>
        </div>
    </div>
</section>


<!-- shop-page -->
<?php $product = backend\models\Product::find()
    ->limit(4)
    ->all(); ?>
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 heading-section ftco-animate text-center">
                <span class="subheading">Discover</span>
                <h2 class="mb-4">Related Book</h2>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live
                    the blind texts.</p>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <?php
                $count = 0;
                foreach ($product

                as $item):
                if ($count % 4 == 0 && $count != 0): ?>
            </div>
            <div class="row">
                <?php endif;
                if ($count == 20) break; // Stop after 20 products (5 rows of 4 products each)
                $count++;
                ?>
                <div class="col-md-3">
                    <div class="menu-entry">
                        <a href="index.php?r=site/view&id=<?= $item->id ?>" class="img"
                           style="background-image: url(<?= $item->image ?>);"></a>
                        <div class="text text-center pt-4">
                            <h3 class="product-name"><a href="#"><?= $item->name ?></a></h3>
                            <p class="product-description">A small river named Duden flows by their place and
                                supplies</p>
                            <p class="price"><span><?php $s = number_format($item->price);
                                    echo 'Giá : ' . $s . ' VNĐ'; ?></span></p>
                            <p><a href="#" class="btn btn-primary btn-outline-primary">Add to Cart</a></p>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>

    </div>
    </div>
</section>
<!--prize-->
<!--end-prize-->
<!--footer-->