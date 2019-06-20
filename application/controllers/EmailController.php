<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class EmailController extends CI_Controller {

    public function __construct() {
        parent:: __construct();

        $this->load->helper('url');
        $this->load->model('emodel');
    }

    public function index() {
        
       
        $data['email_d']=$this->emodel->get_details();
        $this->load->view('email/contact',$data);
       
    }

    function send() {
        $this->load->config('email');
         $this->load->library('email');
        
         $from = $this->config->item('smtp_user');
         $to = $this->input->post('to');
         $subject = $this->input->post('subject');
         $message = $this->input->post('message');
         

         $this->email->set_newline("\r\n");
         $this->email->from($from);
        $this->email->to($to);
         $this->email->subject($subject);
         $this->email->message($message);

         if ($this->email->send()) {
             $data['email_d']=$this->emodel->get_details();
           
         // echo $to;
         } else {
            show_error($this->email->print_debugger());
        }

    }

    public function delete_Data($id){
        $query=$this->emodel->delete_details($id);
       if($query){
              header('location:'.base_url().$this->index());
         } 
    }
}?>