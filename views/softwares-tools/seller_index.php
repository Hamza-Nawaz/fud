
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="container">
        <div class="row">
            <?php
            foreach ($model as $item){
                ?>
                <div class="card" style="width: 18rem; margin-left: 2%; margin-top: 2%">
                    <div class="card-body">
                        <h5 class="card-title"><?=$item->name?></h5>
                        <h6 class="card-subtitle mb-2 text-muted">Price : <span class="badge badge-success text-primary"><?=$item->price?></span></h6>
                        <p class="card-text"><?=$item->description?></p>

                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>

<?php
