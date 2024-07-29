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
    <title>Cart</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<!-- END nav -->


<section class="home-slider owl-carousel">

    <div class="slider-item" style="background-image: url(asset/images/pexels-ivo-rainha-527110-1290141.jpg);" data-stellar-background-ratio="0.5">
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
                        <?php if (!$cartstore): ?>
                        <thead class="thead-primary">
                        <tr class="text-center">
                            <th>&nbsp;</th>
                            <th>&nbsp;</th>
                            <th>&nbsp;</th>
                            <th>&nbsp;</th>
                            <th>&nbsp;</th>
                            <th>&nbsp;</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td><h3 style="color: white">Chưa có sản phẩm nào được thêm vào giỏ!</h3></td>
                        </tr>
                        </tbody>
                        <?php else: ?>
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
                            <?php foreach ($cartstore as $product): ?>
                                <tr class="text-center">
                                    <td class="product-remove"><a href="index.php?r=cart/remove&id=<?= $product->id ?>"
                                                                  class="fa-solid fa-trash"></a></td>

                                    <td class="image-prod">
                                        <div class="img" style="background-image:url(<?= $product->image ?>);"></div>
                                    </td>

                                    <td class="product-name">
                                        <h3><?= $product->name ?></h3>
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
                        <span>Free Shipping</span>
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