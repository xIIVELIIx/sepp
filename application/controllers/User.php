<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct() {
        parent::__construct();
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
    
    private function menu($rol) {
        switch ($rol) {
            case ID_ROL_ADMINISTRADOR:
                redirect('admin/home');
                break;
            case ID_ROL_COORDINADOR:
                redirect('coordinador/home');
                break;
            case ID_ROL_ESTUDIANTE:
                redirect('estudiante/home');
                break;
            default:
                break;
        }
    }

}
