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