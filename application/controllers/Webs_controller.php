<?php

class Webs_controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Login_model');
        $this->load->model('Static_model');
        $this->load->model('Product_model');
        $this->load->helper('url_helper');
        $this->load->helper('form');
        $this->load->library('session');
    }

    public function view($page = 'home') {
        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            // Whoops, we don't have a page for that!
            show_404();
        }
        $data['title'] = ucfirst($page); // Capitalize the first letter
        $this->load->view('templates/header', $data);
        $this->load->view('pages/' . $page, $data);
        $this->load->view('templates/footer', $data);
    }

    public function home() {
        $data['user'] = $this->session->all_userdata();
        $this->load->view('templates/header', $data);
        $this->load->view('pages/home', $data);
        $this->load->view('templates/footer');
    }

    public function products() {
        $data['user'] = $this->session->all_userdata();
        $this->load->view('templates/header', $data);
        $this->load->view('pages/our_products', $data);
        $this->load->view('templates/footer');
    }

    public function contact() {
        $data['user'] = $this->session->all_userdata();
        $this->load->view('templates/header', $data);
        $this->load->view('pages/contact', $data);
        $this->load->view('templates/footer');
    }

    public function our_products() {

        $data['title'] = 'Produts';
        $data['user'] = $this->session->all_userdata();
        $totalBill['total'] = $this->Product_model->CalculateTotalBill($data);
        $data['product'] = $this->Product_model->get_product();
        $this->load->view('templates/header', $data);
        $this->load->view('pages/our_products', $data);
        $this->load->view('templates/footer');
    }

    public function calcit() {
        $data['user'] = $this->session->all_userdata();
        $data['calc'] = $this->Product_model->CalculateTotalBill($data);
        echo "The current total pay : <b>",$data['calc'],"$</b>";

    }

    public function google_pie_chart() {
        $data['title'] = 'statistic view';
        $data['user'] = $this->session->all_userdata();
        $data['year_pie'] = $this->Static_model->get_Stat();
        $this->load->view('templates/header', $data);
        $this->load->view('pages/google_pie_chart', $data);
        $this->load->view('templates/footer');
    }

    public function check($data, $counterCart) {

        $error = '';
        $data['productDB'] = $this->Product_model->get_product();
        $lengthDB = count($data['productDB']);

        for ($i = 0; $i < $counterCart; $i++) {
            $serialCartItem = intval($data[$i]['serial_number']);
            $countCartItem = intval($data[$i]['count_purchase']);

            for ($y = 0; $y < $lengthDB; $y++) {
                $serialDBItem = intval($data['productDB'][$y]['serial_number']);
                $countDBItem = intval($data['productDB'][$y]['item_count']);

                if ($serialDBItem == $serialCartItem) {

                    if ($countDBItem <= $countCartItem) {
                        $error.= "Not enough of this product in stock ! You will move to Homepage.";
                    }
                }
            }
        }
        return $error;
    }

    public function insertOrderDataController() {
        $counter = $this->input->post('counter');
        $dataUser['user'] = $this->session->all_userdata();
        $TheUsername = $dataUser['user']['User_name'];

        for ($i = 0; $i < $counter; $i++) {
            $data[$i] = array(
                'User_name' => $TheUsername,
                'serial_number' => $this->input->post('serial_number[' . $i . ']'),
                'count_purchase' => $this->input->post('count_purchase[' . $i . ']')
            );
        }

        $error = $this->check($data, $counter);
        if ($error == '') {
            $error_db = $this->Product_model->insertOrderData($data);
            if ($error_db == NULL) {
                $updateCount = $this->Product_model->updateItemCount($data,$counter);
                $data['info'] = array("message" => "1");
                $messageAlert = 'Thanks you for purchase !';
                echo "<script type='text/javascript'>alert('$messageAlert');</script>";
//                $updateCount = $this->Product_model->updateItemCount($data,$counter);
            } else {
                $data['info'] = array("message" => "Error. Registration faild: " . $error_db["message"]);
            }
        } else {
            echo "<script type='text/javascript'>alert('$error');</script>";
        }
        redirect("Webs_controller/home");  //if activ - there is not alert.
    }

}
