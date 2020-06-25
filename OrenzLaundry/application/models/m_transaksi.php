<?php 
//  berfungsi untuk melayani segala query CRUD database
class M_transaksi extends CI_Model{
  // function untuk mengambil keseluruhan baris data dari tabel user
	public function tampil_data(){
		return $this->db->get('transaksi');
    }

    public function get_table(){
      $sql = $this->db->get('transaksi');

      return $sql->result_array();
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
      return $this->db->query("SELECT * FROM transaksi ORDER BY id_transaksi DESC LIMIT 1");
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

  public function detail_data($id = NULL){
    $query = $this->db->get_where('transaksi', array('id_transaksi' => $id))->result();
    return $query;
  }

}