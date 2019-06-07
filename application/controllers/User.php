<?php

class User extends CI_Controller
{

    public function reg()
    {
        $name     = $this->input->post('name');
        $password = $this->input->post('password');
        $email    = $this->input->post('email');

        $this->load->model('Userdatamodel', 'user', TRUE);
        if ($this->user->checkEmail($email)) {
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

    public function login()
    {

        $password = $this->input->post('password');
        $email    = $this->input->post('email');

        $this->load->model('Userdatamodel', 'user', TRUE);

        if (!$this->user->checkEmail($email)) {
            echo "User Doesnot Exist";
        } else {
            $pass = $this->user->getPass($email);
            if (password_verify($password,$pass)) {
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

    public function logout()
    {
        $this->load->helper('url');
        $this->session->sess_destroy();
        $this->load->library('user_agent');
        redirect($this->agent->referrer());
    }
}
