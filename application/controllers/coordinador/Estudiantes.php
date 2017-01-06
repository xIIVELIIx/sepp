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
    }

    public function index() {
        $lista_preinscritos = $this->user_model->getUsers("id_estado = 3 AND id_rol_usuario",ID_ROL_ESTUDIANTE);
        die(print_r($lista_preinscritos,true));
        $html = usuario_list_table($lista_profesores, 'profesor');

        $data ["titulo"] = "Lista de profesores";
        $data ["html"] = $html;
        $this->load->view("admin/profesor/list", $data);
    }

}
