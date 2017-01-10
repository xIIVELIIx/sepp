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
class Practica_profesional extends CI_Controller {

    function __construct() {
        parent::__construct();
        if ($this->session->userdata("id_rol_usuario") != ID_ROL_PROFESOR || $this->user_model->isLoggedIn() !== TRUE) {
            $this->session->set_flashdata('error', "Debe autenticarse para ingresar a &eacute;sta opci&oacute;n.");
            redirect('user/login');
        }
        $this->load->helper("html_builder_helper");
        $this->load->model("practica_profesional_model");
    }

    public function view_docente() {
        $id = $this->session->userdata("id");
        //print($id);
        $lista_practicas = $this->practica_profesional_model->SelectPracticaByIdProfesor($id);
        $html = practica_profesional_list_table($lista_practicas);
        $data ["titulo"] = "Lista de Practicas - SEPP";
        $data ["html"] = $html;
        $data ["nav"] = "nav_profesor";
        $this->load->view("common/practicas_profesionales/list", $data);
    }

}
