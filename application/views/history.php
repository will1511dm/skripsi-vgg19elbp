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
                
                <div class="table-responsive">
                    <table id="example3" class="display" style="min-width: 845px">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama File</th>
                                <th>Hasil Prediksi</th>
                                <th>Tingkat Confidence</th>
                                <th>Tanggal Prediksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; foreach ($get_data as $data) : ?>
                                <tr>
                                    <td><?= htmlspecialchars($no++); ?></td>
                                    <td><?= htmlspecialchars($data['nama_file']); ?></td>
                                    <td><?= htmlspecialchars($data['hasil']); ?></td>
                                    <td><?= htmlspecialchars($data['confidence']); ?></td>
                                    <td><?= htmlspecialchars($data['tanggal']); ?></td>
                                        
                                </tr>

                            <?php endforeach; ?>
                        </tbody>
                    </table>
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
    <img src="<?= base_url('assets/mineral/baryte/1.png') ?>" alt="Batu Baryte" />
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
        bottom: -20px;
        right: 150;
        z-index: 1000;
    }

    .gambar-batu1 img {
        width: 280px; /* Batasi lebar maksimal */
        height: auto;
    }
</style>



