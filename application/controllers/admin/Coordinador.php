<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Coordinador extends CI_Controller {

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
        $this->load->model('coordinador_model');
        $this->load->helper('html_builder_helper');
    }

    public function index() {

        if ($this->user_model->isLoggedIn() !== TRUE) {
            $this->session->set_flashdata('error', "Debe autenticarse para ingresar a &eacute;sta opci&oacute;n.");
            redirect('user/login');
        }

        $lista_coordinadores = $this->coordinador_model->getAll();
        //die(print_r($lista_coordinadores,true));
        $html = usuario_list_table($lista_coordinadores,'coordinador');

        $data ["titulo"] = "Lista de Coordinadores";
        $data ["html"] = $html;
        $this->load->view("admin/coordinador/list", $data);
    }

    public function view($id) {
        if ($this->user_model->isLoggedIn() !== TRUE) {
            $this->session->set_flashdata('error', "Debe autenticarse para ingresar a &eacute;sta opci&oacute;n.");
            redirect('user/login');
        }
        
        $this->load->model("facultades_model");
        $this->load->model("sedes_model");
        
        $data["coordinador"] = get_object_vars($this->coordinador_model->get($id)[0]);
        $data ["titulo"] = "Detalles de un coordinador - SEPP";
        
        $this->load->view("admin/coordinador/view", $data);
        
    }

    public function add() {

        if ($this->user_model->isLoggedIn() !== TRUE) {
            $this->session->set_flashdata('error', "Debe autenticarse para ingresar a &eacute;sta opci&oacute;n.");
            redirect('user/login');
        }

        $this->load->model("facultades_model");
        $this->load->model("sedes_model");

        $data["sedes"] = $this->sedes_model->SelectAllSedes();
        $data["facultades"] = $this->facultades_model->SelectAllFacultades();
        $data ["titulo"] = "Agregar un nuevo coordinador";


        if ($_SERVER['REQUEST_METHOD'] !== "POST") {

            $this->load->view("admin/coordinador/add", $data);
        } else {

            $this->form_validation->set_rules($this->user_model->getValidationRules());

            if ($this->form_validation->run() === FALSE) {

                $this->load->view("admin/coordinador/add", $data);
            } else {

                if ($this->coordinador_model->insert($this->input->post())) {

                    $this->session->set_flashdata('message', "Usuario <b>" . $this->input->post('nombre') . " " . $this->input->post('apellido') . "</b> creado exitosamente.");
                    redirect('admin/coordinador');
                } else {
                    $this->session->set_flashdata('error', "Ocurrio un error, intente nuevamente.");
                    redirect('admin/coordinador');
                }
            }
        }
    }

    public function edit($id = "") {

        if ($this->user_model->isLoggedIn() !== TRUE) {
            $this->session->set_flashdata('error', "Debe autenticarse para ingresar a &eacute;sta opci&oacute;n.");
            redirect('user/login');
        }

        $this->load->model("facultades_model");
        $this->load->model("sedes_model");
        $datoscoordinador = $this->coordinador_model->get($id);
        if($datoscoordinador == NULL){
            redirect('admin/coordinador', 'refresh');
        }
        $data["sedes"] = $this->sedes_model->SelectAllSedes();
        $data["facultades"] = $this->facultades_model->SelectAllFacultades();
        $data ["titulo"] = "Editar un coordinador";
        $data["coordinador"] = get_object_vars($datoscoordinador[0]);

        if ($_SERVER['REQUEST_METHOD'] !== "POST") {

            $this->load->view("admin/coordinador/edit", $data);
        } else {
            $regla = "update";
            $this->form_validation->set_rules($this->user_model->getValidationRules($regla));

            if ($this->form_validation->run() === FALSE) {

                $this->load->view("admin/coordinador/edit", $data);
            } else {

                if ($this->coordinador_model->update($this->input->post())) {

                    $this->session->set_flashdata('message', "Usuario actualizado exitosamente.");
                    redirect('admin/coordinador');
                } else {
                    $this->load->view("admin/coordinador/edit", $data);
                }
            }
        }
    }

    public function remove($id) {

        if ($this->user_model->isLoggedIn() !== TRUE) {
            $this->session->set_flashdata('error', "Debe autenticarse para ingresar a &eacute;sta opci&oacute;n.");
            redirect('user/login');
        }
        if ($this->input->is_ajax_request()) {
            $this->coordinador_model->delete(['id' => $id]);
            $this->session->set_flashdata('message', "Usuario deshabilitado exitosamente.");
            echo json_encode("correcto");
        } else {
            $this->session->set_flashdata('error', "Petici&oacute;n no permitida.");
            redirect('admin/coordinador');
        }
    }
    
    public function enable($id) {

        if ($this->user_model->isLoggedIn() !== TRUE) {
            $this->session->set_flashdata('error', "Debe autenticarse para ingresar a &eacute;sta opci&oacute;n.");
            redirect('user/login');
        }
        if ($this->input->is_ajax_request()) {
            $this->coordinador_model->enable(['id' => $id]);
            $this->session->set_flashdata('error', "Usuario habilitado exitosamente.");
            echo json_encode("correcto");
        } else {
            $this->session->set_flashdata('error', "Petici&oacute;n no permitida.");
            redirect('admin/coordinador');
        }
    }

    public function traerPrograma($idFacultad = "") {
        if ($idFacultad !== "" && $this->input->is_ajax_request()) {
            $this->load->model("programas_model");
            $programas = $this->programas_model->SelectProgramasByFacultad($idFacultad);
            echo json_encode($programas->result());
        } else {
            redirect("preinscripcion", "refresh");
        }
    }

}
