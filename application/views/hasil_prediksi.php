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
                    <h4 class="card-title"><?php echo htmlspecialchars($title); ?></h4>
                </div>
                <div class="card-body">
                    <img src="<?= base_url('uploads/prediksi/') ?>1.jpg" style="max-width: 200px; max-height: 400px;" alt="Image">
                    Hasil Identifikasi Mineral: <b> <?= htmlspecialchars($hasil); ?></b>
                    dengan Keyakinan Prediksi: <b> <?= htmlspecialchars(number_format($confidence, 2)); ?>% </b>
                  
<p></p>
<div class="col-2">
    <button 
        onclick="window.location.href='<?= base_url('admin/master_data/prediksi') ?>'" 
        class="btn btn-primary btn-block" 
        aria-expanded="false">
        
        <span>Kembali</span>
    </button>
</div>
                </div>


            </div>
        </div>
    </div>
</div>
<!-- GIF di pojok kanan bawah -->
<div class="gif-container">
    <img src="<?= base_url('assets/gif/gif1.gif') ?>" alt="GIF Animasi" />
</div>

<div class="gambar-batu1">
    <img src="<?= base_url('assets/mineral/azurite/1.png') ?>" alt="Batu Azurite" />
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
        bottom: 10px;
        right: 150;
        z-index: 1000;
    }
    .gambar-batu1 img {
        width: 300px; /* Batasi lebar maksimal */
        height: auto;
    }
</style>