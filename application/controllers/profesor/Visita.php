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
        $this->load->model("novedad_model");
        $this->load->model("practica_profesional_model");
    }

    public function view($id_visita) {
        $lista_items = $this->visita_model->SelectAllItems($id_visita);
        $visita = $this->visita_model->SelectVisitaById($id_visita);
        
        $html = items_list_table($lista_items);
        $data["nav"] = "nav_profesor";
        $data["titulo"] = "Agregar una nueva Calificacion - SEPP";
        $data["visita"] = get_object_vars($visita[0]);
        $data["items"] = $html;
        
        $this->load->view("profesor/visita/add_items", $data);

    }

    public function visita_items() {
        $data = $this->input->post();
        $id_visita = $data['id_visita'];
        foreach ($data as $k => $v) {
            if($k != "id_visita"){
                $valores['id_visita'] = $id_visita;
                $valores['id_item'] = $k;
                $valores['valoracion'] = $v;
                $this->visita_model->insert_valoracion($valores);
            }
        }
        $this->session->set_flashdata('message', "Valoraci&oacute;n Agregada exitosamente.");
        redirect(base_url()."profesor/estudiantes");
    }

    

    public function add() {

        $data["id_practica"] = $this->input->post('id_practica');
        $data["titulo"] = "Agregar una nueva Visita - SEPP";
        $data["nav"] = "nav_profesor";
        
        if ($_SERVER['REQUEST_METHOD'] !== "POST") {
            $this->load->view("profesor/visita/add", $data);
        }else {
            if ($this->visita_model->insert($this->input->post())) {
                
                $practica = $this->practica_profesional_model->getAll(['id' => $this->input->post('id_practica')])[0];
                
                $this->session->set_flashdata('message', "Visita Agregada exitosamente.");
                
                $comentario = "Visita agendada para ".$this->input->post('fecha');
                
                // Ingresar novedad
                $this->novedad_model->insert(['comentario' => $comentario,
                                            'id_usuario' => $this->session->userdata('id'),
                                            'id_practica' => $this->input->post('id_practica')]);
                
                
                redirect(base_url()."profesor/estudiantes/view/".$practica->id_estudiante);
                
            } else {
                $this->session->set_flashdata('error', "Ocurrio un error, intente nuevamente.");
                redirect(base_url()."profesor/estudiantes");
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
            if ($this->visita_model->update($this->input->post())) {
                $this->session->set_flashdata('message', "Visita actualizada exitosamente.");
                $practica = $this->practica_profesional_model->getAll(['id' => $this->input->post('id_practica')])[0];
                
                $comentario = "";
                if($this->input->post('estado_visita')=="agendada"){
                    $comentario = "Visita re-agendada para ".$this->input->post('fecha');
                }else if($this->input->post('cancelada')==""){
                    $comentario = "Visita cancelada";
                }else{
                    $comentario = "Visita realizada";
                }
                // Ingresar novedad
                $this->novedad_model->insert(['comentario' => $comentario,
                                            'id_usuario' => $this->session->userdata('id'),
                                            'id_practica' => $this->input->post('id_practica')]);
                
                redirect(base_url()."profesor/estudiantes/view/".$practica->id_estudiante);
            } else {
                $this->session->set_flashdata('error', "Ocurrio un error, intente nuevamente.");
                $this->load->view("profesor/visita/edit", $data);
            }
        }
    }
}
