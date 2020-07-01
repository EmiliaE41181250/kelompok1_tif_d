<?php

class C_pesan extends CI_Controller 
{
  // method yang akan otomatis dijalankan ketika class dibuat
  function __construct()
  {
    parent::__construct();
    $this->load->model('m_pesan');
    $this->load->library('primslib');
    if ($this->session->userdata('nama') == '') {
      redirect('admin/login/');
    }
  }

  // Menampilkan tabel Promo
  public function index()
  {
    $data['pesan'] = $this->m_pesan->getAll('pesan')->result();
    $data['user'] = $this->m_pesan->getAll('user')->result();
    $this->load->view('templates/header');
    $this->load->view('templates/sidebar');
    $this->load->view('admin/pesan/v_pesan', $data);
    $this->load->view('templates/footer');
  }

  // menampilkan detail data promo
  public function detail($id)
  {
    $where = array('id_pesan');
    $detail = $this->m_pesan->detail_data($id);
    $data['detail'] = $this->m_pesan->detail_data($id);
    $this->load->view('templates/header');
    $this->load->view('templates/sidebar');
    $this->load->view('admin/pesan/v_detailpesan', $data);
    $this->load->view('templates/footer');
  }

   // method yang berfungsi menghapus data
   public function destroy($id)
   {
     // deklarasi $where by id
     $where = array('id_pesan' => $id);
     // menjalankan fungsi delete pada model_isi paket
     $this->m_pesan->delete($where, 'pesant');
     // mengirim pesan berhasil dihapus
     $this->session->set_flashdata('pesan', '
     <div class="alert alert-danger alert-dismissible fade show" role="alert">
       Anda <strong>berhasil</strong> menghapus data.
       <button type="button" class="close py-auto" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">&times;</span>
       </button>
     </div>
     ');
     // mengarahkan ke halaman tabel isi paket
     redirect('admin/C_pesan');
   }
}
 