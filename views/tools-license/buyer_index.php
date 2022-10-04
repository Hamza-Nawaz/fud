<?php
?>
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Authors table</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
<?php if($model)?>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="normal-table-list mg-t-30">
            <div class="basic-tb-hd" style="padding-left:12px " >
                <h2>Your Tools License</h2>
                <p >Here is you view also rest your License of Purchased Tools.</p>
            </div>
            <div class="bsc-tbl-cds">
                <table class="table table-condensed">
                    <thead>
                    <tr>
                        <th>id</th>
                        <th>License Email</th>
                        <th>License Key</th>
                        <th>Software Name</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <?php
                    if($model!="-1"){ ?>
                        <?php foreach ($model as $item): ?>
                            <tbody>
                            <tr>
                                <td><?=$item->id?></td>
                                <td><?=$item->license_email?></td>
                                <td><?=$item->license_key?></td>
                                <td><?=$item->tool_name?></td>
                                <td><a href="javascript:void(0);" class="btn btn-primary btn-reset" data-license_email="<?=$item->license_email?>" data-license_key="<?=$item->license_key?>"><i class="ni ni-atom"></i>  Reset License</a></td>
                                    <?php
                                    $id=\app\models\SoftwareLink::actionGetSoftwareLink($item->tool_name);

                                    if($id!="0"){ ?>
                                <td><i   class="btn btn-success btn-download-link" style="color: white" data-link="<?=$id->link?>"><i class="fas fa-download"></i></i></td>
                               <?php } else { ?>
                                <td><a  class="btn btn-success"><i class="fas fa-ban"></i></a></td>
                                <?php } ?>

                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    <?php }?>
                </table>
            </div>
        </div>
    </div>
</div>
                    </div>
                </div>

<script>
    $(document).ready(function(){

        $(".btn-download-link").click(function(){


                         Swal.fire({
                            title: '<strong>Software Download <u>Link</u></strong>',
                            icon: 'info',
                            html:
                                'Click to Download the <b>Software</b>, ' +
                                '<a href='+$(this).data('link')+'>link</a> ' +
                                'Thank you',
                            showCloseButton: true,
                            showCancelButton: true,
                            focusConfirm: false,

                         })

            // $.ajax({
            //     url: base_url+"/tools-license/link?id="+$(this).data("id"),
            //     type: "GET",
            //     success: function (data) {
            //         Swal.fire({
            //             title: '<strong>Software Download <u>Link</u></strong>',
            //             icon: 'info',
            //             html:
            //                 'Click to Download the <b>Software</b>, ' +
            //                 '<a href='+data+'>link</a> ' +
            //                 'Thank you',
            //             showCloseButton: true,
            //             showCancelButton: true,
            //             focusConfirm: false,
            //
            //         })


            });
        });



</script>

