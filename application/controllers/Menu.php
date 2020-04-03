<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        cek_login();
    }

    public function index()
    {
        $queryMenu = "SELECT `menu_level_1`.`id`, `group_id`, `menu_name`, `icon`, `submenu`, `is_active`, `menu_group`
                        FROM `menu_level_1` JOIN `menu_group`
                          ON `group_id` = `menu_group`.`id`
                    ORDER BY `group_id` ASC, `menu_level_1`.`id` ASC
                    ";
        
        $data['menu'] = $this->db->query($queryMenu)->result_array();
        $data['menu_group'] = $this->db->get('menu_group')->result_array();
        $data['title'] = 'Database Menu';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/header_script/menu');
        $this->load->view('templates/sidebar');
        $this->load->view('database/menu', $data);
        $this->load->view('templates/footer_script/menu');
        $this->load->view('templates/footer');
    }

    public function tambahMenu()
    {
        $this->form_validation->set_rules('menu', 'Nama Menu', 'required|trim');
        $this->form_validation->set_rules('menu_group', 'Grup Menu', 'required');

        if( $this->form_validation->run() == false ) {
            $this->session->set_flashdata('notifikasi', '<script>showDangerToast()</script>');
            redirect('menu');
        } else {
            $submenu = $this->input->post('submenu') == null ? 0 : 1;
            $is_active = $this->input->post('is_active') == null ? 0 : 1;

            $data = [
                'group_id' => $this->input->post('menu_group'),
                'menu_name' => htmlspecialchars($this->input->post('menu', true)),
                'icon' => htmlspecialchars($this->input->post('icon', true)),
                'submenu' => $submenu,
                'is_active' => $is_active
            ];

            $this->db->insert('menu_level_1', $data);
            $this->session->set_flashdata('notifikasi', '<script>showSuccessToast()</script>');
            redirect('menu');
        }
    }

    public function getMenu()
    {
        $id = $_POST['id'];
        $queryGetMenu = "SELECT `menu_level_1`.`id`, `group_id`, `menu_name`, `icon`, `submenu`, `is_active`, `menu_group`
                           FROM `menu_level_1` JOIN `menu_group`
                             ON `group_id` = `menu_group`.`id`
                          WHERE `menu_level_1`.`id` = $id
                        ";
        $getMenu = $this->db->query($queryGetMenu)->row_array();
        echo json_encode($getMenu);
    }

    public function editMenu()
    {
        if( !isset($_POST['is_active']) ) { $_POST['is_active'] = 0; }
        if( !isset($_POST['submenu']) ) { $_POST['submenu'] = 0; }
        
        $data = [
            'group_id' => $_POST['menu_group'],
            'menu_name' => $_POST['menu'],
            'icon' => $_POST['icon'],
            'submenu' => $_POST['submenu'],
            'is_active' => $_POST['is_active']
        ];

        $update = $this->db->update('menu_level_1', $data, [ 'id' => $_POST['id'] ]);
        if( $update ) {
            $this->session->set_flashdata('notifikasi', '<script>updateSuccessToast()</script>');
            redirect('menu');
        } else {
            $this->session->set_flashdata('notifikasi', '<script>updateFailToast()</script>');
            redirect('menu');
        }
    }

    public function hapus($id)
    {
        $this->db->delete('menu_level_1', ['id' => $id]);

        if( !$this->db->affected_rows() ) {
            $this->session->set_flashdata('notifikasi', '<script>deleteFailToast()</script>');
            redirect('menu');
        } else {
            $this->session->set_flashdata('notifikasi', '<script>deleteSuccessToast()</script>');
            redirect('menu');
        }
    }
}