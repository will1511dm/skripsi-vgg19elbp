<!DOCTYPE html>
<html lang="en">

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
    <title><?php echo $title; ?> - <?php echo $singkatan; ?> - <?php echo $company; ?></title>

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
    <script src="<?= base_url('assets/tambahan/template_home/'); ?>jquery-3.6.4.min.js"></script>
    <style>
    .page-titles .breadcrumb li.active a {
        color: #2c9b7b;
    }

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
    
    <style>
    body {
        background-image: url('<?= base_url("assets/mineral/bg_edit.png"); ?>');
        background-size: cover; /* Ensure the image covers the entire background */
        background-position: center; /* Center the image */
        background-repeat: no-repeat; /* Avoid repeating the image */
        background-attachment: fixed; /* Make the background fixed on scroll */
    }
</style>
</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="lds-ripple">
            <div></div>
            <div></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">
        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan'); ?>"></div>
        <?php if ($this->uri->segment(1) == "karyawan" || $this->uri->segment(1) == "") : ?>
        <?php $this->load->view('template/mobile'); ?>
        <?php else : ?>
        <?php $this->load->view('template/header'); ?>
        <!--**********************************
            Sidebar start
        ***********************************-->
        <?php $this->load->view('template/menu'); ?>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <?php endif; ?>
        <!--**********************************
            Content body start
        ***********************************-->
        <?php $this->load->view($konten); ?>
        <!--**********************************
            Content body end
        ***********************************-->




        <!--**********************************
            Footer start
        ***********************************-->
        <?php $this->load->view('template/footer'); ?>
        <!--**********************************
            Footer end
        ***********************************-->

        <!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
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

    <script type="text/javascript">
    var rupiah = document.getElementById('rupiah');
    rupiah.addEventListener('keyup', function(e) {
        // tambahkan 'Rp.' pada saat form di ketik
        // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
        rupiah.value = formatRupiah(this.value, 'Rp. ');
    });

    var editrupiah = document.getElementById('editrupiah');
    editrupiah.addEventListener('keyup', function(e) {
        // tambahkan 'Rp.' pada saat form di ketik
        // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
        editrupiah.value = formatRupiah(this.value, 'Rp. ');
    });
    var modalrupiah = document.getElementById('modalrupiah');
    modalrupiah.addEventListener('keyup', function(e) {
        // tambahkan 'Rp.' pada saat form di ketik
        // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
        modalrupiah.value = formatRupiah(this.value, 'Rp. ');
    });
    /* Fungsi formatRupiah */
    function formatRupiah(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        // tambahkan titik jika yang di input sudah menjadi angka ribuan
        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }
    </script>
    <script>
    function cardsCenter() {

        /*  testimonial one function by = owl.carousel.js */



        jQuery('.card-slider').owlCarousel({
            loop: true,
            margin: 0,
            nav: true,
            //center:true,
            slideSpeed: 3000,
            paginationSpeed: 3000,
            dots: true,
            navText: ['<i class="fas fa-arrow-left"></i>', '<i class="fas fa-arrow-right"></i>'],
            responsive: {
                0: {
                    items: 1
                },
                576: {
                    items: 1
                },
                800: {
                    items: 1
                },
                991: {
                    items: 1
                },
                1200: {
                    items: 1
                },
                1600: {
                    items: 1
                }
            }
        })
    }

    jQuery(window).on('load', function() {
        setTimeout(function() {
            cardsCenter();
        }, 1000);
    });
    </script>

    <script>
    var timeLeft = <?php echo $exam_time; ?>;
    var currentQuestion = 0;
    var questions = $('.question');

    function goToQuestion(questionNumber) {
        hideQuestion();
        showQuestion(questionNumber - 1);
        currentQuestion = questionNumber - 1;
    }

    function showQuestion(index) {
        questions.eq(index).fadeIn(50);
    }

    function hideQuestion() {
        $('.question').hide();
    }

    function nextQuestion() {
        hideQuestion();
        currentQuestion = (currentQuestion + 1) % <?php echo count($questions); ?>;
        showQuestion(currentQuestion);
    }


    $(document).ready(function() {
        startTimer();
        // Menyembunyikan semua pertanyaan kecuali yang pertama
        questions.not(':first').hide();


        // Tombol "Next"
        $('#next-btn').on('click', function() {
            if (currentQuestionIndex < questions.length - 1) {
                // Sembunyikan pertanyaan saat ini dengan efek fadeOut
                questions.eq(currentQuestionIndex).fadeOut(50, function() {
                    // Tampilkan pertanyaan berikutnya dengan efek fadeIn
                    currentQuestionIndex++;
                    questions.eq(currentQuestionIndex).fadeIn(50);
                });
            }
            // Tampilkan tombol "Submit" setelah menampilkan pertanyaan terakhir
            if (currentQuestionIndex === questions.length - 1) {
                $('#next-btn').hide();
                $('button[type="submit"]').show();
            }
        });
    });

    function startTimer() {
        var timerInterval = setInterval(function() {
            var minutes = Math.floor(timeLeft / 60);
            var seconds = timeLeft % 60;

            $('#minutes').text(minutes < 10 ? '0' + minutes : minutes);
            $('#seconds').text(seconds < 10 ? '0' + seconds : seconds);

            if (timeLeft <= 0) {
                clearInterval(timerInterval);
                $('#next-btn').hide();
                $('button[type="submit"]').show();
            } else {
                timeLeft--;
            }
        }, 1000);
    }
    </script>
</body>

</html>