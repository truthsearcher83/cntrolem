<?php

class Projects_model extends CI_Model {
    public function get_projects(){
        $query=$this->db->get("projects");
          return $query->result();
    }
    public function get_project($project_id){
        $this->db->where('id',$project_id);
        $query=$this->db->get("projects");
        return $query->row();
    }
    public function create($data){
        return($this->db->insert('projects',$data));
    }
    public function edit ($data){
        return ($this->db->replace('projects', $data)) ;   
    }
     public function delete($project_id){
        $this->db->where('id', $project_id);
        return($this->db->delete('projects'));
    }
}
