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
            confirmHapus.setAttribute('href', '<?= base_url('submenu/hapus/'); ?>' + id);
        });
    }

    const tombolTambah = document.querySelector('#tombolTambah');
    tombolTambah.addEventListener('click', function() {
        const modalLabel = document.querySelector('#tambahSubmenuModalLabel');
        modalLabel.innerHTML = 'Tambah Submenu Baru';

        const modalForm = document.querySelector('div.modal-content form');
        modalForm.reset();
    });

    const tombolEdit = document.querySelectorAll('#tombolEdit');
    for (i = 0; i < tombolEdit.length; i++) {
        tombolEdit[i].addEventListener('click', function() {
            const modalLabel = document.querySelector('#tambahSubmenuModalLabel');
            modalLabel.innerHTML = 'Edit Submenu';

            const modalForm = document.querySelector('div.modal-content form');
            modalForm.setAttribute('action', '<?= base_url('submenu/editsubmenu') ?>');

            const data_id = this.getAttribute('data-id');
            $.ajax({
                url: '<?= base_url('submenu/getsubmenu'); ?>',
                data: {id : data_id},
                method: 'post',
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                    $('#menu option[value="'+ data.menu_id +'"]').prop('selected', true);
                    $('#submenu').val(data.submenu_name);
                    $('#url').val(data.url);
                    
                    if( data.is_active == 1) {
                        $('#is_active').prop('checked', true);
                    } else {
                        $('#is_active').prop('checked', false);
                    }

                    $('#id').val(data.id);
                }
            });
        });
    }
</script>