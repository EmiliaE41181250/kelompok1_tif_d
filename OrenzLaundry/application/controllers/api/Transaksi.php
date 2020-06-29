<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

// use namespace
use Restserver\Libraries\REST_Controller;

class Transaksi extends REST_Controller {
    
  function __construct()
  {
      // Construct the parent class
      parent::__construct();
      $this->load->model('m_notif');
      $this->load->library('primslib');
      $this->load->library('configemail');
      $this->methods['users_get']['limit'] = 500; // 500 requests per hour per user/key
      $this->methods['users_post']['limit'] = 100; // 100 requests per hour per user/key
      $this->methods['users_delete']['limit'] = 50; // 50 requests per hour per user/key
  }

  function index_get()
  {
    $response = $this->m_notif->getAllmobile();
    if ($response['data']!=null) {
      $this->response($response);
    }else{
        $response['status']=502;
        $response['error']=true;
        $response['message']='Data waktu kurir tidak ditemukan!';
        $this->response($response);
    }
  }

  function getNamaPaketMobile_post()
  {
    $id_paket = $this->post('id_paket');
    $response = $this->m_notif->getNamaPaketMobile($id_paket);
    if ($response['data']!=null) {
      $this->response($response);
    }else{
        $response['status']=502;
        $response['error']=true;
        $response['message']='Data waktu kurir tidak ditemukan!';
        $this->response($response);
    }
  }

  function batalPesanan_post()
  {
    $id = $this->post('id');
    $response = $this->m_notif->batalPesananMobile($id);
    if ($response['data']==true) {
      $this->response($response);
    }else{
        $response['status']=502;
        $response['error']=true;
        $response['message']='Gagal membatalkan pesanan';
        $this->response($response);
    }
  }

  public function updateantartrsmobile_put()
  {
    $id_transaksi = $this->put('id_transaksi');
    $id_user = $this->put('id_user');
    $alamat = $this->put("alamat");
    $lat = $this->put("lat");
    $lang = $this->put("lang");
    $tglJemput = $this->put("tgl_antar")." 00:00:00";
    $waktu = $this->put("waktu_antar");

    $where = array('id_transaksi' => $id_transaksi);

    $dataTrs = array(
                      "id_waktu" => $waktu,
                      "tgl_antar" => $tglJemput,
                      "alamat_antar" => $alamat . ',' . $lat . ',' . $lang,
                      "updated_by" => $id_user,
                      "updated_at" => date("Y-m-d H:i:s")
    );

    $response = $this->m_notif->updateantartrsmobile($dataTrs, $where);
    if ($response['data']==true) {
      $this->response($response);

      // kirim notif ke HP
      $datatoken = $this->db->get_where('user', array('id_user' => $id_user));
      $tokenM = $datatoken->row()->device_token;
      $title = "Transaksi anda berhasil dilakukan!";
      $message = "Tunggu sebentar, kami akan menjemput cucian ke lokasi anda sesuai jadwal!";
      $payload = array('intent' => 'notifikasi');
      $firebase = $this->primslib->SendNotification($tokenM, $title, $message, $payload);
      $response['firebase']=$firebase;
    }else{
        $response['status']=502;
        $response['error']=true;
        $response['message']='Gagal melakukan input lokasi antar.';
        $this->response($response);
    }
  }

  function insertTrsMobile_post()
  {
    // memeriksa apakah ada id pada database
    $row_id = $this->m_notif->getId()->num_rows();
    // mengambil 1 baris data terakhir
    $old_id = $this->m_notif->getId()->row();

    if($row_id>0){
      // melakukan auto number dari id terakhir
    $id = $this->primslib->autonumber($old_id->id_transaksi, 3, 12);
    }else{
      // generate id pertama kali jika tidak ada data sama sekali di dalam database
    $id = 'TRS000000000001';
    }

    $id_user = $this->post("id_user");
    $id_promo = $this->post("id_promo");
    $id_paket = $this->post("id_paket");
    $id_admin = "ADM000000000001";
    $tgl_transaksi = date("Y-m-d H:i:s");
    $alamat = $this->post("alamat");
    $lat = $this->post("lat");
    $lang = $this->post("lang");
    $tglJemput = $this->post("tgl_jemput")." 00:00:00";
    $waktu = $this->post("waktu_jemput");
    $status = "0";
    $catatan = "";

    $harga = $this->db->get_where('paket', array('id_paket' => $id_paket))->row()->harga;
    
    $dataTrs = array("id_transaksi" => $id,
                      "id_user" => $id_user,
                      "id_admin" => $id_admin,
                      "id_promo" => $id_promo,
                      "id_waktu" => $waktu,
                      "total_harga" => $harga,
                      "tgl_transaksi" => $tgl_transaksi,
                      "tgl_jemput" => $tglJemput,
                      "alamat_jemput" => $alamat . ',' . $lat . ',' . $lang,
                      "status" => $status,
                      "catatan" => $catatan
    );

    $dataDetail = array(
      "id_transaksi" => $id,
      "id_paket" => $id_paket,
      "sub_total" => $harga,
      "berat" => 1
    );

    $response = $this->m_notif->insertTrs($dataTrs, $dataDetail);
    if (($response['dataTrs']==true) && ($response['dataDetail']==true) ) {

      // kirim notif ke HP
      $datatoken = $this->db->get_where('user', array('id_user' => $id_user));
      $tokenM = $datatoken->row()->device_token;
      $title = "Transaksi anda berhasil dilakukan!";
      $message = "Tunggu sebentar, kami akan menjemput cucian ke lokasi anda sesuai jadwal!";
      $payload = array('intent' => 'notifikasi');
      $firebase = $this->primslib->SendNotification($tokenM, $title, $message, $payload);
      $response['firebase']=$firebase;

      // kirim notif ke Email
      $email = $datatoken->row()->email;
      $this->load->library('configemail');
      $config = $this->configemail->config_email();
      $this->load->library('email', $config);
      $this->email->from('admin@orenzlaundry.com', 'Orenz Laundry');
      $this->email->to($email);
      $subject = 'Transaksi anda berhasil | Orenz Laundry';
      $this->email->subject($subject);
      $nama_user = $datatoken->row()->nama_user;
      $pesan = 'Anda telah melakukan transaksi pemesanan di Orenz laundry, kami akan melanjutkan proses pesanan!<br> 
          Selanjutnya kami akan menjemput pesanan ke lokasi yang telah anda tentukan, ditunggu yahh!!';
      $message = '';
      $this->load->library('EmailtoUser');
      $message = $this->emailtouser->transaksiberhasil($subject, $nama_user, $pesan);
      $this->email->message($message);
      
      $response['gmail']=$this->email->send();
      $response['data_email']=$email;

      $this->response($response);
    }else{
        $response['status']=502;
        $response['error']=true;
        $response['message']='Transaksi gagal ditambahkan!';
        $this->response($response);
    }



  }
}