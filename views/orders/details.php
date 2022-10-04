<?php
?>




<div class="breadcomb-area" style="background-color: #fafafa; border-radius: 2rem">
<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="breadcomb-list">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="breadcomb-wp">
                            <div class="breadcomb-icon">
                                <i class="notika-icon notika-app"></i>
                            </div>
                <h2>Your Order Details</h2>
                <p>Here is you view your order details.</p>
            </div>
            <div class="bsc-tbl-cds">
                <table class="table table-condensed">
                    <thead>
                    <tr>
                        <th>id</th>
                        <th>Category</th>
                        <th>Details  or (Download Link)</th>
                        <th>Price</th>

                    </tr>
                    </thead>
                        <?php foreach ($model as $item): ?>
                            <tbody>
                            <tr>
                                <td><?=$item->id?></td>
                                <td><?=$item->category_name?></td>
                                <td><?=$item->product_details?></td>
                                <td><?=$item->price?></td>
                            </tr>
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
