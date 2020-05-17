<?php

class M_lupas extends CI_Model 
{
  function getUser($search)
	{
    $this->db->where('email', $search);
    $this->db->or_where('username', $search);
		$login = $this->db->get("user")->result();
    $response['status']=200;
    $response['error']=false;
    $response['data']=$login;
    $response['message']='success';
    return $response;
  }
  
  function getToken($email, $token)
	{
    $this->db->where('email', $email);
    $this->db->where('token', $token);
		$login = $this->db->get("user")->result();
    $response['status']=200;
    $response['error']=false;
    $response['data']=$login;
    $response['message']='success';
    return $response;
  }
  
  function send_email($email)
	{
		$this->db->where('email', $email);
		$login = $this->db->get("user")->result();
    $response['status']=200;
    $response['error']=false;
    $response['data']=$login;
    $response['message']='success';
    return $response;
  }
  
  function putPassword($email, $password){

		$where = array(
			"email"=>$email
		);

		$set = array(
			"password" => $password
		);

		$this->db->where($where);
		$update = $this->db->update("user", $set);
		if($update){
			$response['status']=200;
			$response['error']=false;
			$response['message']='Password anda telah berhasil diubah, silahkan login';
			return $response;
		}else{
			$response['status']=502;
			$response['error']=true;
			$response['message']='Gagal mengubah password';
			return $response;
		}
  }
}
