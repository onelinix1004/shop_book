<?php 
use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;
 ?>
<!--end-navbar-->
<div class="page-title">
    <div class="container">
        <div class="row">
            <div class="col-md-10 produti">
                <h4><i class="fa fa-envelope"></i> Liên hệ</h4>
            </div>
            <div class="col-md-2 cart">
                <h4><a href="#"><i class="fa fa-shopping-cart"></i> Giỏ hàng (<?=$total?> items)</a></h4>
                <ul>
                    <li><a href="index.php">Trang chủ /</a></li>
                    <li><a href="#">Liên hệ</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- shop-page -->
<div class="container">
    <div class="row content">
        <div class="col-md-9">
            
            <div class="row contact-all">
                <div class="triggerAnimation animated" data-animate="fadeInLeft">
                    <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>
                        <h1><i class="fa fa-phone"></i> Liên hệ với chúng tôi</h1>
                        <div class="text-fields">
                            <div class="float-input">
                                <?= $form->field($model, 'name')->textInput(['placeholder'=>'Họ và tên'])->label(false) ?>
                                <span><i class="fa fa-user"></i></span>
                            </div>
                            <div class="float-input">
                                <?= $form->field($model, 'email')->textInput(['placeholder'=>'Email'])->label(false) ?>
                                <span><i class="fa fa-envelope-o"></i></span>
                            </div>
                            <div class="float-input">
                                <?= $form->field($model, 'phone')->textInput(['placeholder'=>'Số điện thoại'])->label(false) ?>
                                <span><i class="fa fa-phone"></i></span>
                            </div>
                        </div>
                        <div class="submit-area">
                            <?= $form->field($model, 'body')->textarea(['placeholder'=>'Nội dung'])->label(false) ?>
                            <input type="submit" id="submit_contact" class="main-button" value="gửi liên hệ">
                            <div id="msg" class="message">
                            </div>
                        </div>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
        <div class="col-md-3 shop-sidebar">
            <div class="sidebar-widgets">
                <div class="row right-cal">
                    <h4><i class="fa fa-clock-o"></i> Giờ mở cửa</h4>
                    <ul>
                        <li><a href="#">Thứ hai<span>8am-5pm</span></a></li>
                        <li class="colored"><a href="#">Thứ ba<span>8am-5pm</span></a></li>
                        <li><a href="#">Thứ tư<span>8am-5pm</span></a></li>
                        <li class="colored"><a href="#">Thứ năm<span>8am-5pm</span></a></li>
                        <li><a href="#">Thứ sáu<span>8am-5pm</span></a></li>
                        <li class="colored"><a href="#">Thứ bảy<span>8am-5pm</span></a></li>
                        <li><a href="#">Chủ nhật<span>8am-5pm</span></a></li>
                    </ul>
                </div>
                <div class="row right-inf">
                    <h4><i class="fa fa-info-circle"></i> Thông tin liên hệ</h4>
                    <ul>
                        <li>
                            <p>THE BOOK STORE</p>
                        </li>
                        <li>
                            <p>334 Đ. Nguyễn Trãi, Thanh Xuân Trung, Thanh Xuân, Hà Nội</p>
                        </li>
                    </ul>
                    <ul>
                        <li><a href="#"><i class="fa fa-phone "></i>   Hotline : 0123 456 789</a></li>
                        <li><a href="#"><i class="fa fa-mobile fa-lg"></i>&ensp; Phone: 0123 456 789</a></li>
                        <li><a href="#"><i class="fa fa-envelope"></i> Email : duong30402@gmail.com</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end-shop-page -->
<!-- partners box -->
<div class="container">
</div>
<!--prize-->
<div class="prize">
    <style>
        .prize {
            position: relative;
        }

        .container {
            position: relative;
        }

        .image-container {
            position: relative;
            display: inline-block;
        }

        .image-container img {
            display: block;
            max-width: 100%;
        }

        .image-container h1 {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
            font-size: 24px;
            text-align: center;
            background-color: rgba(0, 0, 0, 0.5);
            padding: 10px;
            width: 80%;
            max-width: 400px;
        }
    </style>
    <div class="container">
        <div class="image-container">
            <img src="images/3_3.jpg" alt="" width="1600px" height="235px">
            <h1>Win our special prize on our Facebook page</h1>
        </div>
    </div>
</div>

<!--end-prize-->
<!--footer-->
