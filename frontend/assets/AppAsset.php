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
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapAsset',
    ];
}
