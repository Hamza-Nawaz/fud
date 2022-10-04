<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ReportTool */

$this->title = 'Report Tool';
$this->params['breadcrumbs'][] = ['label' => 'Report Tools', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="report-tool-create">

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="breadcomb-list">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="breadcomb-wp">
                        <div class="breadcomb-icon">
                            <i class="notika-icon notika-form"></i>
                        </div>
                        <div class="breadcomb-ctn">
                            <h2>Create Report</h2>
                            <p>Here you can create Report of Dead Tool</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <br>
    <hr/>

    <?= $this->render('_form1', [
        'model' => $model,
    ]) ?>

</div>
