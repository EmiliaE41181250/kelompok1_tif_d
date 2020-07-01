<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Notifikasi extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        // ini adalah function untuk memuat model bernama m_data
        $this->load->model('m_notif');
        $this->load->library('primslib');
        if ($this->session->userdata('nama') == '') {
            redirect('admin/login/');
        }
    }

    function index()
    {
        // ini adalah variabel array $data yang memiliki index user, berguna untuk menyimpan data 

        $data['detail_transaksi'] = $this->m_notif->getAll('detail_transaksi')->result();
        $this->db->order_by('tgl_transaksi', 'DESC');
        $data['transaksi'] = $this->m_notif->tampil_data('transaksi')->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('admin/notif/v_notif', $data);
        $this->load->view('templates/footer');
    }


    public function detail($id)
    {
        $this->load->model('m_notif');
        $detail = $this->db->get_where('detail_transaksi', array('id_transaksi' => $id))->result();
        $data['detail'] = $detail;
        $data['transaksi'] = $this->m_notif->detail_data($id);

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('admin/notif/v_detail_notif', $data);
        $this->load->view('templates/footer');
    }

    public function fetch_notif()
    {
        $output = '';
        if($this->input->post('view') == ''){
            $data = $this->db->query("
            select `orenz_laundry`.`transaksi`.`id_transaksi` AS `id_transaksi`,`orenz_laundry`.`transaksi`.`tgl_transaksi` AS `tgl_transaksi`,`orenz_laundry`.`user`.`nama_user` AS `nama_user`,`orenz_laundry`.`paket`.`nama_paket` AS `nama_paket`,`orenz_laundry`.`transaksi`.`notif_admin` AS `notif_admin` from (((`orenz_laundry`.`transaksi` join `orenz_laundry`.`user`) join `orenz_laundry`.`paket`) join `orenz_laundry`.`detail_transaksi`) where `orenz_laundry`.`transaksi`.`id_transaksi` = `orenz_laundry`.`detail_transaksi`.`id_transaksi` and `orenz_laundry`.`paket`.`id_paket` = `orenz_laundry`.`detail_transaksi`.`id_paket` and `orenz_laundry`.`transaksi`.`id_user` = `orenz_laundry`.`user`.`id_user` group by `orenz_laundry`.`transaksi`.`id_transaksi` order by `orenz_laundry`.`transaksi`.`tgl_transaksi` desc limit 4
            ");
            $data_row = $data->row();
            $data_result = $data->result();
            // print_r($data_result);
            

            foreach ($data_result as $result ) {
                if($result->notif_admin == 0){
                    $bg = 'bg-light';
                }else{
                    $bg = 'bg-white';
                }

                $output .= '
                <a class="dropdown-item d-flex align-items-center '.$bg.'" href="'. base_url() .'admin/c_transaksi/edit/'.$result->id_transaksi.'">
                    <div class="mr-3">
                    <div class="icon-circle bg-primary">
                        <i class="fas fa-file-alt text-white"></i>
                    </div>
                    </div>
                    <div>
                    <div class="small text-gray-500">'.$result->tgl_transaksi.'</div>
                    <span class="font-weight-medium">Pesanan <strong>'.$result->nama_paket.'</strong> baru dari '.$result->nama_user.' mohon segera diperiksa!</span>
                    </div>
                </a>
                ';
            }

        }else{
            $output .= '
                <a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="mr-3">
                    <div class="icon-circle bg-primary">
                        <i class="fas fa-danger text-white"></i>
                    </div>
                    </div>
                    <div>
                    <div class="small text-gray-500">ANDA TIDAK MEMILIKI NOTIFIKASI BARU</div>
                    </div>
                </a>';
        }

        $jumlah_unseen = $this->db->query("SELECT COUNT(*) as unseen FROM transaksi WHERE notif_admin = 0")->row()->unseen;

        $data = array(
            'notification' => $output,
            'unseen_notification' => $jumlah_unseen
        );

        echo json_encode($data);
    }
}
