<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Profesor extends CI_Controller {

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
        $this->load->model('profesor_model');
        $this->load->helper('html_builder_helper');
    }

    public function index() {

        if ($this->user_model->isLoggedIn() !== TRUE) {
            $this->session->set_flashdata('error', "Debe autenticarse para ingresar a &eacute;sta opci&oacute;n.");
            redirect('user/login');
        }

        $lista_profesores = $this->profesor_model->getAll();
        //die(print_r($lista_profesores,true));
        $html = profesor_list_table($lista_profesores);
        
        $data ["titulo"] = "Lista de profsores - SEPP";
        $data ["html"] = $html;
        $this->load->view("admin/profesor/list", $data);
        
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
        $data ["titulo"] = "Agregar un nuevo profesor - SEPP";
        
        $this->load->view("admin/profesor/add", $data);
        
    }

    public function view($id) {

        if ($this->user_model->isLoggedIn() !== TRUE) {
            $this->session->set_flashdata('error', "Debe autenticarse para ingresar a &eacute;sta opci&oacute;n.");
            redirect('user/login');
        }
        
        $this->load->model("facultades_model");
        $this->load->model("sedes_model");
        
        $data["profesor"] = get_object_vars($this->profesor_model->get($id)[0]);
        $data ["titulo"] = "Detalles de un profesor - SEPP";
        
        $this->load->view("admin/profesor/view", $data);
        
    }
    
    public function edit($id) {

        if ($this->user_model->isLoggedIn() !== TRUE) {
            $this->session->set_flashdata('error', "Debe autenticarse para ingresar a &eacute;sta opci&oacute;n.");
            redirect('user/login');
        }
        
        $this->load->model("facultades_model");
        $this->load->model("sedes_model");
        
        $data["profesor"] = get_object_vars($this->profesor_model->get($id)[0]);
        $data["sedes"] = $this->sedes_model->SelectAllSedes();
        $data["facultades"] = $this->facultades_model->SelectAllFacultades();
        $data ["titulo"] = "Editar un profesor - SEPP";
        
        $this->load->view("admin/profesor/edit", $data);
        
    }
    
    public function remove($id) {

        if ($this->user_model->isLoggedIn() !== TRUE) {
            $this->session->set_flashdata('error', "Debe autenticarse para ingresar a &eacute;sta opci&oacute;n.");
            redirect('user/login');
        }
        
        echo "Falta crear la vista para borrar al profesor $id";
        
    }

    public function traerPrograma($idFacultad = "") {
        $peticion = strtolower($this->input->server("HTTP_X_REQUESTED_WITH"));
        if ($idFacultad !== "" && $peticion === "xmlhttprequest") {
            $this->load->model("programas_model");
            $programas = $this->programas_model->SelectProgramasByFacultad($idFacultad);
            echo json_encode($programas->result());
        } else {
            redirect("preinscripcion", "refresh");
        }
    }

}
