<?php

class Projects extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
        if(!$this->session->userdata("logged_in")){
            $this->session->set_flashdata('login_failure','You are not authorized ');
            redirect();
        }
    }
    
    public function index()
	{
            $data['projects']=$this->projects_model->get_projects();
            $data['main_view']="projects/home_view";
            $this->load->view('layout/user.php',$data);
	}
    public function display($project_id){
            $data['task_open']=$this->task_model->get_tasks($project_id,true);
            $data['task_closed']=$this->task_model->get_tasks($project_id,false);
            $data['project']=$this->projects_model->get_project($project_id);
            $data['main_view']="projects/display";
            $this->load->view('layout/user.php',$data);
    }
    public function create(){
        $this->form_validation->set_rules('project_name', 'Project Name','trim|required');
        $this->form_validation->set_rules('project_description', 'Project Description','trim|required');
        if ($this->form_validation->run() == FALSE){
            $data['main_view']="projects/create_project";
            $this->load->view('layout/user', $data);
        } else { 
                $data['project_name']=$this->input->post('project_name');
                $data['project_description']=$this->input->post('project_description');
                $data['project_user_id']=$this->session->userdata('user_id');
                if ($this->projects_model->create($data)){
                $this->session->set_flashdata('project_created' ,'Project Created Succesfully');
                redirect("projects");
            }else{
                $this->session->set_flashdata('project_failure' ,'Project Not Created Succesfully');
                redirect("projects/create");
            }
        }
    }
    public function edit($project_id){
        $this->form_validation->set_rules('project_name', 'Project Name','trim|required');
        $this->form_validation->set_rules('project_description', 'Project Description','trim|required');
        if ($this->form_validation->run() == FALSE){
            $result=$this->projects_model->get_project($project_id);
            $data['project_name']=$result->project_name;
            $data['project_description']=$result->project_description;
            $data['project_id']=$project_id;
            $data['main_view']="projects/edit_project";
            $this->load->view('layout/user', $data);
        } else { 
                $data['project_name']=$this->input->post('project_name');
                $data['project_description']=$this->input->post('project_description');
                $data['project_user_id']=$this->session->userdata('user_id');
                $data['id']=$project_id;
                if ($this->projects_model->edit($data)){
                $this->session->set_flashdata('project_edited' ,'Project Edited Succesfully');
                redirect("projects");
            }else{
                $this->session->set_flashdata('project_edited_failure' ,'Project Not Edited Succesfully');
                redirect("projects/edit");
            }
        }
    }
    public function delete($project_id){
        $result=$this->task_model->get_all_tasks($project_id);
        foreach($result as $result){
            $task_id=$result->id;
            $this->task_model->delete($task_id);
        }
        if($this->projects_model->delete($project_id)){
        $this->session->set_flashdata('project_deleted' ,'Project Deleted Succesfully');    
        redirect("projects");
    } else {
        $this->session->set_flashdata('project_deleted_failed' ,'Project Deleted Failed');
        }
    }
}

