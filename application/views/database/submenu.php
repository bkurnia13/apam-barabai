<div class="main-content" style="margin-top: 0; padding-top: 10px; padding-bottom: 10px;">
    <div class="container-fluid pl-0 pr-0">
        <div class="page-header mb-10">
            <div class="row align-items-end">
                <div class="col-sm-8">
                    <div class="page-header-title">
                        <a href="#" data-toggle="modal" data-target="#tambahSubmenuModal" id="tombolTambah"><i class="ik ik-file-plus bg-blue"></i></a>
                        <div class="d-inline">
                            <h5>Manage Database Submenu</h5>
                            <small>Tambah, Lihat, Edit, dan Hapus Submenu Aplikasi</small>
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
                            <li class="breadcrumb-item active" aria-current="page"><small>Database Submenu</small></li>
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
                                    <th>Nama Menu</th>
                                    <th>Nama Submenu</th>
                                    <th>URL</th>
                                    <th>Status</th>
                                    <th class="nosort">Action</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <?php $i = 1; ?>
                                <?php foreach ($submenu as $sm) : ?>
                                    <tr>
                                        <td><?= $i ?></td>
                                        <td><?= $sm['menu_name']; ?></td>
                                        <td class="text-left"><?= $sm['submenu_name']; ?></td>
                                        <td><?= $sm['url']; ?></td>
                                        <td>
                                            <?php
                                            if ($sm['is_active'] == 1) {
                                                echo 'Aktif';
                                            } else {
                                                echo 'Tidak Aktif';
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <div class="d-flex table-actions justify-content-center">
                                                <a href="#" data-toggle="modal" data-target="#tambahSubmenuModal" id="tombolEdit" data-id="<?= $sm['id']; ?>"><i class="ik ik-edit-2 text-info"></i></a>
                                                <a href="#" data-toggle="modal" data-target="#hapusMenuModal" id="tombolHapus" data-id="<?= $sm['id']; ?>"><i class="ik ik-trash-2 text-danger"></i></a>
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

<!-- Modal Tambah Menu -->
<div class="modal fade" id="tambahSubmenuModal" tabindex="-1" role="dialog" aria-labelledby="tambahSubmenuModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahSubmenuModalLabel">Tambah Submenu Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form class="forms-sample" method="post" action="<?= base_url('submenu/tambahsubmenu'); ?>">
                <div class="modal-body">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group row d-flex justify-content-center">
                        <label for="menu" class="col-sm-3 col-form-label">Pilih Menu</label>
                        <div class="col-sm-6">
                            <select class="form-control" id="menu" name="menu">
                                <option value="" selected hidden></option>
                                <?php foreach( $menu as $m ) : ?>
                                    <option value="<?= $m['id'] ?>"><?= $m['menu_name']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row d-flex justify-content-center">
                            <label for="submenu" class="col-sm-3 col-form-label">Nama Submenu</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="submenu" name="submenu" placeholder="Nama Submenu">
                            </div>
                        </div>
                        <div class="form-group row d-flex justify-content-center">
                            <label for="url" class="col-sm-3 col-form-label">URL</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="url" name="url" placeholder="URL">
                            </div>
                        </div>
                        <div class="form-group row d-flex justify-content-center">
                            <label class="col-sm-3">Status</label>
                            <div class="col-sm-6 ml-1">
                                <div class="checkbox-color checkbox-success">
                                    <input id="is_active" name="is_active" type="checkbox" value="1">
                                    <label for="is_active">Aktif</label>
                                </div>
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

<!-- Modal Hapus Menu -->
<div class="modal fade" id="hapusMenuModal" tabindex="-1" role="dialog" aria-labelledby="hapusMenuModalLabel" aria-hidden="true">
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