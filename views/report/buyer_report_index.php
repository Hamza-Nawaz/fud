<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ReportToolSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Report Tools';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="report-tool-index">

    <h3><?= Html::encode($this->title) ?></h3>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //'id',
           // 'customer_id',
            ///'customer_email:email',
         //   'tool_id',
            'buyer_email',
            'tool_type',
            'report_title',
            //'report_description:ntext',
            //'is_solved',
            //'is_refund',
            //'refund_amount',
            'created_at',

            ['header'=>'Is Solved ?',
                'headerOptions' => ['style' => 'color:blue'],
                'format' => 'raw',
                'value' => function($data) {
                    if($data->is_solved==0) {
                        return Html::a('Pending', 'javascript:void(0);', ['class' => 'badge badge-warning']);
                    }else{
                        return Html::a('Solved', 'javascript:void(0);', ['class' => 'badge  badge-success ']);

                    }
                }
            ],


            //'updated_at',
            ['class' => 'yii\grid\ActionColumn','template' => ' {report-reply/reply}',
                'buttons' => [
                    'report-reply/reply' => function ($url,$model) {
                        return Html::a(
                            '<span ><i class="fas fa-comment-dots"></i></span>',
                            $url,
                            [
                                'user_id'=>$model->buyer_id,
                                'title' => 'Report Reply',
                                'data-pjax' => '0',
                            ]
                        );
                    },


                ],],
        ],
    ]); ?>


</div>
