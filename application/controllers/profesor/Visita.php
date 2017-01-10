<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Visita extends CI_Controller {

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
        if ($this->session->userdata("id_rol_usuario") != ID_ROL_PROFESOR || $this->user_model->isLoggedIn() !== TRUE) {
            $this->session->set_flashdata('error', "Debe autenticarse para ingresar a &eacute;sta opci&oacute;n.");
            redirect('user/login');
        }

        $this->load->model('visita_model');
        $this->load->helper('html_builder_helper');
    }

    public function view($id_visita) {

        print("HOLA".$id_visita);
    
    }

    public function add($id_practica) {

        $lista_items = $this->visita_model->SelectAllItems();
        $html = items_list_table($lista_items);

        $data["id_practica"] = $id_practica;
        $data["titulo"] = "Agregar una nueva Visita - SEPP";
        $data["id_practica"] = $id_practica;
        $data["nav"] = "nav_profesor";
        $data["items"] = $html;

        if ($_SERVER['REQUEST_METHOD'] !== "POST") {
            $this->load->view("profesor/visita/add", $data);
        }else {

            if ($this->visita_model->insert($this->input->post())) {
                redirect(base_url()."profesor/");
            } else {
                redirect(base_url()."profesor/");
            }
        }
    }

    public function edit($id = "") {

        $datosVisita = $this->visita_model->SelectVisitaById($id);
        if ($datosVisita == NULL) {
            redirect(base_url());
        }
        $data ["titulo"] = "Editar una Visita - SEPP";
        $data["nav"] = "nav_profesor";
        $data["visita"] = get_object_vars($datosVisita[0]);

        if ($_SERVER['REQUEST_METHOD'] !== "POST") {
            $this->load->view("profesor/visita/edit", $data);
        } else {
            if ($this->empresa_model->update($this->input->post())) {
                $this->session->set_flashdata('message', "Visita actualizada exitosamente.");
                redirect(base_url());
                //redirect('admin/empresa');
            } else {
                 $this->load->view("profesor/visita/edit", $data);
            }
        }
    }
}
