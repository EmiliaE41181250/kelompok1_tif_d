<?php
class laporan_rentang_hari extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_rentang_hari');
    }
    function index()
    {
        $x['data'] = $this->m_rentang_hari->get_data_transaksi();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('admin/laporan/v_rentang_hari', $x);
        $this->load->view('templates/footer');
    }
}
