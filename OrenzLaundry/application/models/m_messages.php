<?php

class M_messages extends CI_Model 
{
  public function getId()
  {
    return $this->db->query("SELECT * FROM pesan ORDER BY id_pesan DESC LIMIT 1");
  }

  public function getAllMessages($user)
  {
    $this->db->where("id_user", $user);
    $this->db->order_by('tanggal_pesan', 'DESC');
    $data = $this->db->get("pesan")->result();
    $response['status']=200;
    $response['error']=false;
    $response['data']=$data;
    $response['message']='success';
    return $response;
  }

  public function getMessagesId($id)
  {
    $this->db->where("id_pesan", $id);
		$data = $this->db->get("pesan")->result();
    $response['status']=200;
    $response['error']=false;
    $response['data']=$data;
    $response['message']='success';
    return $response;
  }

  public function getAllNotification($user)
  {
    $this->db->where("id_user", $user);
    $this->db->where("notif_user", 0);
    $this->db->order_by('tgl_transaksi', 'DESC');
		$data = $this->db->get("transaksi")->result();
    $response['status']=200;
    $response['error']=false;
    $response['data']=$data;
    $response['message']='success';
    return $response;
  }

  public function getNotificationId($id)
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

  public function sendMessage($data)
  {
    $response['data']=$this->db->insert("pesan", $data);
    $response['status']=200;
    $response['error']=false;
    $response['message']='success';
    return $response;
  }

  public function deleteMessageId($id)
  {
    $this->db->where("id_pesan", $id);
		$response['data']=$this->db->delete("pesan");
    $response['status']=200;
    $response['error']=false;
    $response['message']='success';
    return $response;
  }

  public function deleteNotificationId($id)
  {
		$data = $this->db->query("UPDATE transaksi SET notif_user = 1 WHERE id_transaksi = '$id' ");
    $response['status']=200;
    $response['error']=false;
    $response['data']=$data;
    $response['message']='Berhasil menghapus notifikasi!';
    return $response;
  }

  public function updateKonfirmasiProses($id)
  {
    $data = $this->db->query("UPDATE transaksi SET status = 3 WHERE id_transaksi = '$id' ");
    $response['status']=200;
    $response['error']=false;
    $response['data']=$data;
    $response['message']='Berhasil';
    return $response;
  }
}