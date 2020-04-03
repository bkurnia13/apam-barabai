<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        cek_login();
    }

    public function index()
    {
        $username = $this->session->userdata('username');
        $data['user'] = $this->db->get_where('user', ['username' => $username])->row_array();
        $data['title'] = 'Dashboard';
        
        if ( $data['user']['role_id'] == 1 ) {
            $data['dashboard'] = 'root';
        } elseif ( $data['user']['role_id'] == 2 ) {
            $data['dashboard'] = 'supervisor';
        } elseif ( $data['user']['role_id'] == 3 ) {
            $data['dashboard'] = 'admin';
        } else {
            $data['dashboard'] = 'user';
        }

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('dashboard/' . $data['dashboard'], $data);
        $this->load->view('templates/footer');
    }
}