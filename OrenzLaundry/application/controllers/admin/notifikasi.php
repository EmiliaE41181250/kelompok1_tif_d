<?php
defined('BASEPATH') or exit('No direct script access allowed');

class notifikasi extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        // ini adalah function untuk memuat model bernama m_data
        $this->load->model('m_notif');
        $this->load->library('primslib');
        if ($this->session->userdata('nama') == '') {
            redirect('admin/login/');
        }
    }

    function index()
    {
        // ini adalah variabel array $data yang memiliki index user, berguna untuk menyimpan data 

        $data['detail_transaksi'] = $this->m_notif->getAll('detail_transaksi')->result();
        $data['transaksi'] = $this->m_notif->tampil_data('transaksi')->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('admin/notif/v_notif', $data);
        $this->load->view('templates/footer');
    }


    public function detail($id)
    {
        $this->load->model('m_notif');
        $detail = $this->m_notif->detail_data($id);
        $data['detail'] = $detail;

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('admin/notif/v_detailnotif', $data);
        $this->load->view('templates/footer');
    }
}
