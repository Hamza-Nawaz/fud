<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\WebUsersBalanceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Web Users Balances';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="web-users-balance-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Web Users Balance', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'username',
            'user_email:email',
            'payment_transaction_id',
            'amount',
            //'order_id',
            //'shop_name',
            //'created_at',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, WebUsersBalance $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
