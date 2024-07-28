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
        <!-- Add this line to include Font Awesome -->
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
<div class="col-md-12 tabs">
    <!--================Product Description Area =================-->
    <section class="product_description_area" style="background-color: #3a283d; color: #000;">
        <div class="container">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Description</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review" aria-selected="false">Reviews</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <h2>Description</h2>
                    <p>This is the description of the product.</p>
                </div>
                <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
                    <div class="row" style="background-color: #0a53be">
                        <div class="col-lg-6">
                            <div class="box_total">
                                <div class="box_1">
                                    <h5 style="text-align: center; font-size: 20px; font-weight: 800;">OVERALL</h5>
                                    <h5 style="text-align: center; font-size: 35px;"><?= $averageRating ?></h5>
                                    <div class="stars" style="text-align: center;">
                                        <?php if (is_numeric($averageRating)): ?>
                                            <?php
                                            $integerPart = floor($averageRating);
                                            $decimalPart = $averageRating - $integerPart;
                                            for ($i = 1; $i <= $integerPart; $i++): ?>
                                                <span class="fa fa-star" style="font-size: 24px; color: gold;"></span>
                                            <?php endfor; ?>
                                            <?php if ($decimalPart > 0): ?>
                                                <span class="fa fa-star-half-alt" style="font-size: 24px; color: gold;"></span>
                                            <?php endif; ?>
                                        <?php else: ?>
                                            <p>No rating yet.</p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="box_2">
                                    <button id="add-review-btn" class="btn btn-primary" style="margin-top: 20px;">Gửi đánh giá của bạn</button>
                                </div>
                            </div>
                            <div>
                                <?php $form = ActiveForm::begin([
                                    'id' => 'review-form',
                                ]); ?>
                                <h3 style="margin-top: 20px; margin-bottom: 15px;">Chọn đánh giá của bạn</h3>
                                <div class="rating">
                                    <span class="fa fa-star-o" id="star1" style="font-size: 24px; color: gray;"></span>
                                    <span class="fa fa-star-o" id="star2" style="font-size: 24px; color: gray;"></span>
                                    <span class="fa fa-star-o" id="star3" style="font-size: 24px; color: gray;"></span>
                                    <span class="fa fa-star-o" id="star4" style="font-size: 24px; color: gray;"></span>
                                    <span class="fa fa-star-o" id="star5" style="font-size: 24px; color: gray;"></span>
                                </div>
                                <?= $form->field($reviewModel, 'rating')->hiddenInput(['id' => 'rating-input'])->label(false) ?>
                                <?= $form->field($reviewModel, 'comment')->textarea(['rows' => 2]) ?>
                                <div class="form-group">
                                    <?= Html::submitButton('Post Review', ['class' => 'btn btn-success']) ?>
                                </div>
                                <script>
                                    $('#add-review-btn').click(function() {
                                        $('#review-form').toggle();
                                    });

                                    $('#add-review-btn').hover(function() {
                                        $(this).removeClass('btn-primary').addClass('btn-outline-primary');
                                    }, function() {
                                        $(this).removeClass('btn-outline-primary').addClass('btn-primary');
                                    });

                                    $('.rating .fa-star-o').on('click', function() {
                                        let rating = $(this).index() + 1;
                                        setRating(rating);
                                    });

                                    $('.rating .fa-star-o').hover(function() {
                                        $(this).css('color', 'gold');
                                    }, function() {
                                        if (!$(this).hasClass('checked')) {
                                            $(this).css('color', 'gray');
                                        }
                                    });

                                    function setRating(rating) {
                                        $('#rating-input').val(rating);
                                        $('.rating .fa-star-o').removeClass('checked').css('color', 'gray');
                                        for (let i = 1; i <= rating; i++) {
                                            $('#star' + i).addClass('checked').css('color', 'gold');
                                        }
                                    }
                                </script>
                                <?php ActiveForm::end(); ?>
                            </div>
                            <div class="review_list">
                                <?php foreach ($reviews as $review): ?>
                                    <div class="review" style="display: flex; border-opacity: 0.5; width: 100%;">
                                        <div class="box1" style="flex-grow: 1/3; width: 30%;">
                                            <span style="font-size: 18px;"><?= Html::encode($review->user->username) ?></span>
                                            <br>
                                            <span style="font-size: 18px;"><?= Yii::$app->formatter->asDatetime($review->created_at) ?></span>
                                        </div>
                                        <div class="box2" style="flex-grow: 2/3; width: 70%;">
                                            <div class="product-rating-content">
                                                <?php for ($i = 1; $i <= 5; $i++): ?>
                                                    <?php if ($i <= $review->rating): ?>
                                                        <span class="fa fa-star" style="font-size: 24px; color: gold;"></span>
                                                    <?php else: ?>
                                                        <span class="fa fa-star-o" style="font-size: 24px; color: gold;"></span>
                                                    <?php endif; ?>
                                                <?php endfor; ?>
                                            </div>
                                            <div class="review-content">
                                                <span style="font-size: 18px;"><?= Html::encode($review->comment) ?></span>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<style>
    .box_total {
        display: flex;
        border-bottom: 1px solid black;
        border-opacity: 0.5;
        width: 100%;
    }
    .box_1 {
        flex-grow: 1;
        width: 50%;
    }
    .box_2 {
        flex-grow: 1;
        width: 50%;
    }
</style>




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