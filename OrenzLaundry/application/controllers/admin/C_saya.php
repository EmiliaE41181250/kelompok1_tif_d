<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_saya extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        // ini adalah function untuk memuat model bernama m_data
        $this->load->model('m_data_saya');
        $this->load->library('primslib');
        if ($this->session->userdata('nama') == '') {
            redirect('admin/login/');
        }
    }

    function index()
    {
        // ini adalah variabel array $data yang memiliki index user, berguna untuk menyimpan data 
        $data['admin'] = $this->m_data_saya->tampil_data()->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('admin/saya/v_saya', $data);
        $this->load->view('templates/footer');
    }

    public function edit($id)
    {
        $where = array('id_admin' => $id);
        $data['admin'] = $this->m_data_saya->edit($where, 'admin')->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('admin/saya/v_edit_saya', $data);
        $this->load->view('templates/footer');
    }



    public function update()
    {
        // merekam id sebagai parameter where saat update
        $where = array('id_admin' => $this->input->post('id_admin'));
        // menentukan siapa dan kapan baris data ini diperbarui
        $updated_by = "admin";
        $updated_at = date('Y-m-d H:i:s');

        //masukkan data yg akan di update ke dalam variabel data
        $data = array(
            'nama_admin' => $this->input->post('nama_admin'),
            'alamat' => $this->input->post('alamat'),
            'no_hp' => $this->input->post('no_hp'),
            'no_telp' => $this->input->post('no_telp'),

            'updated_by' => $updated_by,
            'updated_at' => $updated_at

        );

        // menjalankan method update pada m_data_saya
        $this->m_data_saya->update($where, $data, 'admin');

        // mengirim pesan berhasil update data
        $this->session->set_flashdata('pesan', '
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      Anda <strong>berhasil</strong> mengubah profil.
      <button type="button" class="close py-auto" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    ');
        // mengarahkan ke halaman tabel admin
        redirect('admin/C_saya');
    }
}
