<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Estudiantes_preinscritos
 *
 * @author Camilo
 */
class Estudiantes extends CI_Controller {

    function __construct() {
        parent::__construct();
        if ($this->session->userdata("id_rol_usuario") != ID_ROL_PROFESOR || $this->user_model->isLoggedIn() !== TRUE) {
            $this->session->set_flashdata('error', "Debe autenticarse para ingresar a &eacute;sta opci&oacute;n.");
            redirect('user/login');
        }
        $this->load->helper("html_builder_helper");
        $this->load->model("user_model");
        $this->load->model("practica_profesional_model");
        $this->load->model("visita_model");
        $this->load->model("estudiante_model");
        $this->load->model("empresa_model");
        $this->load->model("novedad_model");
    }

    public function index() {

        $id = $this->session->userdata("id");
        $lista_estudiantes = $this->practica_profesional_model->SelectPracticaByIdProfesor($id);
        $html = practica_profesional_list_table($lista_estudiantes, 'profesor/estudiantes');

        $data ["titulo"] = "Lista de estudiantes";
        $data ["html"] = $html;
        $data ["nav"] = "nav_profesor";
        $this->load->view("common/practicas_profesionales/list", $data);
    }


    public function view($id_estudiante) {
        
        $this->load->model("profesor_model");
        $this->load->model("empresa_model");
        $this->load->model("modalidad_model");

        $where_array = array("usuario.id = " . $id_estudiante);
        $estudiante = $this->estudiante_model->detalleEstudiantes($where_array);
        $profesor = $this->profesor_model->obtener($estudiante[0]->id_profesor);
        $aptitud_profesional = $this->estudiante_model->obtenerAptitudEstudiante($id_estudiante);
        $empresa = $this->empresa_model->get($estudiante[0]->id_empresa);
        $modalidad = $this->modalidad_model->get($estudiante[0]->id_modalidad);
        $practica = $this->practica_profesional_model->SelectPracticaByIdEstudiante($id_estudiante);
        $perfil_personalizado = $this->estudiante_model->obtenerPerfilProfPersonalizado($id_estudiante);
        $novedades = $this->novedad_model->getByPractica($practica[0]->id);
        
        $data["empresa"] = get_object_vars($empresa[0]);
        $data["estudiante"] = get_object_vars($estudiante[0]);
        $data["profesor"] = get_object_vars($profesor[0]);
        $data["aptitud_profesional"] = $aptitud_profesional;
        $data["modalidad"] = get_object_vars($modalidad[0]);
        $data["practica"] = get_object_vars($practica[0]);
        $data["perfil_personalizado"] = (!empty($perfil_personalizado[0])) ? get_object_vars($perfil_personalizado[0]) : "";
        $data["novedades"] = $novedades;
        
        
        //CARGAR LAS VISITAS
        $lista_visitas = $this->visita_model->SelectVisitaByIdPractica($data["practica"]["id"]);
        $html = visita_list_table($lista_visitas, 'profesor/visita');
        $data["visitas"] = $html;

        $data ["titulo"] = "Detalle de estudiantes";
        $data ["nav"] = "nav_profesor";
        
        
        
        $this->load->view("common/estudiantes/detail", $data);
    }

}
