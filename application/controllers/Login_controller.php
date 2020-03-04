<?php

class Login_controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Login_model');
        $this->load->helper('url_helper');
        $this->load->helper('form');
        $this->load->library('session');
    }

    public function login() {
        $data['user'] = NULL;
        $this->load->view('templates/header', $data);
        $this->load->view('login_page/login', $data);
        $this->load->view('templates/footer');
    }

    public function logout() {
        $data = array('User_name', 'Password');
        $this->session->unset_userdata($data);
        redirect("Login_controller/login");
    }

    public function auth() {
        $data = array(
            'User_name' => $this->input->post('user'),
            'Password' => md5($this->input->post('Password'))
        );

        $check = $this->Login_model->auth($data);

        if ($check == false) {
            $data['error'] = array("message" => "Invalid username or password");
            $data['user'] = NULL;
            $this->load->view('templates/header', $data);
            $this->load->view('login_page/login', $data);
            $this->load->view('templates/footer');
        } else {
//               $data['user'] = $check;
            $this->session->set_userdata($data);
            $message = "wrong answer";
            echo "<script type='text/javascript'>alert('$message');</script>";
            redirect("Webs_controller/home");
        }
    }

    public function register() {
        $data['user'] = NULL;
        $this->load->view('templates/header', $data);
        $this->load->view('login_page/register', $data);
        $this->load->view('templates/footer');
    }

    public function check($data) {

        $error = '';

        if ($data['First_name'] == NULL) {
            $error .= "○ Enter your first name properly" . "<br>";
        }
        if (!preg_match("/^[a-zA-Z ]*$/", $data['First_name'])) {
            $error .= "○ Enter only letters in the first name" . "<br>";
        }
        if (!preg_match("/^[a-zA-Z ]*$/", $data['Last_name'])) {
            $error .= "○ Enter only letters in the last name" . "<br>";
        }
        if ($data['Last_name'] == NULL) {
            $error .= "○ Enter your last name properly" . "<br>";
        }
        if (!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z]{8,50}$/', $data['User_name'])) {
            $error.="○ Username must contain numbers and letters." . "<br>";
        }
        if (strlen($data['User_name']) < 8) {
            $error.="○ Username should be at least 8 characters in length." . "<br>";
        }
        if (!filter_var($data['Email'], FILTER_VALIDATE_EMAIL)) {
            $error .= "○ Invalid email format" . "<br>";
        }
        if ($data['Password'] != $data['Confirm_password']) {
            $error .= "○ The passwords didn't match" . "<br>";
        }
        if (!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z]{8,50}$/', $data['Password'])) {
            $error .= "○ the password does not meet the requirements!";
        }
        return $error;
    }

    public function insertData() {
        $data = array(
            'First_name' => $this->input->post('First_name'),
            'Last_name' => $this->input->post('Last_name'),
            'Email' => $this->input->post('Email'),
            'User_name' => $this->input->post('User_name'),
            'Password' => md5($this->input->post('Password')),
            'Confirm_password' => md5($this->input->post('Confirm_password')),
            'Age' => $this->input->post('Age'),
            'Location' => $this->input->post('Location')
        );

        $error = $this->check($data);
        if ($error == '') {
            $error_db = $this->Login_model->insertData($data);
            if ($error_db == NULL) {
                $data['info'] = array("message" => "1");
            } else {
                $data['info'] = array("message" => "Error. Registration faild: " . $error_db["message"]);
            }
            echo $data["info"]["message"];
        } else {
            echo $error;
        }
    }

}
