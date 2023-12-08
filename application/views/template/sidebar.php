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