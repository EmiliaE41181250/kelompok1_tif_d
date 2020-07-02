<?php

class Dashboard extends CI_Controller 
{
  function __construct()
  {
    parent::__construct();
    if ($this->session->userdata('nama') == '') {
      redirect('admin/login/');
    }
    $this->load->model('M_dashboard');
  }
  
  // Menampilkan dashboard
  public function index()
  {
    $data['pelanggan'] = $this->M_dashboard->getAll();
    $data['history'] = $this->M_dashboard->getHistory();
    $data['bulanan']= $this->M_dashboard->getBulanan()->row()->total_harga;
    $data['tahunan']= $this->M_dashboard->getTahunan()->row()->total_harga;
    $data['favorit']= $this->M_dashboard->getFavorit()->result();
    $data['grafik']= $this->M_dashboard->getMingguan()->result();
    $this->load->view('templates/header');
    $this->load->view('templates/sidebar');
    $this->load->view('admin/dashboard', $data);
    $this->load->view('templates/footer');
  }
}
