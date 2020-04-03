<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Material extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        cek_login();
    }

    public function index()
    {
        $queryMaterial = "SELECT * FROM `material` 
                          ORDER BY `tipe` DESC, `nomor_material` ASC, `nama_material` ASC";
        $data['material'] = $this->db->query($queryMaterial)->result_array();
        
        $data['satuan'] = $this->db->get('satuan')->result_array();
        $data['title'] = 'Database Material';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/header_script/material');
        $this->load->view('templates/sidebar');
        $this->load->view('database/material', $data);
        $this->load->view('templates/footer_script/material');
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $this->form_validation->set_rules('nomor_material', 'Nomor Material', 'required|trim');
        $this->form_validation->set_rules('nama_material', 'Nama Material', 'required|trim');
        $this->form_validation->set_rules('nama_material_sap', 'Nama Material SAP', 'required|trim');
        $this->form_validation->set_rules('satuan', 'Satuan', 'required');
        $this->form_validation->set_rules('tipe', 'Tipe Material', 'required');

        if( $this->form_validation->run() == false ) {
            $this->session->set_flashdata('notifikasi', '<script>showDangerToast()</script>');
            redirect('material');
        } else {
            $data = [
                'nomor_material' => htmlspecialchars($this->input->post('nomor_material', true)),
                'nama_material' => htmlspecialchars($this->input->post('nama_material', true)),
                'nama_material_sap' => htmlspecialchars($this->input->post('nama_material_sap', true)),
                'satuan' => $this->input->post('satuan'),
                'tipe' => $this->input->post('tipe')
            ];

            $this->db->insert('material', $data);
            $this->session->set_flashdata('notifikasi', '<script>showSuccessToast()</script>');
            redirect('material');
        }
    }

    public function getMaterial()
    {
        $id = $_POST['id'];
        $queryMaterial = $this->db->get_where('material', ['id' => $id])->row_array();

        echo json_encode($queryMaterial);
    }

    public function edit()
    {
        $this->form_validation->set_rules('nomor_material', 'Nomor Material', 'required|trim');
        $this->form_validation->set_rules('nama_material', 'Nama Material', 'required|trim');
        $this->form_validation->set_rules('nama_material_sap', 'Nama Material SAP', 'required|trim');
        $this->form_validation->set_rules('satuan', 'Satuan', 'required');
        $this->form_validation->set_rules('tipe', 'Tipe Material', 'required');

        if( $this->form_validation->run() == false ) {
            $this->session->set_flashdata('notifikasi', '<script>showDangerToast()</script>');
            redirect('material');
        } else {
            $data = [
                'nomor_material' => htmlspecialchars($_POST['nomor_material']),
                'nama_material' => htmlspecialchars($_POST['nama_material']),
                'nama_material_sap' => htmlspecialchars($_POST['nama_material_sap']),
                'satuan' => $_POST['satuan'],
                'tipe' => $_POST['tipe']
            ];

            $update = $this->db->update('material', $data, ['id' => $_POST['id']]);
    
            if( $update ) {
                $this->session->set_flashdata('notifikasi', '<script>updateSuccessToast()</script>');
                redirect('material');
            } else {
                $this->session->set_flashdata('notifikasi', '<script>showDangerToast()</script>');
                redirect('material');
            }
        }
    }

    public function hapus($id) {
        $this->db->delete('material', ['id' => $id]);

        if( !$this->db->affected_rows() ) {
            $this->session->set_flashdata('notifikasi', '<script>deleteFailToast()</script>');
            redirect('material');
        } else {
            $this->session->set_flashdata('notifikasi', '<script>deleteSuccessToast()</script>');
            redirect('material');
        }
    }
}