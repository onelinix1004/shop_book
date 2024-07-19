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

    <div class="slider-item" style="background-image: url(asset/images/pexels-ivo-rainha-527110-1290141.jpg);"
         data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row slider-text justify-content-center align-items-center">

                <div class="col-md-7 col-sm-12 text-center ftco-animate">
                    <h1 class="mb-3 mt-5 bread">Cart</h1>
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Cart</span></p>
                </div>

            </div>
        </div>
    </div>
</section>

<section class="ftco-section ftco-cart">
    <div class="container">
        <div class="row">
            <div class="col-md-12 ftco-animate">
                <div class="cart-list">
                    <table class="table">
                        <thead class="thead-primary">
                        <tr class="text-center">
                            <th>&nbsp;</th>
                            <th>&nbsp;</th>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if (!$cartstore): ?>
                            <tr>
                                <td><h3 style="color: white">Chưa có sản phẩm nào được thêm vào giỏ!</h3></td>
                            </tr>
                        <?php else: ?>
                            <?php foreach ($cartstore as $product): ?>
                                <tr class="text-center">
                                    <td class="product-remove"><a href="index.php?r=cart/remove&id=<?= $product->id ?>"
                                                                  class="glyphicon glyphicon-trash"></a></td>

                                    <td class="image-prod">
                                        <div class="img" style="background-image:url(<?= $product->image ?>);"></div>
                                    </td>

                                    <td class="product-name">
                                        <h3><?php $s = number_format($product->price);
                                            echo $s . ' VNĐ'; ?></h3>
                                    </td>

                                    <td class="price"><?php $s = number_format($product->price);
                                        echo $s . ' VNĐ'; ?></td>

                                    <td class="quantity">
                                        <div class="input-group mb-3">
                                            <input type="text" name="quantity"
                                                   class="quantity form-control input-number" value="1" min="1"
                                                   max="100">
                                        </div>
                                    </td>

                                    <td class="total"><?php echo number_format($product->price * $product->quantity) . ' VNĐ'; ?></td>
                                </tr><!-- END TR-->
                            <?php endforeach; ?>
                        <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row justify-content-end">
            <div class="col col-lg-3 col-md-6 mt-5 cart-wrap ftco-animate">
                <div class="cart-total mb-3">
                    <h3>Cart Totals</h3>
                    <p class="d-flex">
                        <span>Subtotal</span>
                        <span><?php echo number_format($cost) . ' VNĐ'; ?></span>
                    </p>
                    <p class="d-flex">
                        <span>Delivery</span>
                        <span>$0.00</span>
                    </p>
                    <hr>
                    <p class="d-flex total-price">
                        <span>Total</span>
                        <span><?php echo number_format($cost) . ' VNĐ'; ?></span>
                    </p>
                </div>
                <p class="text-center"><a href="index.php" class="btn btn-primary py-3 px-4">Tiếp tục mua hàng</a></p>
                <p class="text-center"><a href="index.php?r=checkout" class="btn btn-primary py-3 px-4">Proceed to
                        Checkout</a></p>
            </div>
        </div>
    </div>
</section>


<!-- loader -->
<div id="ftco-loader" class="show fullscreen">
    <svg class="circular" width="48px" height="48px">
        <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/>
        <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
                stroke="#F96D00"/>
    </svg>
</div>


<script src="asset/js/jquery.min.js"></script>
<script src="asset/js/jquery-migrate-3.0.1.min.js"></script>
<script src="asset/s/popper.min.js"></script>
<script src="asset/js/bootstrap.min.js"></script>
<script src="asset/js/jquery.easing.1.3.js"></script>
<script src="asset/js/jquery.waypoints.min.js"></script>
<script src="asset/js/jquery.stellar.min.js"></script>
<script src="asset/js/owl.carousel.min.js"></script>
<script src="asset/js/jquery.magnific-popup.min.js"></script>
<script src="asset/js/aos.js"></script>
<script src="asset/js/jquery.animateNumber.min.js"></script>
<script src="asset/js/bootstrap-datepicker.js"></script>
<script src="asset/js/jquery.timepicker.min.js"></script>
<script src="asset/js/scrollax.min.js"></script>
<script src="asset/js/google-map.js"></script>
<script src="asset/js/main.js"></script>

</body>
</html>