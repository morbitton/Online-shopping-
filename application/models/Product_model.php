<?php

class Product_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_product() {
        $query = $this->db->query('SELECT * FROM `product`');
        return $query->result_array();
    }

    public function CalculateTotalBill($username) {
        $user= $username['user']['User_name'];
        $query = $this->db->query("SELECT bought_history.serial_number, bought_history.count_purchase, product.item_price FROM bought_history INNER JOIN product ON bought_history.serial_number=product.serial_number WHERE User_name IN (select User_name FROM bought_history WHERE User_name='$user')");
        $temp = $query->result_array();
        $total = 0;
        for ($i = 0; $i < count($temp); $i++) {
            $total = $total + ($temp[$i]['count_purchase'] * $temp[$i]['item_price']);
        }
//        echo "The current total pay : <b>",$total,"$</b>";
        return $total;
    }
    
    public function updateItemCount($data,$counterCart){
       $data['productDB'] = $this->Product_model->get_product();
        $lengthDB = count($data['productDB']);

        for ($i = 0; $i < $counterCart; $i++) {
            $serialCartItem = intval($data[$i]['serial_number']);
            $countCartItem = intval($data[$i]['count_purchase']);

            for ($y = 0; $y < $lengthDB; $y++) {
                $serialDBItem = intval($data['productDB'][$y]['serial_number']);
                $countDBItem = intval($data['productDB'][$y]['item_count']);

                if ($serialDBItem == $serialCartItem) {
                    $updatedCalc = $countDBItem-$countCartItem;
                    $query = $this->db->query('UPDATE `product` SET `item_count` = "'.$updatedCalc.'" WHERE `product`.`serial_number` = "'.$serialDBItem.'"');
//                    $update = $this->db->mysql_query($query);
                    }
                }
            }
        }
    
    
     public function insertOrderData($data){ 
            $this->db->db_debug = FALSE; 

             $error=NULL;
              if (!$this->db->insert_batch('bought_history', $data)){
                  $error=$this->db->error();
              }
              return $error;
        }

}


