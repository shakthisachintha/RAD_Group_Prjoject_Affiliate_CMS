<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tools extends CI_Controller {

   function index(){
    

    $config = array(
        'protocol' => 'smtp', // 'mail', 'sendmail', or 'smtp'
        'smtp_host' => '', 
        'smtp_port' => 465,
        'smtp_user' => 'kavidikalp123@gmail.com',
        'smtp_pass' => 'Kavidi@123',
        'smtp_crypto' => 'ssl', //can be 'ssl' or 'tls' for example
        'mailtype' => 'html', //plaintext 'text' mails or 'html'
        'smtp_timeout' => '4', //in seconds
        'charset' => 'iso-8859-1',
        'wordwrap' => TRUE
    );
    
    $this->load->library('email',$config);
    $this->email->from('kavidikalp123@gmail.com' )  ;
    $this->email->to()  ;
    $this->email->subject()  ;
    $this->email->message()  ;
    $this->email->set_newline()  ;

    $result=$this->email->send();
    $this->email->print_debugger()  ;
    

}




}
