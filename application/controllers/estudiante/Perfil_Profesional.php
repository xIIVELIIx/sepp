<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Perfil_Profesional extends CI_Controller {

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
        if ($this->session->userdata("id_rol_usuario") != ID_ROL_ESTUDIANTE || $this->user_model->isLoggedIn() !== TRUE) {
            $this->session->set_flashdata('error', "Debe autenticarse para ingresar a &eacute;sta opci&oacute;n.");
            redirect('user/login');
        }
        
        $this->load->model('estudiante_model');
        $this->load->model('categoria_aptitud_model');
        $this->load->model('aptitud_profesional_model');
        $this->load->helper('html_builder_helper');
        
    }

    public function index() {
        
        $perfil_prof = $this->estudiante_model->obtenerAptitudEstudiante($this->session->userdata("id"));
        $perfil_prof_personalizado = $this->estudiante_model->obtenerPerfilProfPersonalizado($this->session->userdata("id"));
        
        // Verificar si tiene perfil profesional creado
        if(empty($perfil_prof) && empty($perfil_prof_personalizado)){
            $estado_perfil = "No tienes informaci&oacute;n de perfil profesional actualizada.";
        }else{
            $estado_perfil = "Actualiza tu infromaci&oacute de perfil profesional..";
        }
        
        $lista_categorias = $this->categoria_aptidud_model->getAll(['activo' => '1']);
        $lista_aptitudes = $this->categoria_aptidud_model->getAll(['activo' => '1']);
        //die(print_r($lista_profesores,true));
        
        $data ["titulo"] = "Tu Perfil Profesional";
        $data ["estado_perfil"] = $estado_perfil;
        $data ["listado_categorias"] = $lista_categorias;
        $data ["listado_aptitudes"] = $lista_aptitudes;
        $data ["aptitudes_estudiante"] = $perfil_prof;
        $data ["perfil_personalizado"] = $perfil_prof_personalizado;
        
        $this->load->view("admin/aptitud_profesional/view", $data);
    }

    public function add() {
        $this->load->model("categoria_aptitud_model");
        $data["categorias"] = $this->categoria_aptitud_model->getAll(['activo' => "1"]);
        $data ["titulo"] = "Agregar una nueva aptitud profesional";

        if ($_SERVER['REQUEST_METHOD'] !== "POST") {

            $this->load->view("admin/aptitud_profesional/add", $data);
        } else {

            $this->form_validation->set_rules($this->aptitud_profesional_model->getValidationRules());

            if ($this->form_validation->run() === FALSE) {

                $this->load->view("admin/aptitud_profesional/add", $data);
            } else {

                if ($this->aptitud_profesional_model->insert($this->input->post())) {

                    $this->session->set_flashdata('message', "Aptitud <b>" . $this->input->post('nombre') . "</b> creada exitosamente.");
                    redirect('admin/aptitud_profesional');
                } else {
                    $this->session->set_flashdata('error', "Ocurrio un error, intente nuevamente.");
                    redirect('admin/aptitud_profesional');
                }
            }
        }
    }

    public function edit($id = "") {
        $datosAptitud = $this->aptitud_profesional_model->get($id);

        if ($datosAptitud == NULL) {
            redirect('admin/aptitud_profesional', 'refresh');
        }

        $this->load->model("categoria_aptitud_model");
        $data["categorias"] = $this->categoria_aptitud_model->getAll(['activo' => "1"]);
        $data["titulo"] = "Editar una aptitud profesional";
        $data["aptitud_profesional"] = get_object_vars($datosAptitud[0]);

        if ($_SERVER['REQUEST_METHOD'] !== "POST") {

            $this->load->view("admin/aptitud_profesional/edit", $data);
        } else {

            $regla = "update";
            $this->form_validation->set_rules($this->aptitud_profesional_model->getValidationRules($regla));

            if ($this->form_validation->run() === FALSE) {

                $this->load->view("admin/aptitud_profesional/edit", $data);
            } else {

                if ($this->aptitud_profesional_model->update($this->input->post())) {

                    $this->session->set_flashdata('message', "Aptitud profesional actualizada exitosamente.");
                    redirect('admin/aptitud_profesional');
                } else {
                    $this->load->view("admin/aptitud_profesional/edit", $data);
                }
            }
        }
    }

    public function remove($id) {
        if ($this->input->is_ajax_request()) {
            $this->aptitud_profesional_model->delete(['id' => $id]);
            $this->session->set_flashdata('error', "Aptitud profesional deshabilitada exitosamente.");
            echo json_encode("correcto");
        } else {
            $this->session->set_flashdata('error', "Petici&oacute;n no permitida.");
            redirect('admin/profesor');
        }
    }

    public function enable($id) {
        if ($this->input->is_ajax_request()) {
            $this->aptitud_profesional_model->enable(['id' => $id]);
            $this->session->set_flashdata('message', "Aptitud profesional habilitada exitosamente.");
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
