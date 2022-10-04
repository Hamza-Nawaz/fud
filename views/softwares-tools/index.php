<?php

use app\models\SoftwaresTools;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SoftwaresToolsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Softwares Tools';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="softwares-tools-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Softwares Tools', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'description',
            'software_type',
            'download_link',
            //'price',
            //'total_downloads',
            //'created_at',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, SoftwaresTools $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
