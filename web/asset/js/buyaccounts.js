function checkSmtp(elm) {
    var data=$(elm).data("id");

    $.ajax({
        url: base_url+"/account/test-send",
        type: "POST",
        data: "data=" + data,
        success: function (data) {
            if(data=="OK"){
                $(elm).replaceWith("<a class='btn btn-success' style='color: white'>"  +"Working" + "</a>")
            }
            else{
                $(elm).replaceWith("<a class='btn btn-danger' style='color: white'>"  +"SMTP "+data + "</a>");
            }
        },
    });
}
$(document).ready(function(){
    var loc = window.location;
    var pathName = loc.pathname.substring(0, loc.pathname.lastIndexOf('/') + 1);
//        alert(loc.href.substring(0, loc.href.length - ((loc.pathname + loc.search + loc.hash).length - pathName.length)));
    $(".btn-checking").click(function(){
        $(this).text("Verifing...");
        checkSmtp($(this));
    });

    $(".btn-buy").click(function(){

        Swal.fire({
            title: 'Are you sure to buy this tool ?',
            text: "",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, buy it!'
        }).then((result) => {
            if (result.isConfirmed) {

                $.ajax({
                    url: base_url+"/orders/buy",
                    type: "POST",
                    data: {id: $(this).data('id')},
                    success: function (data) {
                        if(data=="Buy"){
                            Swal.fire(
                                'Purchased!',
                                'Thank you for your business.',
                                'success'
                            )
                            window.location.href = base_url+"/orders";

                        }
                        else if(data=="Sold"){

                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: "Sorry ! Some one already purchased ",
                            })
                            setTimeout(function () {
                                location.reload();
                            }, 2000);

                        }
                        else if(data=="not_enough_balance"){
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'You have insufficient balance!',
                                footer: '<a href='+base_url+'/user-balance/add-balance>Click to add balance ?</a>'
                            })

                        }
                    },
                });
            }
        })

    });
});