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
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="index.html">Book Old<small>Blend</small></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>
        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"><i class="fas fa-book"></i> Categoty</a>
                    <div class="dropdown-menu">
                        <?php $categories = Category::find()->all(); ?>
                        <?php foreach ($categories as $category): ?>
                            <a class="dropdown-item" href="index.php?r=site/category&id=<?= $category->id ?>"><?= $category->name ?></a>
                        <?php endforeach; ?>
                    </div>
                </li>
                <li class="nav-item"><a href="index.php?r=site/about" class="nav-link">About</a></li>
                <li class="nav-item"><a href="index.php?r=site/contact" class="nav-link">Contact</a></li>
                <li class="nav-item"><a href="index.php?r=cart" class="nav-link">Cart</a></li>
                <?php if(Yii::$app->user->isGuest): ?>
                    <li class="nav-item"><a href="index.php?r=site/signup" class="nav-link"></i> Đăng Ký</a></li>
                    <li class="nav-item"><a href="index.php?r=site/login" class="nav-link"></i> Đăng Nhập</a></li>
                <?php else: ?>
                    <li class="nav-item"><a href="index.php?r=user/update" class="nav-link"></i> User</a></li>
                    <?php if(Yii::$app->user->identity->username == 'Admin'): ?>
                        <li class="nav-item"><a href="/cafe/backend/web" class="nav-link"><i class="glyphicon glyphicon-edit"></i> Quản lý Admin</a></li>
                    <?php endif; ?>
                    <li class="nav-item"><a href="index.php?r=site/logout" class="nav-link">Exit(<?=Yii::$app->user->identity->username?>)</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
<!-- END nav -->

<?= Alert::widget() ?>
<?php echo $content; ?>

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

<!-- loader -->
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


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
<script src="asset/js/main.js"></script>

</body>
</html>