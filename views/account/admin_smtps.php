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

    <div class="breadcomb-area" style="margin-top: -3%">
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
                                        <p>Here you can modify Smtps details</p>
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
                               //  'data_log',
                                 'price',
                                'retail_price',
                                ['header'=>'Test Send',
                                    'headerOptions' => ['style' => 'color:blue'],
                                    'format' => 'raw',
                                    'value' => function($data) {
                                        if(str_contains($data->product_type,'SendGrid')||str_contains($data->product_type,'sendgrid')||str_contains($data->product_type,'aws')){
                                            return Html::a('No Supported',"javascript:void(0);", ['class' => 'badge badge-danger']);

                                        }else {
                                            return Html::a('Test', "javascript:void(0);", ['class' => 'btn btn-primary btn-check', 'data-id' => $data->id]);
                                        }
                                    }
                                ],

                                [
                                    'class' => ActionColumn::className(),
                                    'urlCreator' => function ($action, Accounts $model, $key, $index, $column) {
                                        return Url::toRoute([$action, 'id' => $model->id]);
                                    }
                                ],
                            ],
                        ]); ?>


                    </div>
                </div>

    </div>
</div><script>

    function checkSmtp(elm) {

        var data=$(elm).data("id");

        $.ajax({
            url: base_url+"/account/test-send",
            type: "POST",
            data: "data=" + data,
            success: function (data) {
                if(data=="OK"){
                    $(elm).replaceWith("<a class='btn btn-success' style='color: white'>"  +"Working" + "</a>")
                }
                else{
                    $(elm).replaceWith("<a class='btn btn-danger' style='color: white'>"  +"SMTP "+data + "</a>");
                }
            },
        });
    }
    $(document).ready(function(){
        var loc = window.location;
        var pathName = loc.pathname.substring(0, loc.pathname.lastIndexOf('/') + 1);
//        alert(loc.href.substring(0, loc.href.length - ((loc.pathname + loc.search + loc.hash).length - pathName.length)));
        $(".btn-check").click(function(){
            $(this).text("Verifing...");
            checkSmtp($(this));
        });


    });
</script>


