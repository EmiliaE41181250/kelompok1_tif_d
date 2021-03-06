<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_durasipaket extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    // ini adalah function untuk memuat model bernama m_data
    $this->load->model('M_durasipaket');
    $this->load->library('PrimsLib');
    if ($this->session->userdata('nama') == '') {
      redirect('admin/login/');
    }
  }

  function index()
  {
    // ini adalah variabel array $data yang memiliki index user, berguna untuk menyimpan data 
    $data['durasi_paket'] = $this->M_durasipaket->tampil_data()->result();
    $this->load->view('templates/header');
    $this->load->view('templates/sidebar');
    $this->load->view('admin/durasipaket/v_durasipaket', $data);
    $this->load->view('templates/footer');
  }

  public function edit($id)
  {
    $where = array('id_durasi' => $id);
    $data['durasi_paket'] = $this->M_durasipaket->edit($where, 'durasi_paket')->result();
    $this->load->view('templates/header');
    $this->load->view('templates/sidebar');
    $this->load->view('admin/durasipaket/v_edit', $data);
    $this->load->view('templates/footer');
  }

  public function tambah()
  {
    // memeriksa apakah ada id pada database
    $row_id = $this->M_durasipaket->getId()->num_rows();
    // mengambil 1 baris data terakhir
    $old_id = $this->M_durasipaket->getId()->row();

    if ($row_id > 0) {
      // melakukan auto number dari id terakhir
      $id = $this->primslib->autonumber($old_id->id_durasi, 3, 12);
    } else {
      // generate id pertama kali jika tidak ada data sama sekali di dalam database
      $id = 'DPK000000000001';
    }

    $created_by = "admin";
    $created_at = date('Y-m-d H:i:s');


    // merekam data yang dikirim melalui form
    $data = array(
      'id_durasi' => $id,
      'durasi_paket' => $this->input->post('durasi_paket'),
      'status' => $this->input->post('status'),
      'created_by' => $created_by,
      'created_at' => $created_at
    );

    // menjalankan fungsi insert pada m_data_jenispaket untuk menambah data ke database
    $this->M_durasipaket->insert($data, 'durasi_paket');
    // mengirim pesan berhasil dihapus
    $this->session->set_flashdata('pesan', '
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Selamat!</strong> Anda berhasil menambahkan data.
            <button type="button" class="close py-auto" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          ');
    // mengarahkan ke halaman tabel jenis paket
    redirect('admin/C_durasipaket');
  }

  public function update()
  {
    // merekam id sebagai parameter where saat update
    $where = array('id_durasi' => $this->input->post('id_durasi'));
    // menentukan siapa dan kapan baris data ini diperbarui
    $updated_by = "admin";
    $updated_at = date('Y-m-d H:i:s');

    //masukkan data yg akan di update ke dalam variabel data
    $data = array(
      'durasi_paket' => $this->input->post('durasi_paket'),
      'status' => $this->input->post('status'),
      'updated_by' => $updated_by,
      'updated_at' => $updated_at

    );

    // menjalankan method update pada m_data_durasi_paket
    $this->M_durasipaket->update($where, $data, 'durasi_paket');

    // mengirim pesan berhasil update data
    $this->session->set_flashdata('pesan', '
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      Anda <strong>berhasil</strong> mengubah data.
      <button type="button" class="close py-auto" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    ');
    // mengarahkan ke halaman tabel jenis paket
    redirect('admin/C_durasipaket');
  }

  // method yang berfungsi menghapus data
  public function destroy($id)
  {
    // deklarasi $where by id
    $where = array('id_durasi' => $id);
    // menjalankan fungsi delete pada m_durasi_paket
    $this->M_durasipaket->delete($where, 'durasi_paket');
    // mengirim pesan berhasil dihapus
    $this->session->set_flashdata('pesan', '
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      Anda <strong>berhasil</strong> menghapus data.
      <button type="button" class="close py-auto" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    ');
    // mengarahkan ke halaman tabel C_jenispaket
    redirect('admin/C_durasipaket');
  }
}
