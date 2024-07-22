<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use backend\models\User;
use backend\models\Comment;
use frontend\models\CommentForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\CommentForm */
/* @var $product app\models\Product */

?>
<head>

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
        <div class="row">
            <div class="col-md-3">
                <div class="menu-entry">
                    <a href="#" class="img" style="background-image: url(images/menu-1.jpg);"></a>
                    <div class="text text-center pt-4">
                        <h3><a href="#">Coffee Capuccino</a></h3>
                        <p class="price"><span>$5.90</span></p>
                        <p><a href="#" class="btn btn-primary btn-outline-primary">Add to Cart</a></p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="menu-entry">
                    <a href="#" class="img" style="background-image: url(images/menu-2.jpg);"></a>
                    <div class="text text-center pt-4">
                        <h3><a href="#">Coffee Capuccino</a></h3>
                        <p>A small river named Duden flows by their place and supplies</p>
                        <p class="price"><span>$5.90</span></p>
                        <p><a href="#" class="btn btn-primary btn-outline-primary">Add to Cart</a></p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="menu-entry">
                    <a href="#" class="img" style="background-image: url(images/menu-3.jpg);"></a>
                    <div class="text text-center pt-4">
                        <h3><a href="#">Coffee Capuccino</a></h3>
                        <p>A small river named Duden flows by their place and supplies</p>
                        <p class="price"><span>$5.90</span></p>
                        <p><a href="#" class="btn btn-primary btn-outline-primary">Add to Cart</a></p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="menu-entry">
                    <a href="#" class="img" style="background-image: url(images/menu-4.jpg);"></a>
                    <div class="text text-center pt-4">
                        <h3><a href="#">Coffee Capuccino</a></h3>
                        <p>A small river named Duden flows by their place and supplies</p>
                        <p class="price"><span>$5.90</span></p>
                        <p><a href="#" class="btn btn-primary btn-outline-primary">Add to Cart</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--prize-->
<!--end-prize-->
<!--footer-->