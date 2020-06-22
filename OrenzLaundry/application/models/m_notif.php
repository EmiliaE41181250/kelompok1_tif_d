<?php
//  berfungsi untuk melayani segala query CRUD database
class M_notif extends CI_Model
{
    public function tampil_data()
    {
        return $this->db->get('transaksi');
    }

    public function get_table()
    {
        $sql = $this->db->get('transaksi');


        return $sql->result_array();
    }

    public function getAll($table)
    {
        return $this->db->get($table);
    }

    public function detail_data($id = NULL)
    {
        $query = $this->db->get_where('transaksi', array('id_transaksi' => $id))->result();
        return $query;
    }

    public function getAllmobile()
    {
        $data = $this->db->get("waktujemput")->result();
        $response['status']=200;
        $response['error']=false;
        $response['data']=$data;
        $response['message']='success';
        return $response;
    }

    function getNamaPaketMobile($id_paket)
    {
        $data = $this->db->query("SELECT jenis_paket.nama_jenis_paket FROM jenis_paket, paket 
        WHERE jenis_paket.id_jenis_paket = paket.id_jenis_paket AND paket.id_paket = '$id_paket'")->result();
        $response['status']=200;
        $response['error']=false;
        $response['data']=$data;
        $response['message']='success';
        return $response;
    }

    public function batalPesananMobile($id)
    {
        $data = $this->db->query("UPDATE transaksi SET status = 6 WHERE id_transaksi = '$id' ");
        $response['status']=200;
        $response['error']=false;
        $response['data']=$data;
        $response['message']='Pesanan berhasil dibatalkan!';
        return $response;
    }

    public function updateantartrsmobile($data, $where)
    {
        $this->db->where($where);
        $data = $this->db->update("transaksi", $data);
        $response['status']=200;
        $response['error']=false;
        $response['data']=$data;
        $response['message']='Berhasil melakukan input lokasi antar.';
        return $response;
    }

    public function insertTrs($dataTrs, $dataDetail)
    {
        $response['dataTrs']=$this->db->insert("transaksi", $dataTrs);
        $response['dataDetail']=$this->db->insert("detail_transaksi", $dataDetail);
        $response['status']=200;
        $response['error']=false;
        $response['message']='success';
        return $response;
    }

    public function getId()
    {
        return $this->db->query("SELECT * FROM transaksi ORDER BY id_transaksi DESC LIMIT 1");
    }
}
