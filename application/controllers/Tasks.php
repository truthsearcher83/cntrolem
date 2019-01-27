<?php

class Tasks extends CI_Controller {
    public function create($project_id){
        $this->form_validation->set_rules('task_name', 'Task Name','trim|required');
        $this->form_validation->set_rules('task_description', 'Task Description','trim|required');
        if ($this->form_validation->run() == FALSE){
            $data['task_project_id']=$project_id;
            $data['main_view']="tasks/create_task";
            $this->load->view('layout/user', $data);
        } else { 
                $data['task_name']=$this->input->post('task_name');
                $data['task_description']=$this->input->post('task_description');
                $data['due_on']=$this->input->post('due_date');
                $data['task_project_id']=$project_id;
                if ($this->task_model->create($data)){
                $this->session->set_flashdata('task_created' ,'Task Created Succesfully');
                redirect("projects/display/$project_id");
            }else{
                $this->session->set_flashdata('task_failure' ,'Task  Not Created Succesfully');
                redirect(tasks/create);
            }
        }
    }
       public function edit($task_id,$task_project_id){
        $this->form_validation->set_rules('task_name', 'Task Name','trim|required');
        $this->form_validation->set_rules('task_description', 'Task Description','trim|required');
        if ($this->form_validation->run() == FALSE){
            $result=$this->task_model->get_task($task_id);
            $data['task_name']=$result->task_name;
            $data['due_on']=$result->due_on;
            $data['task_description']=$result->task_description;
            $data['id']=$task_id;
            $data['task_project_id']=$task_project_id;
            $data['main_view']="tasks/edit_task";
            $this->load->view('layout/user', $data);
        } else { 
                $data['task_project_id']=$task_project_id;
                $data['task_name']=$this->input->post('task_name');
                $data['due_on']=$this->input->post('due_on');
                $data['task_description']=$this->input->post('task_description');
                $data['id']=$task_id;
                if ($this->task_model->edit($data)){
                $this->session->set_flashdata('task_edited' ,'Task Edited Succesfully');
                redirect("projects/display/$task_project_id");
            }else{
                $this->session->set_flashdata('task_edited_failure' ,'Task Not Edited Succesfully');
                redirect(projects/edit);
            }
        }
    }
        public function delete($task_id,$project_id){
            if($this->task_model->delete($task_id)){
            $this->session->set_flashdata('task_deleted' ,'Task Deleted Succesfully');    
            redirect("projects/display/$project_id");
        } else {
        $this->session->set_flashdata('task_deleted_failed' ,'Project Deleted Failed');
        }
        }
        public function mark_complete($task_id,$project_id){
           if($this->task_model->mark_complete($task_id)){
                $this->session->set_flashdata('mark_complete' ,'Marked Complete Succesfully');
                redirect("projects/display/$project_id");
        }
        }
        public function mark_incomplete($task_id,$project_id){
           if($this->task_model->mark_incomplete($task_id)){
                $this->session->set_flashdata('mark_incomplete' ,'Marked Incomplete Succesfully');
                redirect("projects/display/$project_id");
        }
        }
        

}
