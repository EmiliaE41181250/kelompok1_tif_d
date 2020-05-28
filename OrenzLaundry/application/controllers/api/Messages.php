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
      $this->load->model('m_messages');
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
  
}