<?php
class laporan_rentang_hari extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_rentang_hari');
    }
    function index()
    {
        $x['data'] = $this->m_rentang_hari->get_data_transaksi();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('admin/laporan/v_rentang_hari', $x);
        $this->load->view('templates/footer');
    }

    function month_report()
    {
        if ($this->input->post('bulanan') != '') {

            $hasil_cari = $this->input->post('bulanan');
            $data['data_bulanan'] = $this->db->query("SELECT transaksi.tgl_transaksi, SUM(transaksi.total_harga) as total_harga, SUM(vtotalberat.total_berat) as total_berat 
            FROM transaksi, vtotalberat 
            WHERE transaksi.id_transaksi = vtotalberat.id_transaksi AND
            transaksi.tgl_transaksi LIKE '%$hasil_cari%' GROUP BY day(transaksi.tgl_transaksi) ORDER BY tgl_transaksi ASC")->result();
            $data['data_berat'] = $this->db->query("SELECT user.nama_user, SUM(vtotalberat.total_berat) as total_berat FROM user, transaksi, vtotalberat
            WHERE transaksi.id_user = user.id_user
            AND transaksi.id_transaksi = vtotalberat.id_transaksi
            AND transaksi.tgl_transaksi LIKE '%$hasil_cari%'
            GROUP BY user.nama_user
            ORDER BY total_berat DESC
            LIMIT 10")->result();
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('admin/laporan/v_bulanan', $data);
            $this->load->view('templates/footer');
        } else {
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('admin/laporan/v_bulanan');
            $this->load->view('templates/footer');
        }
    }

    function tahunan_report()
    {
        if ($this->input->post('tahunan') != '') {

            $hasil_cari = $this->input->post('tahunan');

            /* BUAT VIEW DULUU LEWAT SQL PHPMYADMIN DI DATABASE ORENZLAUNDRY
            CREATE VIEW vTotalBerat AS
            SELECT SUM(detail_transaksi.berat) as total_berat, detail_transaksi.id_transaksi
            FROM detail_transaksi
            GROUP BY detail_transaksi.id_transaksi
            */

            $data['data_tahunan'] = $this->db->query("SELECT transaksi.tgl_transaksi, SUM(transaksi.total_harga) as total_harga, SUM(vtotalberat.total_berat) as total_berat 
            FROM transaksi, vtotalberat 
            WHERE transaksi.id_transaksi = vtotalberat.id_transaksi AND
            transaksi.tgl_transaksi LIKE '%$hasil_cari%' GROUP BY month(transaksi.tgl_transaksi) ORDER BY tgl_transaksi ASC")->result();
            $data['data_berat'] = $this->db->query("SELECT user.nama_user, SUM(vtotalberat.total_berat) as total_berat FROM user, transaksi, vtotalberat
            WHERE transaksi.id_user = user.id_user
            AND transaksi.id_transaksi = vtotalberat.id_transaksi
            AND transaksi.tgl_transaksi LIKE '%$hasil_cari%'
            GROUP BY user.nama_user
            ORDER BY total_berat DESC
            LIMIT 10")->result();
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('admin/laporan/v_tahunan', $data);
            $this->load->view('templates/footer');
        } else {
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('admin/laporan/v_tahunan');
            $this->load->view('templates/footer');
        }
    }

    function harian_report()
    {
        if ($this->input->post('awal', 'akhir') != '') {

            $awl = $this->input->post('awal');
            $akr = $this->input->post('akhir');

            $data['data_harian'] = $this->db->query("SELECT transaksi.tgl_transaksi, SUM(transaksi.total_harga) as total_harga, SUM(vtotalberat.total_berat) as total_berat 
            FROM transaksi, vtotalberat 
            WHERE transaksi.id_transaksi = vtotalberat.id_transaksi AND
            transaksi.tgl_transaksi BETWEEN '$awl' AND '$akr' GROUP BY day(transaksi.tgl_transaksi) ORDER BY tgl_transaksi ASC")->result();
            $data['data_berat'] = $this->db->query("SELECT user.nama_user, SUM(vtotalberat.total_berat) as total_berat FROM user, transaksi, vtotalberat
            WHERE transaksi.id_user = user.id_user
            AND transaksi.id_transaksi = vtotalberat.id_transaksi
            AND transaksi.tgl_transaksi BETWEEN '$awl' AND '$akr'
            GROUP BY user.nama_user
            ORDER BY total_berat DESC
            LIMIT 10")->result();
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('admin/laporan/v_rentang_hari', $data);
            $this->load->view('templates/footer');
        } else {
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('admin/laporan/v_rentang_hari');
            $this->load->view('templates/footer');
        }
    }
}
