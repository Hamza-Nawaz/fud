<div class="breadcomb-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcomb-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="breadcomb-wp">
                                <div class="breadcomb-icon">
                                    <i class="notika-icon notika-settings"></i>
                                </div>
                                <div class="breadcomb-ctn text-white">
                                    <h2 class="text-white">Tools and Software</h2>
                                    <p>Here you buy the latest products and tools </p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
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
                    <a href="JavaScript:void(0);" class="btn btn-primary card-link btn-tools-buy" data-id="<?=$item->id?>">Buy</a>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>

