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
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<!-- END nav -->


<section class="home-slider owl-carousel">

    <div class="slider-item" style="background-image: url(asset/images/pexels-ivo-rainha-527110-1290141.jpg);" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row slider-text justify-content-center align-items-center">

                <div class="col-md-7 col-sm-12 text-center ftco-animate">
                    <h1 class="mb-3 mt-5 bread">About Us</h1>
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>About</span></p>
                </div>

            </div>
        </div>
    </div>
</section>

<div class="container">
    <div class="icon-blocks">
        <div class="col-md-4">
            <p>
                <i class="fa fa-group"></i>Đội ngũ nhân viên nhiệt tình
            </p>
        </div>
        <div class="col-md-4">
            <p>
                <i class="fa fa-book"></i>Không gian sang trọng
            </p>
        </div>
        <div class="col-md-4">
            <p>
                <i class="fa fa-globe"></i>Giao lưu với mọi người
            </p>
        </div>

    </div>
</div>
<!-- Team Members -->
<div class="container">
    <div class="row members">
        <div class="col-md-3 col-sm-6">
            <img src="images/1_1.jpg" alt="img">
            <div class="text">
                <p>
                    Thành viên 1
                </p>
                <span>
                CEO </span>
                <div class="members-socials">
                    <ul>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <img src="images/2_1.jpg" alt="img">
            <div class="text">
                <p>
                    Thành viên 2
                </p>
                <span>
                Designer </span>
                <div class="members-socials">
                    <ul>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <img src="images/5.jpg" alt="img">
            <div class="text">
                <p>
                    Thành viên 3
                </p>
                <span>
                Front-End </span>
                <div class="members-socials">
                    <ul>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <img src="images/8.jpg" alt="img">
            <div class="text">
                <p>
                    Thành viên 4
                </p>
                <span>
                Back-End </span>
                <div class="members-socials">
                    <ul>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="row members">
        <div class="col-md-3 col-sm-6">
            <img src="images/7.jpg" alt="img">
            <div class="text">
                <p>
                    Thành viên 5
                </p>
                <span>
                Marketing</span>
                <div class="members-socials">
                    <ul>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <img src="images/8.jpg" alt="img">
            <div class="text">
                <p>
                    Thành viên 6
                </p>
                <span>
                Support </span>
                <div class="members-socials">
                    <ul>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <img src="images/9.jpg" alt="img">
            <div class="text">
                <p>
                    Thành viên 7
                </p>
                <span>
                Support </span>
                <div class="members-socials">
                    <ul>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <img src="images/10.jpg" alt="img">
            <div class="text">
                <p>
                    Thành viên 8
                </p>
                <span>
                Art Director </span>
                <div class="members-socials">
                    <ul>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- loader -->