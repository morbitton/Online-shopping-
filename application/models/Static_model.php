<?php

class Static_model extends CI_Model
{

      public function __construct()
     {
                parent::__construct();
                $this->load->database();
     }
      public function get_Stat()
      {
            $yearQuery = $this->db->query('SELECT COUNT(bought_order) as count, YEAR(date_purchase) as year  FROM `bought_history` GROUP BY YEAR(date_purchase)');
            $data['year_pie'] = $yearQuery->result();
            return $data['year_pie'];
            
      }
   
}