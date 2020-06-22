<?php

class Model_promo extends CI_Model 
{
  // Mengambil keseluruhan data === SELECT * FROM $table
  public function getAll($table)
  {
    return $this->db->get($table);
  }

  public function getAllmobile()
  {
    $this->db->where("status", "Aktif");
		$data = $this->db->get("promo")->result();
    $response['status']=200;
    $response['error']=false;
    $response['data']=$data;
    $response['message']='success';
    return $response;
  }

  public function getIdbyNamemobile($id)
  {
    $this->db->where("id_promo", $id);
		$data = $this->db->get("promo")->result();
    $response['status']=200;
    $response['error']=false;
    $response['data']=$data;
    $response['message']='success';
    return $response;
  }

  function getPromoTokenMobile($token)  
  {
    $this->db->where("kode", $token);
		$data = $this->db->get("promo")->result();
    $response['status']=200;
    $response['error']=false;
    $response['data']=$data;
    $response['message']='success';
    return $response;
  }

  // Mengambil 1 baris data === SELECT * FROM $table WHERE $where
  public function getEdit($where, $table)
  {
    return $this->db->get_where($table, $where);
  }

  // Mengambil 1 baris ID
  public function getId()
  {
    return $this->db->query("SELECT * FROM promo ORDER BY id_promo DESC LIMIT 1");
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
