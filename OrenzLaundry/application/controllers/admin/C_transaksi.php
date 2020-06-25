<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_paket extends CI_Controller {

    function __construct(){
        parent::__construct();	
            // ini adalah function untuk memuat model bernama m_data
        $this->load->model('m_transaksi');
        $this->load->library('primslib');
        }

        function index(){
            // ini adalah variabel array $data yang memiliki index user, berguna untuk menyimpan data 
            $data['user'] = $this->m_transaksi->getAll('user')->result();
            $data['promo'] = $this->m_transaksi->getAll('promo')->result();
            $data['admin'] = $this->m_transaksi->getAll('admin')->result();
			$data['paket'] = $this->m_transaksi->tampil_data('paket')->result();
			$data['transaksi'] = $this->m_transaksi->tampil_data('transaksi')->result();

            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('admin/transaksi/v_transaksi', $data);
            $this->load->view('templates/footer');
        }

        public function edit($id)
        {
          $where = array('id_transaksi' => $id);
          $data['user'] = $this->m_transaksi->getAll('user')->result();
          $data['promo'] = $this->m_transaksi->getAll('promo')->result();
          $data['admin'] = $this->m_transaksi->getAll('admin')->result();
          $data['paket'] = $this->m_transaksi->edit($where, 'paket')->result();
		  $data['transaksi'] = $this->m_transaksi->getAll('transaksi')->result();
		  
          $this->load->view('templates/header');
          $this->load->view('templates/sidebar');
          $this->load->view('admin/transaksi/v_edit', $data);
          $this->load->view('templates/footer');
        }
      
        public function tambah()
        {
          // memeriksa apakah ada id pada database
          $row_id = $this->m_transaksi->getId()->num_rows();
          // mengambil 1 baris data terakhir
          $old_id = $this->m_transaksi->getId()->row();
      
          if($row_id>0){
            // melakukan auto number dari id terakhir
          $id = $this->primslib->autonumber($old_id->id_transaksi, 3, 12);
          }else{
            // generate id pertama kali jika tidak ada data sama sekali di dalam database
          $id = 'TRS000000000001';
          }
      
          $created_by = "admin";
          $created_at = date('Y-m-d H:i:s');
        //   $gambar_paket = $_FILES['gambar'];
          // menjalankan perintah untuk mengupload gambar
          // if ($_FILES['gambar']['name'] != null) {
          //   $gambar_promo = $_FILES['gambar']['name'];
          //   $gambar_promo = $this->primslib->upload_image('gambar', $gambar_promo, 'jpg|jpeg|png', '3024');
          // }

        //   if($gambar_paket){
        //     $config['allowed_types'] = 'gif|jpg|png';
        //     $config['max_size']='2048';
        //     $config['upload_path']='./assets/files/gambar_paket/';

        //     $this->load->library('upload', $config);
        //     if ($gambar_paket == '') {
        //       $gambar_paket = null;
        //     }else {
        //       if (!$this->upload->do_upload('gambar')) {
        //         $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
        //         Gagal menambah foto!
        //       </div>');
        //       }else {
        //         $gambar_paket = $this->upload->data('file_name');
        //       }
        //     }
        //   }
      
          // merekam data yang dikirim melalui form
          $data = array(
            'id_transaksi' => $id,
            'id_user' => $this->input->post('nama_user'),
            'id_promo' => $this->input->post('nama_promo'),
            'id_admin' => $this->input->post('nama_admin'),
            'id_waktu' => $this->input->post('id_waktu'),
            'total_harga' => $this->input->post('total_harga'),
			'tgl_antar' => $this->input->post('tgl_antar'),
			'tgl_jemput' => $this->input->post('tgl_jemput'),
			'alamat_jemput' => $this->input->post('alamat_jemput'),
			'alamat_antar' => $this->input->post('alamat_antar'),
			'status' => $this->input->post('status'),
			'catatan' => $this->input->post('catatan'),
			'updated_by' => $updated_by,
        	'updated_at' => $updated_at
            
          );
      
          // menjalankan fungsi insert pada model_promo untuk menambah data ke database
          $this->m_transaksi->insert($data, 'transaksi');
          // mengirim pesan berhasil dihapus
          $this->session->set_flashdata('pesan', '
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Selamat!</strong> Anda berhasil menambahkan data.
            <button type="button" class="close py-auto" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          ');
          // mengarahkan ke halaman tabel paket
          redirect('admin/C_transaksi');
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
      
        public function update()
        {
          // merekam id sebagai parameter where saat update
          $where = array('id_transaksi' => $this->input->post('id_transaksi'));
          // menentukan siapa dan kapan baris data ini diperbarui
          $updated_by = "admin";
		  $updated_at = date('Y-m-d H:i:s');
		  $tgl_transaksi = date('Y-m-d H:i:s');
        //   $gambar_paket = null;
        //   $gambar_paket = $_FILES['gambar'];
          // memeriksa apakah admin mengganti gambar atau tidak
        //   if($gambar_paket){
        //     $config['allowed_types'] = 'gif|jpg|png';
        //     $config['max_size']='2048';
        //     $config['upload_path']='./assets/files/gambar_paket/';

        //     $this->load->library('upload', $config);
        //     if ($gambar_paket == '') {
        //       $gambar_paket = null;
        //     }else {
        //       if (!$this->upload->do_upload('gambar')) {
        //         $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
        //         Gagal menambah foto!
        //       </div>');
        //       }else {
        //         $gambar_paket = $this->upload->data('file_name');
        //       }
        //     }
        //   }
            // jika tidak memilih gambar

        //   if($gambar_paket){
        //     $data = array(
        //       'nama_paket' => $this->input->post('nama_paket'),
        //       'id_jenis_paket' => $this->input->post('nama_jenis_paket'),
        //       'id_isi_paket' => $this->input->post('nama_isi_paket'),
        //       'harga' => $this->input->post('harga'),
        //       'gambar' => $gambar_paket,
        //       'id_durasi' => $this->input->post('durasi_paket'),
        //       'id_barang' => $this->input->post('nama_barang'),
        //       'status' => $this->input->post('status')
        //     );
        //   }else{
            $data = array(
              'nama_paket' => $this->input->post('nama_paket'),
              'id_jenis_paket' => $this->input->post('nama_jenis_paket'),
              'id_isi_paket' => $this->input->post('nama_isi_paket'),
              'harga' => $this->input->post('harga'),
              'id_durasi' => $this->input->post('durasi_paket'),
              'id_barang' => $this->input->post('nama_barang'),
			  'status' => $this->input->post('status')
			  
            );
		}
          
      
          // menjalankan method update pada model promo
          $this->m_transaksi->update($where, $data, 'transaksi');
      
          // mengirim pesan berhasil update data
          $this->session->set_flashdata('pesan', '
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            Anda <strong>berhasil</strong> mengubah data.
            <button type="button" class="close py-auto" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          ');
          // mengarahkan ke halaman tabel promo
          redirect('admin/C_transaksi');
        }
      
        // method yang berfungsi menghapus data
        public function destroy($id)
        {
          // deklarasi $where by id
          $where = array('id_transaksi' => $id);
          // menjalankan fungsi delete pada model_promo
          $this->m_transaksi->delete($where, 'transaksi');
          // mengirim pesan berhasil dihapus
          $this->session->set_flashdata('pesan', '
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            Anda <strong>berhasil</strong> menghapus data.
            <button type="button" class="close py-auto" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          ');
          // mengarahkan ke halaman tabel promo
          redirect('admin/C_transaksi');
        }

        

    }