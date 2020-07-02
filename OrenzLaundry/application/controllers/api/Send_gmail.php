<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

// use namespace
use Restserver\Libraries\REST_Controller;

class Send_gmail extends REST_Controller {
    
        function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model('M_lupas');
        $this->load->model('M_login');
        $this->methods['users_get']['limit'] = 500; // 500 requests per hour per user/key
        $this->methods['users_post']['limit'] = 100; // 100 requests per hour per user/key
        $this->methods['users_delete']['limit'] = 50; // 50 requests per hour per user/key
    }

    function index_get()
    {
        $response = $this->M_login->all_login();
        $this->response($response);
    }

    public function checkuser_post()
    {
        $search = $this->post('search');
        $response = $this->M_lupas->getUser($this->post('search'));
        if ($response['data']!=null) {
            $this->response($response);
        }else{
            $response['status']=502;
            $response['error']=true;
            $response['message']='Username atau Email anda tidak terdafar!';
            $this->response($response);
        }

        if ($response['data']!=null) {
            $get_user = $this->db->query("SELECT * FROM user WHERE email = '$search' OR username = '$search'")->row();
            $email = $get_user->email;
            $this->load->library('ConfigEmail');
            $config = $this->configemail->config_email();
            // Load library email dan konfigurasinya
            $this->load->library('Email', $config);
            // Email dan nama pengirim
            $this->Email->from('admin@orenzlaundry.com', 'Orenz Laundry');
            // Email penerima
            $this->Email->to($email); // Ganti dengan email tujuan
            // Lampiran email, isi dengan url/path file
            // $this->email->attach('https://masrud.com/content/images/20181215150137-codeigniter-smtp-gmail.png');
            // Subject email
            $subject = 'Lupa Password | Orenz Laundry';
            $this->Email->subject($subject);
            // Isi email
            $nama_user = $get_user->nama_user;
            $kode_token = $get_user->token;
            $pesan = 'Wah kehilangan atau lupa password pasti menjengkelkan, namun tenang kami akan membantu!<br> 
                Silahkan masukkan TOKEN dibawah ini pada kolom verifikasi token, dengan begitu anda dapat melakukan reset password dan membuat password baru!.';
            $message = '';
            $this->load->library('EmailtoUser');
            $message = $this->EmailtoUser->verifikasiakun($subject, $nama_user, $pesan, $kode_token, $email);
            $this->Email->message($message);
            // Tampilkan pesan sukses atau error
            $this->Email->send();
        } else {
            $response['status']=502;
			$response['error']=true;
			$response['message']='Gagal mendapatkan email atau username';
			$this->response($response);
        }
    }

    public function resendemail_post()
    {
        $email = $this->post('email');
        $response = $this->M_login->resend_email($email);

        $this->response($response);

        if($response){
        $get_user = $this->db->query("SELECT * FROM user WHERE email = '$email'")->row();
        $this->load->library('ConfigEmail');
        $config = $this->configemail->config_email();
        // Load library email dan konfigurasinya
        $this->load->library('Email', $config);
        // Email dan nama pengirim
        $this->Email->from('admin@orenzlaundry.com', 'Orenz Laundry');
        // Email penerima
        $this->Email->to($email); // Ganti dengan email tujuan
        // Lampiran email, isi dengan url/path file
        // $this->Email->attach('https://masrud.com/content/images/20181215150137-codeigniter-smtp-gmail.png');
        // Subject email
        $subject = 'Lupa Password | Orenz Laundry';
        $this->Email->subject($subject);
        // Isi email
        $nama_user = $get_user->nama_user;
        $kode_token = $get_user->token;
        $pesan = 'Wah kehilangan atau lupa password pasti menjengkelkan, namun tenang kami akan membantu!<br> 
            Silahkan masukkan TOKEN dibawah ini pada kolom verifikasi token, dengan begitu anda dapat melakukan reset password dan membuat password baru!.';
        $message = '';
        $this->load->library('EmailtoUser');
        $message = $this->emailtouser->verifikasiakun($subject, $nama_user, $pesan, $kode_token, $email);
        $this->Email->message($message);
        // Tampilkan pesan sukses atau error
        $this->Email->send();

        }
    }

    public function checktoken_post()
    {
        $response = $this->M_lupas->getToken($this->post('email'), $this->post('token'));
        if ($response['data']!=null) {
            $this->response($response);
        }else{
            $response['status']=502;
            $response['error']=true;
            $response['message']='Kode yang anda masukkan tidak cocok!';
            $this->response($response);
        }
    }

    public function getUserById_post()
    {
        $response = $this->M_lupas->getUserById($this->post('id_user'));
        if ($response['data']!=null) {
            $this->response($response);
        }else{
            $response['status']=502;
            $response['error']=true;
            $response['message']='Pengguna tidak ditemukan!';
            $this->response($response);
        }
    }

    public function resetpassword_put()
    {
        $password = password_hash($this->put('password'), PASSWORD_DEFAULT);
        $response = $this->M_lupas->putPassword($this->put('id_user'), $password);
        $this->response($response);
    }

}