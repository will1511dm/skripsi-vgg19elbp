<nav class="navbar navbar-dark bg-primary navbar-expand fixed-bottom ">
    <ul class="navbar-nav nav-justified w-100">
        <li class="nav-item">
            <a href="<?= base_url('karyawan/absensi/home') ?>" class="nav-link <?= $this->uri->segment(3) == 'home'  ? 'active' : '' ?>">
                <i class="fas fa-home fa-2x"></i>
            </a>
        </li>
        <li class="nav-item">
            <a href="<?= base_url('karyawan/absensi/pengajuan') ?>" class="nav-link <?= $this->uri->segment(3) == 'pengajuan'  ? 'active' : '' ?>">
                <i class="fa-solid fa-power-off fa-2x"></i>
            </a>
        </li>
        <li class="nav-item">
            <?php if ($get_absensi_d2d[0]['kategori'] != "Bekerja" && $get_absensi_d2d[0]['qr_code'] == "Disetujui") : ?>
            <a href="#andaoff" data-bs-toggle="modal" class="nav-link">
                <i class="fa-solid fa-camera fa-2x"></i>
            </a>
            <?php else : ?>
            <?php if (empty($get_absensi_d2d[0]['jam_hadir'])) : ?>
            <a href="#modalkerja" data-bs-toggle="modal" class="nav-link">
                <i class="fa-solid fa-camera fa-2x"></i>
            </a>
            <?php elseif (empty($get_absensi_d2d[0]['jam_pulang'])) : ?>
            <a href="#modalpulang" data-bs-toggle="modal" class="nav-link">
                <i class="fa-solid fa-camera fa-2x"></i>
            </a>
            <?php else : ?>
            <a href="#terimakasih" data-bs-toggle="modal" class="nav-link">
                <i class="fa-solid fa-camera fa-2x"></i>
            </a>
            <?php endif; ?>

            <?php endif; ?>
        </li>
        <li class="nav-item">
            <a href="<?= base_url('karyawan/absensi/rekap') ?>" class="nav-link <?= $this->uri->segment(3) == 'rekap'  ? 'active' : '' ?>">
                <i class="fa-solid fa-list fa-2x"></i>
            </a>
        </li>
        <li class="nav-item">
            <a href="<?= base_url('karyawan/absensi/profile') ?>" class="nav-link <?= $this->uri->segment(3) == 'profile'  ? 'active' : '' ?>">
                <i class="fa-regular fa-id-badge fa-2x"></i>
            </a>
        </li>
    </ul>
</nav>
<!--**********************************
            Header end ti-comment-alt
        ***********************************-->
<div class="modal fade" id="modalkerja">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div id="my_camera" style="margin-left:-25px">
            </div>
            <!-- <div class="card">
				<div class="card-img-top img-fluid" id="my_camera" style="margin-left:-25px" alt="Card image cap"></div>
				<div class="modal-footer d-sm-flex justify-content-center align-items-center">
					<button onClick="simpan()" class="btn btn-primary text-center">Absen Sekarang</button>
				</div>
			</div> -->
            <div class="modal-footer text-center  justify-content-center">
                <button onClick="simpan()" class="btn btn-primary text-center">Absen Sekarang</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modalpulang">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div id="my_camera2" style="margin-left:-25px">
            </div>

            <div class="modal-footer text-center  justify-content-center">
                <button onClick="simpan2()" class="btn btn-primary text-center">Absen Sekarang</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="terimakasih">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <h3 class="text-center">Terima Kasih Anda Sudah Melakukan Absen Kerja dan Absen Pulang</h3>
            </div>
            <div class="modal-footer text-center  justify-content-center">
                <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="andaoff">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <h3 class="text-center">Absensi tidak dapat dilakukan karena Anda sedang Off</h3>
            </div>
            <div class="modal-footer text-center  justify-content-center">
                <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.26/webcam.min.js"></script>
<script language="JavaScript">
    Webcam.set({
        width: 450,
        height: 450,
        image_format: 'jpeg',
        jpeg_quality: 90

    });
    Webcam.attach('#my_camera');
    Webcam.attach('#my_camera2');
</script> -->
<script language="JavaScript">
    function simpan() {
        id = "sukses";
        url = "<?= base_url('karyawan/absensi/home/absen_berangkat/') ?>";
        // console.log(url);
        // take snapshot and get image data
        Webcam.snap(function(data_uri) {
            // display results in page

            var latitude = '';
            var longitude = '';

            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
            } else {
                x.innerHTML = "Geolocation is not supported by this browser.";
            }

            function showPosition(position) {

                latitude = position.coords.latitude;
                longitude = position.coords.longitude;

                Webcam.upload(data_uri, url + latitude + '/' + longitude, function(code, text) {


                    Swal.fire({
                        title: "Sukses",
                        text: "Terima Kasih sudah melakukan Absensi",
                        type: "success",
                    });
                    location.reload()
                });
            }
        });
    }

    function simpan2() {
        url = "<?= base_url('karyawan/absensi/home/absen_pulang/') ?>";
        // take snapshot and get image data
        Webcam.snap(function(data_uri) {
            // display results in page

            var latitude = '';
            var longitude = '';

            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
            } else {
                x.innerHTML = "Geolocation is not supported by this browser.";
            }

            function showPosition(position) {

                latitude = position.coords.latitude;
                longitude = position.coords.longitude;

                Webcam.upload(data_uri, url + latitude + '/' + longitude, function(code, text) {


                    Swal.fire({
                        title: "Sukses",
                        text: "Terima Kasih sudah melakukan Absensi",
                        type: "success",
                    });
                    location.reload()
                });
            }
        });
    }
</script>