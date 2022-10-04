<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ReportTool */
/* @var $form yii\bootstrap4\ActiveForm */
?>

<div class="report-tool-form">

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="form-element-list">
                <div class="basic-tb-hd">
    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'report_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'report_descriptio')->textarea(['rows' => 6]) ?>



    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
            </div>
        </div>
    </div>

