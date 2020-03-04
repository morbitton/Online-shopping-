<?php

class Login_model extends CI_Model {
    
     public function __construct()
     {
                parent::__construct();
                $this->load->database();
     }
     public function auth($data)
      {
            $query = $this->db->query("select * from users where User_name = '".$data['User_name']."' and Password ='".$data['Password']."'");
            if($query){   
                return $query->result_array();
        }
        return false;           
      }
        public function insertData($data){
              $this->db->db_debug = FALSE; 

             $error=NULL;
              if (!$this->db->insert('users', $data)){
                  $error=$this->db->error();
              }

              return $error;
        }
}
