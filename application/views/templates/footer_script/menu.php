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
            confirmHapus.setAttribute('href', 'http://localhost/apam-barabai/menu/hapus/' + id);
        });
    }

    const tombolTambah = document.querySelector('#tombolTambah');
    tombolTambah.addEventListener('click', function() {
        const modalLabel = document.querySelector('#tambahMenuModalLabel');
        modalLabel.innerHTML = 'Tambah Menu Baru';

        const modalForm = document.querySelector('div.modal-content form');
        modalForm.reset();
    });

    const tombolEdit = document.querySelectorAll('#tombolEdit');
    for (i = 0; i < tombolEdit.length; i++) {
        tombolEdit[i].addEventListener('click', function() {
            const modalLabel = document.querySelector('#tambahMenuModalLabel');
            modalLabel.innerHTML = 'Edit Menu';

            const modalForm = document.querySelector('div.modal-content form');
            modalForm.setAttribute('action', 'http://localhost/apam-barabai/menu/editmenu');

            const data_id = this.getAttribute('data-id');
            $.ajax({
                url: 'http://localhost/apam-barabai/menu/getmenu',
                data: {id : data_id},
                method: 'POST',
                dataType: 'json',
                cache: false,
                success: function(data) {
                    console.log('ok');
                    $('#menu').val(data.menu_name);
                    $('#menu_group option[value="'+ data.group_id +'"]').prop('selected', true);
                    $('#icon').val(data.icon);
                    
                    if( data.is_active == 1) {
                        $('#is_active').prop('checked', true);
                    } else {
                        $('#is_active').prop('checked', false);
                    }
    
                    if( data.submenu == 1) {
                        $('#submenu').prop('checked', true);
                    } else {
                        $('#submenu').prop('checked', false);
                    }
    
                    $('#id').val(data.id);
                }
            });
        });
    }
</script>