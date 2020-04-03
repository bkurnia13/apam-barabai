<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script>window.jQuery || document.write('<script src="<?= base_url('assets/') ?>src/js/vendor/jquery-3.3.1.min.js"><\/script>')</script>
<script src="<?= base_url('assets/') ?>node_modules/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/') ?>node_modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/') ?>js/datatables.js"></script>
<script src="<?= base_url('assets/') ?>js/forms.js"></script>
<script src="<?= base_url('assets/'); ?>node_modules/jquery-toast-plugin/dist/jquery.toast.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/alerts.js"></script>
<?= $this->session->flashdata('notifikasi'); ?>
<script>
    const tombolHapus = document.querySelectorAll('#tombolHapus');
    const confirmHapus = document.getElementById('confirmHapus');
    for (i = 0; i < tombolHapus.length; i++) {
        tombolHapus[i].addEventListener('click', function() {
            const id = this.getAttribute('data-id');
            confirmHapus.setAttribute('href', '<?= base_url('material/hapus/'); ?>' + id);
        });
    }

    const tombolTambah = document.querySelector('#tombolTambah');
    tombolTambah.addEventListener('click', function() {
        const modalLabel = document.querySelector('#tambahMaterialModalLabel');
        modalLabel.innerHTML = 'Tambah Material Baru';

        const modalForm = document.querySelector('div.modal-content form');
        modalForm.reset();
    });

    const tombolEdit = document.querySelectorAll('#tombolEdit');
    for (i = 0; i < tombolEdit.length; i++) {
        tombolEdit[i].addEventListener('click', function() {
            const modalLabel = document.querySelector('#tambahMaterialModalLabel');
            modalLabel.innerHTML = 'Edit Material';

            const modalForm = document.querySelector('div.modal-content form');
            modalForm.setAttribute('action', '<?= base_url('material/edit'); ?>');

            const data_id = this.getAttribute('data-id');
            $.ajax({
                url: '<?= base_url('material/getmaterial'); ?>',
                data: {id : data_id},
                method: 'POST',
                dataType: 'json',
                cache: false,
                success: function(data) {
                    $('#nomor_material').val(data.nomor_material);
                    $('#nama_material').val(data.nama_material);
                    $('#nama_material_sap').val(data.nama_material_sap);
                    $('#satuan').val(data.satuan);
                    $('#tipe option[value="'+ data.tipe +'"]').prop('selected', true);
                    $('#id').val(data.id);
                }
            });
        });
    }
</script>