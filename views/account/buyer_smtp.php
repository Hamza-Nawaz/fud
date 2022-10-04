<?php

use app\models\Accounts;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AccountsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Accounts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="accounts-index">

    <div class="breadcomb-area table-responsive" style="background-color: #FAFAFA; border-radius: 2rem">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="breadcomb-list">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="breadcomb-wp">
                                    <div class="breadcomb-icon">
                                        <i class="notika-icon notika-mail"></i>
                                    </div>
                                    <div class="breadcomb-ctn">
                                        <h2>Smtps</h2>
                                    </div>
                                </div>
                            </div>




    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="container-fluid py-4 table-responsive">
        <div class="row">
            <div class="col-12 table-responsive">
                <div class="card mb-4">
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">

                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'summary' => '',
                    'columns' => [
                        //   'id',
                        //  'category_id',
                        'category_name',
                        'product_type',
                        //  'data_log',
                        'price',
                        ['header'=>'Test Send',
                            'headerOptions' => ['style' => 'color:blue'],
                            'format' => 'raw',
                            'value' => function($data) {
                                if($data->product_type=="Sendgrid"){
                                    return Html::a('No Supported',"javascript:void(0);", ['class' => 'badge badge-info']);

                                }else {
                                    return Html::a('Test', "javascript:void(0);", ['class' => 'btn btn-primary btn-checking', 'data-id' => $data->id]);
                                }
                            }
                        ],

                        ['header'=>'Buy',
                            'headerOptions' => ['style' => 'color:blue'],
                            'format' => 'raw',
                            'value' => function($data) {
                                return Html::a('Buy', 'javascript:void(0);', ['class' => 'btn btn-danger btn-buy btn-modal-order','data-id'=>$data->id]);
                            }
                        ],

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
        </div>
    </div>
</div>



