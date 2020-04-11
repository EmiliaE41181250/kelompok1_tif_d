<?php 
//  berfungsi untuk melayani segala query CRUD database
class M_data extends CI_Model{
  // function untuk mengambil keseluruhan baris data dari tabel user
	public function tampil_data(){
		return $this->db->get('paket');
    }