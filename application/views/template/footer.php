<!-- Delete Modal -->
<div class="modal" id="logoutModal">
    <div class="modal__content">
        <form id="logout">
            <div class="p-5 text-center"> <i data-feather="x-circle" class="w-16 h-16 text-theme-6 mx-auto mt-3"></i>
                <div class="text-3xl mt-5">Are you sure?</div>
                <div class="text-gray-600 mt-2">Do you really want to logout?</div>
            </div>
            <div class="px-5 pb-8 text-center">
                <button type="button" data-dismiss="modal" class="button w-24 border text-gray-700 mr-1">Cancel</button>
                <button type="submit" class="button w-24 bg-theme-6 text-white">Logout</button>
        </form>
    </div>
</div>
</div>

</div>
<!-- BEGIN: JS Assets-->
<script src="<?= base_url('node_modules/') ?>jquery-ajax/jquery.min.js"></script>
<script src="<?= base_url('node_modules/') ?>sweetalert2/dist/sweetalert2.min.js"></script>
<!-- <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script> -->
<script src="<?= base_url('assets/') ?>dist/js/app.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.1.1/flowbite.min.js"></script>



<!-- Modal Trigger -->
<script>

    const checkAll = document.getElementById("checkAll");
    const checkboxes = document.querySelectorAll("#checkbox");

    $(checkAll).on("change", function () {
        checkboxes.forEach(checkbox => {
            checkbox.checked = checkAll.checked;
        });
    });

    // Profile
    $(document).on('change', '.changeUserImage', function () {
        const file = this.files[0];
        console.log(file);
        if (file) {
            let reader = new FileReader();
            reader.onload = function (event) {
                $('#viewImageUser').attr('src', event.target.result);
            }
            reader.readAsDataURL(file);
        }
    });


    // End Profile

    // Feedback
    $('#table-form').on('submit', function (e) {
        e.preventDefault();
        var formData = $(this).serialize();
        // alert(formData);
        // return false;
        $.ajax({
            type: "POST",
            url: "<?= base_url('feedback/deleteAllModal') ?>",
            data: formData,
            dataType: 'json',
            success: function (response) {
                if (response.status == 200) {
                    const id = Array.isArray(response.data) ? response.data : [response.data];
                    const swalWithBootstrapButtons = Swal.mixin({
                        customClass: {
                            confirmButton: 'button bg-theme-9 ml-2 text-white',
                            cancelButton: 'button bg-theme-6 text-white'
                        },
                        buttonsStyling: false
                    })

                    swalWithBootstrapButtons.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Yes, delete it!',
                        cancelButtonText: 'No, cancel!',
                        reverseButtons: true
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // alert(id);
                            // return false;
                            $.ajax({
                                type: "POST",
                                url: "<?= base_url('feedback/deleteAll') ?>",
                                dataType: "json",
                                data: { id },
                                success: function (response) {
                                    if (response.status == 200) {
                                        swal.fire(
                                            'Deleted!',
                                            `${response.message}`,
                                            'success'
                                        );
                                        // If you want to update your table, uncomment the following line:
                                        $('#table-form').load(location.href + " #table-form");
                                    } else if (response.status == 404) {
                                        swal.fire(
                                            'Failed!',
                                            `${response.message}`,
                                            'error'
                                        );
                                    }
                                },
                                error: function (error) {
                                    Swal.fire(
                                        'Failed!',
                                        `${error}`,
                                        'error'
                                    );
                                }
                            });
                        } else if (
                            /* Read more about handling dismissals below */
                            result.dismiss === Swal.DismissReason.cancel
                        ) {
                            swal.fire(
                                'Cancelled',
                                'Your imaginary file is safe :)',
                                'error'
                            )
                        }
                    })
                } else if (response.status == 402) {
                    Swal.fire(
                        'Failed!',
                        `${response.message}`,
                        'error'
                    )
                }
            },
        });

    })
    // End Feedback


    // Custom Datatable
    var table = $('#activity_table').DataTable();


    // #myInput is a <input type="text"> element
    $('#activity_search').on('keyup', function () {
        table.search(this.value).draw();
    });

    $('#activity_table_length').hide();
    $('#activity_table_filter').hide();

    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 2000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })

    // Edit Content Modal
    $(document).on("click", ".editPhotoModal", function () {
        var id = $(this).val();
        $.ajax({
            type: "GET",
            url: "<?= base_url('gallery/editPhotoModal/') ?>" + id,
            dataType: 'json',
            success: function (response) {
                if (response.status == 200) {
                    $("#edit_title").val(response.data.judul);
                    $("#edit_category").val(response.data.id_kategori);
                    $("#id_edit_image").val(response.data.foto);
                    $("#id_edit_content").val(response.data.id_konten);
                    $('#viewImageEdit').attr('src', `<?= base_url('assets/images/galeri/') ?>` +
                        `${id}`);
                    $("#editPhotoModal").modal("show");
                } else if (response.status == 404) {
                    Swal.fire(
                        'Failed!',
                        `${response.message}`,
                        'error'
                    )
                }
            },
            error: function () {
                Swal.fire(
                    'Failed!',
                    'Failed to fetch data!',
                    'error'
                )
            }
        });
    });

    // Edit Content Data
    $("#editPhoto").submit(function (e) {
        e.preventDefault();
        // var formData = $(this).serialize();
        var formData = new FormData(this);
        $.ajax({
            type: "POST",
            url: "<?= base_url('gallery/editPhoto') ?>",
            dataType: "json",
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                if (response.status == 200) {
                    Toast.fire({
                        icon: 'success',
                        title: `${response.message}`
                    })
                    $("#editPhotoModal").modal("hide");
                    $("#content_table").load(location.href + " #content_table");
                } else if (response.status == 422) {
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
                    'Failed to edit photo!',
                    'error'
                );
                console.log(xhr.responseText);
                console.log(status);
                console.log(error);

            }
        });
    });

    // Gallery

    // Logout Modal
    $(document).on('click', '.addPhotoBtn', function () {
        $.ajax({
            type: "GET",
            url: "<?= base_url('gallery/addPhotoModal') ?>",
            dataType: 'json',
            success: function (response) {
                if (response.status == 200) {
                    $("#addPhotoModal").modal("show");
                } else if (response.status == 404) {
                    Swal.fire(
                        'Failed!',
                        `${response.message}`,
                        'error'
                    )
                }
            },
        });
    });

    $("#addPhoto").submit(function (e) {
        e.preventDefault();
        // var formData = $(this).serialize();
        var formData = new FormData(this);
        $.ajax({
            type: "POST",
            url: "<?= base_url('gallery/addPhoto') ?>",
            dataType: "json",
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                if (response.status == 200) {
                    Toast.fire({
                        icon: 'success',
                        title: `${response.message}`
                    })
                    $("#addPhotoModal").modal("hide");
                    $('#content_table').load(location.href + " #content_table");
                } else if (response.status == 422) {
                    Swal.fire(
                        'Failed!',
                        `${response.message}`,
                        'error'
                    )
                    // $("#addContentModal").modal("hide");
                } else if (response.status == 500) {
                    Swal.fire(
                        'Failed!',
                        `${response.message}`,
                        'error'
                    )
                }
            },
            error: function (xhr, status, error) {
                Swal.fire(
                    'Failed!',
                    `Failed!`,
                    'error'
                )
                console.log(xhr.responseText);
                console.log(status);
                console.log(error);

            }
        });
    });

    // Delete Content Modal
    $(document).on("click", ".deletePhotoBtn", function () {
        var id = $(this).val();
        // alert(id);
        // return false;
        $.ajax({
            type: "GET",
            url: "<?= base_url('gallery/deletePhotoModal') ?>" + "/" + id,
            dataType: 'json',
            success: function (response) {
                if (response.status == 200) {
                    $("#id_photo").val(response.data.foto);
                    $("#judul_delete").val(response.data.foto);
                    $("#deletePhotoModal").modal("show");
                } else if (response.status == 404) {
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
                    'Failed To Delete Photo!',
                    'error'
                );
            }
        });
    });

    // Delete Content data
    $("#deletePhoto").submit(function (e) {
        e.preventDefault();
        var id = $("#id_photo").val();
        $.ajax({
            type: "POST",
            url: "<?= base_url('gallery/deletePhoto') ?>",
            dataType: "json",
            data: {
                id
            },
            success: function (response) {
                if (response.status == 200) {
                    $("#deletePhotoModal").modal("hide");
                    Toast.fire({
                        icon: 'success',
                        title: `${response.message}`
                    })
                    // Swal.fire(
                    //     'Success!',
                    //     `${response.message}`,
                    //     'success'
                    // );
                    $("#content_table ").load(location.href + " #content_table");
                } else if (response.status == 422) {
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
                    `Failed to delete photo!`,
                    'error'
                );
                console.log(xhr.responseText);
                console.log(status);
                console.log(error);
            }
        });
    });

    // End Gallery

    // Carousel
    $(document).on('click', '.addCarouselBtn', function () {
        $.ajax({
            type: "GET",
            url: "<?= base_url('carousel/addPhotoModal') ?>",
            dataType: 'json',
            success: function (response) {
                if (response.status == 200) {
                    $("#addCarouselModal").modal("show");
                } else if (response.status == 404) {
                    Swal.fire(
                        'Failed!',
                        `${response.message}`,
                        'error'
                    )
                }
            },
        });
    });

    $("#addCarousel").submit(function (e) {
        e.preventDefault();
        // var formData = $(this).serialize();
        var formData = new FormData(this);
        $.ajax({
            type: "POST",
            url: "<?= base_url('carousel/addPhoto') ?>",
            dataType: "json",
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                if (response.status == 200) {
                    Toast.fire({
                        icon: 'success',
                        title: `${response.message}`
                    })
                    $("#addCarouselModal").modal("hide");
                    $('#content_table').load(location.href + " #content_table");
                    $('#default-carousel').load(location.href + " #default-carousel");
                } else if (response.status == 422) {
                    Swal.fire(
                        'Failed!',
                        `${response.message}`,
                        'error'
                    )
                    // $("#addContentModal").modal("hide");
                } else if (response.status == 500) {
                    Swal.fire(
                        'Failed!',
                        `${response.message}`,
                        'error'
                    )
                }
            },
            error: function (xhr, status, error) {
                Swal.fire(
                    'Failed!',
                    `Failed!`,
                    'error'
                )
                console.log(xhr.responseText);
                console.log(status);
                console.log(error);

            }
        });
    });
    // End Carousel
    
    // Logout Modal
    $(document).on('click', '.logoutBtn', function () {
        $.ajax({
            type: "GET",
            url: "<?= base_url('auth/logoutModal') ?>",
            dataType: 'json',
            success: function (response) {
                if (response.status == 200) {
                    $("#logoutModal").modal("show");
                } else if (response.status == 404) {
                    Swal.fire(
                        'Failed!',
                        `${response.message}`,
                        'error'
                    )
                }
            },
        });
    });

    // Logout
    $('#logout').submit(function (e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "<?= base_url('auth/logout') ?>",
            dataType: 'json',
            success: function (response) {
                if (response.status == 200) {
                    $('#logoutModal').modal("hide");
                    Toast.fire({
                        icon: 'success',
                        title: `${response.message}`
                    });
                    setTimeout(function () {
                        window.location.href = "<?= base_url('auth'); ?>";
                    }, 2000);
                } else if (response.status == 404) {
                    Swal.fire(
                        'Failed!',
                        `${response.message}`,
                        'error'
                    )
                }
            },
        });
    })

    // End Logout

    // User

    // Add User Modal
    $(document).on("click", ".addUserBtn", function () {
        var id = $(this).val();
        $.ajax({
            type: "GET",
            url: "<?= base_url('User/addUserModal') ?>",
            dataType: 'json',
            success: function (response) {
                if (response.status == 200) {
                    $("#addUserModal").modal("show");
                } else if (response.status == 404) {
                    Swal.fire(
                        'Failed!',
                        `${response.message}`,
                        'error'
                    )
                }
            },
            error: function () {
                Swal.fire(
                    'Failed!',
                    'Failed to fetch data!',
                    'error'
                )
            }
        });
    });

    // Add User
    $("#addUser").submit(function (e) {
        e.preventDefault();
        var formData = $(this).serialize();
        $.ajax({
            type: "POST",
            url: "<?= base_url('User/addUser') ?>",
            dataType: "json",
            data: formData,
            success: function (response) {
                if (response.status == 200) {
                    Toast.fire({
                        icon: 'success',
                        title: `${response.message}`
                    })
                    // Swal.fire(
                    //     'Success!',
                    //     `${response.message}`,
                    //     'success'
                    // );
                    $("#addUserModal").modal("hide");
                    // $('#user_table_wrapper').load(location.href + " #user_table_wrapper");
                    $('#user_table').load(location.href + " #user_table");
                } else if (response.status == 422) {
                    Swal.fire(
                        'Failed!',
                        `${response.message}`,
                        'error'
                    )
                } else if (response.status == 500) {
                    Swal.fire(
                        'Failed!',
                        `${response.message}`,
                        'error'
                    )
                }
            },
            error: function (xhr, status, error) {
                Swal.fire(
                    'Failed!',
                    'Gagal Menambah User!',
                    'error'
                )
                console.log(xhr.responseText);
                console.log(status);
                console.log(error);

            }
        });
    });

    // End Add User

    // Edit User

    // Edit User Modal
    $(document).on("click", ".editUserBtn", function () {
        var id = $(this).val();
        $.ajax({
            type: "GET",
            url: "<?= base_url('User/editUserModal') ?>" + "/" + id,
            dataType: 'json',
            success: function (response) {
                if (response.status == 200) {
                    $("#id").val(response.data.id);
                    $("#name").val(response.data.name);
                    $("#email").val(response.data.email);
                    $('#role').val(response.data.role_id);
                    $("#editUserModal").modal("show");
                } else if (response.status == 404) {
                    Swal.fire(
                        'Failed!',
                        `${response.message}`,
                        'error'
                    )
                }
            },
            error: function () {
                Swal.fire(
                    'Failed!',
                    'Failed to fetch data!',
                    'error'
                )
            }
        });
    });

    // Edit User Data
    $("#editUser").submit(function (e) {
        e.preventDefault();
        var formData = $(this).serialize();
        $.ajax({
            type: "POST",
            url: "<?= base_url('User/editUser') ?>",
            dataType: "json",
            data: formData,
            success: function (response) {
                if (response.status == 200) {
                    Swal.fire(
                        'Success!',
                        `${response.message}`,
                        'success'
                    );
                    $("#editUserModal").modal("hide");
                    $("#user_table").load(location.href + " #user_table");
                } else if (response.status == 422) {
                    alertify.error(response.message);
                }
            },
            error: function (xhr, status, error) {
                alertify.error("Error: Gagal mengedit data user!");
                console.log(xhr.responseText);
                console.log(status);
                console.log(error);

            }
        });
    });

    // End Edit User

    // Delete User

    // Delete User Modal
    $(document).on("click", ".deleteUserBtn", function () {
        var id = $(this).val();
        // alert(id);
        // return false;
        $.ajax({
            type: "GET",
            url: "<?= base_url('User/deleteUserModal') ?>" + "/" + id,
            dataType: 'json',
            success: function (response) {
                if (response.status == 200) {
                    $("#id_delete").val(response.data.id);
                    $("#deleteUserModal").modal("show");
                } else if (response.status == 404) {
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
                    'Failed To Update User!',
                    'error'
                );
            }
        });
    });


    // Delete User data
    $("#deleteUser").submit(function (e) {
        e.preventDefault();
        var id = $("#id_delete").val();


        $.ajax({
            type: "POST",
            url: "<?= base_url('User/deleteUser') ?>",
            dataType: "json",
            data: {
                id: id
            },
            success: function (response) {
                if (response.status == 200) {
                    $("#deleteUserModal").modal("hide");
                    Toast.fire({
                        icon: 'success',
                        title: `${response.message}`
                    })
                    // Swal.fire(
                    //     'Success!',
                    //     `${response.message}`,
                    //     'success'
                    // );
                    $("#user_table ").load(location.href + " #user_table");
                } else if (response.status == 422) {
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
                    `Can't Delete User!`,
                    'error'
                );
                console.log(xhr.responseText);
                console.log(status);
                console.log(error);
            }
        });
    });

    // End User

    // Category

    // Add Category Modal
    $(document).on("click", ".addCategoryBtn", function () {
        $.ajax({
            type: "GET",
            url: "<?= base_url('Category/addCategoryModal') ?>",
            dataType: 'json',
            success: function (response) {
                if (response.status == 200) {
                    $("#addCategoryModal").modal("show");
                } else if (response.status == 404) {
                    Swal.fire(
                        'Failed!',
                        `${response.message}`,
                        'error'
                    )
                }
            },
            error: function () {
                Swal.fire(
                    'Failed!',
                    'Failed to fetch data!',
                    'error'
                )
            }
        });
    });

    // Add Category
    $("#addCategory").submit(function (e) {
        e.preventDefault();
        var formData = $(this).serialize();
        $.ajax({
            type: "POST",
            url: "<?= base_url('Category/addCategory') ?>",
            dataType: "json",
            data: formData,
            success: function (response) {
                if (response.status == 200) {
                    Toast.fire({
                        icon: 'success',
                        title: `${response.message}`
                    })
                    $("#addCategoryModal").modal("hide");
                    $('#category_table').load(location.href + " #category_table");
                } else if (response.status == 402) {
                    Swal.fire(
                        'Failed!',
                        `${response.message}`,
                        'error'
                    )
                } else if (response.status == 422) {
                    Swal.fire(
                        'Failed!',
                        `${response.message}`,
                        'error'
                    )
                } else if (response.status == 500) {
                    Swal.fire(
                        'Failed!',
                        `${response.message}`,
                        'error'
                    )
                }
            },
            error: function (xhr, status, error) {
                alertify.error("Error: Failed to add category!");
                console.log(xhr.responseText);
                console.log(status);
                console.log(error);

            }
        });
    });


    // Edit Category Modal
    $(document).on("click", ".editCategoryBtn", function () {
        var id = $(this).val();
        $.ajax({
            type: "GET",
            url: "<?= base_url('Category/editCategoryModal') ?>" + "/" + id,
            dataType: 'json',
            success: function (response) {
                if (response.status == 200) {
                    $("#id").val(response.data.id_kategori);
                    $("#name").val(response.data.nama_kategori);
                    $("#editCategoryModal").modal("show");
                } else if (response.status == 404) {
                    Swal.fire(
                        'Failed!',
                        `${response.message}`,
                        'error'
                    )
                }
            },
            error: function () {
                Swal.fire(
                    'Failed!',
                    'Failed to fetch data!',
                    'error'
                )
            }
        });
    });

    // Edit Category Data
    $("#editCategory").submit(function (e) {
        e.preventDefault();
        var formData = $(this).serialize();
        $.ajax({
            type: "POST",
            url: "<?= base_url('Category/editCategory') ?>",
            dataType: "json",
            data: formData,
            success: function (response) {
                if (response.status == 200) {
                    Toast.fire({
                        icon: 'success',
                        title: `${response.message}`
                    })
                    $("#editCategoryModal").modal("hide");
                    $("#category_table").load(location.href + " #category_table");
                } else if (response.status == 422) {
                    alertify.error(response.message);
                }
            },
            error: function (xhr, status, error) {
                alertify.error("Error: Gagal mengedit data category!");
                console.log(xhr.responseText);
                console.log(status);
                console.log(error);

            }
        });
    });

    // Delete Category Modal
    $(document).on("click", ".deleteCategoryBtn", function () {
        var id = $(this).val();
        // alert(id);
        // return false;
        $.ajax({
            type: "GET",
            url: "<?= base_url('Category/deleteCategoryModal') ?>" + "/" + id,
            dataType: 'json',
            success: function (response) {
                if (response.status == 200) {
                    $("#id_delete").val(response.data.id_kategori);
                    $("#deleteCategoryModal").modal("show");
                } else if (response.status == 404) {
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
                    'Failed To Delete Category!',
                    'error'
                );
            }
        });
    });

    // Delete Category data
    $("#deleteCategory").submit(function (e) {
        e.preventDefault();
        var id = $("#id_delete").val();


        $.ajax({
            type: "POST",
            url: "<?= base_url('Category/deleteCategory') ?>",
            dataType: "json",
            data: {
                id: id
            },
            success: function (response) {
                if (response.status == 200) {
                    $("#deleteCategoryModal").modal("hide");
                    Toast.fire({
                        icon: 'success',
                        title: `${response.message}`
                    })
                    // Swal.fire(
                    //     'Success!',
                    //     `${response.message}`,
                    //     'success'
                    // );
                    $("#category_table ").load(location.href + " #category_table");
                } else if (response.status == 422) {
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
                    `Failed to delete category!`,
                    'error'
                );
                console.log(xhr.responseText);
                console.log(status);
                console.log(error);
            }
        });
    });

    // No Refresh Page
    // $(document).on('click', '#profileBtn', function () {
    //     $('#app').load("user/profile");
    // });
    $(document).on('click', '#editUserProfileBtn', function () {
        $('#userProfile').load("<?= base_url('Profile/UserProfile') ?>");
    });
    $(document).on('click', '#aboutUserProfileBtn', function () {
        $('#userProfile').load("<?= base_url('Profile/aboutUserProfile') ?>");
    });
    $(document).on('click', '#changeUserProfilePasswordBtn', function () {
        $('#userProfile').load("<?= base_url('Profile/changePassword') ?>");
    });


    // End Category

    // Content

    // View Image Modal Trigger
    $(document).on('click', '.viewImageBtn', function (e) {
        e.preventDefault();
        var id = $(this).val();
        // var img = $('#viewImage').attr('src');
        // alert(img);
        // return false;
        $.ajax({
            type: "GET",
            url: "<?= base_url('Content/viewImage/') ?>" + id,
            dataType: 'json',
            success: function (response) {
                if (response.status == 200) {
                    $("#viewImageModal").modal("show");
                    $('#viewImage').attr('src', `<?= base_url('assets/images/konten/') ?>` + `${id}`);
                } else if (response.status == 404) {
                    Swal.fire(
                        'Failed!',
                        `${response.message}`,
                        'error'
                    )
                }
            },
            error: function () {
                Swal.fire(
                    'Failed!',
                    'Failed to fetch data!',
                    'error'
                )
            }
        });
    });

    // Add Content Modal
    $(document).on("click", ".addContentBtn", function () {
        $.ajax({
            type: "GET",
            url: "<?= base_url('Content/addContentModal') ?>",
            dataType: 'json',
            success: function (response) {
                if (response.status == 200) {
                    $("#addContentModal").modal("show");
                } else if (response.status == 404) {
                    Swal.fire(
                        'Failed!',
                        `${response.message}`,
                        'error'
                    )
                }
            },
            error: function () {
                Swal.fire(
                    'Failed!',
                    'Failed to fetch data!',
                    'error'
                )
            }
        });
    });

    // Add Content
    $("#addContent").submit(function (e) {
        e.preventDefault();
        // var formData = $(this).serialize();
        var formData = new FormData(this);
        $.ajax({
            type: "POST",
            url: "<?= base_url('Content/addContent') ?>",
            dataType: "json",
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                if (response.status == 200) {
                    Toast.fire({
                        icon: 'success',
                        title: `${response.message}`
                    })
                    $("#addContentModal").modal("hide");
                    $('#content_table').load(location.href + " #content_table");
                } else if (response.status == 422) {
                    Swal.fire(
                        'Failed!',
                        `${response.message}`,
                        'error'
                    )
                    // $("#addContentModal").modal("hide");
                } else if (response.status == 500) {
                    Swal.fire(
                        'Failed!',
                        `${response.message}`,
                        'error'
                    )
                }
            },
            error: function (xhr, status, error) {
                Swal.fire(
                    'Failed!',
                    `Failed!`,
                    'error'
                )
                console.log(xhr.responseText);
                console.log(status);
                console.log(error);

            }
        });
    });

    // Edit Content Modal
    $(document).on("click", ".editContentBtn", function () {
        var id = $(this).val();
        $.ajax({
            type: "GET",
            url: "<?= base_url('Content/editContentModal') ?>" + "/" + id,
            dataType: 'json',
            success: function (response) {
                if (response.status == 200) {
                    $("#edit_title").val(response.data.judul);
                    $("#edit_description").summernote("code", response.data.keterangan);
                    $("#edit_category").val(response.data.id_kategori);
                    $("#id_edit_image").val(response.data.foto);
                    $("#id_edit_content").val(response.data.id_konten);
                    $('#viewImageEdit').attr('src', `<?= base_url('assets/images/konten/') ?>` +
                        `${id}`);
                    // document.getElementById('img_edit').innerText = id;
                    $("#editContentModal").modal("show");
                } else if (response.status == 404) {
                    Swal.fire(
                        'Failed!',
                        `${response.message}`,
                        'error'
                    )
                }
            },
            error: function () {
                Swal.fire(
                    'Failed!',
                    'Failed to fetch data!',
                    'error'
                )
            }
        });
    });

    // Edit Content Data
    $("#editContent").submit(function (e) {
        e.preventDefault();
        // var formData = $(this).serialize();
        var formData = new FormData(this);
        $.ajax({
            type: "POST",
            url: "<?= base_url('Content/editContent') ?>",
            dataType: "json",
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                if (response.status == 200) {
                    Toast.fire({
                        icon: 'success',
                        title: `${response.message}`
                    })
                    $("#editContentModal").modal("hide");
                    $('#content_table').load(location.href + " #content_table");
                } else if (response.status == 422) {
                    Swal.fire(
                        'Failed!',
                        `${response.message}`,
                        'error'
                    )
                    // $("#addContentModal").modal("hide");
                } else if (response.status == 500) {
                    Swal.fire(
                        'Failed!',
                        `${response.message}`,
                        'error'
                    )
                }
            },
            error: function (xhr, status, error) {
                Swal.fire(
                    'Error!',
                    'Failed to edit content!',
                    'error'
                );
                console.log(xhr.responseText);
                console.log(status);
                console.log(error);

            }
        });
    });

    // Change Photo
    $(document).on('change', '.changePhoto', function () {
        const file = this.files[0];
        console.log(file);
        if (file) {
            let reader = new FileReader();
            reader.onload = function (event) {
                console.log(event.target.result);
                $('#viewImageEdit').attr('src', event.target.result);
            }
            reader.readAsDataURL(file);
        }
    });

    // Delete Content Modal
    $(document).on("click", ".deleteContentBtn", function () {
        var id = $(this).val();
        // alert(id);
        // return false;
        $.ajax({
            type: "GET",
            url: "<?= base_url('Content/deleteContentModal') ?>" + "/" + id,
            dataType: 'json',
            success: function (response) {
                if (response.status == 200) {
                    $("#id_delete").val(response.data.foto);
                    $("#judul_delete").val(response.data.foto);
                    $("#deleteContentModal").modal("show");
                } else if (response.status == 404) {
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
                    'Failed To Delete Content!',
                    'error'
                );
            }
        });
    });

    // Delete Content data
    $("#deleteContent").submit(function (e) {
        e.preventDefault();
        var id = $("#id_delete").val();


        $.ajax({
            type: "POST",
            url: "<?= base_url('Content/deleteContent') ?>",
            dataType: "json",
            data: {
                id: id
            },
            success: function (response) {
                if (response.status == 200) {
                    $("#deleteContentModal").modal("hide");
                    Toast.fire({
                        icon: 'success',
                        title: `${response.message}`
                    })
                    // Swal.fire(
                    //     'Success!',
                    //     `${response.message}`,
                    //     'success'
                    // );
                    $("#content_table ").load(location.href + " #content_table");
                } else if (response.status == 422) {
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
                    `Failed to delete content!`,
                    'error'
                );
                console.log(xhr.responseText);
                console.log(status);
                console.log(error);
            }
        });
    });



    // End Content

    // Configuration
    // Delete Content data
    $("#configForm").submit(function (e) {
        e.preventDefault();
        var formData = $(this).serialize();
        $.ajax({
            type: "POST",
            url: "<?= base_url('Configuration/addConfig') ?>",
            dataType: "json",
            data: formData,
            success: function (response) {
                if (response.status == 200) {
                    Toast.fire({
                        icon: 'success',
                        title: `${response.message}`
                    })
                    $("#configForm ").load(location.href + " #configForm");
                } else if (response.status == 422) {
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
                    `Failed!`,
                    'error'
                );
                console.log(xhr.responseText);
                console.log(status);
                console.log(error);
            }
        });
    });
    // End Configuration

</script>

<!-- END: JS Assets-->
</body>

</html>