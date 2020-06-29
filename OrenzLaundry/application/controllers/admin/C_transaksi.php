<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_transaksi extends CI_Controller {

    function __construct(){
      parent::__construct();	
          // ini adalah function untuk memuat model bernama m_data
      $this->load->model('m_transaksi');
      $this->load->library('primslib');
      if ($this->session->userdata('nama') == '') {
        redirect('admin/login/');
      }
    }

    function index(){
      // ini adalah variabel array $data yang memiliki index user, berguna untuk menyimpan data 
      $data['user'] = $this->m_transaksi->getAll('user')->result();
      $data['promo'] = $this->m_transaksi->getAll('promo')->result();
      $data['admin'] = $this->m_transaksi->getAll('admin')->result();
      $data['paket'] = $this->m_transaksi->getAll('paket')->result();
      $data['transaksi'] = $this->m_transaksi->getAll('transaksi')->result();

      $this->load->view('templates/header');
      $this->load->view('templates/sidebar');
      $this->load->view('admin/transaksi/v_transaksi', $data);
      $this->load->view('templates/footer');
    }

    public function edit($id)
    {
      $where = array('id_transaksi' => $id);
      $set = array('notif_admin' => 1);

      $this->db->where($where);
      $this->db->update('transaksi', $set);
      $data['user'] = $this->m_transaksi->getAll('user')->result();
      $data['promo'] = $this->m_transaksi->getAll('promo')->result();
      $data['admin'] = $this->m_transaksi->getAll('admin')->result();
      $data['paket'] = $this->m_transaksi->getAll('paket')->result();
      $data['waktu'] = $this->m_transaksi->getAll('waktujemput')->result();
      $data['transaksi'] = $this->m_transaksi->edit($where, 'transaksi')->result();
      $data['detail'] = $this->m_transaksi->edit($where, 'detail_transaksi')->result();
  
      $this->load->view('templates/header');
      $this->load->view('templates/sidebar');
      $this->load->view('admin/transaksi/v_edit', $data);
      $this->load->view('templates/footer');
    }

    public function detail($id){
      $this->load->model('m_transaksi');
      $detail = $this->m_transaksi->detail_data($id);
      $data['detail'] = $detail;
      
      $this->load->view('templates/header');
      $this->load->view('templates/sidebar');
      $this->load->view('admin/paket/v_detailtransaksi', $data);
      $this->load->view('templates/footer');
    }

    public function adddetail($id){
      $where = array("id_transaksi" => $id);
      $data['transaksi'] = $this->m_transaksi->edit($where, 'transaksi')->result();
      $data['paket'] = $this->m_transaksi->getAll('paket')->result();
      
      $this->load->view('templates/header');
      $this->load->view('templates/sidebar');
      $this->load->view('admin/transaksi/v_tambah_detail', $data);
      $this->load->view('templates/footer');
    }

    public function editdetail($id, $id_trs){
      $where = array("id_paket" => $id, "id_transaksi" => $id_trs);

      $data['detail'] = $this->m_transaksi->edit($where, 'detail_transaksi')->result();
      $data['paket'] = $this->m_transaksi->getAll('paket')->result();
      
      $this->load->view('templates/header');
      $this->load->view('templates/sidebar');
      $this->load->view('admin/transaksi/v_edit_detail', $data);
      $this->load->view('templates/footer');
    }

    public function tambahdetail()
    {
      $id_trs = $this->input->post('id_transaksi');
      $data = array('id_transaksi' => $this->input->post('id_transaksi'),
                    'id_paket' => $this->input->post('id_paket'),
                    'berat' => $this->input->post('berat'),
                    'sub_total' => $this->input->post('sub_total'));

      $this->m_transaksi->insert($data, 'detail_transaksi');

      $total = $this->db->query("SELECT sum(sub_total) as total FROM detail_transaksi WHERE id_transaksi = '$id_trs'")->row()->total;

      $where = array('id_transaksi' => $id_trs);
      $set = array('total_harga' => $total);
      $this->m_transaksi->update($where, $set, 'transaksi');

      $this->session->set_flashdata('pesan', '
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        Anda <strong>berhasil</strong> menambahkan data.
        <button type="button" class="close py-auto" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      ');

      redirect('admin/c_transaksi/edit/' . $this->input->post('id_transaksi'));
    }

    public function updatedetail()
    {
      $id_trs = $this->input->post('id_transaksi');
      $where = array('id_paket' => $this->input->post('id_paket'), 'id_transaksi' => $id_trs);

      $data = array(
                    'berat' => $this->input->post('berat'),
                    'sub_total' => $this->input->post('sub_total'));

      $this->m_transaksi->update($where, $data, 'detail_transaksi');

      $total = $this->db->query("SELECT sum(sub_total) as total FROM detail_transaksi WHERE id_transaksi = '$id_trs'")->row()->total;

      $where = array('id_transaksi' => $id_trs);
      $set = array('total_harga' => $total);
      $this->m_transaksi->update($where, $set, 'transaksi');

      $this->session->set_flashdata('pesan', '
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        Anda <strong>berhasil</strong> mengubah data.
        <button type="button" class="close py-auto" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      ');

      redirect('admin/c_transaksi/edit/' . $this->input->post('id_transaksi'));
    }

    function update_status()
    {
      $where = array('id_transaksi' => $this->input->post('id_transaksi'));
      $set = array('status' => $this->input->post('status'));
      $this->m_transaksi->update($where, $set, 'transaksi');

      if($this->input->post('status') == '4'){

        $id_user = $this->db->get_where('transaksi', array('id_transaksi' => $this->input->post('id_transaksi')))->row()->id_user;

        // kirim notif ke HP
        $this->load->library('primslib');
        $datatoken = $this->db->get_where('user', array('id_user' => $id_user));
        $tokenM = $datatoken->row()->device_token;
        $title = "Cucian siap diantarkan! Mohon tentukan lokasi.";
        $message = "Cucian anda telah bersih nih! segera tentukan lokasi dan kami akan meluncur ketempat anda.";
        $payload = array('intent' => 'notifikasi');
        print_r($this->primslib->SendNotification($tokenM, $title, $message, $payload));
        print_r($message);

      }else if($this->input->post('status') == 2){

        $id_user = $this->db->get_where('transaksi', array('id_transaksi' => $this->input->post('id_transaksi')))->row()->id_user;

        // kirim notif ke HP
        $this->load->library('primslib');
        $datatoken = $this->db->get_where('user', array('id_user' => $id_user));
        $tokenM = $datatoken->row()->device_token;
        $title = "Sortir cucian selesai, mohon konfirmasi untuk melanjutkan.";
        $message = "Kami telah melakukan sortir, detail transaksi telah diperbarui. Mungkin ada perubahan.. Cek dulu ya, semoga harganya cocok ";
        $payload = array('intent' => 'notifikasi');
        print_r($this->primslib->SendNotification($tokenM, $title, $message, $payload));
        print_r($message);
      }

      $this->session->set_flashdata('pesan_trs', '
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        Anda <strong>berhasil</strong> mengubah data.
        <button type="button" class="close py-auto" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      ');

      redirect('admin/c_transaksi/edit/' . $this->input->post('id_transaksi'));
    }
      
        // method yang berfungsi menghapus data
    public function destroydetail($id, $id_trs)
    {
      // deklarasi $where by id
      $where = array('id_paket' => $id, 'id_transaksi' => $id_trs);
      // menjalankan fungsi delete pada model_promo
      $this->m_transaksi->delete($where, 'detail_transaksi');

      $total = $this->db->query("SELECT sum(sub_total) as total FROM detail_transaksi WHERE id_transaksi = '$id_trs'")->row()->total;

      $where = array('id_transaksi' => $id_trs);
      $set = array('total_harga' => $total);
      $this->m_transaksi->update($where, $set, 'transaksi');

      $this->session->set_flashdata('pesan', '
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        Anda <strong>berhasil</strong> menghapus data.
        <button type="button" class="close py-auto" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      ');
      // mengarahkan ke halaman tabel promo
      redirect('admin/c_transaksi/edit/' . $id_trs);
    }

    public function nota()
    {
      $this->load->library('dompdf_gen');
  
      $data['transaksi'] = $this->m_transaksi->getAll('transaksi')->result();
  
      $this->load->view('admin/transaksi/nota', $data);
  
      $paper_size = 'A4';
      $oriantation = 'landscape';
      $html = $this->output->get_output();
      $this->dompdf->set_paper($paper_size, $oriantation);
  
      $this->dompdf->load_html($html);
      $this->dompdf->render();
      $this->dompdf->stream("laporan_promo_".date('Y-m-d_H-i-s').".pdf", array('Attachment' => 0));
    }
        

    }