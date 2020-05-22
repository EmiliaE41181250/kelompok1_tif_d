<?php
//  berfungsi untuk melayani segala query CRUD database
class M_notif extends CI_Model
{

    public function get_table()
    {
        $sql = $this->db->get('transaksi');

        return $sql->result_array();
    }

    public function getAll($table)
    {
        return $this->db->get($table);
    }

    public function insert($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function update($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function detail_data($id = NULL)
    {
        $query = $this->db->get_where('transaksi', array('id_transaksi' => $id))->result();
        return $query;
    }
}
