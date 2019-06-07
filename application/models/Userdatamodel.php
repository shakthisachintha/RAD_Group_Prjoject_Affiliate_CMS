<?php
class Userdatamodel extends CI_Model
{

    public function reg($name, $password, $email, $user_id)
    {
        $data = array(
            'name' => $name,
            'email' => $email,
            'user_id' => $user_id,
            'password' => $password
        );

        return ($this->db->insert('user', $data));
    }

    public function checkEmail($email)
    {
        $this->db->select('user_id');
        $this->db->where('email', $email);
        $result=$this->db->get('user');
        if($result->num_rows()>0){
            return TRUE;
        }else{
            return FALSE;
        }
    }

    public function getPass($email)
    { 
        $this->db->select('password ');
        $this->db->where('email', $email);
        $query=$this->db->get('user');
        if($query->num_rows()>0){
            $pw=$query->result();
            return $pw[0]->password;
        }
        return "N/A";
    }

    public function getData($email){
        $this->db->select('user_id,name,email');
        $this->db->where('email', $email);
        $query=$this->db->get('user');
        $result=$query->result()[0];
        return $result;
    }
}
