<?php
class RegModel extends CI_Model{
    public function __construct(){
        parent::__construct();
        
    }

    function can_log($email,$password){
        $this->db->where('email',$email);
        $this->db->where('password',$password);
        $query=$this->db->get('registration');
        $array=array();
        if($query->num_rows()>0){
            
            $array['username']='username';
            $array['email']='email';
            $array['password']='password';
            
            return $array;
        }else{
            return false;
        }
    }

    function update($email,$newPwd){
        $data="UPDATE registration SET password='$newPwd' WHERE email='$email'";
        return $data;
    }

   

    public function insert(){
        $data=array(
            'username'=>$_POST['txtName'],
            'email'=>$_POST['txtEmail'],
            'password'=>$_POST['txtPwd'],
        );
        

        $result=$this->db->insert('registration',$data);
        if($this->db->affected_rows()>0){
			return true;

		}
		else{
			return false;
		}
        
    
    }

    public function getCurrentPwd($email){
        $query=$this->db->where(['email'=>$email])->get('registration');
        if($query->num_rows()>0){
            return $query->row();
        }

    }
    public function updatePwd($newPwd,$email){
        $data=array(
            'password'=> $newPwd
        );
        return $this->db->where('email',$email)->update('registration',$data);
    }
    
    public function delete($email){
        $this->load->database();
        $this->db->where('email',$email);
        $this->db->delete();
        return true;
        
    }
    

}
?>

