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

}