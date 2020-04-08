<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Create_spm extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        cek_login();
    }

    public function index()
    {
        $tipe = 'NORMAL';
        $queryMaterial = "SELECT * FROM `material` WHERE `tipe` = '$tipe' ORDER BY `nomor_material`";
        $data['material'] = $this->db->query($queryMaterial)->result_array();
        $data['title'] = 'Buat SPM | TUG 5';

        $countSPM = count($this->db->get('spm_jaringan')->result_array());
        if ( $countSPM == 0 ) {
            $i = 1;
            $n = str_pad($i, 3, "0", STR_PAD_LEFT);
            $m = date('m');
            $y = date('Y');
            $no_urut = $n . '.SPM/' . 'JAR/' . $m . '/' . $y;
            $data['nomor_spm'] = $no_urut;
        } else {
            $i = $countSPM;
            $n = str_pad($i, 3, "0", STR_PAD_LEFT);
            $m = date('m');
            $y = date('Y');
            $no_urut = $n . '.SPM/' . 'JAR/' . $m . '/' . $y;
            $data['nomor_spm'] = $no_urut;
        }

        $this->load->view('templates/header', $data);
        $this->load->view('templates/header_script/create_spm');
        $this->load->view('templates/sidebar');
        $this->load->view('spm/create', $data);
        $this->load->view('templates/footer_script/create_spm');
        $this->load->view('templates/footer');
    }

    public function tambah_material()
    { 
        $material = $_POST['material'];
        $queryMaterial = "SELECT * FROM `material` WHERE 
                          `nomor_material` = '$material' OR
                          `nama_material` = '$material' OR
                          `nama_material_sap` = '$material'";
        $getMaterial = $this->db->query($queryMaterial)->row_array();
        $tambahMaterial = [
            'nomor_spm' => $_POST['nomor_spm'],
            'nomor_material' => $getMaterial['nomor_material'],
            'nama_material' => $getMaterial['nama_material_sap'],
            'jumlah' => $_POST['jumlah'],
            'satuan' => $getMaterial['satuan'],
            'tipe' => $_POST['tipe']
        ];
        $this->db->insert('spm_material', $tambahMaterial);
        $get_spm = $this->db->get_where('spm_material', ['nomor_spm' => $_POST['nomor_spm']])->result_array();
        echo json_encode($get_spm);
    }
}