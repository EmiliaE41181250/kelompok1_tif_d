<?php
//  berfungsi untuk melayani segala query CRUD database
class M_data_saya extends CI_Model
{
    // function untuk mengambil keseluruhan baris data dari tabel admin
    public function tampil_data()
    {
        return $this->db->get('admin');
    }

    public function get_table()
    {
        $sql = $this->db->get('admin');

        return $sql->result_array();
    }

    public function edit($where, $table)
    {
        return $this->db->get_where($table, $where);
    }


    public function update($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function getUser($id)
    {
        $this->db->where('id_user', $id);
        $data = $this->db->get("user")->result();
        $response['status']=200;
        $response['error']=false;
        $response['data']=$data;
        $response['message']='success';
        return $response;
    }

    public function updateUser($data, $where)
    {
        $this->db->where($where);
        $response['data']=$this->db->update("user", $data);
        $response['status']=200;
        $response['error']=false;
        $response['message']='Berhasil memperbarui profil.';
        return $response;
    }

    public function uploadfoto($id, $foto){
        if($id == '' || empty($foto)){
            return $this->empty_response();
        } else {
            $path = $_SERVER['DOCUMENT_ROOT'].str_replace(basename($_SERVER['SCRIPT_NAME']),"",
            $_SERVER['SCRIPT_NAME'])."assets/files/gambar_customer/".$id.".jpeg";
            $finalpath = $id.".jpeg";
            if(file_put_contents($path, base64_decode($foto))){
                $where = array(
                    "id_user"=>$id
                );
                $set = array(
                    "photo"=>$finalpath
                );
                
                $this->db->where($where);
                $update = $this->db->update("user",$set);
                if($update){
                    $response['status']=200;
                    $response['error']=false;
                    $response['message']='Foto berhasil diubah.';
                    return $response;
                }else{
                    $response['status']=502;
                    $response['error']=true;
                    $response['message']='Foto gagal diubah.';
                    return $response;
                }  
            } else {
                $response['status']=502;
                $response['error']=true;
                $response['message']='Foto gagal diupload.';
                return $response;
            }
        }
    }

    public function empty_response(){
        $response['status']=502;
        $response['error']=true;
        $response['message']='Field tidak boleh kosong';
        return $response;
    }
}
