<?php
defined('BASEPATH') or exit('No direct script access allowed');

class notifikasi extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        // ini adalah function untuk memuat model bernama m_data
        $this->load->model('m_notif');
        $this->load->library('primslib');
    }

    function index()
    {
        // ini adalah variabel array $data yang memiliki index user, berguna untuk menyimpan data 

        $data['detail_transaksi'] = $this->m_notif->getAll('detail_transaksi')->result();
        $data['transaksi'] = $this->m_notif->tampil_data('transaksi')->result();
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
        $this->load->view('admin/notif/v_detailnotif', $data);
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
            'id_user' => $this->input->post('id_user'),
            'total_harga' => $this->input->post('total_harga'),
            'tgl_transaksi' => $this->input->post('tgl_transaksi'),
            'tgl_antar' => $this->input->post('tgl_antar'),
            'tgl_jemput' => $this->input->post('tgl_jemput'),
            'status' => $this->input->post('status'),
            'id_paket' => $this->input->post('id_paket'),
            'berat' => $this->input->post('berat'),
            'sub_total' => $this->input->post('sub_total'),
            'updated_by' => $updated_by,
            'updated_at' => $updated_at

        );

        // menjalankan method update pada m_data_jenis_paket
        $this->m_notif->update($where, $data, 'transaksi');
        $this->m_notif->update($where, $data, 'detail_transaksi');

        // mengarahkan ke halaman tabel jenis paket
        redirect('admin/notifikasi');
    }
}
