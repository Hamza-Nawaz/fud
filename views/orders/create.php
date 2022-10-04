<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\WebOrders */

$this->title = 'Create Web Orders';
$this->params['breadcrumbs'][] = ['label' => 'Web Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="web-orders-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
