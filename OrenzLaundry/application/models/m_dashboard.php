<?php

class M_dashboard extends CI_Model{

    public function getAll(){

        $data = $this->db->get('user');

		return $data->num_rows();
    }

    public function getHistory(){

        $query = $this->db->query("SELECT tgl_transaksi, SUM(total_harga) AS total_harga FROM transaksi GROUP BY tgl_transaksi");
        
        return $query->num_rows();
    }

}

?>