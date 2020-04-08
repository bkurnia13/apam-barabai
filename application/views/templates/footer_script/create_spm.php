<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script>window.jQuery || document.write('<script src="<?= base_url('assets/') ?>src/js/vendor/jquery-3.3.1.min.js"><\/script>')</script>
<script src="<?= base_url('assets/'); ?>js/forms.js"></script>
<script src="<?= base_url('assets/'); ?>node_modules/jquery-toast-plugin/dist/jquery.toast.min.js"></script>
<script src="<?= base_url('assets/'); ?>node_modules/moment/moment.js"></script>
<script src="<?= base_url('assets/'); ?>node_modules/tempusdominus-bootstrap-4/build/js/tempusdominus-bootstrap-4.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/alerts.js"></script>
<script src="<?= base_url('assets/'); ?>node_modules/datedropper/datedropper.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/form-picker.js"></script>
<script src="<?= base_url('assets/'); ?>node_modules/select2/dist/js/select2.min.js"></script>
<?= $this->session->flashdata('notifikasi'); ?>
<script>
    const tombol_tambah = document.getElementById('tambahMaterial');
    tombol_tambah.addEventListener('click', function() {
        const nomor_spm = $('#nomor_spm').val();
        const material = $('#material').select2('data');
        const data_material = material[0].text;
        const jumlah = $('#jumlah').val();
        const tipe = $('#tipe').val();
        $.ajax({
            url: '<?= base_url('create_spm/tambah_material'); ?>',
            data: {
                nomor_spm: nomor_spm,
                material: data_material, 
                jumlah: jumlah,
                tipe: tipe
            },
            method: 'post',
            dataType: 'json',
            success: function(data) {
                console.log(data);

                // Buat tombol edit
                var iconEdit = document.createElement('i');
                iconEdit.setAttribute('class', 'ik ik-edit-2 text-info');
                iconEdit.style.fontSize = '1.5rem';
                iconEdit.style.marginRight = '10px';

                var edit = document.createElement('a');
                edit.setAttribute('href', '#');
                edit.setAttribute('id', 'edit');

                //Buat tombol hapus
                var iconHapus = document.createElement('i');
                iconHapus.setAttribute('class', 'ik ik-trash-2 text-danger');
                iconHapus.style.fontSize = '1.5rem';

                var hapus = document.createElement('a');
                hapus.setAttribute('href', '#');
                hapus.setAttribute('id', 'hapus');

                //Tambah baris baru
                const tabel = document.querySelector('table#tabelMaterial tbody');
                var jumlah_baris = tabel.rows.length;
                if (jumlah_baris == 0) {
                    const baris = tabel.insertRow(0);
                    const kolom1 = baris.insertCell(0);
                    const kolom2 = baris.insertCell(1);
                    const kolom3 = baris.insertCell(2);
                    const kolom4 = baris.insertCell(3);
                    const kolom5 = baris.insertCell(4);
                    const kolom6 = baris.insertCell(5);
                    const kolom7 = baris.insertCell(6);

                    kolom1.innerHTML = jumlah_baris + 1;
                    kolom2.innerHTML = data[0].nomor_material;
                    kolom3.innerHTML = data[0].nama_material;
                    kolom4.innerHTML = data[0].jumlah;
                    kolom5.innerHTML = data[0].satuan;
                    kolom6.innerHTML = data[0].tipe;
                    kolom7.appendChild(edit).appendChild(iconEdit);
                    kolom7.appendChild(hapus).appendChild(iconHapus);
                } else {
                    jumlah_data = Object.keys(data).length - 1;
                    const baris = tabel.insertRow(jumlah_data);
                    const kolom1 = baris.insertCell(0);
                    const kolom2 = baris.insertCell(1);
                    const kolom3 = baris.insertCell(2);
                    const kolom4 = baris.insertCell(3);
                    const kolom5 = baris.insertCell(4);
                    const kolom6 = baris.insertCell(5);
                    const kolom7 = baris.insertCell(6);

                    kolom1.innerHTML = jumlah_data + 1;
                    kolom2.innerHTML = data[jumlah_data].nomor_material;
                    kolom3.innerHTML = data[jumlah_data].nama_material;
                    kolom4.innerHTML = data[jumlah_data].jumlah;
                    kolom5.innerHTML = data[jumlah_data].satuan;
                    kolom6.innerHTML = data[jumlah_data].tipe;
                    kolom7.appendChild(edit).appendChild(iconEdit);
                    kolom7.appendChild(hapus).appendChild(iconHapus);
                }
            }
        });
    });
</script>