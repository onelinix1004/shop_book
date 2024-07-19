<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Additional CSS and other scripts -->
</head>
<body>

<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

$model->amount = $cost;
?>
<!--end-navbar-->
<section class="home-slider owl-carousel">

    <div class="slider-item" style="background-image: url(asset/images/pexels-ivo-rainha-527110-1290141.jpg);" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row slider-text justify-content-center align-items-center">

                <div class="col-md-7 col-sm-12 text-center ftco-animate">
                    <h1 class="mb-3 mt-5 bread">Check Out</h1>
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Check Out</span></p>
                </div>

            </div>
        </div>
    </div>
</section>
<!-- shop-page -->
<div class="container checking-area">
    <div class="row">
        <div class="col-md-9 checkout-accordion">
            <div class="col-md-12 white-bg">
                <div class="bs-example">
                    <div class="panel-group" id="accordion">

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"><i
                                                class="fa fa-info-circle"></i> 1. Thông tin đặt hàng</a>
                                </h4>
                            </div>
                            <div id="collapseTwo" class="panel-collapse collapse in panel-body">

                                <div class="accordion-list-content" style="overflow: hidden; display: block;">
                                    <?php $form = \yii\bootstrap5\ActiveForm::begin(['layout' => 'horizontal']); ?>


                                    <?= $form->field($model, 'name')->textInput(['class' => 'form-control']) ?>


                                    <?= $form->field($model, 'phone')->textInput(['class' => 'form-control']) ?>


                                    <?= $form->field($model, 'address')->textInput(['class' => 'form-control']) ?>


                                    <?= $form->field($model, 'note')->textarea(); ?>
                                    <?= $form->field($model, 'amount')->hiddenInput()->label(false); ?>


                                </div>


                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseSix"><i
                                                class="fa fa-check-square"></i> 2. Xác nhận đơn hàng</a>
                                </h4>
                            </div>
                            <button type="submit" class="btn btn-danger" style="margin-left: 180px"><i
                                        class="fa fa-check"></i> ĐẶT HÀNG
                            </button>


                            <?php \yii\bootstrap5\ActiveForm::end(); ?>
                            <div class="row">
                                <div class="col-md-12 cart-area">
                                    <div class="sixteen columns cart-section oflow">

                                        <!-- Cart -->

                                        <div class="row">

                                            <div class="col-md-6 cart-totals">

                                                <br>

                                            </div>

                                            <div class="pull-right cart-buttons">

                                                <a href="index.php"><i class="fa fa-shopping-cart"></i> Tiếp tục mua
                                                    hàng</a>
                                                <a href="index.php?r=cart/index"><i class="fa fa-shopping-basket"></i>
                                                    Xem giỏ hàng</a>


                                            </div>
                                        </div>
                                        <br>
                                        <br>
                                    </div>

                                    <!-- Start -->
                                    <!-- end -->
                                </div>
                                <!-- Sidebar -->

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--prize-->

<!--end-footer-->
<script src="js/jquery-1.11.0.min.js"></script>
<script src="js/lightbox.js"></script>
<script>
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-2196019-1']);
    _gaq.push(['_trackPageview']);
    (function () {
        var ga = document.createElement('script');
        ga.type = 'text/javascript';
        ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(ga, s);
    })();
</script>


</body>
</html>