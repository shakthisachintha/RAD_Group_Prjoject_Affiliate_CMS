<?php
class Admin extends CI_Controller
{
    public function index($page = "admin")
    {
        if ($page == "admin") {
            $this->load->view('admin/template/header');
            $this->load->view('admin/profile');
            $this->load->view('admin/template/footer');
        } elseif ($page == "contacts") {
            $this->load->model('contactdatamodel', 'contact', TRUE);
            $messages = $this->contact->getMessage();
            $dailyMessageCount = $this->contact->dailyMessageCount();
            $monthlyMessageCount = $this->contact->monthlyMessageCount();
            $yearlyMessageCount = $this->contact->yearlyMessageCount();
            $data = array(
                "query1" => $messages,
                "query2" => $dailyMessageCount,
                "query3" => $monthlyMessageCount,
                "query4" => $yearlyMessageCount
            );
            $this->load->view('admin/template/header');
            $this->load->view('admin/contact_messages', $data);
            $this->load->view('admin/template/footer');
        } elseif ($page == "profile") {
            $this->load->view('admin/template/header');
            $this->load->view('admin/profile');
            $this->load->view('admin/template/footer');
        } elseif ($page == "mail_send") {
            $this->load->model('contactdatamodel', 'emailform', TRUE);
            $messages = $this->emailform->getMessage4();
            $data = array(
                "query" => $messages
            );
            $this->load->view('admin/template/header');
            $this->load->view('admin/mail_send', $data);
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

            $this->load->model('Analyticsmodel', 'analytic', TRUE);
            $query = $this->analytic->PageViewData();
            $country = $this->analytic->PageViewDataCountry();
            $city = $this->analytic->PageViewDataCity();

            $this->load->model('Postcontentmodel', 'post', TRUE);
            $post = $this->post->allPost();

            $data = array(
                "monthly" => $query,
                "country" => $country,
                "city" => $city,
                "post" => $post
            );

            $this->load->view('admin/template/header');
            $this->load->view('admin/page_views', $data);
            $this->load->view('admin/template/footer');
        } elseif ($page == "ebatesform") {               // ebates
            $this->load->model('contactdatamodel', 'ebatesFormLog', TRUE);
            $messages = $this->ebatesFormLog->getMessage2();
            $data = array(
                "query" => $messages
            );
            $this->load->view('admin/template/header');
            $this->load->view('admin/ebates_form', $data);
            $this->load->view('admin/template/footer');
        } elseif ($page == "links") {
            $this->load->model('linkdatamodel', 'link', TRUE);
            $query = $this->link->getLinks();
            $data = array(
                "query" => $query
            );

            $this->load->view('admin/template/header');
            $this->load->view('admin/link_clicks', $data);
            $this->load->view('admin/template/footer');
        } elseif ($page == "linkgen") {
            $this->load->model('linkdatamodel', 'link', TRUE);
            $query = $this->link->getLinks();
            $data = array(
                "query" => $query
            );
            $this->load->view('admin/template/header');
            $this->load->view('admin/generate_link', $data);
            $this->load->view('admin/template/footer');
        } elseif ($page == "fiver") {                        //five
            $this->load->model('contactdatamodel', 'fiverFormLog', TRUE);
            $messages = $this->fiverFormLog->getMessage3();
            $data = array(
                "query" => $messages
            );
            $this->load->view('admin/template/header');
            $this->load->view('admin/fiver_form', $data);
            $this->load->view('admin/template/footer');
        } elseif ($page == "login") {
            $this->load->view('admin/login');
        } else {
            $this->load->view('admin/template/header');
            $this->load->view('admin/profile');
            $this->load->view('admin/template/footer');
        }
    }

    public function login()
    {

        if ($this->session->userdata('admin_logged_in')) {
            header("Location: /admin/profile");
        }

        $password = $this->input->post('password');
        $email    = $this->input->post('email');

        $this->load->model('Userdatamodel', 'user', TRUE);

        if (!$this->user->checkEmail($email, 'admin_user')) {
            echo "Profile Does Not Exist";
        } else {
            $pass = $this->user->getPass($email, 'admin_user');
            if (password_verify($password, $pass)) {
                $data = $this->user->getAdminData($email);
                $newdata = array(
                    'admin_userid'    => $data->user_id,
                    'admin_email'     => $data->email,
                    'admin_name'      => $data->name,
                    'nickname'        => $data->nickname,
                    'admin_logged_in' => TRUE
                );
                $this->session->set_userdata($newdata);
                echo "SUCCESS";
            } else {
                echo "Incorrect Password";
            }
        }
    }

    public function changePw()
    {
        $this->load->library('form_validation');

        $email = $this->input->post('email');
        $curpwd = $this->input->post('curpwd');
        $newpwd = $this->input->post('newpwd');
        $repwd = $this->input->post('repwd');

        $admin_email = $this->session->userdata('admin_email');
        $this->form_validation->set_rules('curpwd', 'Current Password', 'required');
        $this->form_validation->set_rules('newpwd', 'New Password', 'required');
        $this->form_validation->set_rules('repwd', 'Confirm Password', 'required|matches[newpwd]');


        if ($this->form_validation->run() == TRUE) {
            $password = password_hash($newpwd, PASSWORD_DEFAULT);
            $this->load->model('Userdatamodel', 'admin', TRUE);

            $pass = $this->admin->getPass($admin_email, 'admin_user');
            if (password_verify($curpwd, $pass)) {
                $this->admin->changeAdminPass($password, $admin_email);
                echo "Password Changed";
            } else {
                echo "Could Not Change The Password Due To The Following Errors<br>
                      You Have Entered Wrong Password";
            }
        } else {
            echo "Could Not Change The Password Due To The Following Errors<br>";
            echo validation_errors();
        }
    }

    public function messageDel($id)
    {
        $this->load->model('contactdatamodel', 'message', TRUE);
        $this->message->delete($id);
        $this->load->helper('url');
        $this->load->library('user_agent');
        redirect($this->agent->referrer());
    }

    public function accNew()
    {
        $this->load->library('form_validation');

        $email  = $this->input->post('email');
        $name   = $this->input->post('name');
        $pwd    = $this->input->post('pwd');
        $nick   = $this->input->post('nickname');
        $repwd  = $this->input->post('repwd');

        $this->form_validation->set_rules('pwd', 'Password', 'required');
        $this->form_validation->set_rules('repwd', 'Confirm Password', 'required|matches[pwd]');

        if ($this->form_validation->run() == TRUE) {
            $password = password_hash($pwd, PASSWORD_DEFAULT);
            $this->load->model('Userdatamodel', 'admin', TRUE);
            if ($this->admin->makeAdmin($name, $nick, $password, $email)) {
                echo "New Account Created Successfully";
            } else {
                echo "Unknown Error Occured";
            }
        } else {
            echo "Error Occured";
            echo validation_errors();
        }
    }
}
