<?php
class Contactdatamodel extends CI_Model
{
    public function getMessage()
    {
        $this->db->select('*');
        $query = $this->db->get('contact_us');
        return $query;
    }
    public function delete($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('contact_us');
    }
}
