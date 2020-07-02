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
      $this->load->model('M_home');
      $this->load->library('PrimsLib');
      $this->methods['users_get']['limit'] = 500; // 500 requests per hour per user/key
      $this->methods['users_post']['limit'] = 100; // 100 requests per hour per user/key
      $this->methods['users_delete']['limit'] = 50; // 50 requests per hour per user/key
  }

  function getGambarPromosi_get()
  {
    $response = $this->M_home->getAllpromosi();
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
    $response = $this->M_home->getUsermobile($id);
    if ($response['data']!=null) {
      $this->response($response);
    }else{
        $response['status']=502;
        $response['error']=true;
        $response['message']='Data promosi tidak ditemukan!';
        $this->response($response);
    }
  }

  public function updatetokendevice_put()
  {
    $id_user = $this->put('id_user');
    $device_token = $this->put('device_token');

    $data = array('device_token' => $device_token);
    $where = array('id_user' => $id_user);
    $response = $this->M_home->update_tokendevice($data, $where);
    if ($response['data']==true) {
      $this->response($response);
    }else{
        $response['status']=502;
        $response['error']=true;
        $response['message']='Gagal memperbarui token device tidak ditemukan!';
        $this->response($response);
    }
  }

  public function login_post()
  {
    $response = $this->M_home->auth_login($this->post('email'),$this->post('password'));
    $this->response($response);
  }

  public function register_post(){

    $row_id = $this->M_home->getId()->num_rows();
    // mengambil 1 baris data terakhir
    $old_id = $this->M_home->getId()->row();

    if($row_id>0){
      // melakukan auto number dari id terakhir
    $id = $this->PrimsLib->autonumber($old_id->id_user, 3, 12);
    }else{
      // generate id pertama kali jika tidak ada data sama sekali di dalam database
    $id = 'USR000000000001';
    }

    $response = $this->M_home->add_login(
        $id,
        $this->input->post('nama'),
        $this->input->post('email'),
        password_hash($this->post('password'), PASSWORD_DEFAULT),
        $this->input->post('token_device')
      );
      
    $datatoken = $this->db->get_where('user',array('email' => $this->input->post('email')));
    $tokenM = $datatoken->row()->device_token;
    $firebase = $this->PrimsLib->SendNotification($tokenM, '', '', '');
    $response['firebase']=$firebase;
    $this->response($response);
  }

}