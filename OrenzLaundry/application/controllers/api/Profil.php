<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

// use namespace
use Restserver\Libraries\REST_Controller;

class Profil extends REST_Controller {
    
  function __construct()
  {
      // Construct the parent class
      parent::__construct();
      $this->load->model('M_data_saya');
      $this->load->library('PrimsLib');
      $this->methods['users_get']['limit'] = 500; // 500 requests per hour per user/key
      $this->methods['users_post']['limit'] = 100; // 100 requests per hour per user/key
      $this->methods['users_delete']['limit'] = 50; // 50 requests per hour per user/key
  }

  function getUser_post()
  {
    $response = $this->M_data_saya->getUser($this->post('id_user'));
    if ($response['data']!=null) {
      $this->response($response);
    }else{
        $response['status']=502;
        $response['error']=true;
        $response['message']='Data user tidak ditemukan!';
        $this->response($response);
    }
  }

  function updateProfil_put()
  {
    $email = $this->db->get_where('user', array('id_user' => $this->put('id_user')))->row()->email;
    if($this->put('email') == $email){
      $data = array('nama_user' => $this->put('nama_user'),
                  'email' => $this->put('email'),
                  'alamat' => $this->put('alamat'),
                  'no_hp' => $this->put('no_hp'),
                  'jenis_kelamin' => $this->put('jenis_kelamin'),
                  'username' => $this->put('username'),
                  'tgl_lahir' => $this->put('tgl_lahir'),
                  'status' => 0,
                  'updated_by' => $this->put('id_user'),
                  'updated_at' => date('Y-m-d H:i:s'));
    }else{
      $data = array('nama_user' => $this->put('nama_user'),
                  'email' => $this->put('email'),
                  'alamat' => $this->put('alamat'),
                  'no_hp' => $this->put('no_hp'),
                  'jenis_kelamin' => $this->put('jenis_kelamin'),
                  'username' => $this->put('username'),
                  'tgl_lahir' => $this->put('tgl_lahir'),
                  'updated_by' => $this->put('id_user'),
                  'updated_at' => date('Y-m-d H:i:s'));
    }

    $where = array('id_user' => $this->put('id_user'));
    $response = $this->M_data_saya->updateUser($data, $where);
    if ($response['data']==true) {
      $this->response($response);
    }else{
        $response['status']=502;
        $response['error']=true;
        $response['message']='Gagal memperbarui token device tidak ditemukan!';
        $this->response($response);
    }
  }

  function uploadfoto_put()
  {
    $response = $this->M_data_saya->uploadfoto(
      $this->put('id_user'),
      $this->put('foto')
      );
    $this->response($response);
  }
}