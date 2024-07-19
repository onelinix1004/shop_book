<!DOCTYPE html>
<html>
<head>
    <title>Đăng ký thành viên</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            background-color: #0b0b0b;
            font-family: Arial, sans-serif;
        }

        .col-md-8 {
            margin-top: 100px;
            margin-left: 230px;
            background-color: #3c2f33;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .col-md-8 h1 {
            color: white; /* Màu chữ cho tiêu đề */
            text-align: center;
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .form-group {
            position: relative;
            margin-bottom: 20px;
            color: white; /* Màu chữ cho các trường thông tin */
        }

        .form-group .icon {
            position: absolute;
            top: 12px;
            left: 10px;
            color: #ccc;
        }

        .form-group input[type="text"] {
            padding-left: 30px;
            font-family: Arial, sans-serif;
            font-size: 14px;
            color: #333; /* Màu chữ bên trong trường nhập */
            border: 1px solid white;
            border-radius: 5px;
            width: 100%;
            height: 40px;
        }

        .form-group span {
            color: #fff;
        }

        .form-group .btn {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 20px;
        }

        .btn button {
            font-family: Arial, sans-serif;
            font-size: 16px;
            color: #fff;
            font-weight: bold;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
        }

        .btn button.btn-success {
            background-color: #28a745;
        }

        .btn button.btn-danger {
            background-color: #dc3545;
        }

        .form-control {
            font-size: 18px;
            border-radius: 0px;
            -webkit-box-shadow: none !important;
            box-shadow: none !important;
            border: transparent !important;
            border-bottom: 1px solid rgba(255, 255, 255, 0.08) !important;
            padding-right: 0;
            padding-left: 0;
        }
    </style>

</head>
<body>
    <div class="col-md-8 col-md-offset-2">
        <br>
        <h1>Thông tin người dùng</h1>
        <br>

        <?php $form = \yii\bootstrap5\ActiveForm::begin(['layout' => 'horizontal']);
        use yii\bootstrap5\Html;
        use yii\bootstrap5\ActiveForm;?>
        <div class="form-group" style="color:white;">
            <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
        </div>

        <div class="form-group" style="color:white;">
            <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
        </div>

        <div class="form-group" style="color:white;">
            <?= $form->field($model, 'fullname')->textInput(['maxlength' => true]) ?>
        </div>

        <div class="form-group" style="color:white;">
            <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>
        </div>

        <div class="form-group" style="color:white;;">
            <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>
        </div>

        <div class="btn" style="display: flex; justify-content: center; align-items: center;">
    <?= \yii\bootstrap5\Html::submitButton($model->isNewRecord ? 'Cập Nhật' : 'Cập Nhật', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-danger']) ?>
</div>


        <?php \yii\bootstrap5\ActiveForm::end(); ?>

    </div>
</body>
</html>
