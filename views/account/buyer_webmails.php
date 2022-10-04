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
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="data-table-list">

                        <?= GridView::widget([
                            'dataProvider' => $dataProvider,
                            'filterModel' => $searchModel,
                            'summary' => '',
                            'columns' => [
                                //   'id',
                                //  'category_id',
                                'category_name',
                                'product_type',

                                'price',
                                'created_at',


                                ['header'=>'Test Webmails',
                                     'headerOptions' => ['style' => 'color:blue'],
                                    'format' => 'raw',
                                    'value' => function($data) {

                                        if($data->product_type=="Ionos.es" ||$data->product_type=="Ionos.com" ||$data->product_type=="Ionos.de" || $data->product_type=="Ionos.co.uk" || $data->product_type=="Ionos.fr" || $data->product_type=="Ionos.mx" ||$data->product_type=="Ionos.it"
                                       || $data->product_type=="zimbra"||$data->product_type=="Strato"||$data->product_type=="T-Online"||$data->product_type=="Aruba"||$data->product_type=="Rackspace"
                                        ){
                                            return Html::a('Test Webmail', '#', ['class' => 'btn btn-primary btn-webmail-check','data-id'=>$data->id]);

                                        }else{
                                            return Html::a('Not Supported', '#', ['class' => 'badge badge-sm bg-gradient-primary']);

                                        }
                                    }
                                    ],
                                ['header'=>'Buy',
                                    'headerOptions' => ['style' => 'color:blue'],
                                    'format' => 'raw',
                                    'value' => function($data) {
                                        return Html::a('Buy', '#', ['class' => 'btn btn-danger btn-buy btn-modal-order','data-id'=>$data->id]);
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


<script>
    function checkCp(elm) {
        var data=$(elm).data("id");
        $.ajax({
            url: base_url+"/account/check-webmail",
            type: "POST",
            data: "data=" + data,
            success: function (data) {
                if(data=="Credentials valid"){
                    $(elm).replaceWith("<a class='btn btn-success' style='color: white'>"  +"Working" + "</a>")
                }
                else{
                    $(elm).replaceWith("<a class='btn btn-danger' style='color: white'>"  +""+data + "</a>");
                }
            },
        });
    }
    $(document).ready(function(){

        $(".btn-webmail-check").click(function(){
            $(this).text("Checking...");
            checkCp($(this));
        });

    });
</script>