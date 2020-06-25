<?php
class M_rentang_hari extends CI_Model
{

    function get_data_transaksi()
    {
        $query = $this->db->query("SELECT tgl_transaksi, SUM(total_harga) AS total_harga FROM transaksi GROUP BY tgl_transaksi");

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $data) {
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
}
