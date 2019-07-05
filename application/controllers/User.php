<?php

class User extends CI_Controller
{

    public function reg()
    {
        $name     = $this->input->post('name');
        $password = $this->input->post('password');
        $email    = $this->input->post('email');

        $this->load->model('Userdatamodel', 'user', TRUE);
        if ($this->user->checkEmail($email, 'user')) {
            echo "Email Already In Use";
        } else {
            $this->load->helper('string');
            $user_id = random_string('alnum', 16);
            $stat = $this->user->reg($name, password_hash($password, PASSWORD_DEFAULT), $email, $user_id);
            if ($stat) {
                echo "SUCCESS";
            } else {
                echo "Registration Failed, Try Again";
            }
        }
    }

    public function profile()
    {
        if ($this->session->userdata('logged_in')) {
            $this->load->view('template/header');
            $this->load->view('home/user');
            $this->load->view('template/footer');
        } else {
            $this->load->library('user_agent');
            redirect('/');
        }
    }

    public function login()
    {
        $password = $this->input->post('password');
        $email    = $this->input->post('email');

        $this->load->model('Userdatamodel', 'user', TRUE);

        if (!$this->user->checkEmail($email, 'user')) {
            echo "User Does Not Exist";
        } else {
            $pass = $this->user->getPass($email, 'user');
            if (password_verify($password, $pass)) {
                $data = $this->user->getData($email);
                $newdata = array(
                    'userid'    => $data->user_id,
                    'email'     => $data->email,
                    'name'      => $data->name,
                    'logged_in' => TRUE
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

        $admin_email = $this->session->userdata('email');
        $this->form_validation->set_rules('curpwd', 'Current Password', 'required');
        $this->form_validation->set_rules('newpwd', 'New Password', 'required');
        $this->form_validation->set_rules('repwd', 'Confirm Password', 'required|matches[newpwd]');


        if ($this->form_validation->run() == TRUE) {
            $password = password_hash($newpwd, PASSWORD_DEFAULT);
            $this->load->model('Userdatamodel', 'admin', TRUE);

            $pass = $this->admin->getPass($admin_email, 'user');
            if (password_verify($curpwd, $pass)) {
                $this->admin->changeAdminPass($password, $admin_email);
                $data = array(
                    'success' => "Password Change Sucess"
                  );
                  $this->session->set_flashdata($data);
                  $this->load->library('user_agent');
                  redirect($this->agent->referrer());
            } else {
                $data = array(
                    'errors' => "You Have Entered a Wrong Password"
                  );
                  $this->session->set_flashdata($data);
                  $this->load->library('user_agent');
                  redirect($this->agent->referrer());
            }
        } else {
            $data = array(
                'errors' => validation_errors()
              );
              $this->session->set_flashdata($data);
              $this->load->library('user_agent');
              redirect($this->agent->referrer());
        }
    }

    public function logout()
    {
        $this->load->helper('url');
        $this->session->sess_destroy();
        $this->load->library('user_agent');
        redirect($this->agent->referrer());
    }
}
