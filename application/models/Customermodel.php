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

    public function checkEmail($email)
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

    public function fiverFormLog($Name,$Email,$Phone,$Pay,$Pay_Det,$Gigid,$Prof_link,$Date,$Gig_link){
        $data=array(
            'name'=>$Name,
            'email'=>$Email,
            'phone'=>$Phone,
            'payment_method'=>$Pay,
            'payment_details'=>$Pay_Det,
            'gigid'=>$Gigid,
            'profile'=>$Prof_link,
            'reg_date'=>$Date,
            'rev_link'=>$Gig_link,
        );

        if($this->db->insert('fiverr_form',$data)){
            return $this->db->insert_id();
        }
    }

    public function ebatesFormLog($Name,$Email,$Phone,$Pay,$Pay_Det){
        $data=array(
            'name'=>$Name,
            'email'=>$Email,
            'phone'=>$Phone,
            'pay_method'=>$Pay,
            'pay_details'=>$Pay_Det,
        );

        if($this->db->insert('ebates_form',$data)){
            return $this->db->insert_id();
        }
    }
    public function emailform($Id,$Email,$Subject,$Comment){
        $data=array(
            'id'=>$Id,
            'email'=>$Email,
            'subject'=>$Subject,
            'comment'=>$Comment,
            
        );

        if($this->db->insert('mail_send',$data)){
            return $this->db->insert_id();
        }
    }
        public function outboxform($Receiver_Email,$Subject,$reply){
            $data=array(
            
                'email'=>$Receiver_Email,
                'SAubject'=>$Subject,
                'reply'=>$reply,
                
            );
    
            if($this->db->insert('mail_send',$data)){
                return $this->db->insert_id();
            }    
    
}
