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
                <p style="color: white">
                    <?php
                    $category = backend\models\Category::find()->where(["id" => $product->category_id])->asArray()->one();

                    if ($category) {
                        echo '<i class="fa fa-folder-open" style="margin-right: 5px; margin-top:5px; font-size:20px;"></i> Category: ' . $category['name'];
                    } else {
                        echo '<i class="fa fa-folder-open" style="margin-right: 5px;"></i> Category not found';
                    }
                    ?>
                </p>
                <p class="price"><span>$<?= $product->price ?></span></p>
                <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a
                    paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
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

<!-- review -->
<section class="ftco-section">
    <div class="container" style="display: flex; flex-direction: column; align-items: center; text-align: center;">
        <div class="col-md-7 heading-section ftco-animate">
            <span class="subheading">Discover</span>
            <h2 class="mb-4">Review Book</h2>
        </div>

        <div class="content-wrapper" style="display: flex; justify-content: space-between; width: 100%; max-width: 1200px;">
            <!-- Rating Section -->
            <div class="rating-section" style="flex: 1; margin-right: 20px;">
                <div class="box_1" style="width: 100%; max-width: 100%;">
                    <h5 style="font-size: 20px; font-weight: 800;">OVERALL</h5>
                    <h5 style="font-size: 35px;"><?= $averageRating ?></h5>
                    <div class="start-container">
                        <?php if (is_numeric($averageRating)): ?>
                            <?php $integerPart = floor($averageRating); ?>
                            <?php $decimalPart = $averageRating - $integerPart; ?>
                            <div class="stars">
                                <?php for ($i = 1; $i <= 5; $i++): ?>
                                    <?php if ($i <= $integerPart): ?>
                                        <span class="fa-solid fa-star" style="font-size: 24px; color: gold; margin: 0 0.2rem;"></span>
                                    <?php elseif ($i == $integerPart + 1 && $decimalPart > 0): ?>
                                        <span class="fa-solid fa-star-half" style="font-size: 24px; color: gold; margin: 0 0.2rem;"></span>
                                    <?php else: ?>
                                        <span class="fa-solid fa-star" style="font-size: 24px; color: gray; margin: 0 0.2rem;"></span>
                                    <?php endif; ?>
                                <?php endfor; ?>
                            </div>
                        <?php else: ?>
                            <p>No rating yet.</p>
                        <?php endif; ?>
                    </div>

                    <style>
                        .start-container {
                            display: flex;
                            justify-content: center;
                            align-items: center;
                        }

                        .stars {
                            display: flex;
                            align-items: center;
                        }
                    </style>
                </div>

                <div>
                    <?php $form = ActiveForm::begin(['id' => 'review-form']); ?>
                    <h3 style="margin-top: 20px; margin-bottom: 15px;">Chọn đánh giá của bạn</h3>
                    <div class="rating">
                        <span class="fa-solid fa-star" id="star1" style="font-size: 24px; color: gray;" data-index="1"></span>
                        <span class="fa-solid fa-star" id="star2" style="font-size: 24px; color: gray;" data-index="2"></span>
                        <span class="fa-solid fa-star" id="star3" style="font-size: 24px; color: gray;" data-index="3"></span>
                        <span class="fa-solid fa-star" id="star4" style="font-size: 24px; color: gray;" data-index="4"></span>
                        <span class="fa-solid fa-star" id="star5" style="font-size: 24px; color: gray;" data-index="5"></span>
                    </div>
                    <div style="text-align: left;">
                        <?= $form->field($reviewModel, 'rating')->hiddenInput(['id' => 'rating-input'])->label(false) ?>
                        <?= $form->field($reviewModel, 'comment')->textarea(['rows' => 2]) ?>
                    </div>
                    <div class="form-group">
                        <?= Html::submitButton('Post Review', ['class' => 'btn btn-success']) ?>
                    </div>
                    <?php ActiveForm::end(); ?>
                </div>

                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                <script>
                    $(document).ready(function () {
                        // Handle click events
                        $('.rating .fa-solid').on('click', function () {
                            let rating = $(this).data('index');
                            setRating(rating);
                        });

                        // Handle hover events
                        $('.rating .fa-solid').hover(function () {
                            let index = $(this).data('index');
                            highlightStars(index);
                        }, function () {
                            // Revert stars to their original color
                            let currentRating = $('#rating-input').val();
                            highlightStars(currentRating);
                        });

                        // Set the rating in the hidden input and update star colors
                        function setRating(rating) {
                            $('#rating-input').val(rating);
                            highlightStars(rating);
                        }

                        // Highlight stars based on the rating
                        function highlightStars(rating) {
                            $('.rating .fa-solid').each(function () {
                                let index = $(this).data('index');
                                if (index <= rating) {
                                    $(this).css('color', 'gold');
                                } else {
                                    $(this).css('color', 'gray');
                                }
                            });
                        }
                    });
                </script>
            </div>

            <!-- Review List Section -->
            <div class="review-section" style="flex: 1; margin-left: 20px;">
                <div class="review_list">
                    <?php foreach ($reviews as $review): ?>
                        <div class="review" style="display: flex; border-opacity: 0.5; width: 100%; max-width: 100%; margin: 0 auto;">
                            <div class="box1" style="flex-grow: 1/3;">
                                <span style="font-size: 18px;">
                                    <i class="fa-solid fa-user" style="color: #74C0FC;"></i> <?= Html::encode($review->user->username) ?>
                                </span>
                                <br>
                                <span style="font-size: 18px;"><?= Yii::$app->formatter->asDatetime($review->created_at) ?></span>
                            </div>
                            <div class="box2" style="flex-grow: 2/3;">
                                <div class="product-rating-content">
                                    <?php for ($i = 1; $i <= 5; $i++): ?>
                                        <?php if ($i <= $review->rating): ?>
                                            <span class="fa-solid fa-star" style="font-size: 24px; color: gold;"></span>
                                        <?php else: ?>
                                            <span class="fa-solid fa-star" style="font-size: 24px; color: gray;"></span>
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