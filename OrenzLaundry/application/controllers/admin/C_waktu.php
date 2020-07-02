<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_waktu extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    // ini adalah function untuk memuat model bernama m_data
    $this->load->model('M_data_waktu');
    $this->load->library('PrimsLib');
    if ($this->session->userdata('nama') == '') {
      redirect('admin/Login/');
    }
  }

  function index()
  {
    // ini adalah variabel array $data yang memiliki index user, berguna untuk menyimpan data 
    $data['waktu'] = $this->M_data_waktu->tampil_data()->result();
    $this->load->view('templates/header');
    $this->load->view('templates/sidebar');
    $this->load->view('admin/waktu/index', $data);
    $this->load->view('templates/footer');
  }

  function edit($id)
  {
    $data['waktu'] = $this->M_data_waktu->tampil_data_edit($id)->result();
    $this->load->view('templates/header');
    $this->load->view('templates/sidebar');
    $this->load->view('admin/waktu/edit', $data);
    $this->load->view('templates/footer');
  }

  public function tambah()
  {
    $row_id = $this->M_data_waktu->getId()->num_rows();
    $old_id = $this->M_data_waktu->getId()->row();

    if($row_id>0){
    $id = $this->PrimsLib->autonumber($old_id->id, 3, 12);
    }else{
    $id = 'KRR000000000001';
    }

    $data = array(
      'id' => $id,
      'waktu' => $this->input->post('waktu')
    );

    $this->M_data_waktu->insert($data, 'waktujemput');
    $this->session->set_flashdata('pesan', '
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Selamat!</strong> Anda berhasil menambahkan data.
      <button type="button" class="close py-auto" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    ');

    redirect('admin/C_waktu');
  }

  function update()
  {
    $id = $this->input->post('id');
    $waktu = $this->input->post('waktu');

    $where = array('id' => $id);
    $data = array('waktu' => $waktu);

    $this->M_data_waktu->update($where, $data, 'waktujemput');

    $this->session->set_flashdata('pesan', '
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      Anda <strong>berhasil</strong> mengubah data.
      <button type="button" class="close py-auto" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    ');

    redirect('admin/C_waktu');
  }

  function destroy($id)
  {
    $where = array('id' => $id);
    $this->M_data_waktu->delete($where, 'waktujemput');
    $this->session->set_flashdata('pesan', '
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      Anda <strong>berhasil</strong> menghapus data.
      <button type="button" class="close py-auto" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    ');

    redirect('admin/C_waktu');
  }

}