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
                            <th>No</th>
                            <th>Gambar</th>
                            <th>Nama Mineral</th>
                            <th>Deskripsi</th>
                            <th>Kekerasan Mohs</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; foreach ($get_data as $data) : ?>
                                <tr>
                                    <td><?= htmlspecialchars($no++); ?></td>
                                    <td><img src="<?= base_url('assets/mineral/'.htmlspecialchars($data['nama']).'/1.jpeg') ?>"width="75"
                                     height="75" />
                                        </td>
                                    <td><?= htmlspecialchars($data['nama']); ?></td>
                                    <td><?= htmlspecialchars($data['deskripsi']); ?></td>
                                    <td><?= htmlspecialchars($data['mohs']); ?></td>
                                        
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

</style>


