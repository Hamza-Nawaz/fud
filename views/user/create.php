<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ShopUsers */

$this->title = 'Create Shop Users';
$this->params['breadcrumbs'][] = ['label' => 'Shop Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shop-users-create">

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="breadcomb-list">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="breadcomb-wp">
                        <div class="breadcomb-icon">
                            <i class="notika-icon notika-form"></i>
                        </div>
                        <div class="breadcomb-ctn">
                            <h2>Create User</h2>
                            <p>Here you can create user</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <?= $this->render('_form', [
        'model' => $model,
        'error'=>$error,
    ]) ?>

</div>
