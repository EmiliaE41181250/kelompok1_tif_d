<?php

class M_Home extends CI_Model 
{
  public function getAllpromosi()
  {
    $this->db->where("status", "Aktif");
		$data = $this->db->get("promo")->result();
    $response['status']=200;
    $response['error']=false;
    $response['data']=$data;
    $response['message']='success';
    return $response;
  }
  
  public function getUsermobile($id)
  {
    $this->db->where("id_user", $id);
		$data = $this->db->get("user")->result();
    $response['status']=200;
    $response['error']=false;
    $response['data']=$data;
    $response['message']='success';
    return $response;
  }
}