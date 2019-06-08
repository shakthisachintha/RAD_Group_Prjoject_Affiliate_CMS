<?php

class Customer extends CI_Controller
{

    public function contactUs(){
        $name=$this->input->post('name');
        $email=$this->input->post('email');
        $phone=$this->input->post('phone');
        $msg=$this->input->post('msg');
        $this->load->model('customermodel','customer',TRUE);
        $val=$this->customer->contact($name,$email,$phone,$msg);
        echo $val;
    }

    public function subscribe(){
        $email=$this->input->post('email');
        $this->load->model('customermodel','customer',TRUE);
        $val=$this->customer->subscribe($email);
        echo $val;
    }


    public function fiverForm()
    {
        $Name=$this->input->post('Name');
        $Email=$this->input->post('Email');
        $Phone=$this->input->post('Phone');
        $Pay=$this->input->post('Pay');
        $Pay_Det=$this->input->post('Pay_Det');
        $Gigid=$this->input->post('Gigid');
        $Prof_link=$this->input->post('Prof_link');
        $Date=$this->input->post('Date');
        $Gig_link=$this->input->post('Gig_link');

        $this->load->model('customermodel','customer',TRUE);
        echo $this->customer->fiverFormLog($Name,$Email,$Phone,$Pay,$Pay_Det,$Gigid,$Prof_link,$Date,$Gig_link);
     }

     public function ebatesForm(){
        $Name=$this->input->post('Name');
        $Email=$this->input->post('Email');
        $Phone=$this->input->post('Phone');
        $Pay=$this->input->post('Pay');
        $Pay_Det=$this->input->post('Pay_Det');

        $this->load->model('customermodel','customer',TRUE);
        echo $this->customer->ebatesFormLog($Name,$Email,$Phone,$Pay,$Pay_Det);
     }

}