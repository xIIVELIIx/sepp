<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Modalidades
 *
 * @author cvelasquez
 */
class Modalidad extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if ($this->session->userdata("id_rol_usuario") != ID_ROL_ADMINISTRADOR || $this->user_model->isLoggedIn() !== TRUE) {
            $this->session->set_flashdata('error', "Debe autenticarse para ingresar a &eacute;sta opci&oacute;n.");
            redirect('user/login');
        }
        $this->load->model("modalidad_model");
        $this->load->helper('html_builder_helper');
    }

    public function index() {
        $lista_modalidades = $this->modalidad_model->getAll();
        $html = modalidad_list_table($lista_modalidades);
        $data ["titulo"] = "Lista de modalidades - SEPP";
        $data ["html"] = $html;
        $this->load->view("admin/modalidad/list", $data);
    }

    public function add() {
        $data ["titulo"] = "Agregar una nueva modalidad - SEPP";

        if ($_SERVER['REQUEST_METHOD'] !== "POST") {
            $this->load->view("admin/modalidad/add", $data);
        } else {

            $this->form_validation->set_rules($this->modalidad_model->getValidationRules());

            if ($this->form_validation->run() === FALSE) {

                $this->load->view("admin/modalidad/add", $data);
            } else {

                if ($this->modalidad_model->insert($this->input->post())) {

                    $this->session->set_flashdata('message', "Modalidad <b>" . $this->input->post('nombre') . "</b> creada exitosamente.");
                    redirect('admin/modalidad');
                } else {
                    $this->session->set_flashdata('error', "Ocurrio un error, intente nuevamente.");
                    redirect('admin/modalidad');
                }
            }
        }
    }

    public function edit($id = "") {
        $datosModalidad = $this->modalidad_model->get($id);
        if ($datosModalidad == NULL) {
            redirect('admin/modalidad', 'refresh');
        }
        $data ["titulo"] = "Editar una modalidad - SEPP";
        $data["modalidad"] = get_object_vars($datosModalidad[0]);

        if ($_SERVER['REQUEST_METHOD'] !== "POST") {

            $this->load->view("admin/modalidad/edit", $data);
        } else {
            $this->form_validation->set_rules($this->modalidad_model->getValidationRules());

            if ($this->form_validation->run() === FALSE) {

                $this->load->view("admin/modalidad/edit", $data);
            } else {

                if ($this->modalidad_model->update($this->input->post())) {

                    $this->session->set_flashdata('message', "Modalidad actualizada exitosamente.");
                    redirect('admin/modalidad');
                } else {
                    $this->load->view("admin/modalidad/edit", $data);
                }
            }
        }
    }

    public function remove($id = '') {
        if ($id !== '' && $this->input->is_ajax_request()) {
            $this->modalidad_model->delete(['id' => $id]);
            $this->session->set_flashdata('error', "Modalidad deshabilitada exitosamente.");
            echo json_encode("correcto");
        } else {
            $this->session->set_flashdata('error', "Petici&oacute; no permitida.");
            redirect('admin/profesor');
        }
    }

}
