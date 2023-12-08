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
    <!-- <link href="dist/images/logo.svg" rel="shortcut icon"> -->
    <link rel="icon" type="image/x-icon" href="<?= base_url('assets') ?>/images/smkn2kra-removebg-preview.png">
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
    <link rel="stylesheet" href="<?= base_url('assets/') ?>dist/css/app.css" />
    <link rel="stylesheet" href="<?= base_url('node_modules/') ?>sweetalert2/dist/sweetalert2.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <style>
        :root {
            ::-webkit-scrollbar {
                height: 10px;
                width: 10px
            }

            ::-webkit-scrollbar-track {
                background: #efefef;
                border-radius: 6px
            }

            ::-webkit-scrollbar-thumb {
                background: #d5d5d5;
                border-radius: 6px
            }

            ::-webkit-scrollbar-thumb:hover {
                background: #c4c4c4
            }
        }

        body {
            overflow-y: hidden;
        }
    </style>
    <!-- END: CSS Assets-->
</head>
<!-- END: Head -->

<body class="login">
    <?php if ($this->session->flashdata('message')): ?>
        <script>
            Swal.fire(
                'Success!',
                "<?= $this->session->flashdata('message') ?>",
                'success'
            );
        </script>
    <?php endif; ?>