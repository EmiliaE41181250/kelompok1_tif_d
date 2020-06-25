<?php

class M_History  extends CI_Model
{
    public function getAllHistory($user)
    {
        $this->db->where("id_user", $user);
        $this->db->where("notif_user", 0);
        $data = $this->db->get("transaksi")->result();
        $response['status']=200;
        $response['error']=false;
        $response['data']=$data;
        $response['message']='success';
        return $response;
    }

    public function getAllTransaksi($user)
    {
        $this->db->where("id_user", $user);
        $this->db->where("notif_user", 0);
        $data = $this->db->get("transaksi")->result();
        $response['status']=200;
        $response['error']=false;
        $response['data']=$data;
        $response['message']='success';
        return $response;
    }

    public function getHistoryId($id)
    {
        $where = array('id_transaksi' => $id);
        $data = $this->db->get_where("transaksi", $where)->result();
        $detail = $this->db->query("SELECT * FROM detail_transaksi, paket 
        WHERE id_transaksi = '$id' AND detail_transaksi.id_paket = paket.id_paket ")->result();
        $response['status']=200;
        $response['error']=false;
        $response['data']=$data;
        $response['detail']=$detail;
        $response['message']='success';
        return $response;
    }

    public function getTransaksiId($id)
    {
        $where = array('id_transaksi' => $id);
        $data = $this->db->get_where("transaksi", $where)->result();
        $detail = $this->db->query("SELECT * FROM detail_transaksi, paket 
        WHERE id_transaksi = '$id' AND detail_transaksi.id_paket = paket.id_paket ")->result();
        $response['status']=200;
        $response['error']=false;
        $response['data']=$data;
        $response['detail']=$detail;
        $response['message']='success';
        return $response;
    }

    public function deleteHistoryId($id)
    {
        $data = $this->db->query("UPDATE transaksi SET notif_user = 1 WHERE id_transaksi = '$id' ");
        $response['status']=200;
        $response['error']=false;
        $response['data']=$data;
        $response['message']='Berhasil menghapus history!';
        return $response;
    }

    public function deleteTransaksiId($id)
    {
        $data = $this->db->query("UPDATE transaksi SET notif_user = 1 WHERE id_transaksi = '$id' ");
        $response['status']=200;
        $response['error']=false;
        $response['data']=$data;
        $response['message']='Berhasil menghapus notifikasi!';
        return $response;
    }
}