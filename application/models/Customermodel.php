<?php
class Customermodel extends CI_Model
{
    public function contact($name, $email, $phone, $msg)
    { 
        $data=array(
            'from_email'=>$email,
            'name'=>$name,
            'phone'=>$phone,
            'message'=>$msg
        );
        if($this->db->insert('contact_us',$data)){
            return "SUCCESS";
        }else{
            return "ERROR";
        }
    }

    private function checkEmail($email)
    {
        $this->db->select('email');
        $this->db->where('email', $email);
        $result=$this->db->get('subscribers');
        if($result->num_rows()>0){
            return TRUE;
        }else{
            return FALSE;
        }
    }

    public function subscribe($email){
        $data=array(
            'email'=>$email,
        );
        if($this->checkEmail($email)){
            return "ERROR";
        }else{
            if($this->db->insert('subscribers',$data)){
                return "SUCCESS";
            }else{
                return "ERROR";
            }
        }
        
    }
}
