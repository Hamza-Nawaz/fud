<?php
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
/* @var $this yii\web\View */
/* @var $model app\models\UserTicketReplies */
/* @var $form yii\bootstrap4\ActiveForm */
use yii\widgets\LinkPager;


$this->title = 'Reports';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="row">
<div class="col-lg-6">
    <?php
    foreach ($messages as $message){
        if($message->user_id==Yii::$app->session->get("user_id")){
            echo '<div class="bs-callout bs-callout-info " >
                 <span style="white-space: pre;">'. $message->message.'
</span>
 <hr>
    <p style="margin-top: -2%;">
           '. $message->created_at.'
           <span class="badge badge-info"> '.$user_type.' </span>
    </p>
</div>';
        }elseif ($message->user_id==-1){
            echo '<div class="bs-callout bs-callout-warning">
                 <span style="white-space: pre;">'. $message->message.'
</span>
 <hr>
    <p style="margin-top: -2%;">
           '. $message->created_at.'
           <span class="badge badge-warning" style="color: white"> Support </span>
    </p>
</div>';
        }
        else {

            echo '<div class="bs-callout bs-callout-danger">
<span style="white-space: pre;">
   ' . $message->message. '
    </span>
    <hr>
    <p style="margin-top: -2%;"> ' . $message->created_at . ' 
   <span class="badge badge-danger"> '.$message->buyer_useremail.' </span>
    </p>
</div>';
        }
    }
    ?>
    <?php
    echo LinkPager::widget([
        'pagination' => $pages,
    ]);
    ?>
</div>
    <div class="col-lg-6">

        <div class="card card-body">
            <div class="card-header">
                Tool Information
            </div>
            <div class="card-body">
             
                Customer Email    :   <label><?=$ticket_user_email?></label>
                <br/>
                Tool Type         :   <label><?=$tool_type?></label>
                <br/>
                Tool Description  :   <label><?=$tool_desc?></label>
                <br/>
                Price             :   <label><?=$price?></label>
                <br/>
                IS Reported       :   <label><?=$is_reported?></label>
                <br/>
                Is Refunded       :   <label><?=$is_refund?></label>


            </div>



        </div>
    </div>
</div>

<div class="col-lg-6">
    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'message')->textarea(['rows' => 6])->label(false) ?>
    <?= $form->field($model, 'report_id')->hiddenInput(['value'=> $ticket_id])->label(false);?>
    <?= $form->field($model, 'customer_id')->hiddenInput(['value'=> $ticket_user_id])->label(false);?>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-info']) ?>
        <a href="<?= Yii::$app->params['base_url'] ?>/report" class="btn btn-danger">Back</a>

    </div>
    <?php ActiveForm::end(); ?>
</div>

<style>
    .bs-callout {
        padding: 20px;
        margin: 20px 0;
        border: 1px solid #eee;
        border-left-width: 5px;
        border-radius: 3px;
    }
    .bs-callout h4 {
        margin-top: 0;
        margin-bottom: 5px;
    }
    .bs-callout p:last-child {
        margin-bottom: 0;
    }
    .bs-callout code {
        border-radius: 3px;
    }
    .bs-callout+.bs-callout {
        margin-top: -5px;
    }
    .bs-callout-default {
        border-left-color: #777;
    }
    .bs-callout-default h4 {
        color: #777;
    }
    .bs-callout-primary {
        border-left-color: #428bca;
    }
    .bs-callout-primary h4 {
        color: #428bca;
    }
    .bs-callout-success {
        border-left-color: #5cb85c;
    }
    .bs-callout-success h4 {
        color: #5cb85c;
    }
    .bs-callout-danger {
        border-left-color: #d9534f;
    }
    .bs-callout-danger h4 {
        color: #d9534f;
    }
    .bs-callout-warning {
        border-left-color: #f0ad4e;
    }
    .bs-callout-warning h4 {
        color: #f0ad4e;
    }
    .bs-callout-info {
        border-left-color: #5bc0de;
    }
    .bs-callout-info h4 {
        color: #5bc0de;
    }
</style>