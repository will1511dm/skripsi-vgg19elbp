<div class="content-body">
    <div class="container-fluid">

        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">
                    <a href="javascript:void(0)"><?php echo htmlspecialchars($nav1, ENT_QUOTES, 'UTF-8'); ?></a>
                </li>
                <li class="breadcrumb-item">
                    <a href="javascript:void(0)"><?php echo htmlspecialchars($nav2, ENT_QUOTES, 'UTF-8'); ?></a>
                </li>
            </ol>
        </div>
        <!-- row -->

        <div class="row">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><?php echo htmlspecialchars($title, ENT_QUOTES, 'UTF-8'); ?></h4>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('admin/master_data/hasil_prediksi') ?>" enctype="multipart/form-data" method="post">
                        <div class="mb-3 row">
                            <label for="userfile" class="col-sm-3 col-form-label">Upload Gambar</label>
                            <div class="col-sm-9">
                                <input type="file" name="userfile[]" id="userfile" class="form-control" multiple required />
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-rounded fs-18">
                            <i class="zmdi zmdi-plus"></i> Prediksi
                        </button>
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
        right: 1200px;
        z-index: 1000;
    }
    .gambar-batu3 img {
        width: 250px; /* Batasi lebar maksimal */
        height: auto;
    }

    .gambar-batu4 {
        position: fixed;
        bottom: -40px;
        right: 1500px;
        z-index: 1000;
    }
    .gambar-batu4 img {
        width: 250px; /* Batasi lebar maksimal */
        height: auto;
    }

    .gambar-batu5 {
        position: fixed;
        bottom: -40px;
        right: 1700px;
        z-index: 1000;
    }
    .gambar-batu5 img {
        width: 250px; /* Batasi lebar maksimal */
        height: auto;
    }
</style>