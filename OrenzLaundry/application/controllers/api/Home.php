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
    $id = $this->primslib->autonumber($old_id->id_user, 3, 12);
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
      
      if($response){

        $email = $this->post('email');

        $this->load->library('ConfigEmail');
        $config = $this->configemail->config_email();
        // Load library email dan konfigurasinya
        $this->load->library('Email', $config);
        // Email dan nama pengirim
        $this->email->from('admin@orenzlaundry.com', 'Orenz Laundry');
        // Email penerima
        $this->email->to($email); // Ganti dengan email tujuan
        // Lampiran email, isi dengan url/path file
        // $this->email->attach('https://masrud.com/content/images/20181215150137-codeigniter-smtp-gmail.png');
        // Subject email
        $subject = 'Verifikasi Email Anda | Orenz Laundry';
        $this->email->subject($subject);
        // Isi email
        $this->db->where('email', $email);
        $get_user = $this->db->query("SELECT * FROM user WHERE email = '$email'")->row();
        $nama_user = $get_user->nama_user;
        $kode_token = $get_user->token;
        $pesan = 'Terimakasih telah mendaftar dan bergabung dengan kami! Mohon verifikasi akun anda untuk memaksimalkan fitur dari aplikasi kami,<br> 
            Silahkan verifikasi email anda dengan kode dibawah ini.';
        $message = '';
        $this->load->library('EmailtoUser');
        $message = $this->emailtouser->verifikasiakun($subject, $nama_user, $pesan, $kode_token, $email);
        $this->email->message($message);
        // Tampilkan pesan sukses atau error
        $this->email->send();
  
      }
    $this->response($response);
  }

}