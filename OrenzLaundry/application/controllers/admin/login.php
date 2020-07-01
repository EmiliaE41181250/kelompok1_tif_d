<!-- untuk membuat sistem login pertama membuat controler yang berisi fungsi untuk menampilkan form login dan melakukan verifikasi/authentikasi username dan password admin yang di masukkan. serta fungsi logout. controller yang saya buat untuk sistem login buat bernama login.php -->

<!-- catatan: untuk membuat sistem login harus mengaktifkan library database (untuk mengakses dan mengolah databse) dan seasion (sesion untuk mengecek apakah si admin sudah login apa belum).dan juga mengaktifkan helper url agar dapat menggunakan fungsi-fungsi url. -->

<?php 



class Login extends CI_Controller{

//fungsi construct yang digunakan untuk memanggil m_login yang merupakanmodel (berisi operasi database)
	function __construct(){
		parent::__construct();		
		$this->load->model('m_login');
	}

//fungsi index untuk menampilkan view bernama v_login yang merupakan from untuk mengiputkan data saat login 
	function index(){
		
		if ($this->session->userdata('nama') != '') {
      redirect('admin/');
		}
		
		$this->load->view('admin/login');
	}

//fungsi aksi_login berfungsi untuk mengatur proses login
	function aksi_login(){
		$username = $this->input->post('username'); // menangkap data username yang diinputkan di from login
		$password = $this->input->post('password'); // menangkap data password yang diinputkan di from login

		//kemudian data yang diterima dan ditangkap di jadikan array agar dapat dikembalikan lagi ke model m_login
		$where = array(
			'username' => $username,
			'password' => md5($password) //md5 digunakan untuk enskripsi password
			);

		//cek ketersediaan username dan pasword admin dengan fungsi cek login yang da di m_login
		$cek = $this->m_login->cek_login("admin",$where);

		//jika hasil cek ternyata menyatakan username dan pasword tersedia maka dibuat sesion berisi username dan status login, kemudian akan di arahkan ke controller admin.
		if($cek->num_rows() > 0){

			$data_session = array(
				'id_admin' => $cek->row()->id_admin,
				'nama' => $username,
				'status' => "login"
				);

			$this->session->set_userdata($data_session);

			redirect(base_url("admin/"));

// jika ternyata username dan passowrd yang diinputkan tidak tersedia maka akan tampil pemberiatahuan password dan username salah
		}else{
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show text-center mx-4" role="alert">
          <button type="button" class="close pt-2" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
          </button>
          Username atau Password Anda Salah.
        </div>');
        redirect('admin/login');
		}
	}

	function reset_pass_view()
	{
		$this->load->view('templates/header');
    $this->load->view('templates/sidebar');
		$this->load->view('admin/reset_pass');
		$this->load->view('templates/footer');
	}

	function reset_pass_logic()
	{
		$id_admin = $this->input->post('id_admin');
		$password = $this->input->post('password');
		$repassword = $this->input->post('repass');

		if ($password == $repassword) {
			$result = $this->m_login->reset_pass($password, $id_admin);

			if ($result) {
				redirect(base_url('admin/login/logout'));
			}else{
				$this->session->set_flashdata('pesan', '
				<div class="alert alert-danger alert-dismissible fade show" role="alert">
					Anda <strong>gagal</strong> mengubah password.
					<button type="button" class="close py-auto" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				');
	
				redirect(base_url('admin/login/reset_pass_view'));
			}
		}else{
			$this->session->set_flashdata('pesan', '
				<div class="alert alert-danger alert-dismissible fade show" role="alert">
					Password yang anda masukkan tidak sama
					<button type="button" class="close py-auto" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				');
	
				redirect(base_url('admin/login/reset_pass_view'));
		}

		
	}

//fungsi logout berfungsi untuk mengapus semua sesion sehingga proses login berhenti/selesai
	function logout(){
		$this->session->sess_destroy(); //menghentikan semua sesion
		redirect(base_url('admin/login')); // diarahkan ke form login
	}
}
