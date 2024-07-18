<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use backend\models\Category;

AppAsset::register($this);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <title>The Book Store</title>
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum=1">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" media="screen">
    <link rel="stylesheet" type="text/css" href="css/style.css" media="screen">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.css" media="screen">
    <link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen"/>
    <link rel="stylesheet" href="css/responsive.css" type="text/css" media="screen"/>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
<!--top-strip-->
<div class="top-strip">
    <div class="container">
        <div class="row">
            <div class="col-md-6 user">
                <p style="padding-top: 10px;"><i class="fas fa-info-circle" style="font-size: 20px; margin-right: 5px;"></i>
                    Welcome to The Book Store OLD
                </p>
            </div>
            <div class="col-md-6 language">
                <ul>
                    <?php if(Yii::$app->user->isGuest): ?>
                        <li><a href="index.php?r=site/signup"><i class="glyphicon glyphicon-log-in"></i> Đăng Ký</a></li>
                        <li><a href="index.php?r=site/login"><i class="glyphicon glyphicon-log-in"></i> Đăng Nhập</a></li>
                    <?php else: ?>
                        <li><a href="index.php?r=user/update"><i class="glyphicon glyphicon-edit"></i> User</a></li>
                        <?php if(Yii::$app->user->identity->username == 'Admin'): ?>
                            <li><a href="/cafe/backend/web"><i class="glyphicon glyphicon-edit"></i> Quản lý Admin</a></li>
                        <?php endif; ?>
                        <li><a href="#"><i class="glyphicon glyphicon-user"></i> <?=Yii::$app->user->identity->username?></a></li>
                        <li><a href="index.php?r=site/logout">Thoát <i class="glyphicon glyphicon-log-out"></i></a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
</div>
<!--end-top-strip-->
<!--navbar-->

<!--end-navbar-->
<!--flex-slider-->
<?= Alert::widget() ?>
<?php echo $content; ?>
<!--end-prize-->
<!--footer-->
<div class="full-footer">
    <div class="container-full">
        <div class="container info">
            <div class="row">
                <div class="col-md-4 addres">
                    <img src="images/footer-logo.png" alt="logo">
                    <h6 style="font-size: 20px;">BOOK STORE OLD</h6>
                    <p>
                        Đại Học Khoa Học Tự Nhiên, Đại Học Quốc Gia Hà Nội
                    </p>
                    <p><a href="#" style="color: white;"><i class="fas fa-phone"></i>
                            0123 456 789/0123 456 788
                    </p>
                </div>
                <div class="col-md-2 account">
                    <h4><i class="fas fa-user"></i> My Account</h4>
                    <ul>
                        <li style="margin-top:15px;"><a href="#"><i class="fas fa-shopping-cart"></i> Giỏ hàng</a></li>
                        <li style="margin-top:15px;"><a href="#"><i class="fas fa-shopping-bag"></i> Đặt hàng</a></li>
                        <li style="margin-top:15px;"><a href="#"><i class="fas fa-user-circle"></i> Thông tin cá nhân</a></li>
                    </ul>
                </div>
                <div class="col-md-2 assistance">
                    <h4><i class="fas fa-star"></i> Tiêu chí</h4>
                    <ul>
                        <li><a href="#"><i class="fas fa-heart"></i> ĐỘI NGŨ NHÂN VIÊN NHIỆT TÌNH</a></li>
                        <li><a href="#"><i class="fas fa-gem"></i> KHÔNG GIAN SANG TRỌNG</a></li>
                        <li><a href="#"><i class="fas fa-users"></i> GIAO LƯU VỚI MỌI NGƯỜI</a></li>
                    </ul>
                </div>
                <div class="col-md-4 about">
                    <h4>Về chúng tôi</h4>
                    <p>
                        Với đội ngũ nhân viên nhiệt tình cộng với chất lượng hảo hạn từ sản phẩm tại đây, hi vọng quý vị có những giây phút tuyệt với bên gia đình, bạn bè và ngưòi thân
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!--end-addres-->
    <div class="container">
        <div class="row bottom-strip">
            <div class="col-md-6 rights">
                <p>
                    Thực Tập HOASONINFOTECH
                </p>
            </div>
            <div class="col-md-6 social">
                <ul>
                    <li><a href="#"><i class="fab fa-dribbble"></i></a></li>
                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                    <li><a href="#"><i class="fas fa-asterisk"></i></a></li>
                    <li><a href="#"><i class="fab fa-facebook-square"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!--end-footer-->
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script src="js/modernizr.js"></script>
<script type="text/javascript" src="js/jquery.flexslider-min.js"></script>
<script type="text/javascript">
    // jQuery
    (function($) {
        "use strict";
        $(document).ready(function() {
            // Main Slider
            $('.main-flexslider').flexslider({
                directionNav: true,
                controlNav: false,
                animation: "fade",
                slideshowSpeed: 3000,
                prevText: "",
                nextText: "",
            });
        });
    })(jQuery);
</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const searchCategoryInput = document.getElementById("searchCategoryInput");
        const categoryItems = document.querySelectorAll(".dropdown-menu a");

        searchCategoryInput.addEventListener("input", function() {
            const searchTerm = searchCategoryInput.value.trim().toLowerCase();

            categoryItems.forEach(function(item) {
                const categoryName = item.textContent.toLowerCase();

                if (categoryName.includes(searchTerm)) {
                    item.style.display = "block";
                } else {
                    item.style.display = "none";
                }
            });
        });
    });
</script>
</body>
</html>
