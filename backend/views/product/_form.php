<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Category;

/* @var $this yii\web\View */
/* @var $model backend\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'category_id')->dropDownList(
        ArrayHelper::map(Category::find()->all(), 'id', 'name'),
        ['prompt' => 'Chọn Category']
    ) ?>

    <div class="form-group">
        <?= Html::activeLabel($model, 'file') ?>
        <div class="input-group">
            <span class="input-group-text"><i class="fas fa-image"></i></span>
            <?= Html::activeFileInput($model, 'file', ['class' => 'form-control']) ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::activeLabel($model, 'pdfFile') ?>
        <div class="input-group">
            <span class="input-group-text"><i class="fas fa-file-pdf"></i></span>
            <?= Html::activeFileInput($model, 'pdfFile', ['class' => 'form-control']) ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Thêm Mới' : 'Cập nhật', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
