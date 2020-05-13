<?php defined('BASEATH') OR exit('No direct script access allowed');

class M_user extends CI_Model {

    public function login($post)
    {
        $this->db->select('*');
        $this->db->from('admin');
        $this->db->where('username', $post['username']);
        $this->db->where('password', md5($post['password']));
        $query = $this->db->get();
        return $query;
    }

    public function get($id = null)
    {
        $this->db->from('user');
        if($id != null) {
            $this->db->where('user_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }
}