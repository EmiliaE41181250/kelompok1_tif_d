<?php

class M_History  extends CI_Model
{
    public function getAllHistory($user)
    {
        $data = $this->db->query("SELECT transaksi.id_transaksi, paket.nama_paket, transaksi.total_harga, transaksi.tgl_transaksi
        FROM transaksi, detail_transaksi, paket
        WHERE transaksi.id_transaksi = detail_transaksi.id_transaksi
        AND paket.id_paket = detail_transaksi.id_paket
        AND transaksi.id_user = '$user'
        AND transaksi.notif_user = 0
        AND (transaksi.status = 5 OR transaksi.status = 6) 
        GROUP BY id_transaksi
        ORDER BY transaksi.tgl_transaksi DESC")->result();
        $response['status']=200;
        $response['error']=false;
        $response['data']=$data;
        $response['message']='success';
        return $response;
    }

    public function getAllTransaksi($user)
    {
        
        $data = $this->db->query("SELECT transaksi.id_transaksi, paket.nama_paket, transaksi.total_harga, transaksi.tgl_transaksi
        FROM transaksi, detail_transaksi, paket
        WHERE transaksi.id_transaksi = detail_transaksi.id_transaksi
        AND paket.id_paket = detail_transaksi.id_paket
        AND transaksi.id_user = '$user'
        AND transaksi.notif_user = 0
        AND (transaksi.status <> 5 OR transaksi.status <> 6) 
        GROUP BY id_transaksi
        ORDER BY transaksi.tgl_transaksi DESC")->result();
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