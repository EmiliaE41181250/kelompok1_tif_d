<?php 
//  berfungsi untuk melayani segala query CRUD database
class M_data_paket extends CI_Model{
  // function untuk mengambil keseluruhan baris data dari tabel user
	public function tampil_data(){
		return $this->db->get('paket');
    }

    public function get_table(){
      $sql = $this->db->get('paket');

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
      return $this->db->query("SELECT * FROM paket ORDER BY id_paket DESC LIMIT 1");
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
    $query = $this->db->get_where('paket', array('id_paket' => $id))->result();
    return $query;
  }

  public function getAllPaketSatuanMobile()
  {
		$data = $this->db->query("SELECT paket.id_paket, paket.harga, barang.nama_barang 
    FROM paket, barang WHERE paket.id_barang = barang.id_barang AND paket.status = 'Aktif' 
    AND paket.id_jenis_paket = 'JPK000000000003'")->result();
    $response['status']=200;
    $response['error']=false;
    $response['data']=$data;
    $response['message']='success';
    return $response;
  }

  public function getAllPaketRegulerMobile()
  {
    $data = $this->db->query("SELECT paket.id_paket, paket.harga, isi_paket.nama_isi_paket 
    FROM paket, isi_paket WHERE paket.id_isi_paket = isi_paket.id_isi_paket 
    AND paket.status = 'Aktif' AND paket.id_jenis_paket = 'JPK000000000001'")->result();
    $response['status']=200;
    $response['error']=false;
    $response['data']=$data;
    $response['message']='success';
    return $response;
  }

  public function getAllPaketExpresMobile()
  {
    $data = $this->db->query("SELECT paket.id_paket, isi_paket.nama_isi_paket, durasi_paket.durasi_paket, 
    paket.harga FROM paket, durasi_paket, isi_paket WHERE paket.id_isi_paket = isi_paket.id_isi_paket 
    AND paket.id_durasi = durasi_paket.id_durasi AND paket.id_jenis_paket = 'JPK000000000002'
    AND paket.status = 'Aktif'")->result();
    $response['status']=200;
    $response['error']=false;
    $response['data']=$data;
    $response['message']='success';
    return $response;
  }

}