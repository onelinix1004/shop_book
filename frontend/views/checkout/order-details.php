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
                    <img src="<?= Yii::getAlias('@backendUrl/') . $orderItem->product->image ?>" alt="Sách"
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

