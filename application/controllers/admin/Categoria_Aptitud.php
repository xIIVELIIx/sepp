<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Categoria_Aptitud extends CI_Controller {

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
        $this->load->model('categoria_aptitud_model');
        $this->load->helper('html_builder_helper');
    }

    public function index() {

        if ($this->user_model->isLoggedIn() !== TRUE) {
            $this->session->set_flashdata('error', "Debe autenticarse para ingresar a &eacute;sta opci&oacute;n.");
            redirect('user/login');
        }

        $lista_categorias = $this->categoria_aptitud_model->getAll();
        //die(print_r($lista_profesores,true));
        $html = categoria_aptitud_list_table($lista_categorias);

        $data ["titulo"] = "Lista de Categor&iacute;as de Aptitudes Profesionales";
        $data ["html"] = $html;
        $this->load->view("admin/categoria_aptitud/list", $data);
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
        $data ["titulo"] = "Agregar una nueva categor&iacute;a de aptitud profesional";


        if ($_SERVER['REQUEST_METHOD'] !== "POST") {

            $this->load->view("admin/categoria_aptitud/add", $data);
        } else {

            $this->form_validation->set_rules($this->categoria_aptitud_model->getValidationRules());

            if ($this->form_validation->run() === FALSE) {

                $this->load->view("admin/categoria_aptitud/add", $data);
            } else {
                
                if ($this->categoria_aptitud_model->insert($this->input->post())) {

                    $this->session->set_flashdata('message', "Categor&iacute;a <b>" . $this->input->post('nombre') . "</b> creada exitosamente.");
                    redirect('admin/categoria_aptitud');
                } else {
                    $this->session->set_flashdata('error', "Ocurrio un error, intente nuevamente.");
                    redirect('admin/categoria_aptitud');
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
        $datosCategoria = $this->categoria_aptitud_model->get($id);
        if($datosCategoria == NULL){
            redirect('admin/categoria_aptitud', 'refresh');
        }
        $data["sedes"] = $this->sedes_model->SelectAllSedes();
        $data["facultades"] = $this->facultades_model->SelectAllFacultades();
        $data ["titulo"] = "Editar una Categor&iacute;a de aptitud profesional";
        $data["categoria_aptitud"] = get_object_vars($datosCategoria[0]);

        if ($_SERVER['REQUEST_METHOD'] !== "POST") {

            $this->load->view("admin/categoria_aptitud/edit", $data);
        } else {
            
            $regla = "update";
            $this->form_validation->set_rules($this->categoria_aptitud_model->getValidationRules($regla));

            if ($this->form_validation->run() === FALSE) {

                $this->load->view("admin/categoria_aptitud/edit", $data);
            } else {

                if ($this->categoria_aptitud_model->update($this->input->post())) {

                    $this->session->set_flashdata('message', "Categor&iacute;a de aptitud profesional actualizada exitosamente.");
                    redirect('admin/categoria_aptitud');
                } else {
                    $this->load->view("admin/categoria_aptitud/edit", $data);
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
            $this->categoria_aptitud_model->delete(['id' => $id]);
            $this->session->set_flashdata('error', "Categor&iacute;a deshabilitada exitosamente.");
            echo json_encode("correcto");
        } else {
            $this->session->set_flashdata('error', "Petici&oacute;n no permitida.");
            redirect('admin/profesor');
        }
    }
    
    public function enable($id) {

        if ($this->user_model->isLoggedIn() !== TRUE) {
            $this->session->set_flashdata('error', "Debe autenticarse para ingresar a &eacute;sta opci&oacute;n.");
            redirect('user/login');
        }
        if ($this->input->is_ajax_request()) {
            $this->categoria_aptitud_model->enable(['id' => $id]);
            $this->session->set_flashdata('message', "Categor&iacute;a habilitada exitosamente.");
            echo json_encode("correcto");
        } else {
            $this->session->set_flashdata('error', "Petici&oacute;n no permitida.");
            redirect('admin/profesor');
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
