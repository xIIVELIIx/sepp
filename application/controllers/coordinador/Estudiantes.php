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
        if ($this->session->userdata("id_rol_usuario") != ID_ROL_COORDINADOR || $this->user_model->isLoggedIn() !== TRUE) {
            $this->session->set_flashdata('error', "Debe autenticarse para ingresar a &eacute;sta opci&oacute;n.");
            redirect('user/login');
        }
        $this->load->helper("html_builder_helper");
        $this->load->model("estudiante_model");
        $this->load->model("empresa_model");
    }

    public function index() {
        $where_array = array("usuario.id_rol_usuario = " . ID_ROL_ESTUDIANTE,
            "usuario.id_estado IN (2,3,4,5,6,16)",
            "usuario.id_facultad = " . $this->session->userdata("id_facultad")
        );
        $lista_estudiantes = $this->estudiante_model->listEstudiantes($where_array);
        $html = common_usuario_list_table($lista_estudiantes, 'coordinador/estudiantes');

        $empresas = $this->empresa_model->getAll();
        $data ["titulo"] = "Lista de estudiantes";
        $data ["html"] = $html;
        $data ["nav"] = "nav_coordinador";
        $data ["empresas"] = $empresas;

        $this->load->view("common/estudiantes/list", $data);
    }

    public function view($id_estudiante) {
        $this->load->model("profesor_model");
        $this->load->model("empresa_model");
        $this->load->model("modalidad_model");

        $where_array = array("usuario.id = " . $id_estudiante);
        $estudiante = $this->estudiante_model->detalleEstudiantes($where_array);
//        echo '<pre>';
//        var_dump($estudiante);
//        echo '</pre>';
//        exit;
        $profesor = $this->profesor_model->obtener($estudiante[0]->id_profesor);

        $aptitud_profesional = $this->estudiante_model->obtenerAptitudEstudiante($id_estudiante);

        $empresa = $this->empresa_model->get($estudiante[0]->id_empresa);

        $modalidad = $this->modalidad_model->get($estudiante[0]->id_modalidad);

        $data["empresa"] = get_object_vars($empresa[0]);
        $data["estudiante"] = get_object_vars($estudiante[0]);
        $data["profesor"] = get_object_vars($profesor[0]);
        $data["aptitud_profesional"] = $aptitud_profesional;
        $data["modalidad"] = get_object_vars($modalidad[0]);
        $data ["titulo"] = "Detalle de estudiantes";
        $data ["nav"] = "nav_coordinador";
        $this->load->view("common/estudiantes/detail", $data);
    }

    public function vincular($id_estudiante, $id_empresa) {
        if ($this->input->is_ajax_request()) {
            $this->load->model("practica_profesional_model");
            $where = array("id_estudiante" => $id_estudiante);
            $datos = array("id_empresa" => $id_empresa);
            $this->practica_profesional_model->update($datos, $where);
            
            $this->session->set_flashdata('message', "Usuario vinculado exitosamente.");
            echo json_encode("correcto");
        } else {
            redirect("coordinador/estudiantes");
        }
    }

}
