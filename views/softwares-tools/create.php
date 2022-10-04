<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SoftwaresTools */

$this->title = 'Create Softwares Tools';
$this->params['breadcrumbs'][] = ['label' => 'Softwares Tools', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="softwares-tools-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
