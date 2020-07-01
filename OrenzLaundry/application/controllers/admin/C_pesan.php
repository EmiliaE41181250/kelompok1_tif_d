<?php

class C_isipaket extends CI_Controller 
{
  // method yang akan otomatis dijalankan ketika class dibuat
  function __construct()
  {
    parent::__construct();
    $this->load->model('m_isipaket');
    $this->load->library('primslib');
    if ($this->session->userdata('nama') == '') {
      redirect('admin/login/');
    }
  }

  // Menampilkan tabel Promo
  public function index()
  {
    $data['isi_paket'] = $this->m_isipaket->getAll('isi_paket')->result();
    $this->load->view('templates/header');
    $this->load->view('templates/sidebar');
    $this->load->view('admin/isipaket/v_isipaket', $data);
    $this->load->view('templates/footer');
  }