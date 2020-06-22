<?php
//  berfungsi untuk melayani segala query CRUD database
class M_data_waktu extends CI_Model
{
    
  public function tampil_data()
  {
      return $this->db->get('waktujemput');
  }

  public function tampil_data_edit($id)
  {
    $this->db->where(array('id' => $id));
    return $this->db->get_where('waktujemput');
  }

  public function getId()
  {
    return $this->db->query("SELECT * FROM waktujemput ORDER BY id DESC LIMIT 1");
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

  public function delete($where, $table)
  {
    $this->db->where($where);
    $this->db->delete($table);
  }

}