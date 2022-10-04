$(document).ready(function() {
    $(".btn-solve").click(function() {

        $.ajax({
            url: base_url+"/report/solved",
            type: "POST",
            data: {id: $(this).data('id')},
            success: function (data) {
                Swal.fire({
                    icon: 'success',
                    title: 'Updated',
                    text: 'Report has been Solved !',
                })

                setTimeout(function () {
                    location.reload();
                }, 1000);
            }
        });
    });

    $(".btn-refund").click(function() {

    $.ajax({
    url: base_url+"/report/refund",
    type: "POST",
    data: {id: $(this).data('id') , order_id: $(this).data('order_id')},
    success: function (data) {
    Swal.fire({
    icon: 'success',
    title: 'Updated',
    text: 'Refund has been success !',
})
    setTimeout(function () {
    location.reload();
}, 1000);
}

});
});

});



