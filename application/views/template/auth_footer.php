<!-- BEGIN: JS Assets-->
<script src="<?= base_url('assets/') ?>dist/js/app.js"></script>
<script src="<?= base_url('node_modules/') ?>sweetalert2/dist/sweetalert2.min.js"></script>


<script>
    // Button send email verif on click
    $('#verifEmailBtn').on('click', function () {
        $("#verifyModal").modal("hide");
        $("#loadingModal").modal('show');
    });

    // Forgot Password

    $('#forgotPasswordBtn').on('click', function () {
        var email = $("#emailForgot").val();
        if (!email) {
            Swal.fire(
                'Error!',
                'Email cannot be empty!',
                'error'
            );
            return false;
        } else {
            $("#forgotPasswordModal").modal("hide");
            $("#loadingModal").modal('show');
        }
    });

    // Forgot Password Modal
    $('#forgotPasswordModalBtn').on('click', function () {
        $.ajax({
            type: "GET",
            url: "<?= base_url('auth/fogotPasswordModal') ?>",
            dataType: 'json',
            success: function (response) {
                if (response.status == 200) {
                    $("#forgotPasswordModal").modal("show");
                } else if (response.status == 404) {
                    $("#loadingModal").modal('hide');
                    Swal.fire(
                        'Error!',
                        `${response.message}`,
                        'error'
                    );
                }
            },
            error: function () {
                Swal.fire(
                    'Error!',
                    'Failed To Send Email!',
                    'error'
                );
            }
        });
    });

    // changePassword
    // $("#changePassword").submit(function (e) {
    //     e.preventDefault();
    //     // var formData = $(this).serialize();
    //     var password = $('#password1').val()
    //     // alert('hai');
    //     // return false;
    //     $.ajax({
    //         type: "POST",
    //         url: "<?= base_url('Auth/resetPassword') ?>",
    //         dataType: "json",
    //         data: {
    //             password: password
    //         },
    //         success: function (response) {
    //             if (response.status == 200) {
    //                 // $("#loadingModal").modal('hide');
    //                 Swal.fire(
    //                     'Success!',
    //                     `${response.message}`,
    //                     'success'
    //                 );
    //             } else if (response.status == 422) {
    //                 Swal.fire(
    //                     'Error!',
    //                     `${response.message}`,
    //                     'error'
    //                 );
    //             }
    //         },
    //         error: function (xhr, status, error) {
    //             Swal.fire(
    //                 'Error!',
    //                 `Internal Server Error!`,
    //                 'error'
    //             );
    //             console.log(xhr.responseText);
    //             console.log(status);
    //             console.log(error);
    //         }
    //     });
    // });

    // Send Email
    $("#forgotPassword").submit(function (e) {
        e.preventDefault();
        var email = $("#emailForgot").val();
        $.ajax({
            type: "POST",
            url: "<?= base_url('Auth/forgotPassword') ?>",
            dataType: "json",
            data: {
                email: email
            },
            success: function (response) {
                if (response.status == 200) {
                    $("#loadingModal").modal('hide');
                    Swal.fire(
                        'Success!',
                        `${response.message}`,
                        'success'
                    );
                } else if (response.status == 422) {
                    $("#loadingModal").modal('hide');
                    Swal.fire(
                        'Error!',
                        `${response.message}`,
                        'error'
                    );
                }
            },
            error: function (xhr, status, error) {
                Swal.fire(
                    'Error!',
                    `Internal Server Error!`,
                    'error'
                );
                console.log(xhr.responseText);
                console.log(status);
                console.log(error);
            }
        });
    });

    // Forgot Password End



    // Send Email
    $("#verifyEmail").submit(function (e) {
        e.preventDefault();
        var email = $("#emailVerify").val();
        $.ajax({
            type: "POST",
            url: "<?= base_url('Auth/sendEmail') ?>",
            dataType: "json",
            data: {
                email: email
            },
            success: function (response) {
                if (response.status == 200) {
                    $("#loadingModal").modal('hide');
                    Swal.fire(
                        'Success!',
                        `${response.message}`,
                        'success'
                    );
                } else if (response.status == 422) {
                    $("#loadingModal").modal('hide');
                    Swal.fire(
                        'Error!',
                        `${response.message}`,
                        'error'
                    );
                }
            },
            error: function (xhr, status, error) {
                Swal.fire(
                    'Error!',
                    `Internal Server Error!`,
                    'error'
                );
                console.log(xhr.responseText);
                console.log(status);
                console.log(error);
            }
        });
    });
    // End Send Email

    // Verify Email

    // End Verify Email

    // Auth

    // Login

    $("#login").submit(function (e) {
        e.preventDefault();
        var formData = $(this).serialize();
        $.ajax({
            type: "POST",
            url: "<?= base_url('auth') ?>",
            dataType: "json",
            data: formData,
            success: function (response) {
                if (response.status == 200) {
                    window.location.href = "<?= base_url('admin'); ?>"
                } else if (response.status == 402) {
                    Swal.fire(
                        'Failed!',
                        `${response.message}`,
                        'error'
                    );
                } else if (response.status == 404) {
                    window.location.href = "<?= base_url('blocked'); ?>"
                } else if (response.status == 422) {
                    $('#emailVerify').val(response.data.email);
                    $("#verifyModal").modal("show");
                } else if (response.status == 500) {
                    Swal.fire(
                        'Failed!',
                        `${response.message}`,
                        'error'
                    );
                }
            },
            error: function (xhr, status, error) {
                Swal.fire(
                    'Failed!',
                    'Failed To Login! Internal Server Error.',
                    'error'
                )
                console.log(xhr.responseText);
                console.log(status);
                console.log(error);

            }
        });
    });

    // End Login


    // End Auth
</script>

<!-- END: JS Assets-->
</body>

</html>