<?php

class Dashboard extends CI_Controller 
{
  function __construct()
  {
    parent::__construct();
    if ($this->session->userdata('nama') == '') {
      redirect('admin/login/');
    }
    $this->load->model('m_dashboard');
  }
  
  // Menampilkan dashboard
  public function index()
  {
    $data['pelanggan'] = $this->m_dashboard->getAll();
    $data['history'] = $this->m_dashboard->getHistory();
    $data['bulanan']= $this->m_dashboard->getBulanan()->row()->total_harga;
    $data['tahunan']= $this->m_dashboard->getTahunan()->row()->total_harga;
    $data['favorit']= $this->m_dashboard->getFavorit()->result();
    $data['grafik']= $this->m_dashboard->getMingguan()->result();
    $this->load->view('templates/header');
    $this->load->view('templates/sidebar');
    $this->load->view('admin/dashboard', $data);
    $this->load->view('templates/footer');
  }
}
