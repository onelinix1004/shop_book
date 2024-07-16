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
<!-- CSS -->
<style>
/* Your existing CSS styles */
/* ... */

/* Additional CSS for styling the tabs */
/* Additional CSS for styling the review comments section */
.review_list {
    margin-top: 30px;
}

.review {
    margin-bottom: 20px;
    border: 1px solid #ccc;
    padding: 10px;
    border-radius: 5px;
    display: flex;
    border-opacity: 0.5;
    width: 100%;
}

.review .box1 {
    flex-grow: 1/3;
    width: 30%;
}

.review .box2 {
    flex-grow: 2/3;
    width: 70%;
}

.review .box1 span {
    font-size: 18px;
    margin-bottom: 5px;
    display: block;
}

.review .product-rating-content {
    margin-bottom: 10px;
}

.review .product-rating-content i {
    font-size: 24px;
    color: gold;
    margin-right: 5px;
}

.review .review-content {
    font-size: 18px;
}

/* Additional CSS for styling the comment date */
.review .comment-date {
    font-size: 14px;
    color: #888;
}

.review .comment-date:before {
    content: "\2022";
    margin-right: 5px;
}

.nav-tabs {
    border-bottom: none;
    justify-content: center;
}

.nav-tabs .nav-item {
    margin-bottom: 15px;
}

.nav-tabs .nav-link {
    font-size: 18px;
    border: none;
    border-radius: 0;
    background-color: transparent;
    color: #000;
    transition: all 0.3s ease;
}

.nav-tabs .nav-link.active,
.nav-tabs .nav-link:hover {
    border-bottom: 3px solid #007bff;
    color: #007bff;
}

/* Additional CSS for styling the reviews section */
.review {
    margin-bottom: 20px;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

.review .box1 {
    width: 30%;
}

.review .box2 {
    width: 70%;
}

.product-rating-content {
    margin-bottom: 10px;
}

.product-rating-content .fa-star-o {
    color: gray;
}

.product-rating-content .fa-star-o.checked,
.product-rating-content .fa-star-o:hover {
    color: gold;
}

.review-content {
    font-size: 18px;
}

</style>

<!-- JavaScript -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>



</head>
<div class="page-title">
   <div class="container">
      <div class="row">
         <div class="col-md-10 produti">
            <h4><i class="fa fa-book"></i> <?php echo $product->name; ?></h4>
         </div>
         <div class="col-md-2 cart">
            <h4>
                <a href="index.php?r=cart">
                <i class="fa fa-shopping-cart"></i> Giỏ hàng (<?= $total ?> items)
                </a>
                </h4>

            <ul>
               <li><a href="index.php">Trang chủ /</a></li>
               <li><a href="index.php">Menu</a></li>
            </ul>
         </div>
      </div>
   </div>
</div>

<!-- shop-page -->
<div class="container content">
<div class="row">
<div class="col-md-9 white-bg">
<!-- Single Product -->
<div class="single-product cold-md-12">
   <div class="col-md-6">
      <br>
      <img src="<?= Yii::getAlias("@backendUrl/") . $product->image ?>" alt="img" style="width: 270px;height: 320px; margin-left: 30px;">
   </div>
   <div class="product-details col-md-6">
      <h4 style="font-size: 23px; font-weight: bold;">
         <?= $product->name ?>
      </h4>
      <p class="price" style="color: red;">
         <?php 
            $s = number_format($product->price);
            echo '<i class="fa fa-tag" style="margin-right: 5px; margin-top:90px;"></i> Giá: '. $s . " VNĐ";
         ?>
      </p>
      <p>
         <?php
            $category = backend\models\Category::find()->where(["id" => $product->category_id])->asArray()->one();
            
            if ($category) {
              echo '<i class="fa fa-folder-open" style="margin-right: 5px; margin-top:5px; font-size:20px;"></i> Category: ' . $category['name'];
            } else {
              echo '<i class="fa fa-folder-open" style="margin-right: 5px;"></i> Category not found';
            }
         ?>
      </p>
      <form action="index.php?r=cart/add-cart&id=<?= $product->id ?>" method="POST" style="display: flex; align-items: center;">
          <div class="qtyminus" style="flex-grow: 1;">
              <!-- Các phần tử HTML cho phần tăng/giảm số lượng sản phẩm nếu có -->
          </div>
          <input type="number" name="quantity" value="1" class="qty" min="1" max="100" style="font-size: 15px; font-weight: bold; flex-grow: 1; margin-right: 5px; margin-left: -110px;">
          <input type="submit" value="THÊM VÀO GIỎ HÀNG" class="btn btn-warning" style="font-size: 15px; font-weight: bold;background-color:#5a423b!important;">
      </form>
      <a href="<?= Yii::$app->urlManager->createUrl(
        ['site/flipbook', 'id' => $product->id]) ?>" class="btn btn-warning" style="padding-top: 5px; margin-top: 20px; font-size: 18px; font-weight: bold; color: #FFFFFF; background-color: #5a423b!important; width: 181px;height: 35px; margin-left: 90px;">
         <i class="fa fa-book" style="margin-right: 5px; "></i> Read Book
      </a>
      <!-- Replace "fa fa-tag", "fa fa-folder-open", and "fa fa-book" with the appropriate icon classes based on your chosen icon library (e.g., Font Awesome) -->
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <hr>
   </div>
   <!-- End Single Product -->
</div>

<div class="col-md-12 tabs">
    <!--================Product Description Area =================-->
    <section class="product_description_area" style="background-color: #fff; color: #000;">
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
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="col-6">
                                <div class="box_total" style="display: flex; border-bottom: 1px solid black; border-opacity: 0.5; width: 100%;">
                                    <div class="box_1" style="flex-grow: 1/3; width: 50%;">
                                        <h5 style="text-align: center; font-size: 20px; margin-left: 320px; font-weight: 800;">OVERALL</h5>
                                        <h5 style="text-align: center; font-size: 35px; margin-left: 350px; color: gold;"><?= $averageRating ?></h5>
                                        <div class="start" style="margin-right: -463px;">
                                            <?php if (is_numeric($averageRating)): ?>
                                                <?php $integerPart = floor($averageRating); ?>
                                                <?php $decimalPart = $averageRating - $integerPart; ?>
                                                <span class="fa fa-star-o" style="font-size: 24px; color: gold; margin: 15px 0.5rem 0 0.5rem; transform: translate(-50%, -50%);"></span>
                                                <?php for ($i = 1; $i <= $integerPart - 1; $i++): ?>
                                                    <span class="fa fa-star-o" style="font-size: 24px; color: gold; margin: 15px 0.5rem 0 0.5rem; transform: translate(-50%, -50%);"></span>
                                                <?php endfor; ?>
                                                <?php if ($decimalPart > 0): ?>
                                                    <span class="fa fa-star-half checked" style="font-size: 24px; color: gold; margin: 15px 0.5rem 0 0.5rem; transform: translate(-50%, -50%);"></span>
                                                <?php endif; ?>
                                            <?php else: ?>
                                                <p>No rating yet.</p>
                                            <?php endif; ?>
                                            <style>
                                                .start {
                                                    text-align: center;
                                                }
                                            </style>
                                        </div>
                                    </div>
                                    <div class="box_2">
                                        <button id="add-review-btn" class="btn btn-primary" style="margin-top: 100px; margin-bottom: 20px; margin-right: 1500px;">Gửi đánh giá của bạn</button>
                                    </div>
                                </div>
                                <style>
                                    .box_total {
                                        display: flex;
                                        border-bottom: 1px solid black;
                                        border-opacity: 0.5;
                                        width: 100%;
                                    }
                                    .box_1 {
                                        flex-grow: 1/3;
                                        width: 33.33%;
                                    }
                                    .box_2 {
                                        flex-grow: 2/3;
                                        width: 66.66%;
                                    }
                                </style>
                            </div>
                            <div>
                                <?php $form = ActiveForm::begin([
                                    'id' => 'review-form',
                                    'options' => ['style' => 'display:none;']
                                ]); ?>
                                <h3 style="margin-top:20px; margin-bottom:15px;">Chọn đánh giá của bạn</h3>
                                <div class="rating">
                                    <span class="fa fa-star-o " id="star1" style="font-size: 24px; color: gray;"></span>
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

                                    $('#star1').click(function() {
                                        setRating(1);
                                    });
                                    $('#star2').click(function() {
                                        setRating(2);
                                    });
                                    $('#star3').click(function() {
                                        setRating(3);
                                    });
                                    $('#star4').click(function() {
                                        setRating(4);
                                    });
                                    $('#star5').click(function() {
                                        setRating(5);
                                    });

                                    $('.rating .fa-star-o').mouseenter(function() {
                                        $(this).css('color', 'gold');
                                    }).mouseleave(function() {
                                        if (!$(this).hasClass('checked')) {
                                            $(this).css('color', '');
                                        }
                                    });

                                    function setRating(rating) {
                                        $('#rating-input').val(rating);
                                        $('.rating .fa-star-o').removeClass('checked').css('color', '');
                                        for (var i = 1; i <= rating; i++) {
                                            $('#star' + i).addClass('checked').css('color', 'gold');
                                        }
                                        $('#star' + rating).addClass('checked');
                                    }
                                </script>
                                <?php ActiveForm::end(); ?>
                            </div>
                            <div class="review_list">
                                <?php foreach ($reviews as $review): ?>
                                    <div class="review" style="display: flex; border-opacity: 0.5; width: 100%;">
                                        <div class="box1" style="flex-grow: 1/3; width: 30%;">
                                            <span style="font-size: 18px;"><?= Html::encode($review->user->username) ?></span>
                                            <enter></enter>
                                            <span style="font-size: 18px;"><?= Yii::$app->formatter->asDatetime($review->created_at) ?></span>
                                        </div>
                                        <div class="box2" style="flex-grow: 2/3; width: 70%;">
                                            <div class="product-rating-content">
                                                <?php for ($i = 1; $i <= 5; $i++) {
                                                    if ($i <= $review->rating) {
                                                        echo '<i class="fa fa-star-o" style="font-size: 24px; color: gold;"></i> ';
                                                    }
                                                } ?>
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

<!--articles-->
</div>
<div class="col-md-3 shop-sidebar">
<div class="sidebar-widgets">
<div class="shop-widget">
<h4>Categories</h4>
<ul class="category-shop-list">
<?php $category = backend\models\Category::find()->all(); ?>
<?php foreach ($category as $item): ?>
<?php $count = backend\models\Product::find()
   ->where(["category_id" => $item->id])
   ->count(); ?>
<li>
<a class="accordion-link" href="index.php?r=site/category&id=<?= $item->id ?>"><?= $item->name ?> <span>(<?= $count ?>)</span></a>
<ul class="accordion-list-content"></ul>
</li>
<?php endforeach; ?>
</ul>
</div>
<div class="shop-widget">
<h4>được yêu thích</h4>
<?php $product = backend\models\Product::find()
   ->limit(2)
   ->all(); ?>
<ul class="popular-product">
<?php foreach ($product as $item): ?>
<li>
<img src="<?= Yii::getAlias("@backendUrl/") . $item->image ?>" alt="img" style="width: 50px;height: 50px">
<div>
<h6><a href="#"><?= $item->name ?></a></h6>
<span><?php
   $s = number_format($item->price);
   echo $s . " VNĐ";
   ?></span>
</div>
</li>
<?php endforeach; ?>
</ul>
</div>
</div>
</div>
</div>
</div>
<!--prize-->
<!--end-prize-->
<!--footer-->