<?php
//  berfungsi untuk melayani segala query CRUD database
class M_data_saya extends CI_Model
{
    // function untuk mengambil keseluruhan baris data dari tabel admin
    public function tampil_data()
    {
        return $this->db->get('admin');
    }

    public function get_table()
    {
        $sql = $this->db->get('admin');

        return $sql->result_array();
    }

    public function edit($where, $table)
    {
        return $this->db->get_where($table, $where);
    }


    public function update($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
}
