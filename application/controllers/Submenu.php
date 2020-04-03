<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Submenu extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        cek_login();
    }

    public function index()
    {
        $querySubmenu = "SELECT `menu_level_2`.`id`, `menu_id`, `submenu_name`, `url`, `menu_level_2`.`is_active`, `menu_name`
                           FROM `menu_level_2` JOIN `menu_level_1`
                             ON `menu_id` = `menu_level_1`.`id`
                       ORDER BY `menu_name`, `submenu_name` ASC
                        ";
        $queryMenu = "SELECT `id`, `menu_name` FROM `menu_level_1` ORDER BY `menu_name`";

        $data['submenu'] = $this->db->query($querySubmenu)->result_array();
        $data['menu'] = $this->db->query($queryMenu)->result_array();
        $data['title'] = 'Database Submenu';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/header_script/submenu');
        $this->load->view('templates/sidebar');
        $this->load->view('database/submenu', $data);
        $this->load->view('templates/footer_script/submenu');
        $this->load->view('templates/footer');
    }

    public function tambahSubmenu()
    {
        $this->form_validation->set_rules('menu', 'Menu', 'required');
        $this->form_validation->set_rules('submenu', 'Submenu', 'required|trim');

        if( $this->form_validation->run() == false ) {
            $this->session->set_flashdata('notifikasi', '<script>showDangerToast()</script>');
            redirect('submenu');
        } else {
            $is_active = $this->input->post('is_active') == null ? 0 : 1;

            $data = [
                'menu_id' => $this->input->post('menu'),
                'submenu_name' => htmlspecialchars($this->input->post('submenu', true)),
                'url' => htmlspecialchars($this->input->post('url', true)),
                'is_active' => $is_active
            ];

            $this->db->insert('menu_level_2', $data);
            $this->session->set_flashdata('notifikasi', '<script>showSuccessToast()</script>');
            redirect('submenu');
        }
    }

    public function getSubmenu()
    {
        $id = $_POST['id'];
        $querySubmenu = "SELECT `menu_level_2`.`id`, `menu_id`, `submenu_name`, `url`, `menu_level_2`.`is_active`, `menu_name`
                           FROM `menu_level_2` JOIN `menu_level_1`
                             ON `menu_id` = `menu_level_1`.`id`
                          WHERE `menu_level_2`.`id` = $id
                        ";

        $submenu = $this->db->query($querySubmenu)->row_array();
        echo json_encode($submenu);
    }

    public function editSubmenu()
    {
        if( !isset($_POST['is_active']) ) { $_POST['is_active'] = 0; }
        
        $data = [
            'menu_id' => $_POST['menu'],
            'submenu_name' => $_POST['submenu'],
            'url' => $_POST['url'],
            'is_active' => $_POST['is_active']
        ];

        $update = $this->db->update('menu_level_2', $data, [ 'id' => $_POST['id'] ]);
        if( $update ) {
            $this->session->set_flashdata('notifikasi', '<script>updateSuccessToast()</script>');
            redirect('submenu');
        } else {
            $this->session->set_flashdata('notifikasi', '<script>updateFailToast()</script>');
            redirect('submenu');
        }
    }

    public function hapus($id)
    {
        $this->db->delete('menu_level_2', ['id' => $id]);

        if( !$this->db->affected_rows() ) {
            $this->session->set_flashdata('notifikasi', '<script>deleteFailToast()</script>');
            redirect('submenu');
        } else {
            $this->session->set_flashdata('notifikasi', '<script>deleteSuccessToast()</script>');
            redirect('submenu');
        }
    }
}