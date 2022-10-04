<?php
?>

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0 ">
                    <div class="cmp-tb-hd mx-auto">
                        <h3>RDP Ip Address</h3>
                        <p>Put Your RDP IP Address for restart.</p>
                    </div>
                        <div class="col-md-6 mx-auto">
                    <form method="post" action="index">
                    <div class="form-example-int">
                        <div class="form-group">
                            <label>IP Address</label>
                            <div class="nk-int-st">
                                <input type="text" class="form-control input-sm" name="ip" id="ip" required>
                            </div>
                        </div>
                    </div>
                        <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />

                        <div class="form-example-int mg-t-15">
                        <button class="btn btn-success notika-btn-success">Submit</button>
                    </div>
                    </form>
                        </div>
                </div>
                <?php { if($error) ?>
                <label style="color: red"> <?=$error?>  </label>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
</div>