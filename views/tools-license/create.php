<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ToolsLicense */

$this->title = 'Create Tools License';
$this->params['breadcrumbs'][] = ['label' => 'Tools Licenses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tools-license-create">

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="breadcomb-list">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="breadcomb-wp">
                        <div class="breadcomb-icon">
                            <i class="notika-icon notika-form"></i>
                        </div>
                        <div class="breadcomb-ctn">
                            <h2>Add Email License</h2>
                            <p>Enter Buyer Register Email and Software Register Email</p>
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
