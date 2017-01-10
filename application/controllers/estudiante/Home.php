<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if ($this->session->userdata("id_rol_usuario") != ID_ROL_ESTUDIANTE || $this->user_model->isLoggedIn() !== TRUE) {
            redirect('user/login');
        }
    }

    public function index() {
        
        
        
        $data ["titulo"] = "Bienvenido a SEPP";
        
        $this->load->view('estudiante/home', $data);
    }

}
