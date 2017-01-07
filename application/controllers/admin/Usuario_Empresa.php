<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_Empresa extends CI_Controller {

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
        if ($this->session->userdata("id_rol_usuario") != ID_ROL_ADMINISTRADOR || $this->user_model->isLoggedIn() !== TRUE) {
            $this->session->set_flashdata('error', "Debe autenticarse para ingresar a &eacute;sta opci&oacute;n.");
            redirect('user/login');
        }
        $this->load->model('empresa_user_model');
        $this->load->helper('html_builder_helper');
    }

    public function index() {
        $lista_usuarios = $this->empresa_user_model->listar();
        //die(print_r($lista_usuarios,true));
        $html = usuario_list_table($lista_usuarios, 'usuario_empresa');

        $data ["titulo"] = "Lista de usuarios de empresas";
        $data ["html"] = $html;
        $this->load->view("admin/usuario_empresa/list", $data);
    }

    public function view($id) {
        $this->load->model("empresa_model");
        $datosUsuario = $this->empresa_user_model->obtener($id)[0];
        $data["usuario_empresa"] = get_object_vars($datosUsuario);
        $data["empresa"] = get_object_vars($this->empresa_model->get($datosUsuario->id_empresa)[0]);
        //print_r($data);die();
        $data ["titulo"] = "Detalles de un usuario empresa - SEPP";

        $this->load->view("admin/usuario_empresa/view", $data);
    }

    public function add() {
        
        $this->load->model("empresa_model");
        $data["empresas"] = $this->empresa_model->getAll();
        
        $data ["titulo"] = "Agregar un nuevo usuario de empresa";


        if ($_SERVER['REQUEST_METHOD'] !== "POST") {

            $this->load->view("admin/usuario_empresa/add", $data);
            
        } else {

            $this->form_validation->set_rules($this->empresa_user_model->getValidationRules());

            if ($this->form_validation->run() === FALSE) {

                $this->load->view("admin/usuario_empresa/add", $data);
            } else {

                if ($this->empresa_user_model->insert($this->input->post())) {

                    $this->session->set_flashdata('message', "Usuario <b>" . $this->input->post('nombre') . " " . $this->input->post('apellido') . "</b> creado exitosamente.");
                    redirect('admin/usuario_empresa');
                } else {
                    $this->session->set_flashdata('error', "Ocurrio un error, intente nuevamente.");
                    redirect('admin/usuario_empresa');
                }
            }
        }
    }

    public function edit($id = "") {
        
        $this->load->model("empresa_model");
        $datosUsuario = $this->empresa_user_model->obtener($id);
        
        if ($datosUsuario == NULL) {
            redirect('admin/usuario_empresa', 'refresh');
        }
        
        $data["empresas"] = $this->empresa_model->getAll();
        $data ["titulo"] = "Editar un usuario de empresa";
        $data["usuario_empresa"] = get_object_vars($datosUsuario[0]);

        if ($_SERVER['REQUEST_METHOD'] !== "POST") {
            $this->load->view("admin/usuario_empresa/edit", $data);
        } else {
            $regla = "update";
            $this->form_validation->set_rules($this->empresa_user_model->getValidationRules($regla));

            if ($this->form_validation->run() === FALSE) {

                $this->load->view("admin/usuario_empresa/edit", $data);
            } else {
                
                if ($this->empresa_user_model->update($this->input->post(),["id" => $this->input->post('id')])) {

                    $this->session->set_flashdata('message', "Usuario actualizado exitosamente.");
                    redirect('admin/usuario_empresa');
                } else {
                    $this->load->view("admin/usuario_empresa/edit", $data);
                }
            }
        }
    }

    public function remove($id) {
        if ($this->input->is_ajax_request()) {
            $this->empresa_user_model->cambiarEstado(['id' => $id],"inactivo");
            $this->session->set_flashdata('message', "Usuario deshabilitado exitosamente.");
            echo json_encode("correcto");
        } else {
            $this->session->set_flashdata('error', "Petici&oacute;n no permitida.");
            redirect('admin/usuario_empresa');
        }
    }
    
    public function enable($id) {
        if ($this->input->is_ajax_request()) {
            $this->empresa_user_model->cambiarEstado(['id' => $id],"activo");
            $this->session->set_flashdata('error', "Usuario habilitado exitosamente.");
            echo json_encode("correcto");
        } else {
            $this->session->set_flashdata('error', "Petici&oacute;n no permitida.");
            redirect('admin/usuario_empresa');
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
