<?php
class Linkdatamodel extends CI_Model
{

    public function getLinkData($link_id)
    {

        $this->db->select('*');
        $this->db->from('links');
        $this->db->where('id', $link_id);
        $query = $this->db->get();
        return $query;
    }

    public function delLinkRecord($rec_id)
    {
        $this->db->where('rec_id', $rec_id);
        $this->db->delete('link_clicks');
    }


    public function getLinkRecord($link_id)
    {

        $this->db->select('*');
        $this->db->from('link_clicks');
        $this->db->where('id', $link_id);
        $query = $this->db->get();
        return $query;
    }


    public function addRecord($url, $name, $desc)
    {
        $data = array(
            'url' => $url,
            'name' => $name,
            'description' => $desc,
        );
        if ($this->db->insert('links', $data)) {
            return $this->db->insert_id();
        } else {
            return "ERROR";
        }
    }


    public function update($url, $name, $desc, $id)
    {
        $data = array(
            'url' => $url,
            'name' => $name,
            'description' => $desc
        );

        $this->db->where('id', $id);
        return $this->db->update('links', $data);
    }

    public function delete($id){
        $this->db->where('id', $id);
        $this->db->delete('links');
    }

    public function getLinks(){
        $this->db->select('*');
        $this->db->from('links');
        $query = $this->db->get();
        return $query;
    }

    public function linkClick($link_id, $ip, $city, $country, $isp, $time, $province){
        $this->db->set('id', $link_id);
        $this->db->set('country', $country);
        $this->db->set('isp', $isp);
        $this->db->set('province', $province);
        $this->db->set('date', $time);
        $this->db->set('city', $city);
        $this->db->set('ip', $ip);
        $this->db->insert('link_clicks');

        $query=$this->getLinkData($link_id);
        foreach ($query->result() as $row) {
            echo $row->url;
        }
    }
}
