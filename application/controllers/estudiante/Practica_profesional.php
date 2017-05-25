<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Practica_Profesional extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function __construct() {
        parent::__construct();
        if ($this->session->userdata("id_rol_usuario") != ID_ROL_ESTUDIANTE || $this->user_model->isLoggedIn() !== TRUE) {
            $this->session->set_flashdata('error', "Debe autenticarse para ingresar a &eacute;sta opci&oacute;n.");
            redirect('user/login');
        }
        
        $this->load->model('estudiante_model');
        $this->load->model('modalidad_model');
        $this->load->model('practica_profesional_model');
        $this->load->model('periodo_practica_model');
        $this->load->helper('html_builder_helper');
        
    }

    public function preinscripcion() {
        
        $data['modalidades'] = $this->modalidad_model->getAll();
        $data['periodo'] = $this->periodo_practica_model->get_actual()[0]->codigo;
        $data ["titulo"] = "Preinscripci&oacute;n de Pr&aacute;ctica Profesional - ".$data['periodo'];
        
        if($this->session->userdata('id_estado') != '7'){
            redirect('user/home');
        }
        
        
        if ($_SERVER['REQUEST_METHOD'] !== "POST") {
            $this->load->view('estudiante/practica_profesional/preinscripcion',$data);
        } else {
            
            $data_practica = $this->input->post();
            $data_practica['id_estudiante'] = $this->session->userdata('id');
            $data_practica['id_periodo'] = $this->periodo_practica_model->get_actual()[0]->id;
            $data_practica['id_estado_practica'] = 1;
            
            $id_practica = $this->practica_profesional_model->insert($data_practica);
            
            // Actualizar estado usuario a preinscrito
            $this->user_model->update(['id_estado' => '3'],['id' => $this->session->userdata('id')]);
            $this->session->set_userdata('id_estado', '3');
            
            $data['preinscripcion_exitosa'] = true;
            
            // Ingresar novedad
            $this->novedad_model->insert(['comentario' => "Práctica Profesional Inscrita",
                                            'id_usuario' => $this->session->userdata('id'),
                                            'id_practica' => $id_practica]);
            
            $this->load->view('estudiante/practica_profesional/preinscripcion',$data);
            
        }
    }
        
    public function get_detalle_modalidad($id_modalidad) {
        if ($id_modalidad !== "" && $this->input->is_ajax_request()) {
            
            $detalle = $this->modalidad_model->get($id_modalidad);
            
            echo json_encode($detalle[0]);
            
        } else {
            echo "";
        }
    }
    

}
