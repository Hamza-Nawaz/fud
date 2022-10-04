$(document).ready(function(){

    $(".btn-tools-buy").click(function(){

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
                Swal.fire({
                    title: 'Enter Email for License',
                    input: 'text',
                    inputAttributes: {
                        autocapitalize: 'off'
                    },
                    showCancelButton: true,
                    confirmButtonText: 'Done',
                    showLoaderOnConfirm: true,
                    preConfirm: (login) => {

                        $.ajax({
                            url: base_url+"/orders/tools-buy",
                            type: "POST",
                            data: {id: $(this).data('id'), email:login},
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
                                else if(data=="-1"){

                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Oops...',
                                        text: "Sorry ! This Email has already License.Change Email Address ",
                                    })
                                    setTimeout(function () {
                                        location.reload();
                                    }, 2000);

                                }
                                else if(data=="-2"){

                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Oops...',
                                        text: "Sorry ! There is Some Email Error ",
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
                    },
                    allowOutsideClick: () => !Swal.isLoading()
                });
            }
        })

    });
});