<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ToolsLicense */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tools-license-form">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="form-element-list">
            <div class="basic-tb-hd">
    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'user_name')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'license_email')->textInput(['maxlength' => true]) ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
                <?php if($error){ ?>
        <label style="color: red"><?=$error?></label>
                <?php }?>
</div>
        </div>
    </div>
</div>
