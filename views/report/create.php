<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ReportTool */

$this->title = 'Create Report Tool';
$this->params['breadcrumbs'][] = ['label' => 'Report Tools', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="report-tool-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
