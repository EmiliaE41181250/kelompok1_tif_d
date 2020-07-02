<?php

class Promo extends CI_Controller 
{
  // method yang akan otomatis dijalankan ketika class dibuat
  function __construct()
  {
    parent::__construct();
    $this->load->model('Model_promo');
    $this->load->library('PrimsLib');
    if ($this->session->userdata('nama') == '') {
      redirect('admin/login/');
    }
  }

  // Menampilkan tabel Promo
  public function index()
  {
    $data['promo'] = $this->Model_promo->getAll('promo')->result();
    $this->load->view('templates/header');
    $this->load->view('templates/sidebar');
    $this->load->view('admin/promo/index', $data);
    $this->load->view('templates/footer');
  }

  // menampilkan form edit data promo
  public function edit($id)
  {
    $where = array('id_promo' => $id);
    $data['promo'] = $this->Model_promo->getEdit($where, 'promo')->result();
    $this->load->view('templates/header');
    $this->load->view('templates/sidebar');
    $this->load->view('admin/promo/edit', $data);
    $this->load->view('templates/footer');
  }

  // menampilkan detail data promo
  public function detail($id)
  {
    $where = array('id_promo' => $id);
    $data['promo'] = $this->Model_promo->getEdit($where, 'promo')->result();
    $this->load->view('templates/header');
    $this->load->view('templates/sidebar');
    $this->load->view('admin/promo/detail', $data);
    $this->load->view('templates/footer');
  }

  public function tambah()
  {
    // memeriksa apakah ada id pada database
    $row_id = $this->Model_promo->getId()->num_rows();
    // mengambil 1 baris data terakhir
    $old_id = $this->Model_promo->getId()->row();

    if($row_id>0){
      // melakukan auto number dari id terakhir
    $id = $this->primslib->autonumber($old_id->id_promo, 3, 12);
    }else{
      // generate id pertama kali jika tidak ada data sama sekali di dalam database
    $id = 'PRM000000000001';
    }

    $created_by = "admin";
    $created_at = date('Y-m-d H:i:s');
    $gambar_promo = null;
    // menjalankan perintah untuk mengupload gambar
    if ($_FILES['gambar_promo']['name'] != null) {
      $gambar_promo = $_FILES['gambar_promo']['name'];
      $gambar_promo = $this->primslib->upload_file('gambar_promo', $gambar_promo, 'jpg|jpeg|png', '3024');
    }

    // merekam data yang dikirim melalui form
    $data = array(
      'id_promo' => $id,
      'judul_promo' => $this->input->post('judul_promo'),
      'deskripsi' => $this->input->post('deskripsi', true),
      'syarat_ketentuan' => $this->input->post('syarat_ketentuan', true),
      'jumlah' => $this->input->post('jumlah'),
      'awal' => $this->input->post('awal'),
      'akhir' => $this->input->post('akhir'),
      'kode' => $this->input->post('kode_promo'),
      'gambar' => $gambar_promo,
      'status' => $this->input->post('status'),
      'created_by' => $created_by,
      'created_at' => $created_at
    );

    // menjalankan fungsi insert pada model_promo untuk menambah data ke database
    $this->Model_promo->insert($data, 'promo');
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
    redirect('admin/promo');
  }

  public function update()
  {
    // merekam id sebagai parameter where saat update
    $where = array('id_promo' => $this->input->post('id_promo'));
    // menentukan siapa dan kapan baris data ini diperbarui
    $updated_by = "admin";
    $updated_at = date('Y-m-d H:i:s');
    $gambar_promo = null;
    // memeriksa apakah admin mengganti gambar atau tidak
    if ($_FILES['gambar_promo']['name'] != null) {
      // jika memilih gambar
      $gambar_promo = $_FILES['gambar_promo']['name'];

      if ($gambar_promo != '') {
          $config['upload_path'] = './assets/files/gambar_promo/';
          $config['allowed_types'] = 'jpg|jpeg|png';
          $config['max_size'] = '3024';
          $config['overwrite'] = true;
          $config['file_name'] = $this->db->get_where('promo', array('id_promo' => $this->input->post('id_promo')))->row()->gambar;
          // $config['max_width']  = '2048';
          // $config['max_height']  = '2048';
          // $config['encrypt_name'] = TRUE;
          
          $this->load->library('upload', $config);
          
          if (!$this->upload->do_upload('gambar_promo'))
          {
              $error = array('error' => $this->upload->display_errors(),
                              'promo' => $this->model_promo->getAll('promo')->result(),
                              'custom' => $this->lang->line('Pengunggahan file gambar promo Gagal!')
              );
              echo $this->load->view('admin/templates/header', array(), TRUE);
              echo $this->load->view('admin/templates/sidebar', array(), TRUE);
              echo $this->load->view('admin/promo/index', $error, TRUE);
              echo $this->load->view('admin/templates/footer', array(), TRUE);
              exit;
          }
          else
          {
              $gambar_promo = $this->upload->data('file_name');
          }

        }

      $data = array(
        'judul_promo' => $this->input->post('judul_promo'),
        'deskripsi' => $this->input->post('deskripsi', true),
        'syarat_ketentuan' => $this->input->post('syarat_ketentuan', true),
        'jumlah' => $this->input->post('jumlah'),
        'awal' => $this->input->post('awal'),
        'akhir' => $this->input->post('akhir'),
        'kode' => $this->input->post('kode_promo'),
        'gambar' => $gambar_promo,
        'status' => $this->input->post('status'),
        'updated_by' => $updated_by,
        'updated_at' => $updated_at
      );
    }else{
      // jika tidak memilih gambar
      $data = array(
        'judul_promo' => $this->input->post('judul_promo'),
        'deskripsi' => $this->input->post('deskripsi', true),
        'syarat_ketentuan' => $this->input->post('syarat_ketentuan', true),
        'jumlah' => $this->input->post('jumlah'),
        'awal' => $this->input->post('awal'),
        'akhir' => $this->input->post('akhir'),
        'kode' => $this->input->post('kode_promo'),
        'status' => $this->input->post('status'),
        'updated_by' => $updated_by,
        'updated_at' => $updated_at
      );
    }

    // menjalankan method update pada model promo
    $this->Model_promo->update($where, $data, 'promo');

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
    redirect('admin/promo');
  }

  // method yang berfungsi menghapus data
  public function destroy($id)
  {
    // deklarasi $where by id
    $where = array('id_promo' => $id);
    
    $promo = $this->db->get_where('promo', $where)->row()->gambar;
    $filename = explode(".", $promo)[0];
    array_map('unlink', glob(FCPATH."assets/files/gambar_promo/$filename.*"));
    
    // menjalankan fungsi delete pada model_promo
    $this->Model_promo->delete($where, 'promo');
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
    redirect('admin/promo');
  }

  // method untuk melakukan print PDF
  public function pdf()
  {
    $this->load->library('Dompdf_gen');

    $data['promo'] = $this->Model_promo->getAll('promo')->result();

    $this->load->view('admin/promo/laporan_pdf', $data);

    $paper_size = 'A4';
    $oriantation = 'landscape';
    $html = $this->output->get_output();
    $this->dompdf->set_paper($paper_size, $oriantation);

    $this->dompdf->load_html($html);
    $this->dompdf->render();
    $this->dompdf->stream("laporan_promo_".date('Y-m-d_H-i-s').".pdf", array('Attachment' => 0));
  }
}
