<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

// use namespace
use Restserver\Libraries\REST_Controller;

class Home extends REST_Controller {
    
  function __construct()
  {
      // Construct the parent class
      parent::__construct();
      $this->load->model('m_home');
      $this->load->library('primslib');
      $this->methods['users_get']['limit'] = 500; // 500 requests per hour per user/key
      $this->methods['users_post']['limit'] = 100; // 100 requests per hour per user/key
      $this->methods['users_delete']['limit'] = 50; // 50 requests per hour per user/key
  }

  function getGambarPromosi_get()
  {
    $response = $this->m_home->getAllpromosi();
    if ($response['data']!=null) {
      $this->response($response);
    }else{
        $response['status']=502;
        $response['error']=true;
        $response['message']='Data promosi tidak ditemukan!';
        $this->response($response);
    }
  }

  public function getUser_post()
  {
    $id = $this->post("id");
    $response = $this->m_home->getUsermobile($id);
    if ($response['data']!=null) {
      $this->response($response);
    }else{
        $response['status']=502;
        $response['error']=true;
        $response['message']='Data promosi tidak ditemukan!';
        $this->response($response);
    }
  }

  public function login_post()
  {
    $response = $this->m_home->auth_login($this->post('email'),$this->post('password'));
    $this->response($response);
  }

  public function register_post(){

    $row_id = $this->m_home->getId()->num_rows();
    // mengambil 1 baris data terakhir
    $old_id = $this->m_home->getId()->row();

    if($row_id>0){
      // melakukan auto number dari id terakhir
    $id = $this->primslib->autonumber($old_id->id_user, 3, 12);
    }else{
      // generate id pertama kali jika tidak ada data sama sekali di dalam database
    $id = 'USR000000000001';
    }
    $response = $this->m_home->add_login(
        $id,
        $this->input->post('nama'),
        $this->input->post('email'),
        password_hash($this->post('password'), PASSWORD_DEFAULT)
      );
    $this->response($response);
  }

}