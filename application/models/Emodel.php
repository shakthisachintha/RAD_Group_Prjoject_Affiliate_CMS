<?php
	class Emodel extends CI_Model {

		public function connect($a){
		  return  $this->db->insert('email_d',$a);
		    }
		public function get_details(){
			$array=$this->db->get('email_d');
			return $array->result(); 
		}
		public function delete_details($id){
			$this->db->where('email_d.id', $id);
			return $this->db->delete('email_d');

		}
		 
      
	}
