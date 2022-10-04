$(document).ready(function() {
    $(".btn-reset").click(function() {

        $.ajax({
            url: base_url+"/tools-license/reset",
            type: "POST",
            data: {license_email: $(this).data('license_email'),license_key : $(this).data('license_key')},
            success: function (data) {
                Swal.fire({
                    icon: 'success',
                    title: 'Updated',
                    text: 'Rest Successfully',
                })
                setTimeout(function () {
                    location.reload();
                }, 1000);
            }
        });
    });


});



