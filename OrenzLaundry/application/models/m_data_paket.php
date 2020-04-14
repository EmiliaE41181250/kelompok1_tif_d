<?php 
//  berfungsi untuk melayani segala query CRUD database
class M_data_paket extends CI_Model{
  // function untuk mengambil keseluruhan baris data dari tabel user
	public function tampil_data(){
		return $this->db->get('paket');
    }
    public function edit($where, $table)
    {
      return $this->db->get_where($table, $where);
    }

    public function getAll($table)
    {
      return $this->db->get($table);
    }

    public function getId()
    {
      return $this->db->query("SELECT * FROM paket ORDER BY id_paket DESC LIMIT 1");
    }

    public function insert($data, $table)
  {
    $this->db->insert($table, $data);
  }
}