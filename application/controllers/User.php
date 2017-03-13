<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper("html_builder_helper");
    }

    public function edit() {

        $this->load->model("facultades_model");
        $this->load->model("sedes_model");

        $id_user = $this->session->userdata('id');

        $data["sedes"] = $this->sedes_model->SelectAllSedes();
        $data["facultades"] = $this->facultades_model->SelectAllFacultades();

        // $where_array = array("usuario.id" => $id_estudiante);
        $select = array(['usuario.*'],
                    ['facultades.nombre','facultad'],
                    ['programas.nombre','programa'],
                    ['estados_usuario.nombre','estado'],);
        
        $join = array(['facultades','facultades.id = usuario.id_facultad'],
                    ['programas','programas.id = usuario.id_programa'],
                    ['sedes','sedes.id = usuario.id_sede'],
                    ['estados_usuario','estados_usuario.id = usuario.id_estado'],);
        
        $where = array('usuario.id = '.$id_user,);

        $data_user = $this->user_model->get($select,$join,$where,NULL,1);
        
        if(count($data_user) == 0){
            $this->session->set_flashdata('error', "Debe estar logueado para ingresar a &eacute;sta opci&oacute;n.");
            redirect('user/login');
        }
        
        $data["sedes"] = $this->sedes_model->SelectAllSedes();
        $data["facultades"] = $this->facultades_model->SelectAllFacultades();
        $data["titulo"] = "Editar Perfil";
        $data["data_user"] =  get_object_vars($data_user[0]);
        $data["nav"] = "nav_profesor";

        $this->load->view("common/user/edit", $data);
        
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            $where_update = array("usuario.id" => $id_user,);
            if ($this->user_model->update($this->input->post(), $where_update)) {
                $this->session->set_flashdata('message', "Informaci&oacute;n Actualizada Correctamente");
                redirect(base_url()."user/edit");
            }
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

    public function login() {

        if ($this->user_model->isLoggedIn() === FALSE) {

            if ($_SERVER['REQUEST_METHOD'] === "POST") {

                $result = $this->user_model->logIn($this->input->post('usuario'), $this->input->post('password'));

                if ($result !== FALSE && count($result) > 0) {

                    $user_info = get_object_vars($result);
                    $user_info['logged_in'] = TRUE;

                    $this->session->set_userdata($user_info);
                    $rol = $this->session->userdata("id_rol_usuario");
                    $this->menu($rol);
                } else {
                    $this->session->set_flashdata('error', "Usuario o password incorrectos. Por favor intente nuevamente.");
                    redirect('user/login');
                }
            } else {
                $this->load->view('login');
            }
        } else {
            $this->menu($this->session->userdata("id_rol_usuario"));
        }
    }

    public function logout() {
        if (isset($this->session->userdata()['logged_in'])) {

            $this->session->unset_userdata(array_keys($this->session->userdata()));
            $this->session->sess_destroy();
            //$this->session->set_flashdata('error', "Debe autenticarse para ingresar a &eacute;sta opci&oacute;n.");
        }
        redirect('user/login');
    }

    public function activate($token = ""){
        
        $this->load->model('estudiante_model');
        $this->load->helper('html_builder_helper');
        
        // Verificar si el token existe
        $token_data = $this->estudiante_model->obtenerRegistroEstudiante("where",['token'=>$token]);
        //var_dump($token_data);die();
        
        if(empty($token_data)){
            
            $resultado = "<h3 class=\"text-danger\">"
                    . "<span class\"glyphicon glyphicon-warning-sign\">&nbsp;</span>"
                    . "Ooops...</h3>";
            
            $mensaje = "El token que est&aacute;s intentando activar no es v&aacute;lido. "
                    . "Verif&iacute;calo en la bandeja de entrada de tu correo uniminuto.";
            
            $boton = "<button id=\"btn_close\" onclick=\"location.href='". base_url()."'\" class=\"btn btn-info\"><span class=\"glyphicon glyphicon-check\">&nbsp</span>Entendido</button>";
            
            $this->load->view("home/index",['activation' => compact("resultado","mensaje","boton")]);
            
        }else{
            
            // Token ya activado
            if($token_data[0]->activado == "1"){
                
                $resultado = "<h3 class=\"text-danger\">"
                    . "<span class\"glyphicon glyphicon-warning-sign\">&nbsp;</span>"
                    . "Ooops...</h3>";
                
                $mensaje = "El token que est&aacute;s intentando activar ya fue activado en ".$token_data[0]->fecha_activacion.". "
                        . "Inicia sesi&oacute;n con las credenciales enviadas a tu correo electr&oacute;nico de Uniminuto";
                

                $boton = "<button id=\"btn_close\" onclick=\"location.href='". base_url()."user/login'\" class=\"btn btn-info\"><span class=\"glyphicon glyphicon-log-in\">&nbsp</span>Iniciar sesi&oacute;n</button>";
                
                
                $this->load->view("home/index",['activation' => compact("resultado","mensaje","boton")]);
            }
            // Token valido
            else{
                
                // Crear usuario Estudiante
                $datos_usuario = json_decode(get_object_vars($token_data[0])['datos_json'],TRUE);
                //$password = $this->user_model->generatePassword();
                $password = "123456";
                $datos_usuario['usuario'] = $datos_usuario['email1'];
                $datos_usuario['password'] = md5($password);
                unset($datos_usuario['token']);
                
                $id_usuario = $this->user_model->insert($datos_usuario);
                
                if($id_usuario > 0){
                    
                    // Enviar mail de credenciales
                    $this->estudiante_model->enviarEmailCredenciales($datos_usuario,$password);
                    
                    // Actualizar registro
                    $this->estudiante_model->actualizarRegistroUsuario($token_data[0]->id,$id_usuario);
                    
                    // Respuesta exitosa
                    $resultado = "<h3 class=\"text-success\">"
                                . "<span class\"glyphicon glyphicon-thumbs-up\">&nbsp;</span>"
                                . "&iexcl;Perfecto, ".$datos_usuario['nombre']."!</h3>";

                    $mensaje = "Tu cuenta ha sido exitosamente activada. Verifica tu correo electr&oacute;nico, pues hemos enviado un mensaje "
                            . "con tus credenciales de acceso para que empieces una gran experiencia con tu pr&aacute;ctica profesional.";


                    $boton = "<button id=\"btn_close\" onclick=\"location.href='". base_url()."user/login'\" class=\"btn btn-info\"><span class=\"glyphicon glyphicon-log-in\">&nbsp</span>Iniciar sesi&oacute;n</button>";


                    $this->load->view("home/index",['activation' => compact("resultado","mensaje","boton")]);
                    
                    
                }else{
                    die("Shite!.. $id_usuario");
                }
                
                $this->load->view("home/index",['activation' => compact("resultado","mensaje","boton")]);
            }
            
        }
    }
    
    public function home(){
        $this->menu($this->session->userdata('id_rol_usuario'));
    }
    
    private function menu($rol) {
        switch ($rol) {
            case ID_ROL_ADMINISTRADOR:
                redirect('admin/home');
                break;
            case ID_ROL_COORDINADOR:
                redirect('coordinador/home');
                break;
            case ID_ROL_PROFESOR:
                redirect('profesor/home');
                break;
            case ID_ROL_ESTUDIANTE:
                redirect('estudiante/home');
                break;
            default:
                break;
        }
    }

    public function pass(){

        $id_user = $this->session->userdata('id');
        $select = array(['usuario.password'],);
        $where = array('usuario.id = '.$id_user,);

        $data_user = $this->user_model->get($select,NULL,$where,NULL,1);

        $pass = get_object_vars($data_user[0]);

        if ($_SERVER['REQUEST_METHOD'] === "POST") {

            if($this->input->post('password') == $this->input->post('repassword')){

                if($pass['password'] == md5($this->input->post('old_password'))){

                    $where_update = array("usuario.id" => $id_user,);
                    $update_array = array("usuario.password" => md5($this->input->post('password')),);
                    
                    if ($this->user_model->update($update_array, $where_update)) {
                        $this->session->set_flashdata('message', "Contrase&ntilde;a actualizada correctamente");
                        redirect(base_url()."user/edit");
                    }  
                }
                else{
                    $this->session->set_flashdata('error', "error en la Contrase&ntilde;a Antigua");
                    redirect(base_url()."user/edit");
                }

            }else{
                $this->session->set_flashdata('error', "Las nueva Contrase&ntilde;a debe ser confirmada correctamente");
                redirect(base_url()."user/edit");
            }
        }
    }

}
