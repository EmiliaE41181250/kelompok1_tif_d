<?php
defined('BASEPATH') or exit('No direct script access allowed');

class notifikasi extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        // ini adalah function untuk memuat model bernama m_notif
        $this->load->model('m_notif');
        $this->load->library('primslib');
    }

    function index()
    {
        // ini adalah variabel array $data yang memiliki index user, berguna untuk menyimpan data 

        $data['paket'] = $this->m_notif->getAll('paket')->result();
        $data['transaksi'] = $this->m_notif->getAll('transaksi')->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('admin/notif/v_notif', $data);
        $this->load->view('templates/footer');
    }
    public function detail($id)
    {
        $this->load->model('m_notif');
        $detail = $this->m_notif->detail_data($id);
        $data['detail'] = $detail;

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('admin/paket/v_detailnotif', $data);
        $this->load->view('templates/footer');
    }
    public function update()
    {
        // merekam id sebagai parameter where saat update
        $where = array('id_transaksi' => $this->input->post('id_transaksi'));
        // menentukan siapa dan kapan baris data ini diperbarui
        $updated_by = "admin";
        $updated_at = date('Y-m-d H:i:s');

        //masukkan data yg akan di update ke dalam variabel data
        $data = array(
            'nama_user' => $this->input->post('nama_user'),
            'nama_paket' => $this->input->post('nama_paket'),
            'updated_by' => $updated_by,
            'updated_at' => $updated_at

        );

        // menjalankan method update pada m_notif
        $this->m_notif->update($where, $data, 'transaksi');


        // mengarahkan ke halaman tabel notif
        redirect('admin/notifikasi');
    }
}
