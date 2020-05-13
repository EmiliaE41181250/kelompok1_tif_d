<?php

Class Fungsi {

    protected $ci;

    function __construct() {
        $this->ci = & get_instance();
    }

    function user_login() {
        $this->ci->load->model('m_user');
        $userid = $this->ci->session->userdata('user id');
        $user_data = $this->ci->m_user->get($user_id)->row();
        return $user_data;
    }

}