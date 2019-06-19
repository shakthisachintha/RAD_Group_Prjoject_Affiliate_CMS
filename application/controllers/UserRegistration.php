 <?php
class UserRegistration extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('RegModel','m');
        
    }

    public function index(){
        $this->load->view('LogIn');
        $this->load->view('register');
    }
    function logIn(){
        $data['title']='CodeIgniter LogIN form';
        $this->load->view("LogIn",$data);
    }
    function login_validation(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email','Email','required');
        $this->form_validation->set_rules('password','Password','required');

        if($this->form_validation->run()){
            $email=$this->input->post('email');
            $password=$this->input->post('password');

            $this->load->model('RegModel');
                $pwd=$this->RegModel->getCurrentPwd($email);
                if($pwd->password==$password){
                    $session_data=array(
                        'email'=>$email,
                        'username'=>$pwd->username,
                        'password'=>$password,
                    );
                    $this->session->set_userdata($session_data);
                
                }else{
                    echo "Wrong Password";
                }

               redirect(base_url().'index.php/UserRegistration/enter');
            }
    }
   
    function enter(){
        if($this->session->userdata('email')!=""){
            
            echo '<h3>User Name-'.$this->session->userdata('username').'</h3>';
            echo '<h3>Email-'.$this->session->userdata('email').'</h3>';
            $this->load->view('userView');
            
           // echo '<label><a href="'.base_url().'index.php/UserRegistration/logOut">LogOut</a></label>';
        }
    }

    function logOut(){
        $this->session->userdata('email');
        redirect(base_url().'UserRegistration/logIn');
    }

    public function register(){
        
        echo 'print validation';
        
        if(isset($_POST['register'])){
            
           // echo 'go to post0';
            $this->form_validation->set_rules('txtName','UserName','required');
            $this->form_validation->set_rules('txtEmail','Email','required');
            $this->form_validation->set_rules('txtPwd','Password','required');
            $this->form_validation->set_rules('txtRePwd','Re-Password','required|matches[txtPwd]');





            if($this->form_validation->run()==TRUE){
              //  echo 'Data Enter Successfull';
                
                $result= $this->m->insert();
                if($result){
                    $this->load->view('LogIn');
                }
            }
          
        
           
        }else{
            $this->load->view('register');
        }
        
        
    }

    public function changePwd(){
        $this->load->view('pwdChange');
        if(isset($_POST['pwdChange'])){
            //$data['title']="Change Password";
            $this->form_validation->set_rules('txtEmail','Email','required');
            $this->form_validation->set_rules('txtPwd','OldPassword','required');
            $this->form_validation->set_rules('txtNewPwd','NewPassword','required');
            //$this->form_validation->set_rules('txtRePwd','Re-Password','required');
            $this->form_validation->set_rules('txtRePwd','Re-Password','required|matches[txtNewPwd]');

            if($this->form_validation->run()){
                $email=$this->input->post('txtEmail');
                $password=$this->input->post('txtPwd');
                $newPwd=$this->input->post('txtNewPwd');
                $this->load->model('RegModel');
                $pwd=$this->RegModel->getCurrentPwd($email);
                if($pwd->password==$password){
                    if($this->RegModel->updatePwd($newPwd,$email)){
                        echo "Password changed..";
                        $this->load->view('register');
                    }else{
                        echo "can't change password";
                    }

                }else{
                    echo "Current password arw wrong !";

                }
            }else{
                echo validation_errors();
            }


        }
            
    }
    public function deleteAccount(){
        $this->load->model('RegModel');
        $result=$this->RegModel->getCurrentPwd($this->session->userdata('email'));
        if($result){
            
            echo "Deleted...";
        }else{
            echo "Delete Failled";
        }
    }
}
?>