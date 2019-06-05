<?php
class Linkdatamodel extends CI_Model
{

    public function getLinkData($link_id){

        $this->db->select('*');
        $this->db->from('links');
        $this->db->where('id', $link_id);
        $query = $this->db->get();
       return $query;
    }

    public function delLinkRecord($rec_id){
        $this->db->where('rec_id', $rec_id);
        $this->db->delete('link_clicks');
    }


    public function getLinkRecord($link_id){
        
        $this->db->select('*');
        $this->db->from('link_clicks');
        $this->db->where('id', $link_id);
        $query = $this->db->get();
        return $query;
    }


}

?>