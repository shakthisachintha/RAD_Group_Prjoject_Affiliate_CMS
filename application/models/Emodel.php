<?php
	class Emodel extends CI_Model {

		public function connect($a){
		  return  $this->db->insert('emails',$a);
		    }
		public function get_details(){
			$array=$this->db->get('emails');
			return $array->result(); 
		}
		public function delete_details($id){
			$this->db->where('emails.id', $id);
			return $this->db->delete('emails');

		}
		 
      
	}
