<?php
class Users extends CI_Controller {
    public function register_view(){
        $data['main_view']='users/register_form';
        $this->load->view('layout/main',$data);
    }
    public function register(){
        $this->form_validation->set_rules('email', 'Email','trim|required|valid_email');
        $this->form_validation->set_rules('first_name', 'First Name','trim|required');
        $this->form_validation->set_rules('last_name', 'Last Name','trim|required');
        $this->form_validation->set_rules('username', 'Username','trim|required|min_length[5]');
        $this->form_validation->set_rules('password', 'Password','trim|required|min_length[5]|max_length[12]');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password','trim|required|min_length[5]|max_length[12]|matches[password]');
        if ($this->form_validation->run() == FALSE){
           $data=array('main_view'=>'users/register_form','errors_register'=> validation_errors());
           $this->load->view('layout/main',$data);
        } else { 
            $option=array('cost'=>12);
            $encrypt_password=password_hash($this->input->post('password'),PASSWORD_BCRYPT,$option);
            $register_data=array(
           'email'=>$this->input->post('email'),
           'first_name'=>$this->input->post('first_name'),
           'last_name'=>$this->input->post('last_name'),
           'username'=>$this->input->post('username'),
           'password'=>$encrypt_password
           );
           $this->user_model->create_user($register_data);
           $data['main_view']='users/register_success';
           $this->load->view('layout/main',$data);
        }
    }
    
    public function login(){
        if($this->session->userdata('logged_in')){
            $data['main_view']='projects/home_view';
            $this->load->view('layout/main',$data);
        }else {
        $this->form_validation->set_rules('username', 'Username','trim|required|min_length[5]');
        $this->form_validation->set_rules('password', 'Password','trim|required|min_length[5]|max_length[12]');
        if ($this->form_validation->run() == FALSE){
           $data=array('main_view'=>'home_view','errors'=> validation_errors());
           $this->load->view('layout/main',$data);
        } else { 
            $username=$this->input->post('username');
            $password=$this->input->post('password');
            $user_id=$this->user_model->login_user($username , $password); 
            if($user_id){
                $user_data=array(
                    'user_id'=>$user_id,
                    'username'=>$username,
                    'logged_in'=>true);
                $this->session->set_userdata($user_data);
                $this->session->set_flashdata('login_success','Logged In Successfully');
                redirect('projects');
            }else{
                $this->session->set_flashdata('login_failure','Logged in Failure');
                redirect();
            }
          }        
        }
    }
    public function logout(){
        $this->session->sess_destroy();
        redirect();
    }
}