<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class EmailController extends CI_Controller {

    public function __construct() {
        parent:: __construct();
        $this->load->database();
        $this->load->model('add_reply');
        $this->load->helper('url');
    }

    public function index() {
        
       
        $data['email_d']=$this->emodel->get_details();
        $data['posts'] = $this->emodel->getPosts();
    }
        public function savedata(){

       $this->load->view('admin/mail_send');
        $data['Receiver_Email']=$this->input->post('to');
        $data['subject'] =$this->input->post('subject');
        $data['reply'] =$this->input->post('message');
         $this->add_reply->saverecords($data);
       
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

        $data['Receiver_Email']=$this->input->post('to');
        $data['subject'] =$this->input->post('subject');
        $data['reply'] =$this->input->post('message');
         $this->add_reply->saverecords($data);
       

         if ($this->email->send()) {
             $data['email_d']=$this->emodel->get_details();
             $this->load->library('user_agent');

             $this->load->helper('url');
             redirect($this->agent->referrer());
          //   $this->load->view('admin/mail_send');
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