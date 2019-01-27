<?php

class Task_model extends CI_model {
    public function get_all_tasks($project_id){
        $this->db->where('task_project_id',$project_id);
        $query=$this->db->get('tasks');
        return $query->result();
    }
    
    public function get_tasks($project_id ,$active){
        $this->db->where('task_project_id',$project_id);
        if($active){
         $this->db->where('status',0);   
        } else {
          $this->db->where('status',1);  
        }
        $query=$this->db->get("tasks");
        return($query->result());
    }
   public function create($data){
        return($this->db->insert('tasks',$data));
    }
    public function get_task($task_id){
        $this->db->where('id',$task_id);
        $query=$this->db->get("tasks");
        return $query->row();
    }
     public function edit ($data){
       $this->db->replace('tasks', $data) ; 
       return true;
    }
     public function delete($task_id){
        $this->db->where('id', $task_id);
        return($this->db->delete('tasks'));
    }
    public function mark_complete($task_id){
        $data['status']=1;
        // if you use this every column not sent will be set to 0 or NULL $this->db->replace('tasks', $data) ; 
        $this->db->where('id',$task_id);
        $query=$this->db->update('tasks',$data);
        return true;

    }
    public function mark_incomplete($task_id){
        $data['status']=0;
        // if you use this every column not sent will be set to 0 or NULL $this->db->replace('tasks', $data) ; 
        $this->db->where('id',$task_id);
        $query=$this->db->update('tasks',$data);
        return true;

    }
    
}

