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
                    <h4 class="card-title">Pusat Bantuan</h4>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('admin/master_data/hasil_prediksi') ?>" enctype="multipart/form-data" method="post">

                        <div class="mb-9 row">
                        <section id="prediksi-mineral">
        <h2>1. Menu Prediksi Mineral</h2>
        <p>Menu Prediksi Mineral digunakan pengguna untuk melakukan upload gambar yang akan diprediksi:</p>
        <ol>
            <li>a. Klik bagian <strong>Choose File</strong></li>
            <li>b. Pilih gambar yang akan diprediksi</li>
            <li>c. Tekan tombol <strong>Prediksi</strong> untuk melihat hasil</li>
        </ol>

    </section>

    <section id="help">
        <h2>2. Menu Help</h2>
        <p>Menu Help digunakan pengguna untuk melihat prosedur penggunaan sistem.</p>
    </section>

    <section id="about">
        <h2>3. Menu About</h2>
        <p>Menu About digunakan pengguna untuk melihat deskripsi singkat sistem.</p>
    </section>

    <section id="history-result">
        <h2>4. Menu History Result</h2>
        <p>Menu History Result digunakan pengguna untuk melihat hasil prediksi terdahulu yang telah dilakukan.</p>
    </section>

    <section id="jenis-mineral">
        <h2>5. Menu Jenis Mineral</h2>
        <p>Menu Jenis Mineral digunakan pengguna untuk melihat sekilas gambar dan juga deskripsi mineral yang bisa diprediksi</p>

    <section id="jenis-batu">
        <h2>6. Jenis Batu yang Bisa Dikenali</h2>
        <p>Berikut merupakan 15 jenis batuan yang bisa dikenali dengan program ini</p>
        <p></p>
    </section>
    </section>
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

<div class="gambar-batu1">
    <img src="<?= base_url('assets/mineral/pyromorphite/1.png') ?>" alt="Batu Pyro" />
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