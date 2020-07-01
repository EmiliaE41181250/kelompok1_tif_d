<?php

class M_dashboard extends CI_Model{

    public function getAll(){

        $data = $this->db->get('user');

		return $data->num_rows();
    }

    public function getHistory(){

        $today = date("Y-m-d");
        $query = $this->db->query("SELECT tgl_transaksi, SUM(total_harga) AS total_harga FROM transaksi 
        WHERE tgl_transaksi LIKE '%$today%' GROUP BY tgl_transaksi");
        
        return $query->num_rows();
    }

    public function getBulanan(){

        $bulan_sekarang = date("Y-m");

        $query = $this->db->query("SELECT SUM(transaksi.total_harga) as total_harga FROM transaksi WHERE transaksi.tgl_transaksi LIKE '%$bulan_sekarang%'");
        
        return $query;
    }

    public function getTahunan(){

        $tahun_sekarang = date("Y");

        $query = $this->db->query("SELECT SUM(transaksi.total_harga) as total_harga FROM transaksi WHERE transaksi.tgl_transaksi LIKE '%$tahun_sekarang%'");
        
        return $query;
    }

    public function getFavorit()
    {
        $favorit = date("Y-m");

        $query = $this->db->query("SELECT user.nama_user, SUM(detail_transaksi.berat) as total_berat 
        FROM user, transaksi, detail_transaksi
        WHERE transaksi.id_user = user.id_user 
        AND transaksi.id_transaksi = detail_transaksi.id_transaksi 
        AND transaksi.tgl_transaksi LIKE '%$favorit%' 
        GROUP BY user.nama_user ORDER BY total_berat DESC LIMIT 5");

        return $query;
    }

    public function getMingguan()   
    {

        $h_7 = date("Y-m-d", mktime(0, 0, 0, date("n"), date("j")-6, date("Y")));
        $h = date("Y-m-d", mktime(0, 0, 0, date("n"), date("j")+1, date("Y")));

        $query = $this->db->query("SELECT transaksi.tgl_transaksi, SUM(transaksi.total_harga) as total_harga
        FROM transaksi WHERE tgl_transaksi BETWEEN '$h_7' AND '$h' 
        GROUP BY day(transaksi.tgl_transaksi) ORDER BY tgl_transaksi ASC");

        return $query;
    }

        
}

?>