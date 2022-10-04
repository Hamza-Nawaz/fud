<?php

use app\models\WebOrders;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\WebOrdersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Web Orders';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="web-orders-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Web Orders', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'username',
            'user_email:email',
            'account_id',
            'product_type',
            //'category_name',
            //'product_details',
            //'price',
            //'is_reported',
            //'is_refunded',
            //'report_time',
            //'shop_name',
            //'status',
            //'created_at',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, WebOrders $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
