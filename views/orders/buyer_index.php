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
<div class="web-orders-index"  style="background-color: #FAFAFA;border-radius: 2rem">

    <div class="breadcomb-area ">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="breadcomb-list">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="breadcomb-wp">
                                    <div class="breadcomb-icon">
                                        <i class="notika-icon notika-app"></i>
                                    </div>
                                    <div class="breadcomb-ctn ">
                                        <h2 >Your Orders</h2>
                                        <p>Here you can check your Orders </p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>WebMails</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="data-table-area">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="data-table-list">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [


            'id',
            'username',
         //   'user_email:email',
          //  'account_id',
            'product_type',
            //'category_name',
            //'product_details',
            'price',
            //'is_reported',
            //'is_refunded',
            //'report_time',
            //'shop_name',
            //'status',
            //'created_at',






            ['header'=>'View Details',
                'headerOptions' => ['style' => 'color:blue'],
                'format' => 'raw',
                'value' => function($data) {
                    return Html::a('Details', Yii::$app->params['base_url']."/orders/details?id=".$data->id, ['class' => 'btn btn-info btn-details btn-modal-order']);
                }
            ],

//            ['header'=>'Report',
//                'headerOptions' => ['style' => 'color:blue'],
//                'format' => 'raw',
//                'value' => function($data) {
//                    if($data->report_time < date("Y-m-d H:i:s") && $data->is_reported=="No"){
//                        return Html::a('Time Over', '#',['class'=>'badge badge-primary' ]);
//                    }
//                    else if($data->is_reported=="Yes") {
//                        return Html::a('Already Report', '#',['class'=>'badge badge-warning','btn-report', 'data-account_id' => $data->account_id, 'data-product_type' => $data->product_type, 'data-order_id'=>$data->id]);
//                    }
//                    else
//                    {
//                        if($data->product_type=="Sender"   || $data->product_type=="Other" || $data->product_type=="Verifier" ){
//                            return Html::a('Not Available', '#',['class'=>'badge badge-info','',]);
//
//                        }else {
//
//                            return Html::a('Report', '#', ['class' => 'btn btn-danger btn-report', 'data-account_id' => $data->account_id, 'data-product_type' => $data->product_type, 'data-order_id' => $data->id]);
//                        }
//                    }
//                }
//            ],


        ],
    ]); ?>
            </div>
        </div>
    </div>

</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $(".btn-detail").click(function(){
            window.location.href = base_url+"/order/details?id="+$(this).data('account_id')+"&tool_type="+$(this).data('product_type');
        });
        $(".btn-report").click(function(){
            window.location.href = base_url+"/report/set-report?tool_id="+$(this).data('account_id')+"&tool_type="+$(this).data('product_type')+"&order_id="+$(this).data('order_id');

        });
    });

</script>