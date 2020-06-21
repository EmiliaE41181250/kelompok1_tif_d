<?php

class Dashboard extends CI_Controller 
{
  function __construct()
  {
    parent::__construct();
    if ($this->session->userdata('nama') == '') {
      redirect('admin/login/');
    }
  }

  // Menampilkan dashboard
  public function index()
  {
    $this->load->view('templates/header');
    $this->load->view('templates/sidebar');
    $this->load->view('admin/dashboard');
    $this->load->view('templates/footer');
  }
}
