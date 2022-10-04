<?php
?>
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
                            <th> Order Details  </th>
                            </tr>
                            </thead>
                            <?php foreach ($model
                            as $models): ?>
                            <tbody>
                            <tr>
                                <td><?php echo $models->id; ?></td>
                                <td><?php echo $models->created_at; ?></td>
                                <td><?php echo $models->amount; ?></td>
                                <?php if($models->order_id!=0){ ?>
                                <td><a href="<?=Yii::$app->params['base_url']?>/orders/details?id=<?=$models->order_id?>" class="btn btn-primary">Check Details </a></td>
                                <?php }else { ?>
                                    <td><a  class="badge badge-danger">No Order Details available </a></td>
                                <?php } ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
