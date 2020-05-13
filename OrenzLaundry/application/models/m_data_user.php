<?php
//  berfungsi untuk melayani segala query CRUD database
class M_data_user extends CI_Model
{
    // function untuk mengambil keseluruhan baris data dari tabel user
    public function tampil_data()
    {
        return $this->db->get('user');
    }

    public function get_table()
    {
        $sql = $this->db->get('user');

        return $sql->result_array();
    }

    public function edit($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function getAll($table)
    {
        return $this->db->get($table);
    }

    public function getId()
    {
        return $this->db->query("SELECT * FROM user ORDER BY id_user DESC LIMIT 1");
    }
    // Mengambil 1 baris data === SELECT * FROM $table WHERE $where
    public function getEdit($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function insert($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function delete($where, $table)
    {
        $this->db->delete($table, $where);
    }

    public function update($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
}
