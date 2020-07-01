<?php

class M_isipaket extends CI_Model 
{
  // Mengambil keseluruhan data === SELECT * FROM $table
  public function getAll($table)
  {
    return $this->db->get($table);
  }

  // Mengambil 1 baris data === SELECT * FROM $table WHERE $where
  public function getEdit($where, $table)
  {
    return $this->db->get_where($table, $where);
  }

  // Mengambil 1 baris ID
  public function getId()
  {
    return $this->db->query("SELECT * FROM pesan ORDER BY id_pesan DESC LIMIT 1");
  }


  
  public function detail_data($id = NULL){
    $query = $this->db->get_where('pesan', array('id_pesan' => $id))->result();
    return $query;
  }
}
