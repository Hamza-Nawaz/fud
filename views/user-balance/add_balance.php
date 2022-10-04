<?php

use yii\helpers\Html;
use yii\widgets\LinkPager;

?>

<div id="add_balance" class="container-fluid" style="background-color: #fafafa;border-radius: 2rem " >
    <div class="row" id="balance">

        <div class="col-lg-12">

            <div class="page_heading">
                <h1 style="text-align: center;">Add Balance</h1>
            </div>

        </div>
        <div class="col-lg-12">
            <a class="btn btn-success" href="<?=Yii::$app->params['base_url']?>/user-balance/history" id="abc" style="color: white;">Balance History </a>
            <hr>
        </div>
        <div id="divBalance" class="col-lg-5">
            <form id="balance_form" action="<?=Yii::$app->params['base_url'] ?>/shop/payment" method="post">
                <div class="form-group">
                    <label for="exampleInputEmail1">Method</label>
                    <select class="custom-select form-control" id="payment_type" name="payment_type" size="5" required>
                        <option selected="selected" value="1">BTCPay</option>
                        <option value="2">Perfect Money</option>
                    </select>
                    <div id="divInstruction" style="margin-left:0%;margin-top: 0%;">
                        <li>After payment funds will be added automatically to your account INSTANTLY.</li>
                        <li>Perfect money/BTCPay is a secure way to fund your account.</li>
                        <li>Min/Max is 10 USD/5000 USD.</li>

                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Amount</label>
                    <input  class="form-control" type="number" id="amount" name="amount" placeholder="20"  required >
                </div>
                <input id="form-token" type="hidden" name="<?=Yii::$app->request->csrfParam?>"
                       value="<?=Yii::$app->request->csrfToken?>"/>
                <button  type="submit" class="btn btn-success">Add Balance</button>
            </form>


        </div>




        <div id="divHistory" class="col-lg-12">

            <div class="section_datatable">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="table-responsive">
                                <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                   <th> id </th>
                                   <th> Date  </th>
                                   <th> Amount  </th>
                                   <th> Order_deatils  </th>
                                    </tr>
                                    </thead>

                                    <?php foreach ($model

                                    as $models): ?>
                                    <tbody>

                                    <tr>
                                        <td><?php echo $models->id; ?></td>
                                        <td><?php echo $models->created_at; ?></td>
                                        <td><?php echo $models->amount; ?></td>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>


</div>

<form id="form-pm-payment" action="https://perfectmoney.is/api/step1.asp" method="POST" style="display: none;">
    <input type="hidden" name="PAYEE_ACCOUNT" value="<?=\app\models\WebPaymentTransaction::$Pm_Account?>">
    <input type="hidden" name="PAYEE_NAME" value="<?=$_SERVER['SERVER_NAME']?>">
    <input type="text" id="PAYMENT_AMOUNT" name="PAYMENT_AMOUNT" value="1">
    <input type="hidden" name="PAYMENT_ID" value="<?= Yii::$app->session->get("user_id") ?>">
    <input type="hidden" name="PAYMENT_UNITS" value="USD">
    <input type="hidden" name="PAYMENT_URL" value="<?= \app\models\WebPaymentTransaction::$SuccessURL ?>">
    <input type="hidden" name="PAYMENT_URL_METHOD" value="GET">
    <input type="hidden" name="NOPAYMENT_URL" value="<?= \app\models\WebPaymentTransaction::$FailedURL ?>">
    <input type="hidden" name="NOPAYMENT_URL_METHOD" value="GET">
    <input type="submit" name="PAYMENT_METHOD" value="Pay Now!">
</form>



<script>
    $(document).ready(function () {
        $("#divHistory").hide();
        $('#balance_form').submit(function (e) {
            e.preventDefault();
            var balance = $('#amount').val();

            var type=$('#payment_type').val();
            if(type==1) {
                if (balance < 10 || balance > 5000) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Amount must be greater then 10 and smaller 5000 !',

                    })
                } else {
                    $.ajax({
                        type: "POST",
                        url: base_url + "/user-balance/btc",
                        data: {
                            amount: balance,
                        },
                        success: function (result) {
                            window.location.replace(result);
                        },
                    });

                }
            }
            else{
                pm_pay_now(balance);
            }
        });
    });
    $("#btnBalance").click(function () {
        $("#divHistory").hide();
        $("#divBalance").show();
        $("#divInstruction").show();
    });
    $("#btnHistory").click(function () {
        $("#divHistory").show();
        $("#divBalance").hide();
        $("#divInstruction").hide();
    });
    function isNumber(evt) {
        var iKeyCode = (evt.which) ? evt.which : evt.keyCode
        if (iKeyCode != 46 && iKeyCode > 31 && (iKeyCode < 48 || iKeyCode > 57))
            return false;
        return true;
    }
    $("#btnBalance").click(function () {
        $("#divHistory").hide();
        $("#divBalance").show();
        $("#divInstruction").show();
    });
    $("#btnHistory").click(function () {
        $("#divHistory").show();
        $("#divBalance").hide();
        $("#divInstruction").hide();
    });
    function pm_pay_now(amount) {
        $("#form-pm-payment #PAYMENT_AMOUNT").val(amount);
        $("#form-pm-payment").submit();
    }

</script>



