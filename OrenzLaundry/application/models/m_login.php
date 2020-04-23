<?php 

class M_login extends CI_Model{	

// fungsi ceklogin berfungsi untuk mengecekletersedian id dan password yang ada di variabel $where apakah ada di dalam tabel
	function cek_login($table,$where){		
		return $this->db->get_where($table,$where);
	}	
}