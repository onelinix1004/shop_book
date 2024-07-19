<!DOCTYPE html>
<html>
<head>
    <title>ĐĂNG NHẬP</title>
    <!-- Thêm thẻ link để tải font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        body {
            background-color: #6edff6; /* Background màu trắng */
            font-family: Arial, sans-serif;
            color: #000000; /* Màu chữ đen */
        }

        h1 {
            text-align: center;
            font-size: 28px;
        }

        /* Để định dạng biểu mẫu, sử dụng lớp form-wrapper */
        .form-wrapper {
            background-color: #f9f9f9; /* Background màu xám nhạt */
            padding: 20px;
            border-radius: 10px;
            margin-left: 350px;
            margin-top: 50px;
        }

        /* Để định dạng các icon, sử dụng lớp icon-wrapper */
        .icon-wrapper {
            position: relative;
        }

        .icon-wrapper i {
            position: absolute;
            top: 12px;
            left: 15px;
            color: bla; /* Màu icon xám nhạt */
        }
    </style>
</head>
<body>
    <!-- Trong phần body của tệp HTML -->
    <div class="col-md-8 col-md-offset-2">
        <br>
        <br>
        <br>
        <div class="form-wrapper"> <!-- Bọc biểu mẫu bên trong div mới -->
            <h1 style="color: black;text-align: center;">ĐĂNG NHẬP</h1>
            <br>

            <?php $form = \yii\bootstrap5\ActiveForm::begin(['id' => 'login-form', 'layout' => 'horizontal']);
            use yii\bootstrap\Html;
            use yii\bootstrap\ActiveForm;?>

            <!-- Định dạng cho trường "username" -->
            <div class="icon-wrapper" style="color:black;">
                <i class="fas fa-user"></i> <!-- Icon user -->
                <?= $form->field($model, 'username')->textInput(['autofocus' => true])->label(false) ?>
            </div>

            <!-- Định dạng cho trường "password" -->
            <div class="icon-wrapper">
                <i class="fas fa-lock"></i> <!-- Icon lock -->
                <?= $form->field($model, 'password')->passwordInput()->label(false) ?>
            </div>

            <div style="display: flex; justify-content: center; align-items: center;">
                <?= \yii\bootstrap5\Html::submitButton('Đăng Nhập', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
            </div>

            <?php \yii\bootstrap5\ActiveForm::end(); ?>
        </div>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
    </div>
</body>
</html>
