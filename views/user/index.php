<?php

use app\models\ShopUsers;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ShopUsersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Shop Users';
$this->params['breadcrumbs'][] = $this->title;
?>    <div class="breadcomb-area" style="background-color: white;border-radius: 2rem">
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
                                    <h2>Users</h2>
                                </div>
                            </div>
                        </div>


<div class="shop-users-index">






    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">

                        <p>
                            <?= Html::a('Create User', ['create'], ['class' => 'btn btn-success']) ?>
                        </p>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">



    <?= GridView::widget([

        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'summary' =>'',
        'columns' => [

            //'id',
            'username',
            'email:email',
            'password',
            'user_role',
          //  'created_at',
//            [
//                'class' => ActionColumn::className(),
//                'urlCreator' => function ($action, ShopUsers $model, $key, $index, $column) {
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
</div> </div>
                </div>
            </div>
        </div>
    </div>
</div>
