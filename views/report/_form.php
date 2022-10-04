<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ReportTool */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="report-tool-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'order_id')->textInput() ?>

    <?= $form->field($model, 'buyer_id')->textInput() ?>

    <?= $form->field($model, 'buyer_username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'buyer_email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tool_id')->textInput() ?>

    <?= $form->field($model, 'tool_type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'report_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'report_descriptio')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'is_solved')->textInput() ?>

    <?= $form->field($model, 'is_refunded')->textInput() ?>

    <?= $form->field($model, 'refund_amount')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
