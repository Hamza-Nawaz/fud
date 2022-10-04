<?php

use app\models\ReportTool;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ReportToolSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Report Tools';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="report-tool-index">

    <div class="breadcomb-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="breadcomb-list">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="breadcomb-wp">
                                    <div class="breadcomb-icon">
                                        <i class="notika-icon notika-star"></i>
                                    </div>
                                    <div class="breadcomb-ctn">
                                        <h2>All Reports</h2>
                                        <p>Here you can see all order reports </p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="data-table-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="data-table-list">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'summary' => '',
        'columns' => [
           // 'id',
            'order_id',
         //   'buyer_id',
            'buyer_username',
           // 'buyer_email:email',
            //'tool_id',
            'tool_type',

            'shop_name',
            //'report_title',
            //'report_descriptio:ntext',
            //'is_solved',
            //'is_refunded',
            //'refund_amount',
            //'created_at',

            [
                'attribute'=>'report_title',
                'header' => 'Title',
                'format'=>'raw',
                'value' => function ($model) {
                    return Html::a($model->report_title,['report-reply/index?id='.$model->id.'&user_id='.$model->buyer_id]);
                },

                'headerOptions' => ['style' => 'color:white']

            ],
            ['header'=>'Is Solved ?',
                'headerOptions' => ['style' => 'color:blue'],
                'format' => 'raw',
                'value' => function($data) {
                    if($data->is_solved==0) {
                        return Html::a('Solved', 'javascript:void(0);', ['class' => 'btn btn-success btn-solve ', 'data-id' => $data->id]);
                    }else{
                        return Html::a('Solved', 'javascript:void(0);', ['class' => 'badge  badge-success ']);

                    }
                }
            ],
            ['header'=>'Is Refund ?',
                'headerOptions' => ['style' => 'color:blue'],
                'format' => 'raw',
                'value' => function($data) {
                    if($data->is_refunded==0 && $data->is_solved==0) {
                        return Html::a('Refund', 'javascript:void(0);', ['class' => 'btn btn-primary btn-refund', 'data-id' => $data->id,'data-order_id'=>$data->order_id]);
                    }
                    elseif($data->is_solved==1 && $data->is_refunded==0){
                        return Html::a('Issue Solved', 'javascript:void(0);', ['class' => 'badge  badge-danger ']);
                    }
                    else{
                        return Html::a('Refunded', 'javascript:void(0);', ['class' => 'badge  badge-primary']);

                    }
                }
            ],


//            [
//                'class' => ActionColumn::className(),
//                'urlCreator' => function ($action, ReportTool $model, $key, $index, $column) {
//                    return Url::toRoute([$action, 'id' => $model->id]);
//                 }
//            ],
        ],
    ]); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
