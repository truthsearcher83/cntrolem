<?php
class User_model extends CI_Model{
    public function login_user($username , $password) {
        $this->db->where([
            'username'=>$username,
         ]);
        $query = $this->db->get("users");
        if($query->num_rows() == 1){
            $db_password=$query->row(0)->password;
            if(password_verify($password,$db_password)){
                return $query->row(0)->id;
            }
        }else{
            return false;
        }
    }
    public function create_user($register_data){
        //print_r($register_data);
        //die();
        $this->db->insert('users',$register_data);
    }
}

