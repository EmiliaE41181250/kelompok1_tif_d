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
            $data['data_bulanan'] = $this->db->query("SELECT transaksi.tgl_transaksi, SUM(transaksi.total_harga) as total_harga
            FROM transaksi
            WHERE 
            transaksi.tgl_transaksi LIKE '%$hasil_cari%' GROUP BY day(transaksi.tgl_transaksi) ORDER BY tgl_transaksi ASC")->result();
            $data['data_berat'] = $this->db->query("SELECT user.nama_user, SUM(detail_transaksi.berat) as total_berat FROM user, transaksi, detail_transaksi
            WHERE transaksi.id_user = user.id_user
            AND transaksi.id_transaksi = detail_transaksi.id_transaksi
            AND transaksi.tgl_transaksi LIKE '%$hasil_cari%'
            GROUP BY user.nama_user
            ORDER BY total_berat DESC
            LIMIT 10")->result();
            $data['hasil_cari'] = $hasil_cari;
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

    function print_pdf_bulanan($hasil_cari)
    {
        $data['data_bulanan'] = $this->db->query("SELECT transaksi.tgl_transaksi, SUM(transaksi.total_harga) as total_harga
        FROM transaksi
        WHERE 
        transaksi.tgl_transaksi LIKE '%$hasil_cari%' GROUP BY day(transaksi.tgl_transaksi) ORDER BY tgl_transaksi ASC")->result();

        $this->load->library('dompdf_gen');

        $this->load->view('admin/laporan/laporan_pdf_bulanan', $data);

        $paper_size = 'A4';
        $oriantation = 'potrait';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $oriantation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("laporan_bulanan_".date('Y-m-d_H-i-s').".pdf", array('Attachment' => 0));
    }

    function tahunan_report()
    {
        if ($this->input->post('tahunan') != '') {

            $hasil_cari = $this->input->post('tahunan');
            $data['data_tahunan'] = $this->db->query("SELECT transaksi.tgl_transaksi, SUM(transaksi.total_harga) as total_harga
            FROM transaksi 
            WHERE 
            transaksi.tgl_transaksi LIKE '%$hasil_cari%' GROUP BY month(transaksi.tgl_transaksi) ORDER BY tgl_transaksi ASC")->result();
            $data['data_berat'] = $this->db->query("SELECT user.nama_user, SUM(detail_transaksi.berat) as total_berat FROM user, transaksi, detail_transaksi
            WHERE transaksi.id_user = user.id_user
            AND transaksi.id_transaksi = detail_transaksi.id_transaksi
            AND transaksi.tgl_transaksi LIKE '%$hasil_cari%'
            GROUP BY user.nama_user
            ORDER BY total_berat DESC
            LIMIT 10")->result();
            $data['hasil_cari'] = $hasil_cari;
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

    function print_pdf_tahunan($hasil_cari)
    {
        $data['data_tahunan'] = $this->db->query("SELECT transaksi.tgl_transaksi, SUM(transaksi.total_harga) as total_harga
        FROM transaksi 
        WHERE 
        transaksi.tgl_transaksi LIKE '%$hasil_cari%' GROUP BY month(transaksi.tgl_transaksi) ORDER BY tgl_transaksi ASC")->result();

        $this->load->library('dompdf_gen');

        $this->load->view('admin/laporan/laporan_pdf_tahunan', $data);

        $paper_size = 'A4';
        $oriantation = 'potrait';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $oriantation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("laporan_bulanan_".date('Y-m-d_H-i-s').".pdf", array('Attachment' => 0));
    }

    function harian_report()
    {
        if ($this->input->post('awal', 'akhir') != '') {

            $awl = $this->input->post('awal');
            $akr = $this->input->post('akhir');

            $akr = date('Y-m-d', strtotime("+1 day", strtotime($akr)));

            $data['data_harian'] = $this->db->query("SELECT transaksi.tgl_transaksi, SUM(transaksi.total_harga) as total_harga
            FROM transaksi
            WHERE 
            transaksi.tgl_transaksi BETWEEN '$awl' AND '$akr' GROUP BY day(transaksi.tgl_transaksi) ORDER BY tgl_transaksi ASC")->result();
            $data['data_berat'] = $this->db->query("SELECT user.nama_user, SUM(detail_transaksi.berat) as total_berat FROM user, transaksi, detail_transaksi
            WHERE transaksi.id_user = user.id_user
            AND transaksi.id_transaksi = detail_transaksi.id_transaksi
            AND transaksi.tgl_transaksi BETWEEN '$awl' AND '$akr'
            GROUP BY user.nama_user
            ORDER BY total_berat DESC
            LIMIT 10")->result();
            $data['awal'] = $awl;
            $data['akhir'] = $akr;
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

    function print_pdf_rentang($awal, $akhir)
    {
        $data['data_rentang'] =$this->db->query("SELECT transaksi.tgl_transaksi, SUM(transaksi.total_harga) as total_harga
        FROM transaksi
        WHERE 
        transaksi.tgl_transaksi BETWEEN '$awal' AND '$akhir' GROUP BY day(transaksi.tgl_transaksi) ORDER BY tgl_transaksi ASC")->result();

        $this->load->library('dompdf_gen');

        $this->load->view('admin/laporan/laporan_pdf_rentang', $data);

        $paper_size = 'A4';
        $oriantation = 'potrait';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $oriantation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("laporan_bulanan_".date('Y-m-d_H-i-s').".pdf", array('Attachment' => 0));
    }
}
