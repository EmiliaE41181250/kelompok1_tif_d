<?php 
//  berfungsi untuk melayani segala query CRUD database
class M_isipaket extends CI_Model{
  // function untuk mengambil keseluruhan baris data dari tabel user
	public function tampil_data(){
		return $this->db->get('isi_paket');
    }

    public function get_table(){
      $sql = $this->db->get('isi_paket');

      return $sql->result_array();
    }

    function edit_data($where,$table){
      return $this->db->get_where($table,$where);
    }

    // public function getAll($table)
    // {
    //   return $this->db->get($table);
    // }

    // public function getId()
    // {
    //   return $this->db->query("SELECT * FROM paket ORDER BY id_isi_paket DESC LIMIT 1");
    // }

    function insert($data,$table){
      $this->db->insert($table,$data);
  }

  function delete($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
    }
  
    function update($where,$data,$table){
      $this->db->where($where);
      $this->db->update($table,$data);
    }