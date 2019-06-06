<?php
class Admin extends CI_Controller
{
<<<<<<< HEAD
//helllo
=======
     //commeted
>>>>>>> 696a02d9e568b3c01455c747a6fae2939c9558ff
    public function index($page = "admin")
    {
        if ($page == "admin") {
            $this->load->view('admin/template/header');
            $this->load->view('admin/profile');
            $this->load->view('admin/template/footer');
            //hisus
        } elseif ($page == "contacts") {
            $this->load->view('admin/template/header');
            $this->load->view('admin/contact_messages');
            $this->load->view('admin/template/footer');
        } elseif ($page == "profile") {
            $this->load->view('admin/template/header');
            $this->load->view('admin/profile');
            $this->load->view('admin/template/footer');
        } elseif ($page == "mail_send") {
            $this->load->view('admin/template/header');
            $this->load->view('admin/mail_send');
            $this->load->view('admin/template/footer');
        } elseif ($page == "mail_outbox") {
            $this->load->view('admin/template/header');
            $this->load->view('admin/mail_outbox');
            $this->load->view('admin/template/footer');
        } elseif ($page == "mail_draft") {
            $this->load->view('admin/template/header');
            $this->load->view('admin/mail_draft');
            $this->load->view('admin/template/footer');
        } elseif ($page == "new") {
            $this->load->view('admin/template/header');
            $this->load->view('admin/new_post');
            $this->load->view('admin/template/footer');
        } elseif ($page == "views") {
            $this->load->view('admin/template/header');
            $this->load->view('admin/page_views');
            $this->load->view('admin/template/footer');
        } elseif ($page == "ebatesform") {
            $this->load->view('admin/template/header');
            $this->load->view('admin/ebates_form');
            $this->load->view('admin/template/footer');
        } elseif ($page == "links") {
            $this->load->view('admin/template/header');
            $this->load->view('admin/link_clicks');
            $this->load->view('admin/template/footer');
        } else {
            $this->load->view('admin/template/header');
            $this->load->view('admin/profile');
            $this->load->view('admin/template/footer');
        }
    }

}
