<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class login extends CI_Controller {



    public function __construct() {
        parent::__construct();
        $this->load->library("session");
        $this->load->model('users_model');
        
    }

    public function index() {
        $this->load->view('login_view');

        
    }

    public function authenticate() {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $users = $this->users_model->get_user($email, $password);
        

        if ($users) {
            // Kullanıcı bilgilerini session'a kaydet
            
            $this->session->set_userdata('email', $users->email);
            $this->session->set_userdata('password', $users->password);
            redirect(base_url("welcome")); // Giriş başarılı, dashboard'a yönlendir
        } else {
            // Giriş başarısız, geri login sayfasına yönlendir
            $this->session->set_flashdata('error', 'Geçersiz email veya şifre');
            redirect('login');
        }
    }
}
