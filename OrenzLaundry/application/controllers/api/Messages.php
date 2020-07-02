<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

// use namespace
use Restserver\Libraries\REST_Controller;

class Messages extends REST_Controller {
    
  function __construct()
  {
      // Construct the parent class
      parent::__construct();
      $this->load->model('M_messages');
      $this->load->library('PrimsLib');
      $this->methods['users_get']['limit'] = 500; // 500 requests per hour per user/key
      $this->methods['users_post']['limit'] = 100; // 100 requests per hour per user/key
      $this->methods['users_delete']['limit'] = 50; // 50 requests per hour per user/key
  }

  function getAllMessages_post()
  {
    $user = $this->post("user");
    $response = $this->m_messages->getAllMessages($user);
    if ($response['data']!=null) {
      $this->response($response);
    }else{
        $response['status']=502;
        $response['error']=true;
        $response['message']='Data pesan tidak ditemukan!';
        $this->response($response);
    }
  }

  public function getMessageId_post()
  {
    $id = $this->post('id');
    $response = $this->m_messages->getMessagesId($id);
    if ($response['data']!=null) {
      $this->response($response);
    }else{
        $response['status']=502;
        $response['error']=true;
        $response['message']='Data pesan tidak ditemukan!';
        $this->response($response);
    }
  }

  function getAllNotification_post()
  {
    $user = $this->post("user");
    $response = $this->m_messages->getAllNotification($user);
    if ($response['data']!=null) {
      $this->response($response);
    }else{
        $response['status']=502;
        $response['error']=true;
        $response['message']='Data pesan tidak ditemukan!';
        $this->response($response);
    }
  }

  public function getNotificationId_post()
  {
    $id = $this->post('id');
    $response = $this->m_messages->getNotificationId($id);
    if ($response['data']!=null) {
      $this->response($response);
    }else{
        $response['status']=502;
        $response['error']=true;
        $response['message']='Data pesan tidak ditemukan!';
        $this->response($response);
    }
  }

  public function deleteNotificationId_post()
  {
    $id = $this->post("id");
    $response = $this->m_messages->deleteNotificationId($id);
    if ($response['data']==true) {
      $this->response($response);
    }else{
        $response['status']=502;
        $response['error']=true;
        $response['message']='Data pesan tidak ditemukan!';
        $this->response($response);
    }
  }

  public function deleteMessageId_post()
  {
    $id = $this->post("id");
    $response = $this->m_messages->deleteMessageId($id);
    if ($response['data']==true) {
      $this->response($response);
    }else{
        $response['status']=502;
        $response['error']=true;
        $response['message']='Gagal menghapus notifikasi!';
        $this->response($response);
    }
  }

  public function updateKonfirmasiProses_put()
  {
    $id = $this->put('id');
    $response = $this->m_messages->updateKonfirmasiProses($id);
    if ($response['data']==true) {
      $this->response($response);
    }else{
        $response['status']=502;
        $response['error']=true;
        $response['message']='Anda gagal melakukan update !';
        $this->response($response);
    }
  }

  public function sendMessage_post()
  {
    // memeriksa apakah ada id pada database
    $row_id = $this->m_messages->getId()->num_rows();
    // mengambil 1 baris data terakhir
    $old_id = $this->m_messages->getId()->row();

    if($row_id>0){
      // melakukan auto number dari id terakhir
    $id = $this->PrimsLib->autonumber($old_id->id_pesan, 3, 12);
    }else{
      // generate id pertama kali jika tidak ada data sama sekali di dalam database
    $id = 'PSN000000000001';
    }

    $user = $this->post("id_user");
    $subjek = $this->post("subjek");
    $body = $this->post("body");
    
    $data = array("id_pesan" => $id,
                  "id_user" => $user,
                  "subjek_pesan" => $subjek,
                  "isi_pesan" => $body,
                  'tanggal_pesan' => date("Y-m-d")
                );


    $response = $this->m_messages->sendMessage($data);
    if ($response['data']==true) {
      $this->response($response);
    }else{
        $response['status']=502;
        $response['error']=true;
        $response['message']='Data pesan gagal ditambahkan!';
        $this->response($response);
    }
  }
  
}