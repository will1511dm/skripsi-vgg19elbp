<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="row">
                    <div class="col-xl-6">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card tryal-gradient">
                                    <div class="card-body tryal row">
                                        <div class="col-xl-7 col-sm-6">
                                            <h2>Aplikasi Test Astabrata</h2>
                                            <span>Hasil Ujian Terkini </span>
                                        </div>
                                        <div class="col-xl-5 col-sm-6">
                                            <img src="<?= base_url('assets/dist/') ?>images/chart.png" alt="" class="sd-shape">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-header border-0">
                                        <div>
                                            <h4 class="fs-20 font-w700">Data Peserta yang Telah Mengikuti Ujian </h4>
                                        </div>
                                        <!-- <div>
                                            <a href="javascript:void(0);" class="btn btn-outline-primary btn-rounded fs-18">View More</a>
                                        </div> -->
                                    </div>
                                    <div class="card-body px-0">
                                        <?php foreach ($get_total_all2 as $data) : ?>
                                        <div class="d-flex justify-content-between recent-emails">
                                            <div class="d-flex">
                                                <div class="profile-k">
                                                    <?php
                                                        $jumlah_karakter = strlen($data['nama_pegawai']);
                                                        $karakter = $jumlah_karakter - 1;
                                                        $huruf = substr($data['nama_pegawai'], 0, $jumlah_karakter - $karakter);
                                                        ?>
                                                    <span class="bg-success"><?php echo $huruf; ?></span>
                                                </div>
                                                <div class="ms-3">
                                                    <h4 class="fs-18 font-w500"> <?= $data['nama_pegawai']; ?></h4>
                                                </div>
                                            </div>
                                            <div class="email-check">
                                                <label class="like-btn mb-0">
                                                    <button class="btn btn-primary">Nip : <?= $data['nip']; ?></button>
                                                </label>
                                            </div>
                                        </div>

                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-xl-6">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="row">
                                    <div class="col-xl-12 col-sm-12">
                                        <div class="widget-stat card">
                                            <div class="card-body p-4">
                                                <div class="media ai-icon">
                                                    <span class="me-3 bgl-primary text-primary">
                                                        <!-- <i class="ti-user"></i> -->
                                                        <svg id="icon-customers" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                            <circle cx="12" cy="7" r="4"></circle>
                                                        </svg>
                                                    </span>
                                                    <div class="media-body">
                                                        <p class="mb-1">Total Peserta Ujian</p>
                                                        <h4 class="mb-0"><?php echo $time[0]['jml_p'];?></h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                 </div>

                            </div>
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-xl-6 col-sm-6">
                                                <div class="owl-carousel card-slider">
                                                    <div class="items">
                                                        <h4 class="fs-20 font-w700 mb-4">Pengumuman</h4>
                                                        <span class="fs-14 font-w400">Progress Target: <b><?php echo $time[0]['jml_p']; ?> Peserta Ujian</b></span>
                                                        <br/>
                                                        <span class="fs-14 font-w400">Jumlah Peserta Telah Ujian: <b><?php echo count($get_total_all2); ?> Peserta Ujian</b></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 redial col-sm-6">
                                                <div id="redial2"></div>
                                                <span class="text-center d-block fs-18 font-w600">On Progress <small class="text-success"><?= round((count($get_total_all2) / $time[0]['jml_p']) * 100, 2) ?>%</small></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?= base_url('assets/tambahan/template_home/'); ?>apexcharts"></script>
<script>
        document.addEventListener("DOMContentLoaded", function() {
            var totalAll2 = <?= json_encode(count($get_total_all2)) ?>;
            var totalProgress = <?= json_encode($time[0]['jml_p']) ?>;
            var progressPercentage = ((totalAll2 / totalProgress) * 100).toFixed(2);

            var options = {
                series: [parseFloat(progressPercentage), 100 - parseFloat(progressPercentage)],
                chart: {
                    type: 'pie',
                    height: 350
                },
                labels: ['Completed', 'Remaining'],
                colors: ['#4caf50', '#f44336'],
                responsive: [{
                    breakpoint: 480,
                    options: {
                        chart: {
                            width: 200
                        },
                        legend: {
                            position: 'bottom'
                        }
                    }
                }]
            };

            var chart = new ApexCharts(document.querySelector("#redial2"), options);
            chart.render();
        });
    </script>