<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ReportTool */

$this->title = 'Update Report Tool: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Report Tools', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="report-tool-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
