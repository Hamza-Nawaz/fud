<?php

use app\models\ToolsLicense;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ToolsLicenseSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tools Licenses';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tools-license-index" style="background-color: #FAFAFA;border-radius: 2rem">

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
                                        <h2>Tools License</h2>
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

    <p style="margin-left:2%;">
        <?= Html::a('Create Tools License', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Authors table</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
          //  'user_id',
            'user_name',
         //   'tool_id',
            'tool_name',
            'license_email',
            //'license_key',
            //'expiry_date',
            //'rest_count',
            //'created_at',

        ],
    ]); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

