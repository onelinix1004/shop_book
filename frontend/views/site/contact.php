<?php
use yii\helpers\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use backend\models\Category;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<!-- END nav -->
<section class="home-slider owl-carousel">

    <div class="slider-item" style="background-image: url(asset/images/pexels-ivo-rainha-527110-1290141.jpg);" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row slider-text justify-content-center align-items-center">

                <div class="col-md-7 col-sm-12 text-center ftco-animate">
                    <h1 class="mb-3 mt-5 bread">Contact Us</h1>
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Contact</span></p>
                </div>

            </div>
        </div>
    </div>
</section>


<section class="ftco-section contact-section">
    <div class="container mt-5">
        <div class="row block-9">
            <div class="col-md-4 contact-info ftco-animate">
                <div class="row">
                    <div class="col-md-12 mb-4">
                        <h2 class="h4">Contact Information</h2>
                    </div>
                    <div class="col-md-12 mb-3">
                        <p><span>Address:</span> 198 West 21th Street, Suite 721 New York NY 10016</p>
                    </div>
                    <div class="col-md-12 mb-3">
                        <p><span>Phone:</span> <a href="tel://1234567920">+ 1235 2355 98</a></p>
                    </div>
                    <div class="col-md-12 mb-3">
                        <p><span>Email:</span> <a href="mailto:info@yoursite.com">info@yoursite.com</a></p>
                    </div>
                    <div class="col-md-12 mb-3">
                        <p><span>Website:</span> <a href="#">yoursite.com</a></p>
                    </div>
                </div>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-6 ftco-animate">
                <?php $form = \yii\bootstrap5\ActiveForm::begin(['id' => 'contact-form', 'options' => ['class' => 'contact-form']]); ?>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <?= $form->field($model, 'name')->textInput(['class' => 'form-control', 'placeholder' => 'Your Name'])->label(false) ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <?= $form->field($model, 'email')->textInput(['class' => 'form-control', 'placeholder' => 'Your Email'])->label(false) ?>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <?= $form->field($model, 'phone')->textInput(['class' => 'form-control', 'placeholder' => 'Your Phone'])->label(false) ?>
                </div>
                <div class="form-group">
                    <?= $form->field($model, 'body')->textarea(['class' => 'form-control', 'rows' => 7, 'placeholder' => 'Message'])->label(false) ?>
                </div>
                <div class="form-group">
                    <?= \yii\bootstrap5\Html::submitButton('Send Message', ['class' => 'btn btn-primary py-3 px-5']) ?>
                </div>
                <?php \yii\bootstrap5\ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</section>

<div class="prize">
    <style>
        .prize {
            position: relative;
        }

        .container {
            position: relative;
        }

        .image-container {
            position: relative;
            display: inline-block;
        }

        .image-container img {
            display: block;
            max-width: 100%;
        }

        .image-container h1 {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
            font-size: 24px;
            text-align: center;
            background-color: rgba(0, 0, 0, 0.5);
            padding: 10px;
            width: 80%;
            max-width: 400px;
        }
    </style>
    <div class="container">
        <div class="image-container">
            <img src="images/3_3.jpg" alt="" width="1600px" height="235px">
            <h1>Win our special prize on our Facebook page</h1>
        </div>
    </div>
</div>

<!-- loader -->