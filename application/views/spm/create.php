<div class="main-content" style="margin-top: 0; padding-top: 10px; padding-bottom: 10px;">
    <div class="container-fluid pl-0 pr-0">
        <div class="page-header mb-10">
            <div class="row align-items-end">
                <div class="col-sm-8">
                    <div class="page-header-title">
                        <i class="ik ik-file-text bg-blue"></i>
                        <div class="d-inline">
                            <h5>Input SPM Baru</h5>
                            <small>Silahakan isi data Header, Footer, dan Material</small>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="<?= base_url('dashboard'); ?>"><i class="ik ik-home"></i></a>
                            </li>
                            <li class="breadcrumb-item"><small>SPM</small></li>
                            <li class="breadcrumb-item active" aria-current="page"><small>Buat SPM | TUG 5</small></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <div class="row clearfix">
            <div class="col-lg-6 col-md-12 pr-5">
                <div class="widget mb-15">
                    <div class="widget-header">
                        <h3 class="widget-title">Data Header</h3>
                        <div class="widget-tools pull-right">
                            <button type="button" class="btn btn-widget-tool minimize-widget ik ik-plus"></button>
                        </div>
                    </div>
                    <div class="widget-body">
                        <form class="forms-sample" method="post">
                            <div class="form-group row">
                                <label for="nomor_spm" class="col-md-4 col-form-label">Nomor Dokumen</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" id="nomor_spm" name="nomor_spm" value="<?= $nomor_spm; ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="dropper-default" class="col-md-4 col-form-label">Tanggal Dokumen</label>
                                <div class="col-md-8">
                                    <input id="dropper-default" class="form-control" type="text" name="tanggal">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="jenis_pek" class="col-md-4 col-form-label">Jenis Pekerjaan</label>
                                <div class="col-md-8">
                                    <select class="form-control" id="jenis_pek" name="jenis_pek">
                                        <option value="" selected hidden></option>
                                        <option value="TERENCANA">TERENCANA</option>
                                        <option value="EMERGENCY">EMERGENCY</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nomor_pk" class="col-md-4 col-form-label">Nomor SPK</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" id="nomor_pk" name="nomor_pk">
                                </div>
                            </div>
                        <!-- </form> -->
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-12 pl-5">
                <div class="widget mb-15">
                    <div class="widget-header">
                        <h3 class="widget-title">Data Footer</h3>
                        <div class="widget-tools pull-right">
                            <button type="button" class="btn btn-widget-tool minimize-widget ik ik-plus"></button>
                        </div>
                    </div>
                    <div class="widget-body">
                        <!-- <form class="forms-sample"> -->
                            <div class="form-group row">
                                <label for="pelaksana" class="col-md-4 col-form-label">Pelaksana</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" id="pelaksana" name="pelaksana">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="pekerjaan" class="col-md-4 col-form-label">Pekerjaan</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" id="pekerjaan" name="pekerjaan">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="penerima" class="col-md-4 col-form-label">Penerima</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" id="penerima" name="penerima" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="pejabat" class="col-md-4 col-form-label">Disetujui Oleh</label>
                                <div class="col-md-8">
                                    <select class="form-control" id="pejabat" name="pejabat">
                                        <option value="" selected hidden></option>
                                    </select>
                                </div>
                            </div>
                        <!-- </form> -->
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-12 col-md-12 p-0">
            <div class="widget mb-15">
                <div class="widget-header">
                    <h3 class="widget-title">Data Material</h3>
                    <div class="widget-tools pull-right">
                        <button type="button" class="btn btn-widget-tool minimize-widget ik ik-plus"></button>
                    </div>
                </div>
                <div class="widget-body">
                    <!-- <form class="forms-sample"> -->
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <div class="text-center"><label for="tipe">Tipe Material</label></div>
                                    <select class="form-control" id="tipe" name="tipe">
                                        <option value="" hidden selected></option>
                                        <option value="NORMAL">NORMAL</option>
                                        <option value="BEKAS ANDAL">BEKAS ANDAL</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="text-center"><label for="material">Material</label></div>
                                    <select class="form-control select2" id="material" name="material">
                                        <option value="" hidden selected></option>
                                        <?php $i = 1; ?>
                                        <?php foreach ($material as $mat) : ?>
                                            <optgroup label="Grup Material <?= $i; ?>">
                                                <option><?= $mat['nomor_material']; ?></option>
                                                <option><?= $mat['nama_material']; ?></option>
                                                <option><?= $mat['nama_material_sap']; ?></option>
                                            </optgroup>
                                            <?php $i++; ?>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="form-group">
                                    <div class="text-center"><label for="jumlah">Jumlah</label></div>
                                    <input type="text" class="form-control" id="jumlah" name="jumlah">
                                </div>
                            </div>
                            <div class="col-md-1 p-0">
                                <div class="text-white"><label>Empty</label></div>
                                <button type="button" class="btn ik ik-plus-circle text-success" id="tambahMaterial" style="font-size: 2rem; padding: 0"></button>
                            </div>
                        </div>
                    </form>
                    <div class="table-responsive">
                        <table class="table table-hover" id="tabelMaterial">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nomor Material</th>
                                    <th>Nama Material</th>
                                    <th>Jumlah</th>
                                    <th>Satuan</th>
                                    <th>Tipe</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- <tr>
                                    <td>1</td>
                                    <td>
                                        <span id="nomor_material_text"></span>
                                    </td>
                                    <td>
                                        <span id="nama_material_text"></span>
                                    </td>
                                    <td>
                                        <span id="jumlah_text"></span>
                                    </td>
                                    <td>
                                        <span id="satuan_text"></span>
                                    </td>
                                    <td>
                                        <span id="tipe_text"></span>
                                    </td>
                                    <td>
                                        <a href="#" id="editMaterial"><i class="ik ik-edit-2 text-info" style="font-size: 1.5rem"></i></a>
                                        <a href="#"><i class="ik ik-trash-2 text-danger" style="font-size: 1.5rem"></i></a>
                                    </td>
                                </tr> -->
                            </tbody>
                        </table>
                    </div>
                </div>
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