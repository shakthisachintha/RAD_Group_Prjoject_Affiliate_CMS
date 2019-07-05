<?php
	class Emodel extends CI_Model {

		public function connect($a){
		  return  $this->db->insert('email_d',$a);
		    }
		public function get_details(){
			$array=$this->db->get('email_d');
			return $array->result(); 
		}
		function getPosts(){
			$query = $this->db->get('reply');
			return $query->result(); }
		 
      
	}
