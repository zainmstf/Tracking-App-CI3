<?php
class M_user extends CI_Model
{
    public function getData($id)
    {
        $this->db->where('username', $id);
        return $this->db->get('user')->row();
    }
}
