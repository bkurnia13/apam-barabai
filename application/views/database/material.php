<div class="main-content" style="margin-top: 0; padding-top: 10px; padding-bottom: 10px;">
    <div class="container-fluid pl-0 pr-0">
        <div class="page-header mb-10">
            <div class="row align-items-end">
                <div class="col-sm-8">
                    <div class="page-header-title">
                        <a href="#" data-toggle="modal" data-target="#tambahMaterialModal" id="tombolTambah"><i class="ik ik-file-plus bg-blue"></i></a>
                        <div class="d-inline">
                            <h5>Manage Database Material</h5>
                            <small>Tambah, Lihat, Edit, dan Hapus Data Material</small>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="<?= base_url('dashboard'); ?>"><i class="ik ik-home"></i></a>
                            </li>
                            <li class="breadcrumb-item"><small>Manage Database</small></li>
                            <li class="breadcrumb-item active" aria-current="page"><small>Database Material</small></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <table id="data_table" class="table table-sm table-bordered table-hover">
                            <thead class="text-center">
                                <tr>
                                    <th>#</th>
                                    <th>Normalisasi</th>
                                    <th>Nama Material</th>
                                    <th>Nama Material SAP</th>
                                    <th>Satuan</th>
                                    <th>Tipe</th>
                                    <th class="nosort">Action</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <?php $i = 1; ?>
                                <?php foreach ($material as $m) : ?>
                                    <tr>
                                        <td><?= $i ?></td>
                                        <td><?= $m['nomor_material']; ?></td>
                                        <td class="text-left"><?= $m['nama_material']; ?></td>
                                        <td class="text-left"><?= $m['nama_material_sap']; ?></td>
                                        <td><?= $m['satuan']; ?></td>
                                        <td><?= $m['tipe']; ?></td>
                                        <td>
                                            <div class="d-flex table-actions justify-content-center">
                                                <a href="#" data-toggle="modal" data-target="#tambahMaterialModal" id="tombolEdit" data-id="<?= $m['id']; ?>"><i class="ik ik-edit-2 text-info"></i></a>
                                                <a href="#" data-toggle="modal" data-target="#hapusMaterialModal" id="tombolHapus" data-id="<?= $m['id']; ?>"><i class="ik ik-trash-2 text-danger"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah Material -->
<div class="modal fade" id="tambahMaterialModal" tabindex="-1" role="dialog" aria-labelledby="tambahMaterialModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahMaterialModalLabel">Tambah Submenu Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form class="forms-sample" method="post" action="<?= base_url('material/tambah'); ?>">
                <div class="modal-body">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group row">
                        <label for="nomor_material" class="col-sm-4 col-form-label">Nomor Material</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="nomor_material" name="nomor_material" placeholder="Nomor Material">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nama_material" class="col-sm-4 col-form-label">Nama Material</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="nama_material" name="nama_material" placeholder="Nama Material">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nama_material_sap" class="col-sm-4 col-form-label">Nama Material SAP</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="nama_material_sap" name="nama_material_sap" placeholder="Nama Material SAP">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="satuan" class="col-sm-4 col-form-label">Satuan</label>
                        <div class="col-sm-8">
                            <select class="form-control" id="satuan" name="satuan">
                                <option value="" selected hidden></option>
                                <?php foreach( $satuan as $s ) : ?>
                                    <option value="<?= $s['satuan']; ?>"><?= $s['satuan']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tipe" class="col-sm-4 col-form-label">Tipe Material</label>
                        <div class="col-sm-8">
                            <select class="form-control" id="tipe" name="tipe">
                                <option value="" selected hidden></option>
                                <option value="NORMAL">NORMAL</option>
                                <option value="BEKAS ANDAL">BEKAS ANDAL</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Hapus Material -->
<div class="modal fade" id="hapusMaterialModal" tabindex="-1" role="dialog" aria-labelledby="hapusMaterialModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="hapusMenuLabel">Hapus Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
            Apakah anda yakin ingin menghapus data ini?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <a href="#" class="btn btn-danger" id="confirmHapus">Hapus</a>
            </div>
        </div>
    </div>
</div>

<footer class="footer">
    <div class="w-100 clearfix">
        <span class="text-center text-sm-left d-md-inline-block">Copyright © 2020 | Bayu Kurnia Dwi Putra</span>
        <span class="float-none float-sm-right mt-1 mt-sm-0 text-center">Template by <a href="http://themekit.lavalite.org/" class="text-dark" target="_blank">ThemeKit</a></span>
    </div>
</footer>

</div>
</div>