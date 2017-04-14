<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Perfil_Profesional extends CI_Controller {

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
        $this->load->model('categoria_aptitud_model');
        $this->load->model('aptitud_profesional_model');
        $this->load->helper('html_builder_helper');
        
    }

    public function index() {
        
        //print_r($this->session->userdata());die();
        
        $perfil_prof = $this->estudiante_model->obtenerAptitudEstudiante($this->session->userdata("id"));
        $perfil_prof_personalizado = $this->estudiante_model->obtenerPerfilProfPersonalizado($this->session->userdata("id"));
        
        // Verificar si tiene perfil profesional creado
        if(empty($perfil_prof)){
            $estado_aptitudes = "<p><b>No tienes aptitudes profesionales asociadas a tu perfil profesional.</b></p>"
                    . "Agregar aptitudes profesionales a tu perfil te permite ofrecer una mejor descripci&oacute;n "
                    . "sobre tus conocimientos, aumentando las posibilidades de acercarte a las vacantes laborales "
                    . "m&aacute;s afines a tus capacidades. Te recomendamos agregar las que creas que son afines a tu perfil.";
            
        }else{
            $estado_aptitudes = "&Eacute;stas son las aptitudes que definen tu perfil profesional.";
        }
        
        if (empty($perfil_prof_personalizado)){    
            $estado_perfil_personalizado = "Agrega una descripci&oacute;n personalizada sobre tus conocimientos y/o aptitudes.";
        }else{
            $estado_perfil_personalizado = "Edita la descripci&oacute;n personalizada de tu perfil profesional.";
        }
        
        
        $lista_categorias = $this->categoria_aptitud_model->getAll(['activo' => '1']);
        
        $data ["titulo"] = "Tu Perfil Profesional";
        $data ["estado_aptitudes"] = $estado_aptitudes;
        $data ["estado_perfil_personalizado"] = $estado_perfil_personalizado;
        $data ["listado_categorias"] = $lista_categorias;
        $data ["aptitudes_estudiante"] = $perfil_prof;
        $data ["perfil_personalizado"] = $perfil_prof_personalizado;
        
        $this->load->view("estudiante/perfil_profesional/edit", $data);
    }

    public function add_aptitud() {
        
        if ($_SERVER['REQUEST_METHOD'] !== "POST") {

            redirect('estudiante/perfil_profesional');
            
        } else {

            $aptitud_profesional = array('id_aptitud' => $this->input->post('id_aptitud'),
                                        'id_estudiante' => $this->session->userdata('id'),);
            
            if ($this->estudiante_model->insertarAptitudProfesional($aptitud_profesional) === FALSE) {

                $this->session->set_flashdata('error', "Ocurrio un error, intenta nuevamente.");
                redirect('estudiante/perfil_profesional');
            }
            
            // Verificar si tiene estado "registrado_sin_perfil" para cambiarlo
            if($this->session->userdata('id_estado') == "15"){
                $this->user_model->update(['id_estado' => '7'],['id' => $this->session->userdata('id')]);
                $this->session->set_userdata('id_estado', '7');
            }
            
            $this->session->set_flashdata('message', "Aptitud agregada exitosamente.");
            redirect('estudiante/perfil_profesional');
            
        }
    }
    
    public function delete_aptitud($id_registro_aptitud) {
        
        if ($_SERVER['REQUEST_METHOD'] !== "GET") {

            redirect('estudiante/perfil_profesional');
            
        } else {
            
            $this->estudiante_model->eliminarAptitudProfesional(['id_aptitud' => $id_registro_aptitud,
                                        'id_estudiante' => $this->session->userdata('id')]);
            
            $this->session->set_flashdata('message', "Aptitud eliminada exitosamente.");
            redirect('estudiante/perfil_profesional');
            
        }
    }
    
    public function edit_profile_description(){
        
        if ($_SERVER['REQUEST_METHOD'] !== "POST") {

            redirect('estudiante/perfil_profesional');
            
        } else {
            
            $this->estudiante_model->insertarDescripcionPerfil($this->input->post());
            
            // Verificar si tiene estado "registrado_sin_perfil" para cambiarlo
            if($this->session->userdata('id_estado') == "15"){
                $this->user_model->update(['id_estado' => '7'],['id' => $this->session->userdata('id')]);
                $this->session->set_userdata('id_estado', '7');
            }
            
            $this->session->set_flashdata('message', "Descripci&oacute;n actualizada exitosamente.");
            redirect('estudiante/perfil_profesional');
            
        }
    }

    public function get_aptitudes_by_categoria($id_categoria) {
        if ($id_categoria !== "" && $this->input->is_ajax_request()) {
            
            $aptitudes = $this->aptitud_profesional_model->getAll(['id_categoria_aptitud' => $id_categoria]);
            
            echo json_encode($aptitudes);
            
        } else {
            echo "";
        }
    }
    
    public function get_detalle_aptitud($id_aptitud) {
        if ($id_aptitud !== "" && $this->input->is_ajax_request()) {
            
            $detalle = $this->aptitud_profesional_model->getAll(['aptitud_profesional.id' => $id_aptitud]);
            
            echo json_encode($detalle[0]);
            
        } else {
            echo "";
        }
    }
    
    public function load_cv(){
        
        $this->load->helper('file_helper');
        $upload = upload_file();
        
        if(isset($upload['error'])){
            $this->session->set_flashdata('error', $upload['error']);
            redirect('estudiante/perfil_profesional');
        }
        
        if($this->session->userdata('hoja_vida')){
            unlink($this->session->userdata('hoja_vida'));
            $this->session->unset_userdata(['hoja_vida']);
        }
        
        $data_estudiante = ['hoja_vida' => $upload['hoja_vida_link']];
        $where = ['id' => $this->session->userdata('id')];
        $this->user_model->update($data_estudiante,$where);
        $this->session->set_userdata('hoja_vida', $upload['hoja_vida_link']);
        
        $this->session->set_flashdata('message', "Tu hoja de vida ha sido subida exitosamente.");
        redirect('estudiante/perfil_profesional');
        
    }
    
    public function delete_cv(){
        
        unlink($this->session->userdata('hoja_vida'));
        $data_estudiante = ['hoja_vida' => ''];
        $where = ['id' => $this->session->userdata('id')];
        $this->user_model->update($data_estudiante,$where);
        $this->session->unset_userdata(['hoja_vida']);
        
        $this->session->set_flashdata('message', "Tu hoja de vida fue eliminada.");
        redirect('estudiante/perfil_profesional');
        
    }
    

}
