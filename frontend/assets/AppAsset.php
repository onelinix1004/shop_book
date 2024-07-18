<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        '/flipbook.style.css',
        '/asset/css/animate.css',
        '/asset/css/aos.css',
        '/asset/css/flaticon.css',
        '/asset/css/boostrap.min.css',
        '/asset/css/boostrap-datepicker.css',
        '/asset/css/icommon.css',
        '/asset/css/iconicon.min.css',
        '/asset/css/jquery.timepicker.css',
        '/asset/css/magnific-popoup.css',
        '/asset/css/open-iconic-boostrap.min.css',
        '/asset/css/owl.carousel.min.css',
        '/asset/css/owl.theme.default.min.css',
        '/asset/css/style.css',
    ];
    public $js = [
        '/js/flipbook.min.js',
        '/js/pdf.min.js',
        '/js/pdf.worker.min.js',
        '/js/flipbook.min',
        '/js/flipbook.book3d.min.js',
        '/js/flipbook.pdfservice.min.js',
        '/js/flipbook.swipe.min.js',
        '/js/flipbook.webgl.min.js',
        '/js/three.min.js',
        '/js/iscroll.min.js',
        '/asset/js/aos.js',
        '/asset/js/bootstrap-datepicker.min.js',
        '/asset/js/bootstrap.min.js',
        '/asset/js/jquery.easing.1.3.js',
        '/asset/js/jquery.waypoints.min.js',
        '/asset/js/jquery.animateNumber.min.js',
        '/asset/js/owl.carousel.min.js',
        '/asset/js/jquery.magnific-popup.min.js',
        '/asset/js/jquery.min.js',
        '/asset/js/jquery.stellar.min.js',
        '/asset/js/jquery.timepicker.min.js',
        '/asset/js/waypoints.min.js',
        '/asset/js/jquery-3.2.1.min.js',
        '/asset/js/jquery-migrate-3.0.1.min.js',
        '/asset/js/main.js',
        '/asset/js/popper.min.js',
        '/asset/js/range.js',
        '/asset/js/scrollax.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapAsset',
    ];
}
