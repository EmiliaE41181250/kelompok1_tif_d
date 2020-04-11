<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_pelanggan extends CI_Controller {

    function __construct(){
        parent::__construct();	
            // ini adalah function untuk memuat model bernama m_data
        $this->load->model('m_data');
        // 
            $this->load->helper('url');
        }

        function index(){
            // ini adalah variabel array $data yang memiliki index user, berguna untuk menyimpan data 
            $data['paket'] = $this->m_data->tampil_data()->result();

            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('admin/v_paket');
            $this->load->view('templates/footer');
        }