<?php
?>
<div class="form-example-area">
    <div class="container">
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="background-color: #fafafa; border-radius: 2rem">
        <form action="change-password" method="post">
        <div class="form-example-wrap">
            <div class="cmp-tb-hd ">
                <h2 >Change Password</h2>
                <p>Here You can put new password.</p>
            </div>
            <div class="form-example-int">
                <div class="form-group">
                    <label>Email Address</label>
                    <div class="nk-int-st">
                        <input type="text" class="form-control input-sm" id="em" name="em" value="<?=Yii::$app->session->get('buyer_email')?>"  disabled>
                    </div>
                </div>
            </div>
            <div class="form-example-int mg-t-15">
                <div class="form-group">
                    <label>Password</label>
                    <div class="nk-int-st">
                        <input type="password" id="pass" name="pass" class="form-control input-sm" placeholder="Password">
                    </div>
                </div>
            </div>
            <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />

            <div class="form-example-int mg-t-15">
                <button class="btn btn-success notika-btn-success">Submit</button>
            </div>
        </div>
        </form>
        <?php if($error){ ?>

            <label style="color: red"><?=$error?></label>

        <?php } ?>
    </div>
</div>
    </div>
    </div>