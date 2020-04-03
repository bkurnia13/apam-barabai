<?php

function cek_login()
{
    $ci = get_instance();

    if( !$ci->session->userdata('username') ) {
        redirect('auth');
    } else {
        $url = $ci->uri->segment(1);
        $role_id = $ci->session->userdata('role_id');

        if ( $role_id != 1 ) {
            if( $url != 'dashboard' ) {
                $querySubmenu = $ci->db->get_where('menu_level_2', ['url' => $url])->row_array();
                
                $menu_id = $querySubmenu['menu_id'];
                $queryMenu = $ci->db->get_where('menu_level_1', ['id' => $menu_id])->row_array();
    
                $group_id = $queryMenu['group_id'];
                
                $access = $ci->db->get_where('user_access_menu', [
                    'role_id' => $role_id,
                    'group_id' => $group_id
                ]);
    
                if( $access->num_rows() < 1 ) {
                    redirect('auth/blocked');
                }
            }
        }
    }
}