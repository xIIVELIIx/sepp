<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Modalidades
 *
 * @author JhoantanMalaver
 */
class Empresa extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if ($this->session->userdata("id_rol_usuario") != ID_ROL_ADMINISTRADOR || $this->user_model->isLoggedIn() !== TRUE) {
            $this->session->set_flashdata('error', "Debe autenticarse para ingresar a &eacute;sta opci&oacute;n.");
            redirect('user/login');
        }
        $this->load->model("empresa_model");
        $this->load->helper('html_builder_helper');
    }

    public function index() {
        $lista_empresas = $this->empresa_model->getAll();
        $html = empresa_list_table($lista_empresas);
        $data ["titulo"] = "Lista de Empresas - SEPP";
        $data ["html"] = $html;
        $this->load->view("admin/empresa/list", $data);
    }

    public function add() {
        $this->load->model("ciudad_model");
        $data["ciudades"] = $this->ciudad_model->SelectAllCuidades();
        $data ["titulo"] = "Agregar una nueva Empresa - SEPP";

        if ($_SERVER['REQUEST_METHOD'] !== "POST") {
            $this->load->view("admin/empresa/add", $data);
        } else {

            $this->form_validation->set_rules($this->empresa_model->getValidationRules());

            if ($this->form_validation->run() === FALSE) {

                $this->load->view("admin/empresa/add", $data);
            } else {

                if ($this->empresa_model->insert($this->input->post())) {

                    $this->session->set_flashdata('message', "empresa <b>" . $this->input->post('nombre') . "</b> creada exitosamente.");
                    redirect('admin/empresa');
                } else {
                    $this->session->set_flashdata('error', "Ocurrio un error, intente nuevamente.");
                    redirect('admin/empresa');
                }
            }
        }
    }

    public function edit($id = "") {
        $this->load->model("ciudad_model");
        $data["ciudades"] = $this->ciudad_model->SelectAllCuidades();

        $datosEmpresa = $this->empresa_model->get($id);
        if ($datosEmpresa == NULL) {
            redirect('admin/empresa', 'refresh');
        }
        $data ["titulo"] = "Editar una empresa - SEPP";
        $data["empresa"] = get_object_vars($datosEmpresa[0]);

        if ($_SERVER['REQUEST_METHOD'] !== "POST") {

            $this->load->view("admin/empresa/edit", $data);
        } else {
            $this->form_validation->set_rules($this->empresa_model->getValidationRules());

            if ($this->form_validation->run() === FALSE) {

                $this->load->view("admin/empresa/edit", $data);
            } else {

                if ($this->empresa_model->update($this->input->post())) {

                    $this->session->set_flashdata('message', "empresa actualizada exitosamente.");
                    redirect('admin/empresa');
                } else {
                    $this->load->view("admin/empresa/edit", $data);
                }
            }
        }
    }

    /*

      public function remove($id = '') {

      if ($this->user_model->isLoggedIn() !== TRUE) {
      $this->session->set_flashdata('error', "Debe autenticarse para ingresar a &eacute;sta opci&oacute;n.");
      redirect('user/login');
      }
      if ($id !== '' && $this->input->is_ajax_request()) {
      $this->modalidad_model->delete(['id' => $id]);
      $this->session->set_flashdata('error', "Modalidad deshabilitada exitosamente.");
      echo json_encode("correcto");
      } else {
      $this->session->set_flashdata('error', "Petici&oacute; no permitida.");
      redirect('admin/profesor');
      }
      } */
}
