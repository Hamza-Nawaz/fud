<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ReportTool */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Report Tools', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="report-tool-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'order_id',
            'buyer_id',
            'buyer_username',
            'buyer_email:email',
            'tool_id',
            'tool_type',
            'report_title',
            'report_descriptio:ntext',
            'is_solved',
            'is_refunded',
            'refund_amount',
            'created_at',
        ],
    ]) ?>

</div>
