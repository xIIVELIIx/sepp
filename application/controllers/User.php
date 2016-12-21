<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	
        public function __construct(){
            parent::__construct();
        }

	public function index()
	{
            
            if($this->user_model->isLoggedIn() !== TRUE){
                $this->session->set_flashdata('error', "Debe autenticarse para ingresar a &eacute;sta opci&oacute;n.");
                redirect('user/login');
            }
            
            $this->home();
            
	}
        
        public function home()
	{
            
            if($this->user_model->isLoggedIn() !== TRUE){
                $this->session->set_flashdata('error', "Debe autenticarse para ingresar a &eacute;sta opci&oacute;n.");
                redirect('user/login');
            }
            
            redirect('admin/home');
	}
        
        public function login()
	{
            
            if($this->user_model->isLoggedIn() === FALSE){
                
                if($_SERVER['REQUEST_METHOD'] === "POST"){
                    
                    $result = $this->user_model->logIn($this->input->post('usuario'),$this->input->post('password'));

                    if($result !== FALSE && count($result) > 0){
                        
                        $user_info = get_object_vars($result);
                        $user_info['logged_in'] = TRUE;
                        
                        $this->session->set_userdata($user_info);
                        redirect('user/home');

                    }else{
                        $this->session->set_flashdata('error', "Usuario o password incorrectos. Por favor intente nuevamente.");
                        redirect('user/login');
                    }
                }else{
                    $this->load->view('login');
                }
            
            } else {
                redirect('user/home');
            }
	}
	
        public function logout()
	{
            if(isset($this->session->userdata()['logged_in'])){
                
                $this->session->unset_userdata(array_keys($this->session->userdata()));
                //$this->session->set_flashdata('error', "Debe autenticarse para ingresar a &eacute;sta opci&oacute;n.");
            }
            redirect('user/login');
	}

}
