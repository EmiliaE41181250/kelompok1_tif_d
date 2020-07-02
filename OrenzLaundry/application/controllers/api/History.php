<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

//use namespace
use Restserver\Libraries\REST_Controller;

class History extends REST_Controller{

    function __construct()
    {
      // Construct the parent class
        parent::__construct();
        $this->load->model('M_history');
        $this->load->library('PrimsLib');
        $this->methods['users_get']['limit'] = 500; // 500 requests per hour per user/key
        $this->methods['users_post']['limit'] = 100; // 100 requests per hour per user/key
        $this->methods['users_delete']['limit'] = 50; // 50 requests per hour per user/key
    }

    function getAllHistory_post()
    {
        $user = $this->post("user");
        $response = $this->M_history->getAllHistory($user);
        if ($response['data']!=null) {
            $this->response($response);
        }else{
            $response['status']=502;
            $response['error']=true;
            $response['message']='Data history tidak ditemukan!';
            $this->response($response);
        }
    }

    public function getHistoryId_post()
    {
        $id = $this->post('id');
        $response = $this->M_history->getHistoryId($id);
        if ($response['data']!=null) {
            $this->response($response);
        }else{
            $response['status']=502;
            $response['error']=true;
            $response['message']='Data history tidak ditemukan!';
            $this->response($response);
        }
    }

    public function getAllTransaksi_post()
    {
        $user = $this->post("user");
        $response = $this->M_history->getAllTransaksi($user);
        if ($response['data']!=null) {
            $this->response($response);
        }else{
            $response['status']=502;
            $response['error']=true;
            $response['message']='Data transaksi tidak ditemukan!';
            $this->response($response);
        }
    }

    public function getTransaksiId_post()
    {
        $id = $this->post('id');
        $response = $this->M_history->getTransaksiId($id);
        if ($response['data']!=null) {
            $this->response($response);
        }else{
            $response['status']=502;
            $response['error']=true;
            $response['message']='Data transaksi tidak ditemukan!';
            $this->response($response);
        }
    }

    public function deleteHistoryId_post()
    {
        $id = $this->post("id");
        $response = $this->M_history->deleteHistoryId($id);
        if ($response['data']==true) {
            $this->response($response);
        }else{
            $response['status']=502;
            $response['error']=true;
            $response['message']='Gagal menghapus history!';
            $this->response($response);
        }
    }

    public function deleteTransaksiId_post()
    {
        $id = $this->post("id");
        $response = $this->M_history->deleteTransaksiId($id);
        if ($response['data']==true) {
            $this->response($response);
        }else{
            $response['status']=502;
            $response['error']=true;
            $response['message']='Gagal menghapus transaksi!';
            $this->response($response);
        }
    }



}