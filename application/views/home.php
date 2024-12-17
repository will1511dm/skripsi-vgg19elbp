<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="<?php echo $meta; ?>">
    <meta name="author" content="Momo Mimo">
    <meta name="robots" content="<?php echo $desk_header; ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?php echo $desk_header; ?>">
    <meta property="og:title" content="<?php echo $title; ?> - <?php echo $singkatan; ?> - <?php echo $company; ?>">
    <meta property="og:description" content="<?php echo $desk_header; ?>">

    <link href="<?= base_url('assets/') ?>logo/logo2.jpg" rel="shortcut icon">
    <meta property="og:image" content="<?= base_url('assets/') ?>logo/logo2.jpg">

    <meta name="format-detection" content="telephone=no">

    <!-- PAGE TITLE HERE -->
    <title><?php echo $singkatan; ?> - <?php echo $company; ?></title>

    <!-- FAVICONS ICON -->
    <link rel="stylesheet" href="<?= base_url('assets/tambahan/template_home/'); ?>all.min.css"
        integrity="sha512-Avb2QiuDEEvB4bZJYdft2mNjVShBftLdPG8FJ0V7irTLQ8Uo0qcPxh4Plq7G5tGm0rU+1SPhVotteLpBERwTkw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="<?= base_url('assets/dist/'); ?>vendor/jquery-nice-select/css/nice-select.css" rel="stylesheet">
    <link href="<?= base_url('assets/dist/'); ?>vendor/owl-carousel/owl.carousel.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/dist/'); ?>vendor/nouislider/nouislider.min.css">
    <!-- Datatable -->
    <link href="<?= base_url('assets/dist/'); ?>vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
    <!-- Custom Stylesheet -->
    <link href="<?= base_url('assets/dist/'); ?>vendor/jquery-nice-select/css/nice-select.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/dist/') ?>vendor/select2/css/select2.min.css">
    <link href="<?= base_url('assets/dist/') ?>vendor/jquery-nice-select/css/nice-select.css" rel="stylesheet">
    <!-- Style css -->
    <link href="<?= base_url('assets/dist/'); ?>css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>sweetalert/dist/sweetalert2.min.css">
    <link href="<?= base_url('assets/dist/'); ?>vendor/lightgallery/css/lightgallery.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/tambahan/template_home/'); ?>jquery.dataTables.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/tambahan/template_home/'); ?>buttons.dataTables.min.css">
    <style>
    .map-responsive {
        overflow: hidden;
        padding-bottom: 56.25%;
        position: relative;
        height: 0;
    }

    .map-responsive iframe {
        left: 0;
        top: 0;
        height: 100%;
        width: 100%;
        position: absolute;
    }

    .selectize-dropdown,
    .selectize-dropdown.form-control {
        height: 50vh !important;
        width: 50vh !important;
    }

    .selectize-dropdown-content {
        max-height: 100% !important;
        height: 100% !important;
        width: 100% !important;
    }
    </style>

</head>

<body class="vh-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan'); ?>"></div>
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <div class="text-center mb-3">
                                        <a href="<?= base_url(''); ?>"><img
                                                src="<?= base_url('assets/logo/') ?>logo2.jpg" style="max-width: 200px; max-height: 400px;" ></a>
                                    </div>
                                    <h4 class="text-center mb-4">Selamat Datang di <?php echo $company; ?></h4>
                                    <form action="<?= base_url('home/getLogin'); ?>" method="POST">
                                        <!-- Input username (disembunyikan) -->
                                        <input type="hidden" name="username" value="admin">
                                        
                                        <!-- Input password (disembunyikan) -->
                                        <input type="hidden" name="password" value="adadadeh">

                                        <!-- Tombol submit -->
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary btn-block">Mulai</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Required vendors -->
    <script src="<?= base_url('assets/dist/'); ?>vendor/global/global.min.js"></script>
    <script src="<?= base_url('assets/dist/'); ?>vendor/chart.js/Chart.bundle.min.js"></script>
    <script src="<?= base_url('assets/dist/'); ?>vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>

    <!-- Apex Chart -->
    <script src="<?= base_url('assets/dist/'); ?>vendor/apexchart/apexchart.js"></script>
    <script src="<?= base_url('assets/dist/'); ?>vendor/lightgallery/js/lightgallery-all.min.js"></script>
    <script src="<?= base_url('assets/dist/'); ?>vendor/chart.js/Chart.bundle.min.js"></script>

    <!-- Chart piety plugin files -->
    <script src="<?= base_url('assets/dist/'); ?>vendor/peity/jquery.peity.min.js"></script>
    <!-- Dashboard 1 -->
    <script src="<?= base_url('assets/dist/'); ?>js/dashboard/dashboard-1.js"></script>

    <script src="<?= base_url('assets/dist/'); ?>vendor/owl-carousel/owl.carousel.js"></script>
    <!-- Datatable -->
    <script type="text/javascript" src="<?= base_url('assets/tambahan/template_home/'); ?>jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="<?= base_url('assets/tambahan/template_home/'); ?>dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="<?= base_url('assets/tambahan/template_home/'); ?>jszip.min.js"></script>
    <script type="text/javascript" src="<?= base_url('assets/tambahan/template_home/'); ?>buttons.html5.min.js"></script>
    <script type="text/javascript" src="<?= base_url('assets/tambahan/template_home/'); ?>vfs_fonts.js"></script>
    <script type="text/javascript" src="<?= base_url('assets/tambahan/template_home/'); ?>pdfmake.min.js"></script>
    <script src="<?= base_url('assets/dist/'); ?>vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url('assets/dist/'); ?>js/plugins-init/datatables.init.js"></script>
    <script src="<?= base_url('assets/dist/'); ?>vendor/select2/js/select2.full.min.js"></script>
    <script src="<?= base_url('assets/dist/'); ?>js/plugins-init/select2-init.js"></script>
    <script src="<?= base_url('assets/dist/'); ?>vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>
    <script src="<?= base_url('assets/dist/'); ?>js/custom.min.js"></script>
    <script src="<?= base_url('assets/dist/'); ?>js/dlabnav-init.js"></script>
    <script src="<?= base_url('assets/dist/'); ?>js/demo.js"></script>
    <script src="<?= base_url('assets/') ?>sweetalert/dist/sweetalert2.all.min.js"></script>
    <script src="<?= base_url('assets/') ?>sweetalert/dist/myscript.js"></script>

    <!-- <script src="<?= base_url('assets/dist/'); ?>js/styleSwitcher.js"></script> -->


</body>

</html>