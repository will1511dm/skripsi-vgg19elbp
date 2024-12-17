<div class="content-body">
    <div class="container-fluid">

        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="javascript:void(0)"><?php echo htmlspecialchars($nav1); ?></a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)"><?php echo htmlspecialchars($title); ?></a></li>
            </ol>
        </div>
        <!-- row -->


        <div class="row">

            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Tentang Sistem Identifikasi Mineral dengan VGG-19 dan Ekstraksi Ciri ELBP</h4>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('admin/master_data/hasil_prediksi') ?>" enctype="multipart/form-data" method="post">

                        <div class="mb-6 row">
                            <label class="col-sm-6 col-form-label">"Sistem Identifikasi Mineral dengan VGG-19 dan Ekstraksi Ciri ELBP" adalah aplikasi berbasis kecerdasan buatan yang mengidentifikasi jenis mineral menggunakan model konvolusional VGG-19 dan metode Ekstraksi Local Binary Pattern (ELBP). VGG-19 berperan sebagai jaringan dalam mendeteksi pola visual utama, sementara ELBP menambah kemampuan identifikasi dengan menganalisis tekstur detail pada gambar mineral. Kombinasi ini meningkatkan akurasi dalam mengenali jenis mineral berdasarkan karakteristik visualnya, menjadikannya sistem yang efektif untuk analisis gambar mineral dalam aplikasi geologi dan industri terkait.</label>

                        </div>


                    </form>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- GIF di pojok kanan bawah -->
<div class="gif-container">
    <img src="<?= base_url('assets/gif/gif1.gif') ?>" alt="GIF Animasi" />
</div>

<!-- Gambar Batuan Bawah -->
<div class="gambar-batu1">
    <img src="<?= base_url('assets/mineral/azurite/1.png') ?>" alt="Batu Azurite" />
</div>
<div class="gambar-batu2">
    <img src="<?= base_url('assets/mineral/baryte/1.png') ?>" alt="Batu Baryte" />
</div>
<div class="gambar-batu3">
    <img src="<?= base_url('assets/mineral/beryl/1.png') ?>" alt="Batu Beryl" />
</div>
<div class="gambar-batu4">
    <img src="<?= base_url('assets/mineral/calcite/1.png') ?>" alt="Batu calcite" />
</div>
<div class="gambar-batu5">
    <img src="<?= base_url('assets/mineral/pyrite/1.png') ?>" alt="Batu pyrite" />
</div>

<style>
    .gif-container {
        position: fixed;
        bottom: 10px;
        right: 10px;
        z-index: 1000; /* Memastikan di atas elemen lain */
    }

    .gif-container img {
        width: 100px; /* Sesuaikan ukuran gambar */
        height: auto;
    }

    .gambar-batu1 {
        position: fixed;
        bottom: -40px;
        right: 150px;
        z-index: 1000;
    }
    .gambar-batu1 img {
        width: 250px; /* Batasi lebar maksimal */
        height: auto;
    }

    .gambar-batu2 {
        position: fixed;
        bottom: -10px;
        right: 410px;
        z-index: 1000;
    }
    .gambar-batu2 img {
        width: 250px; /* Batasi lebar maksimal */
        height: auto;
    }

    .gambar-batu3 {
        position: fixed;
        bottom: -100px;
        right: 700px;
        z-index: 1000;
    }
    .gambar-batu3 img {
        width: 250px; /* Batasi lebar maksimal */
        height: auto;
    }

    .gambar-batu4 {
        position: fixed;
        bottom: -40px;
        right: 1000px;
        z-index: 1000;
    }
    .gambar-batu4 img {
        width: 250px; /* Batasi lebar maksimal */
        height: auto;
    }

    .gambar-batu5 {
        position: fixed;
        bottom: -40px;
        right: 1250px;
        z-index: 1000;
    }
    .gambar-batu5 img {
        width: 250px; /* Batasi lebar maksimal */
        height: auto;
    }
</style>