<div class="main-content" style="margin-top: 0; padding-top: 10px; padding-bottom: 10px;">
    <div class="container-fluid pl-0 pr-0">
        <div class="page-header mb-10">
            <div class="row align-items-end">
                <div class="col-sm-8">
                    <div class="page-header-title">
                        <a href="#" data-toggle="modal" data-target="#tambahMenuModal" id="tombolTambah"><i class="ik ik-file-plus bg-blue"></i></a>
                        <div class="d-inline">
                            <h5>Manage Database Menu</h5>
                            <small>Tambah, Lihat, Edit, dan Hapus Menu Aplikasi</small>
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
                            <li class="breadcrumb-item active" aria-current="page"><small>Database Menu</small></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <table id="data_table" class="table table-bordered table-hover">
                            <thead class="text-center">
                                <tr>
                                    <th>#</th>
                                    <th>Nama Menu</th>
                                    <th>Grup Menu</th>
                                    <th>Icon</th>
                                    <th>Submenu</th>
                                    <th>Status</th>
                                    <th class="nosort">Action</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <?php $i = 1; ?>
                                <?php foreach ($menu as $m) : ?>
                                    <tr>
                                        <td><?= $i ?></td>
                                        <td class="text-left"><?= $m['menu_name']; ?></td>
                                        <td><?= $m['menu_group']; ?></td>
                                        <td><?= $m['icon']; ?></td>
                                        <td>
                                            <?php
                                            if ($m['submenu'] == 1) {
                                                echo 'Ada';
                                            } else {
                                                echo 'Tidak Ada';
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            if ($m['is_active'] == 1) {
                                                echo 'Aktif';
                                            } else {
                                                echo 'Tidak Aktif';
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <div class="d-flex table-actions justify-content-center">
                                                <a href="#" data-toggle="modal" data-target="#tambahMenuModal" id="tombolEdit" data-id="<?= $m['id']; ?>"><i class="ik ik-edit-2 text-info"></i></a>
                                                <a href="#" data-toggle="modal" data-target="#hapusMenuModal" id="tombolHapus" data-id="<?= $m['id']; ?>"><i class="ik ik-trash-2 text-danger"></i></a>
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
<div class="modal fade" id="tambahMenuModal" tabindex="-1" role="dialog" aria-labelledby="tambahMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahMenuModalLabel">Tambah Menu Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form class="forms-sample" method="post" action="<?= base_url('menu/tambahmenu'); ?>">
                <div class="modal-body">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group row">
                        <label for="menu" class="col-sm-5 col-form-label">Nama Menu</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="menu" name="menu" placeholder="Nama Menu">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="menu_group" class="col-sm-5 col-form-label">Grup Menu</label>
                        <div class="col-sm-7">
                            <select class="form-control" id="menu_group" name="menu_group">
                                <option value="" selected hidden></option>
                                <?php foreach( $menu_group as $mg ) : ?>
                                    <option value="<?= $mg['id'] ?>"><?= $mg['menu_group']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="icon" class="col-sm-5 col-form-label">Icon</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="icon" name="icon" placeholder="Icon">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-5">
                            <div class="checkbox-color checkbox-success">
                                <input id="is_active" name="is_active" type="checkbox" value="1">
                                <label for="is_active">Aktif?</label>
                            </div>
                        </div>
                        <div class="col-sm-7">
                            <div class="checkbox-color checkbox-primary">
                                <input id="submenu" name="submenu" type="checkbox" value="1">
                                <label for="submenu">Submenu?</label>
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