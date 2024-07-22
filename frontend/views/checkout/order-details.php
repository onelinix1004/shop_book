<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Order Details</title>
    <!-- Add your CSS stylesheets here -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            background-color: brown;
            color: #000;
        }

        .order-details {
            max-width: 1300px;
            margin-top: 20px;
            margin-left: auto;
            margin-right: auto;
            margin-bottom: 20px;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            font-family: Arial, sans-serif;
        }

        .order-details h2 {
            margin-top: 0;
            text-align: center;
            padding-bottom: 20px;
            font-size: 20px;
            font-weight: bold;
            border-bottom: 2px solid #000; /* Dấu gạch chân bên dưới */
        }

        .order-details p {
            font-size: 17px;
            font-weight: 300;
            margin: 5px 0;
            display: flex;
            align-items: center;
        }

        .order-details p i {
            margin-right: 10px;
        }

        .order-details h3 {
            margin-bottom: 10px;
        }

        .order-details table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        .order-details th,
        .order-details td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }

        .order-details th {
            background-color: #f2f2f2;
        }

        .order-details tr:hover {
            background-color: #f5f5f5;
        }

        /* CSS for the Total column */
        .order-details .total-col {
            font-weight: bold;
            background-color: #f2f2f2;
        }

        .order-details .total-col td {
            color: #8B4513; /* Thêm màu đỏ cho phần tổng số tiền */
        }

    </style>
</head>
<body>
<section class="home-slider owl-carousel">

    <div class="slider-item" style="background-image: url(asset/images/pexels-ivo-rainha-527110-1290141.jpg);" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row slider-text justify-content-center align-items-center">

                <div class="col-md-7 col-sm-12 text-center ftco-animate">
                    <h1 class="mb-3 mt-5 bread">Order Detail</h1>
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Order Detail</span></p>
                </div>

            </div>
        </div>
    </div>
</section>
<div class="order-details">
    <h2><i class="fas fa-shopping-cart"></i> CHI TIẾT ĐẶT HÀNG</h2>
    <div class="order-info">
        <p><i class="fas fa-info-circle"></i> ID đơn đặt hàng: <?= $order->id ?></p>
        <p><i class="fas fa-user"></i> Tên người đặt hàng: <?= $order->name ?></p>
        <p><i class="fas fa-map-marker-alt"></i>&nbsp;Địa chỉ người đặt hàng: <?= $order->address ?></p>
    </div>

    <h3><i class="fas fa-list" style="margin-top: 30px;"></i>&nbsp; Các mặt hàng đã đặt:</h3>
    <table>
        <tr>
            <th>Tên sách</th>
            <th>Hình ảnh</th> <!-- Cột hình ảnh sách -->
            <th>Số lượng</th>
            <th>Giá</th>
        </tr>
        <?php
        $total = 0; // Khởi tạo biến $total
        foreach ($orderItems as $orderItem) :
            $total += $orderItem->price; // Tính tổng số tiền
            ?>
            <tr>
                <td><?= $orderItem->product->name ?></td>
                <td>
                    <img src="<?= $orderItem->product->image ?>" alt="Sách"
                         style="width: 80px; height: 76px;">
                </td>
                <td><?= $orderItem->quantity ?></td>
                <td><?= $orderItem->price ?> VNĐ</td>
            </tr>
        <?php endforeach; ?>

        <!-- Total row -->
        <tr class="total-col">
            <td colspan="3" style="text-align: center;">Tổng số tiền phải thanh toán:</td>
            <td><?= $total ?> VNĐ</td>
        </tr>
    </table>
    <div class="payment-section">
        <div class="cash-payment">
            <h3 style="padding-top: 150px; text-align: center; font-size: 20px">Thanh toán tiền mặt:</h3>
            <p>Tổng số tiền bạn phải thanh toán là:</p>
            <p style="color:red;"> <?= convertToWords($total) ?> đồng.</p>
            <!-- Additional content or instructions for cash payment can be added here. -->
        </div>

        <div class="qr-payment">
            <h3 style="padding-top: 30px;">Thanh toán qua mã QR:</h3>
            <img src="assets\images\qr.jpg" alt="QR Code" style="width: 300px; height: 300px;">
            <!-- Additional content or instructions for QR code payment can be added here. -->
        </div>
    </div>
    <head>
        <style>
            .payment-section {
                margin-left: 10px;
                display: flex;
                justify-content: space-between;
            }

            /* Align the QR code payment option to the right */
            .qr-payment {
                text-align: center;
                margin-right: 80px;
                display: flex;
                flex-direction: column;
                align-items: center;
            }

            .qr-payment h3 {
                text-align: center;

            }

            /* Optional: Add some spacing and alignment for better presentation */
            .qr-payment img {
                margin-top: 5px;
            }

            .payment-option {
                flex: 1;
            }
        </style>
    </head>


</div>
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
                        <tr class="text-center">
                            <td class="product-remove"><a href="#"><span class="icon-close"></span></a></td>

                            <td class="image-prod"><div class="img" style="background-image:url(images/menu-2.jpg);"></div></td>

                            <td class="product-name">
                                <h3>Creamy Latte Coffee</h3>
                                <p>Far far away, behind the word mountains, far from the countries</p>
                            </td>

                            <td class="price">$4.90</td>

                            <td class="quantity">
                                <div class="input-group mb-3">
                                    <input type="text" name="quantity" class="quantity form-control input-number" value="1" min="1" max="100">
                                </div>
                            </td>

                            <td class="total">$4.90</td>
                        </tr><!-- END TR-->

                        <tr class="text-center">
                            <td class="product-remove"><a href="#"><span class="icon-close"></span></a></td>

                            <td class="image-prod"><div class="img" style="background-image:url(images/dish-2.jpg);"></div></td>

                            <td class="product-name">
                                <h3>Grilled Ribs Beef</h3>
                                <p>Far far away, behind the word mountains, far from the countries</p>
                            </td>

                            <td class="price">$15.70</td>

                            <td class="quantity">
                                <div class="input-group mb-3">
                                    <input type="text" name="quantity" class="quantity form-control input-number" value="1" min="1" max="100">
                                </div>
                            </td>

                            <td class="total">$15.70</td>
                        </tr><!-- END TR-->
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
                        <span>$20.60</span>
                    </p>
                    <p class="d-flex">
                        <span>Delivery</span>
                        <span>$0.00</span>
                    </p>
                    <p class="d-flex">
                        <span>Discount</span>
                        <span>$3.00</span>
                    </p>
                    <hr>
                    <p class="d-flex total-price">
                        <span>Total</span>
                        <span>$17.60</span>
                    </p>
                </div>
                <p class="text-center"><a href="checkout.html" class="btn btn-primary py-3 px-4">Proceed to Checkout</a></p>
            </div>
        </div>
    </div>
</section>

<!-- Add your scripts or any additional content here -->
</body>
</html>
<?php
function convertToWords($number)
{
    $ones = array(
        0 => 'Không',
        1 => 'Một',
        2 => 'Hai',
        3 => 'Ba',
        4 => 'Bốn',
        5 => 'Năm',
        6 => 'Sáu',
        7 => 'Bảy',
        8 => 'Tám',
        9 => 'Chín',
        10 => 'Mười',
        11 => 'Mười một',
        12 => 'Mười hai',
        // ... tiếp tục nếu có
    );

    if ($number < 13) {
        return $ones[$number];
    } elseif ($number < 100) {
        $tens = floor($number / 10);
        $remainder = $number % 10;
        return $ones[$tens] . ' mươi' . (($remainder > 0) ? ' ' . $ones[$remainder] : '');
    } elseif ($number < 1000) {
        $hundreds = floor($number / 100);
        $remainder = $number % 100;
        return $ones[$hundreds] . ' trăm' . (($remainder > 0) ? ' ' . convertToWords($remainder) : '');
    } elseif ($number < 1000000) {
        $thousands = floor($number / 1000);
        $remainder = $number % 1000;
        return convertToWords($thousands) . ' nghìn' . (($remainder > 0) ? ' ' . convertToWords($remainder) : '');
    } elseif ($number < 1000000000) {
        $millions = floor($number / 1000000);
        $remainder = $number % 1000000;
        return convertToWords($millions) . ' triệu' . (($remainder > 0) ? ' ' . convertToWords($remainder) : '');
    } else {
        // Add more cases for larger numbers if needed
        return 'Không hỗ trợ';
    }
}

?>

