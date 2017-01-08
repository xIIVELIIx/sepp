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



	public function index(){
            
            $this->load->helper('html_builder_helper');
            
            if ($_SERVER['REQUEST_METHOD'] !== "POST") {
                
                $this->load->view("home/index");
            
            } else {
                
                $this->load->model("estudiante_model");
            
                $this->form_validation->set_rules($this->estudiante_model->getValidationRules());

                if ($this->form_validation->run() === FALSE) {

                    $this->load->view("home/index",['go_to' => "#aplicar"]);

                } else {
                    
                    // Validar que no exista intento de registro previo
                    
                    $registros_previos = $this->estudiante_model->obtenerRegistroEstudiante(['datos_json' => $this->input->post("email1")]);
                    
                    if(empty($registros_previos)){
                        
                        if ($this->estudiante_model->crearRegistroEstudiante($this->input->post()) !== FALSE) {
                        
                        $this->load->view("home/index",['registration_data' => $this->input->post()]);
                        
                        } else {

                            $this->session->set_flashdata('error', "Ocurrio un error, intente nuevamente.");
                            $this->load->view("home/index",['go_to' => "#aplicar"]);

                        }
                        
                    }else{
                        
                        if($registros_previos[0]->activado == 0){
                            $estado_token = "El correo ".$this->input->post("email1")." ya tiene un token pendiente de activaci&oacute;n."
                                    . " Se reenvi&oacute; nuevamente el link de activaci&oacute;n a &eacute;sta cuenta.";
                            $this->estudiante_model->enviarEmailActivacionEstudiante(get_object_vars($registros_previos[0]));
                        }else{
                            $estado_token = "El correo ".$this->input->post("email1")." ya tiene un token activado."
                                    . "Intenta con uno nuevo.";
                        }
                        
                        $this->session->set_flashdata('error', $estado_token);
                        $this->load->view("home/index",['go_to' => "#aplicar"]);
                    }
                    
                    
                }
            }
            
            
	}
        
}
