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
                    <form action="<?= base_url('admin/master_data/tambah_testing') ?>" enctype="multipart/form-data" method="post">

                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Pilih Jenis Mineral</label>
                            <div class="col-sm-9">
                                <select class="default-select form-control wide" name="jenis_daun" style="background-color: #ffff;" required>
                                    <option value="" disabled selected>Pilih Jenis Mineral</option>
                                    <?php foreach ($folders as $folder_name => $folder_info): ?>
                                        <option value="<?= htmlspecialchars($folder_name); ?>"><?= htmlspecialchars($folder_name); ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Upload Gambar</label>
                            <div class="col-sm-9">
                                <input type="file" name="userfile[]" id="userfile" class="form-control" multiple required />
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary btn-rounded fs-18">
                            <i class="zmdi zmdi-plus"></i> Tambah Data
                        </button>

                    </form>
                </div>

                <div class="table-responsive">
                    <table id="example3" class="display" style="min-width: 845px">
                        <thead>
                            <tr>
                                <th>Action</th>
                                <th>No.</th>
                                <th>Jenis Mineral</th>
                                <th>Gambar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; foreach ($get_data as $data) : ?>
                                <tr>
                                    <td>
                                        <div class="d-flex">
                                            <a href="#modal-edit<?= htmlspecialchars($data['id_gambar']); ?>" data-bs-toggle="modal"
                                                class="btn btn-primary shadow btn-xs sharp me-1"><i
                                                    class="fas fa-pencil-alt"></i></a>
                                            <a href="#modal-hapus<?= htmlspecialchars($data['id_gambar']); ?>" data-bs-toggle="modal"
                                                class="btn btn-danger shadow btn-xs sharp"><i
                                                    class="fa fa-trash"></i></a>
                                        </div>
                                    </td>
                                    <td><?= htmlspecialchars($no++); ?></td>
                                    <td><?= htmlspecialchars($data['jenis_daun']); ?></td>
                                    <td>
                                        <img class="popup-image" src="<?= base_url('uploads/Data_testing/' . htmlspecialchars($data['jenis_daun']) . '/' . htmlspecialchars($data['nama_gambar'])); ?>" style="max-width: 100px; max-height: 200px;" alt="Gambar <?= htmlspecialchars($data['nama_gambar']); ?>">
                                    </td>
                                </tr>

                                <!-- Modal Edit -->
                                <div class="modal fade bd-example-modal-lg" id="modal-edit<?= htmlspecialchars($data['id_gambar']); ?>"
                                    tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit <?= htmlspecialchars($title); ?></h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <form action="<?= base_url('admin/master_data/edit_testing') ?>" method="POST" enctype="multipart/form-data">
                                                <div class="modal-body">
                                                    <div class="basic-form">
                                                        <div class="mb-3 row">
                                                            <label class="col-sm-3 col-form-label">ID Gambar</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" name="id_gambar" class="form-control"
                                                                    readonly value="<?= htmlspecialchars($data['id_gambar']); ?>">
                                                                <input type="hidden" name="old" class="form-control"
                                                                    value="<?= htmlspecialchars($data['jenis_daun']); ?>">
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 row">
                                                            <label class="col-sm-3 col-form-label">Pilih Jenis Mineral</label>
                                                            <div class="col-sm-9">
                                                                <select class="default-select form-control wide" name="jenis_daun" style="background-color: #ffff;" required>
                                                                    <option value="<?= htmlspecialchars($data['jenis_daun']); ?>" selected><?= htmlspecialchars($data['jenis_daun']); ?></option>
                                                                    <?php foreach ($folders as $folder_name => $folder_info): ?>
                                                                        <option value="<?= htmlspecialchars($folder_name); ?>"><?= htmlspecialchars($folder_name); ?></option>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 row">
                                                            <label class="col-sm-3 col-form-label">Upload Gambar Baru</label>
                                                            <div class="col-sm-9">
                                                                <input type="file" name="userfile[]" id="userfile" class="form-control" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Rubah</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal Hapus -->
                                <div class="modal fade bd-example-modal-lg" id="modal-hapus<?= htmlspecialchars($data['id_gambar']); ?>"
                                    tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog ">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Hapus <?= htmlspecialchars($title); ?></h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <form action="<?= base_url('admin/master_data/hapus_testing') ?>" method="POST">
                                                <div class="modal-body">
                                                    <div class="basic-form">
                                                        <div class="mb-3 row">
                                                            <label class="col-sm-3 col-form-label">ID Gambar</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" name="id_gambar" class="form-control"
                                                                    readonly value="<?= htmlspecialchars($data['id_gambar']); ?>">
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 row">
                                                            <label class="col-sm-3 col-form-label">Jenis Mineral</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" name="jenis_daun" class="form-control"
                                                                    readonly value="<?= htmlspecialchars($data['jenis_daun']); ?>">
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 row">
                                                            <label class="col-sm-3 col-form-label">Nama Gambar</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" name="nama_gambar" class="form-control"
                                                                    readonly value="<?= htmlspecialchars($data['nama_gambar']); ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Hapus</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>



