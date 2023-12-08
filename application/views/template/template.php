<!DOCTYPE html>
<!--
Template Name: Midone - HTML Admin Dashboard Template
Author: Left4code
Website: http://www.left4code.com/
Contact: muhammadrizki@left4code.com
Purchase: https://themeforest.net/user/left4code/portfolio
Renew Support: https://themeforest.net/user/left4code/portfolio
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="en">
<!-- BEGIN: Head -->

<head>
    <meta charset="utf-8">
    <link href="<?= base_url('assets/'); ?>dist/images/logo.svg" rel="shortcut icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
        content="Midone admin is super flexible, powerful, clean & modern responsive tailwind admin template with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, Midone admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="LEFT4CODE">
    <title>
        <?= $title; ?>
    </title>
    <!-- BEGIN: CSS Assets-->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>dist/css/app.css" />
    <link rel="stylesheet" href="<?= base_url('node_modules/') ?>sweetalert2/dist/sweetalert2.min.css">
    



    <style>
        /* Hide scrollbar for Chrome, Safari and Opera */
        .app::-webkit-scrollbar {
            display: none;
        }

        /* Hide scrollbar for IE, Edge and Firefox */
        .app {
            -ms-overflow-style: none;
            /* IE and Edge */
            scrollbar-width: none;
            /* Firefox */
        }
    </style>
    <!-- END: CSS Assets-->
</head>
<!-- END: Head -->

<body class="app" id="app">
<?php

$menu = $this->uri->segment(1);

?>

<!-- BEGIN: Mobile Menu -->
<div class="mobile-menu md:hidden">
    <div class="mobile-menu-bar">
        <a href="" class="flex mr-auto">
            <img alt="Midone Tailwind HTML Admin Template" class="w-6"
                src="<?= base_url('assets/') ?>dist/images/logo.svg">
        </a>
        <a href="javascript:;" id="mobile-menu-toggler"> <i data-feather="bar-chart-2"
                class="w-8 h-8 text-white transform -rotate-90"></i> </a>
    </div>
    <ul class="border-t border-theme-24 py-5 hidden">
        <li>
            <a href="<?= base_url('admin') ?>" class="menu <?php if ($menu == "admin") {
                  echo "menu--active";
              } ?>">
                <div class="menu__icon"> <i data-feather="home"></i></div>
                <div class="menu__title"> Dashboard </div>
            </a>
        </li>
        <li>
            <a href="<?= base_url('carousel') ?>" class="menu <?php if ($menu == "carousel") {
                  echo "menu--active";
              } ?>">
                <div class="menu__icon"> <i data-feather="sidebar"></i></div>
                <div class="menu__title"> Carousel </div>
            </a>
        </li>
        <li>
            <a href="<?= base_url('category') ?>" class="menu <?php if ($menu == "category") {
                  echo "menu--active";
              } ?>">
                <div class=" menu__icon"> <i data-feather="file-text"></i></div>
                <div class="menu__title"> Category </div>
            </a>
        </li>
        <li>
            <a href="<?= base_url('content') ?>" class="menu <?php if ($menu == "category") {
                  echo "menu--active";
              } ?>">
                <div class=" menu__icon"> <i data-feather="layout"></i></div>
                <div class="menu__title"> Content </div>
            </a>
        </li>
        <?php if ($admin['role_id'] == 1) { ?>
                                                                                                    <li>
                                                                                                        <a href="<?= base_url('user') ?>" class="menu <?php if ($menu == "user") {
                                                                                                              echo "menu--active";
                                                                                                          } ?>">
                                                                                                            <div class=" menu__icon"> <i data-feather="user"></i></div>
                                                                                                            <div class="menu__title"> User </div>
                                                                                                        </a>
                                                                                                    </li>
                                                                                                    <li>
                                                                                                        <a href="<?= base_url('activity') ?>" class="menu <?php if ($menu == "activity") {
                                                                                                              echo "menu--active";
                                                                                                          } ?>">
                                                                                                            <div class=" menu__icon"> <i data-feather="activity"></i></div>
                                                                                                            <div class="menu__title"> Activity </div>
                                                                                                        </a>
                                                                                                    </li>
                                                                                                    <li>
                                                                                                        <a href="<?= base_url('feedback') ?>" class="menu <?php if ($menu == "feedback") {
                                                                                                              echo "menu--active";
                                                                                                          } ?>">
                                                                                                            <div class="menu__icon"> <i data-feather="send"></i></div>
                                                                                                            <div class="menu__title"> Feedback </div>
                                                                                                        </a>
                                                                                                    </li>
        <?php } ?>
        <li>
            <a href="<?= base_url('gallery') ?>" class="menu <?php if ($menu == "gallery") {
                  echo "menu--active";
              } ?>">
                <div class="menu__icon"> <i data-feather="layers"></i></div>
                <div class="menu__title"> Gallery </div>
            </a>
        </li>
        <li>
            <a href="<?= base_url('configuration') ?>" class="menu <?php if ($menu == "configuration") {
                  echo "menu--active";
              } ?>">
                <div class=" menu__icon"> <i data-feather="settings"> </i></div>
                <div class="menu__title"> Configuration </div>
            </a>
        </li>

    </ul>
</div>
<!-- END: Mobile Menu -->
<div class="flex">
    <!-- BEGIN: Side Menu -->
    <nav class="side-nav">
        <a href="" class="intro-x flex items-center pl-5 pt-4">
            <img alt="Midone Tailwind HTML Admin Template" class="w-6"
                src="<?= base_url('assets/') ?>dist/images/logo.svg">
            <span class="hidden xl:block text-white text-lg ml-3"> Admin<span class="font-medium">CMS</span> </span>
        </a>
        <div class="side-nav__devider my-6"></div>
        <ul>
            <li>
                <a href="<?= base_url('admin') ?>" id="dashboardBtn" class="side-menu <?php if ($menu == "admin") {
                      echo "side-menu--active";
                  } ?>">
                    <div class="side-menu__icon"> <i data-feather="home"></i></div>
                    <div class="side-menu__title"> Dashboard </div>
                </a>
            </li>
            <li>
                <a href="<?= base_url('carousel') ?>" class="side-menu <?php if ($menu == "carousel") {
                      echo "side-menu--active";
                  } ?>">
                    <div class=" side-menu__icon"> <i data-feather="sidebar"></i></div>
                    <div class="side-menu__title"> Carousel </div>
                </a>
            </li>
            <li>
                <a href="<?= base_url('content') ?>" class="side-menu <?php if ($menu == "content") {
                      echo "side-menu--active";
                  } ?>">
                    <div class=" side-menu__icon"> <i data-feather="layout"></i></div>
                    <div class="side-menu__title"> Content </div>
                </a>
            </li>
            <li>
                <a href="<?= base_url('category') ?>" class="side-menu <?php if ($menu == "category") {
                      echo "side-menu--active";
                  } ?>">
                    <div class=" side-menu__icon"> <i data-feather="file-text"></i></div>
                    <div class="side-menu__title"> Category </div>
                </a>
            </li>
            <?php if ($admin['role_id'] == 1) { ?>
                            <li>
                                <a href="<?= base_url('user') ?>" class="side-menu <?php if ($menu == "user") {
                                      echo "side-menu--active";
                                  } ?>">
                                    <div class=" side-menu__icon"> <i data-feather="user"></i></div>
                                    <div class="side-menu__title"> User </div>
                                </a>
                            </li>
                            <li>
                                <a href="<?= base_url('activity') ?>" class="side-menu <?php if ($menu == "activity") {
                                      echo "side-menu--active";
                                  } ?>">
                                    <div class=" side-menu__icon"> <i data-feather="activity"></i></div>
                                    <div class="side-menu__title"> Activity </div>
                                </a>
                            </li>
                            <li>
                                <a href="<?= base_url('feedback') ?>" class="side-menu <?php if ($menu == "feedback") {
                                      echo "side-menu--active";
                                  } ?>">
                                    <div class=" side-menu__icon"> <i data-feather="send"></i></div>
                                    <div class="side-menu__title"> Feedback </div>
                                </a>
                            </li>
            <?php } ?>
            <li>
                <a href="<?= base_url('gallery') ?>" class="side-menu <?php if ($menu == "gallery") {
                      echo "side-menu--active";
                  } ?>">
                    <div class="side-menu__icon"> <i data-feather="layers"></i></div>
                    <div class="side-menu__title"> Gallery </div>
                </a>
            </li>
            <li>
                <a href="<?= base_url('configuration') ?>" class="side-menu <?php if ($menu == "configuration") {
                      echo "side-menu--active";
                  } ?>">
                    <div class="side-menu__icon"> <i data-feather="settings"></i></div>
                    <div class="side-menu__title"> Configuration </div>
                </a>
            </li>


        </ul>
    </nav>
    <!-- END: Side Menu -->
    <?php

    $segment2 = $this->uri->segment(2);
    $segment1 = $this->uri->segment(1);

    ?>
<!-- BEGIN: Content -->
<div class="content">
    <!-- BEGIN: Top Bar -->
    <div class="top-bar">
        <!-- BEGIN: Breadcrumb -->
        <div class="-intro-x breadcrumb mr-auto sm:flex">
            <a href="<?= base_url('admin'); ?>" class="">Admin</a>
            <i data-feather="chevron-right" class="breadcrumb__icon"></i>
            <a href="<?= base_url($segment1); ?>" class="breadcrumb--active">
                <?= $segment1; ?>
            </a>
            <?php if (isset($segment2)): ?>
                            <i data-feather="chevron-right" class="breadcrumb__icon"></i>
                            <a href="<?= base_url($segment2); ?>" class="breadcrumb--active">
                                <?= $segment2; ?>
                            </a>
            <?php endif; ?>
        </div>
        <!-- END: Breadcrumb -->

        <!-- BEGIN: Account Menu -->
        <div class="intro-x dropdown w-8 h-8 relative">
            <div class="dropdown-toggle w-8 h-8 rounded-full overflow-hidden shadow-lg image-fit zoom-in">
                <img alt="Profile" src="<?= base_url('assets/images/profile/') . $admin['image'] ?>" />
            </div>
            <div class="dropdown-box mt-10 absolute w-56 top-0 right-0 z-20">
                <div class="dropdown-box__content box bg-theme-38 text-white">
                    <div class="p-4 border-b border-theme-40">
                        <div class="font-medium">
                            <?= $admin['name']; ?>
                        </div>
                    </div>
                    <div class="p-2">
                        <a href="<?= base_url('profile') ?>"
                            class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 rounded-md">
                            <i data-feather="user" class="w-4 h-4 mr-2"></i> Profile
                        </a>
                        <a href=""
                            class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 rounded-md">
                            <i data-feather="lock" class="w-4 h-4 mr-2"></i> Reset Password
                        </a>
                    </div>
                    <div class="p-2 border-t border-theme-40">
                        <a
                            class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 rounded-md logoutBtn">
                            <i data-feather="toggle-right" class="w-4 h-4 mr-2"></i> Logout
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- END: Account Menu -->
    </div>
    <!-- END: Top Bar -->
    <?= $contents ?>

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
<!-- <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script> -->
<script src="<?= base_url('node_modules/') ?>jquery-ajax\jquery.min.js"></script>
<script src="<?= base_url('node_modules/') ?>sweetalert2/dist/sweetalert2.min.js"></script>
<!-- <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script> -->
<script src="<?= base_url('assets/') ?>dist/js/app.js"></script>



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
                // console.log(event.target.result);
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
                    $("#edit_description").val(response.data.keterangan);
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