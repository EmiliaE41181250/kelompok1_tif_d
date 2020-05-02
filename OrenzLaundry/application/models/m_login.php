<?php 

class M_login extends CI_Model{	

// fungsi ceklogin berfungsi untuk mengecekletersedian id dan password yang ada di variabel $where apakah ada di dalam tabel
	function cek_login($table,$where){		
		return $this->db->get_where($table,$where);
	}	

	public function matching($token, $email)
	{
		$this->db->where('token',$token);
		$this->db->where('email',$email);
		$login = $this->db->get("user")->result();
    $response['status']=200;
    $response['error']=false;
    $response['data']=$login;
    $response['message']='success';
    return $response;
	}

	public function all_login(){

    $all = $this->db->get("user")->result();
    $response['status']=200;
    $response['error']=false;
    $response['login']=$all;
    return $response;

  }

	function getUser($id)
	{
		$this->db->where('id_user', $id);
		$login = $this->db->get("user")->result();
    $response['status']=200;
    $response['error']=false;
    $response['data']=$login;
    $response['message']='success';
    return $response;
	}

	function resend_email($email)
	{
		$this->db->where('email', $email);
		$login = $this->db->get("user")->result();
    $response['status']=200;
    $response['error']=false;
    $response['data']=$login;
    $response['message']='success';
    return $response;
	}

	function update_status($id_user, $status){

		$where = array(
			"id_user"=>$id_user
		);

		$set = array(
			"status" => $status
		);

		$this->db->where($where);
		$update = $this->db->update("user", $set);
		if($update){
			$response['status']=200;
			$response['error']=false;
			$response['message']='Akun anda telah terverifikasi.';
			return $response;
		}else{
			$response['status']=502;
			$response['error']=true;
			$response['message']='Gagal verifikasi akun.';
			return $response;
		}
  }
}