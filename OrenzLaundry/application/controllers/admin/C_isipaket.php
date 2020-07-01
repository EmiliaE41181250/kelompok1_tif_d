<?php

class C_isipaket extends CI_Controller 
{
  // method yang akan otomatis dijalankan ketika class dibuat
  function __construct()
  {
    parent::__construct();
    $this->load->model('m_isipaket');
    $this->load->library('primslib');
    if ($this->session->userdata('nama') == '') {
      redirect('admin/login/');
    }
  }

  // Menampilkan tabel Promo
  public function index()
  {
    $data['isi_paket'] = $this->m_isipaket->getAll('isi_paket')->result();
    $this->load->view('templates/header');
    $this->load->view('templates/sidebar');
    $this->load->view('admin/isipaket/v_isipaket', $data);
    $this->load->view('templates/footer');
  }

  // menampilkan form edit data promo
  public function edit()
  {
    $where = array('id_isi_paket');
    $data['isi_paket'] = $this->m_isipaket->getEdit($where, 'isi_paket')->result();
    $this->load->view('templates/header');
    $this->load->view('templates/sidebar');
    $this->load->view('admin/isipaket/v_edit_ip', $data);
    $this->load->view('templates/footer');
  }

  // menampilkan detail data promo
  public function detail($id)
  {
    $where = array('id_isi_paket');
    $detail = $this->m_isipaket->detail_data($id);
    $data['detail'] = $this->m_isipaket->detail_data($id);
    $this->load->view('templates/header');
    $this->load->view('templates/sidebar');
    $this->load->view('admin/isipaket/detail', $data);
    $this->load->view('templates/footer');
  }

  public function tambah()
  {
    // memeriksa apakah ada id pada database
    $row_id = $this->m_isipaket->getId()->num_rows();
    // mengambil 1 baris data terakhir
    $old_id = $this->m_isipaket->getId()->row();

    if($row_id>0){
      // melakukan auto number dari id terakhir
    $id = $this->primslib->autonumber($old_id->id_isi_paket, 3, 12);
    }else{
      // generate id pertama kali jika tidak ada data sama sekali di dalam database
    $id = 'IPT000000000001';
    }

    $created_by = "admin";
    $created_at = date('Y-m-d H:i:s');
    

    // merekam data yang dikirim melalui form
    $data = array(
      'id_isi_paket' => $id,
      'nama_isi_paket' => $this->input->post('nama_isi_paket'),
      'keterangan' => $this->input->post('keterangan', true),
      'status' => $this->input->post('status'),
      'created_by' => $created_by,
      'created_at' => $created_at
    );

    // menjalankan fungsi insert pada model_promo untuk menambah data ke database
    $this->m_isipaket->insert($data, 'isi_paket');
    // mengirim pesan berhasil dihapus
    $this->session->set_flashdata('pesan', '
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Selamat!</strong> Anda berhasil menambahkan data.
      <button type="button" class="close py-auto" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    ');
    // mengarahkan ke halaman tabel promo
    redirect('admin/C_isipaket');
  }

  public function update()
  {
    // merekam id sebagai parameter where saat update
    $where = array('id_isi_paket' => $this->input->post('id_isi_paket'));
    // menentukan siapa dan kapan baris data ini diperbarui
    $updated_by = "admin";
    $updated_at = date('Y-m-d H:i:s');
    

      $data = array(
        'id_isi_paket' => $id,
        'nama_isi_paket' => $this->input->post('nama_isi_paket'),
        'keterangan' => $this->input->post('keterangan', true),
        'status' => $this->input->post('status'),
        'updated_by' => $updated_by,
        'updated_at' => $updated_at
      );
    

    // menjalankan method update pada model isi paket
    $this->m_isipaket->update($where, $data, 'isi_paket');

    // mengirim pesan berhasil update data
    $this->session->set_flashdata('pesan', '
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      Anda <strong>berhasil</strong> mengubah data.
      <button type="button" class="close py-auto" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    ');
    // mengarahkan ke halaman tabel isi paket
    redirect('admin/C_isipaket');
  }

  // method yang berfungsi menghapus data
  public function destroy($id)
  {
    // deklarasi $where by id
    $where = array('id_isi_paket' => $id);
    // menjalankan fungsi delete pada model_isi paket
    $this->m_isipaket->delete($where, 'isi_paket');
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
    redirect('admin/C_isipaket');
  }

  // method untuk melakukan print PDF
  public function pdf()
  {
    $this->load->library('dompdf_gen');

    $data['isi_paket'] = $this->model_promo->getAll('isi_paket')->result();

    $this->load->view('admin/isipaket/laporan_pdf', $data);

    $paper_size = 'A4';
    $oriantation = 'landscape';
    $html = $this->output->get_output();
    $this->dompdf->set_paper($paper_size, $oriantation);

    $this->dompdf->load_html($html);
    $this->dompdf->render();
    $this->dompdf->stream("laporan_isi_paket_".date('Y-m-d_H-i-s').".pdf", array('Attachment' => 0));
  }
}
