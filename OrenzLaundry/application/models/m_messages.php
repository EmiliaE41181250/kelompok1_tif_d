<?php

class M_Messages extends CI_Model 
{
  public function getAllMessages($user)
  {
    $this->db->where("id_user", $user);
		$data = $this->db->get("pesan")->result();
    $response['status']=200;
    $response['error']=false;
    $response['data']=$data;
    $response['message']='success';
    return $response;
  }

  public function getMessagesId($id)
  {
    $this->db->where("id_pesan", $id);
		$data = $this->db->get("pesan")->result();
    $response['status']=200;
    $response['error']=false;
    $response['data']=$data;
    $response['message']='success';
    return $response;
  }
}