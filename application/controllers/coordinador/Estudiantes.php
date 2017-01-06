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
        $this->load->model("profesor_model");
    }

    public function index() {
        $where_array = array("usuario.id_rol_usuario" => ID_ROL_ESTUDIANTE,
            "usuario.id_facultad" => $this->session->userdata("id_facultad")
        );
        $lista_profesores = $this->profesor_model->test($where_array);
        $html = common_usuario_list_table($lista_profesores, 'coordinador/estudiantes');

        $data ["titulo"] = "Lista de estudiantes";
        $data ["html"] = $html;
        $data ["nav"] = "nav_coordinador";
        $this->load->view("common/estudiantes/list", $data);
    }

    public function view($id_estudiante) {
        $where_array = array("usuario.id" => $id_estudiante);
        $estudiante = $this->profesor_model->test($where_array);
        $data["estudiante"] = get_object_vars($estudiante[0]);
        $data ["titulo"] = "Detalle de estudiantes";
        $data ["nav"] = "nav_coordinador";
        $this->load->view("common/estudiantes/detail",$data);
    }

}
