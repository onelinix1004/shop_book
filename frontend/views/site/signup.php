<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Đăng ký thành viên';
?>
<div class="col-md-8 col-md-offset-2">
    <br>
    <h1 style="color: white;text-align: center;"><?= \yii\bootstrap5\Html::encode($this->title) ?></h1>
    <br>

    
    <?php $form = yii\bootstrap5\ActiveForm::begin(['id' => 'form-signup','layout'=>'horizontal']); ?>
    <span style="color: white"><?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
        <?= $form->field($model, 'email') ?>
        <?= $form->field($model, 'password')->passwordInput() ?>
        <?= $form->field($model, 'fullname')->textInput() ?>
        <?= $form->field($model, 'address')->textInput() ?>
        <?= $form->field($model, 'phone')->textInput() ?> </span>
        <div style="margin-left: 215px">
        <?= \yii\bootstrap5\Html::submitButton('Đăng Ký', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
        </div>
        <?php \yii\bootstrap5\ActiveForm::end(); ?>
<br>
<br>
<br>
<br>
<br>
<br>

        
</div>

