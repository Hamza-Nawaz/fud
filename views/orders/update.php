<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\WebOrders */

$this->title = 'Update Web Orders: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Web Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="web-orders-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
