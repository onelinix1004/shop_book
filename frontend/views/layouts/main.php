<?php
use yii\helpers\Html;
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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">


    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flaticon@latest/css/flaticon.css">


    <link rel="stylesheet" href="asset/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="asset/css/animate.css">

    <link rel="stylesheet" href="asset/css/owl.carousel.min.css">
    <link rel="stylesheet" href="asset/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="asset/css/magnific-popup.css">

    <link rel="stylesheet" href="asset/css/aos.css">

    <link rel="stylesheet" href="asset/css/ionicons.min.css">

    <link rel="stylesheet" href="asset/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="asset/css/jquery.timepicker.css">


    <link rel="stylesheet" href="asset/css/flaticon.css">
    <link rel="stylesheet" href="asset/css/icomon.css">
    <link rel="stylesheet" href="asset/css/style.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="index.php">Book Old<small>Store</small></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>
        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"> Categoty</a>
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
                    <?php if(Yii::$app->user->identity->username == 'Admin'): ?>
                        <li class="nav-item"><a href="/cafe/backend/web" class="nav-link"><i class="glyphicon glyphicon-edit"></i> Quản lý Admin</a></li>
                    <?php endif; ?>
                    <li class="nav-item"><a href="index.php?r=user/update" class="nav-link"> <?=Yii::$app->user->identity->username?></a></li>
                    <li class="nav-item"><a href="index.php?r=site/logout" class="nav-link">Exit</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
<!-- END nav -->



<?= Alert::widget() ?>
<?php echo $content; ?>


<footer class="ftco-footer ftco-section img">
    <div class="overlay"></div>
    <div class="container">
        <div class="row mb-5" style="margin-bottom: 0">
            <div class="col-lg-3 col-md-6 mb-5 mb-md-5">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">About Us</h2>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                        <li class="ftco-animate"><a href="#"><span class="fab fa-dribbble"></span></a></li>
                        <li class="ftco-animate"><a href="#"><span class="fab fa-facebook-square"></span></a></li>
                        <li class="ftco-animate"><a href="#"><span class="fab fa-instagram"></span></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-5 mb-md-5">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">Recent Blog</h2>
                    <div class="block-21 mb-4 d-flex">
                        <a class="blog-img mr-4" style="background-image: url(asset/images/image_1.jpg);"></a>
                        <div class="text">
                            <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about</a></h3>
                            <div class="meta">
                                <div><a href="#"><span class="icon-calendar"></span> Sept 15, 2018</a></div>
                                <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                                <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="block-21 mb-4 d-flex">
                        <a class="blog-img mr-4" style="background-image: url(asset/images/image_2.jpg);"></a>
                        <div class="text">
                            <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about</a></h3>
                            <div class="meta">
                                <div><a href="#"><span class="icon-calendar"></span> Sept 15, 2018</a></div>
                                <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                                <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-6 mb-5 mb-md-5">
                <div class="ftco-footer-widget mb-4 ml-md-4">
                    <h2 class="ftco-heading-2">Services</h2>
                    <ul class="list-unstyled">
                        <li><a href="#" class="py-2 d-block">Cooked</a></li>
                        <li><a href="#" class="py-2 d-block">Deliver</a></li>
                        <li><a href="#" class="py-2 d-block">Quality Foods</a></li>
                        <li><a href="#" class="py-2 d-block">Mixed</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5 mb-md-5">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">Have a Questions?</h2>
                    <div class="block-23 mb-3">
                        <ul>
                            <li><span class="icon icon-map-marker"></span><span class="text">203 Fake St. Mountain View, San Francisco, California, USA</span></li>
                            <li><a href="#"><span class="icon icon-phone"></span><span class="text">+2 392 3929 210</span></a></li>
                            <li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@yourdomain.com</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 text-center">
            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                Copyright &copy;<script>document.write(new Date().getFullYear());</script> Thực tập HOASONIFOTECH <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">NVH</a>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
        </div>
    </div>
</footer>

<!-- loader -->
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


<script src="asset/js/jquery.min.js"></script>
<script src="asset/js/jquery-migrate-3.0.1.min.js"></script>
<script src="asset/js/popper.min.js"></script>
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