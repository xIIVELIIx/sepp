<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */



	public function index()
	{
            $this->load->view('home/index');
	}
        
        public function register(){
            
            $this->load->model("estudiante_model");
            
            $this->form_validation->set_rules($this->estudiante_model->getValidationRules());
            
            if ($this->form_validation->run() === FALSE) {
                
                redirect('home/index');
                
            } else {
                die('ok validacion');
                //  Validar si es correo de UNIMINUTO
                if(!strpos($this->input->post('email1'),"@uniminuto.edu.co")){
                    $this->session->set_flashdata('error', "El correo ingresado no es de UNIMINUTO, por favor verif&iacute;quelo.");
                    redirect('home/index');
                }
                
                $validar_email = $this->estudiante->model->validarEmailEstudiante($this->input->post('email1'));
                
                print_r($validar_email);die();
                
                $insert_user = $this->estudiante_model->insert($this->input->post());
                if ($insert_user) {

                    $this->session->set_flashdata('message', "Usuario <b>" . $this->input->post('nombre') . " " . $this->input->post('apellido') . "</b> creado exitosamente.");
                    redirect('admin/profesor');
                } else {
                    $this->session->set_flashdata('error', "Ocurrio un error, intente nuevamente.");
                    redirect('admin/profesor');
                }
            }
        }

}
