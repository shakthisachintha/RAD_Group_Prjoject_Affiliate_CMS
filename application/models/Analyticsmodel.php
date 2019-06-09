<?php
class Analyticsmodel extends CI_Model
{

    public function logData($ip,$country,$city,$province,$ccd){
        $data=array(
            'ip'=>$ip,
            'country'=>$country,
            'city'=>$city,
            'region'=>$province,
            'countrycode'=>$ccd
        );
        if($this->db->insert('analytics',$data)){
            echo "SUCCESS";
        }
    }

    public function PageViewData(){
        $query=$this->db->query('SELECT COUNT(id) as views ,MONTHNAME(timestamp) as month,EXTRACT(MONTH FROM timestamp) as num FROM `analytics` GROUP BY MONTHNAME(timestamp) ORDER BY num asc');
        return $query;
        //  
    }

    public function PageViewDataCountry(){
        $query=$this->db->query('SELECT COUNT(id) as views ,country FROM `analytics` GROUP BY country ORDER BY views desc');
        return $query;
    }

    public function PageViewDataCity(){
        $query=$this->db->query('SELECT COUNT(id) as views ,city FROM `analytics` GROUP BY city ORDER BY views desc');
        return $query;
    }

}