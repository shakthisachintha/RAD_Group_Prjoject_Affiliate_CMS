<?php
class Contactdatamodel extends CI_Model
{
    public function getMessage()
    {
        $this->db->select('*');
        $query = $this->db->get('contact_us');
        return $query;
    }
    public function getMessage2()//ebates
    {
        $this->db->select('*');
        $query = $this->db->get('ebates_form');
        return $query;
    }
    public function getMessage3()//fiver
    {
        $this->db->select('*');
        $query = $this->db->get('fiverr_form');
        return $query;
    }
    public function delete($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('contact_us');
    }
}
