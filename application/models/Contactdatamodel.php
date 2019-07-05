<?php
class Contactdatamodel extends CI_Model
{
    public function getMessage()
    {
        $this->db->select('*');
        $query = $this->db->get('contact_us');
        return $query;
    }
    public function getMessage2() //ebates
    {
        $this->db->select('*');
        $query = $this->db->get('ebates_form');
        return $query;
    }
    public function getMessage3() //fiver
    {
        $this->db->select('*');
        $query = $this->db->get('fiverr_form');
        return $query;
    }
    public function getMessage4() //email
    {
        $this->db->select('*');
        $query = $this->db->get('email_d');
        return $query;
    }
    public function getMessage5() //email-outbox
    {
        $this->db->select('*');
        $query = $this->db->get('reply');
        return $query;
    }
    public function delete($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('contact_us');
    }
    public function dailyMessageCount()
    {

        $this->db->select('id');
        $this->db->group_by("DATE_FORMAT(timestamp, '%Y-%m-%d')")
            ->select('count(id) as count')
            ->select("DATE_FORMAT( timestamp, '%d.%m.%Y' ) as timestamp",  FALSE)
            ->order_by("timestamp desc");


        $query2 = $this->db->get('contact_us'); //querey to get all rows from database

        return $query2; //return all th data rows as an array

    }
    //Monthly message count from db
    public function monthlyMessageCount()
    {

        $this->db->select('id');
        $this->db->group_by("DATE_FORMAT(timestamp, '%Y-%m')")
            ->select('count(id) as count')
            ->select("DATE_FORMAT( timestamp, '%y.%m' ) as timestamp",  FALSE)
            ->order_by("timestamp desc");


        $query3 = $this->db->get('contact_us'); //querey to get all rows from database

        return $query3; //return all th data rows as an array

    }

    //Early message count from db
    public function yearlyMessageCount()
    {

        $this->db->select('id');
        $this->db->group_by("DATE_FORMAT(timestamp, '%Y')")
            ->select('count(id) as count')
            ->select("DATE_FORMAT( timestamp, '%y' ) as timestamp",  FALSE)
            ->order_by("timestamp desc");


        $query4 = $this->db->get('contact_us'); //querey to get all rows from database

        return $query4; //return all th data rows as an array

    }
}
