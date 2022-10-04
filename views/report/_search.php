<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ReportToolSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="report-tool-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'order_id') ?>

    <?= $form->field($model, 'buyer_id') ?>

    <?= $form->field($model, 'buyer_username') ?>

    <?= $form->field($model, 'buyer_email') ?>

    <?php // echo $form->field($model, 'tool_id') ?>

    <?php // echo $form->field($model, 'tool_type') ?>

    <?php // echo $form->field($model, 'report_title') ?>

    <?php // echo $form->field($model, 'report_descriptio') ?>

    <?php // echo $form->field($model, 'is_solved') ?>

    <?php // echo $form->field($model, 'is_refunded') ?>

    <?php // echo $form->field($model, 'refund_amount') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
