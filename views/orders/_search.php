<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\WebOrdersSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="web-orders-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'username') ?>

    <?= $form->field($model, 'user_email') ?>

    <?= $form->field($model, 'account_id') ?>

    <?= $form->field($model, 'product_type') ?>

    <?php // echo $form->field($model, 'category_name') ?>

    <?php // echo $form->field($model, 'product_details') ?>

    <?php // echo $form->field($model, 'price') ?>

    <?php // echo $form->field($model, 'is_reported') ?>

    <?php // echo $form->field($model, 'is_refunded') ?>

    <?php // echo $form->field($model, 'report_time') ?>

    <?php // echo $form->field($model, 'shop_name') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
