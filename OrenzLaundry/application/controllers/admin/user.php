<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        // ini adalah function untuk memuat model bernama m_data
        $this->load->model('m_data_user');
        $this->load->library('primslib');
    }

    function index()
    {
        // ini adalah variabel array $data yang memiliki index user, berguna untuk menyimpan data 
        $data['user'] = $this->m_data_user->tampil_data()->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('admin/user/v_user', $data);
        $this->load->view('templates/footer');
    }

    public function edit($id)
    {
        $where = array('id_user' => $id);
        $data['user'] = $this->m_data_user->edit($where, 'user')->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('admin/user/v_edit_user', $data);
        $this->load->view('templates/footer');
    }

    public function detail($id)
    {
        $where = array('id_user' => $id);
        $data['user'] = $this->m_data_user->getEdit($where, 'user')->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('admin/User/v_detailuser', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        // memeriksa apakah ada id pada database
        $row_id = $this->m_data_user->getId()->num_rows();
        // mengambil 1 baris data terakhir
        $old_id = $this->m_data_user->getId()->row();

        if ($row_id > 0) {
            // melakukan auto number dari id terakhir
            $id = $this->primslib->autonumber($old_id->id_user, 3, 12);
        } else {
            // generate id pertama kali jika tidak ada data sama sekali di dalam database
            $id = 'USR000000000001';
        }

        $created_by = "admin";
        $created_at = date('Y-m-d H:i:s');



        // merekam data yang dikirim melalui form
        $data = array(
            'id_user' => $id,
            'nama_user' => $this->input->post('nama_user'),
            'alamat' => $this->input->post('alamat'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'tgl_lahir' => $this->input->post('tgl_lahir'),
            'no_hp' => $this->input->post('no_hp'),
            'email' => $this->input->post('email'),
            'status' => $this->input->post('status'),
            'created_by' => $created_by,
            'created_at' => $created_at
        );

        // menjalankan fungsi insert pada m_data_user untuk menambah data ke database
        $this->m_data_user->insert($data, 'user');
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
        redirect('admin/User');
    }

    public function update()
    {
        // merekam id sebagai parameter where saat update
        $where = array('id_user' => $this->input->post('id_user'));
        // menentukan siapa dan kapan baris data ini diperbarui
        $updated_by = "admin";
        $updated_at = date('Y-m-d H:i:s');

        //masukkan data yg akan di update ke dalam variabel data
        $data = array(
            'nama_user' => $this->input->post('nama_user'),
            'alamat' => $this->input->post('alamat'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'tgl_lahir' => $this->input->post('tgl_lahir'),
            'no_hp' => $this->input->post('no_hp'),
            'email' => $this->input->post('email'),
            'updated_by' => $updated_by,
            'updated_at' => $updated_at

        );

        // menjalankan method update pada m_data_user
        $this->m_data_user->update($where, $data, 'user');

        // mengirim pesan berhasil update data
        $this->session->set_flashdata('pesan', '
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      Anda <strong>berhasil</strong> mengubah data.
      <button type="button" class="close py-auto" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    ');
        // mengarahkan ke halaman tabel user
        redirect('admin/User');
    }

    // method yang berfungsi menghapus data
    public function destroy($id)
    {
        // deklarasi $where by id
        $where = array('id_user' => $id);
        // menjalankan fungsi delete pada m_data_user
        $this->m_data_user->delete($where, 'user');
        // mengirim pesan berhasil dihapus
        $this->session->set_flashdata('pesan', '
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      Anda <strong>berhasil</strong> menghapus data.
      <button type="button" class="close py-auto" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    ');
        // mengarahkan ke halaman tabel user
        redirect('admin/User');
    }
}
