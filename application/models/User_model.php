<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User_Model
 *
 * @author fabianortiz
 */
class User_model extends CI_Model {
    //put your code here
    
    public function getUsers($param = "", $value = ""){
        
        $sql = "SELECT * FROM user WHERE $param = '$value'";
        $query = $query = $this->db->query($sql);
        
        $result = $query->result();
        
        return $result;
        
    }
    
    public function logIn($usuario,$password){
        
        $user_info = array();
        
        $sql = "SELECT * FROM usuario WHERE usuario = ? AND password = MD5(?)";
        
        $query = $this->db->query($sql,array($usuario,$password));
        
        $result = $query->result();
        
        if($result !== FALSE){
            $user_info = $result[0];
            return $user_info;
        }else{
            return false;
        }
    }
    
    public function isLoggedIn(){
        
        $userdata = $this->session->userdata();
        
        if(isset($userdata['logged_in'])){
            return true;
        }else{
            return false;
        }
        
    }
    
    public function getValidationRules() {
        $config = array(
            array(
                'field' => 'cedula',
                'label' => 'C&eacute;dula',
                'rules' => 'trim|required|is_natural|is_unique[usuario.cedula]'
            ),
            array(
                'field' => 'codigo_uniminuto',
                'label' => 'C&oacute;digo Uniminuto',
                'rules' => 'trim|required|is_unique[usuario.codigo_uniminuto]|is_natural'
            ),
            array(
                'field' => 'nombre',
                'label' => 'Primer Nombre',
                'rules' => 'trim|required|alpha'
            ),
            array(
                'field' => 'apellido',
                'label' => 'Primer Apellido',
                'rules' => 'trim|required|alpha'
            ),
            array(
                'field' => 'email1',
                'label' => 'Primer Email',
                'rules' => 'trim|required|valid_email'
            ),
            array(
                'field' => 'email2',
                'label' => 'Segundo Email',
                'rules' => 'trim|valid_email'
            ),
            array(
                'field' => 'telefono_fijo',
                'label' => 'Tel&eacute;fono Fijo',
                'rules' => 'trim|is_natural|exact_length[7]'
            ),
            array(
                'field' => 'celular',
                'label' => 'Celular',
                'rules' => 'trim|exact_length[10]'
            ),
            array(
                'field' => 'id_facultad',
                'label' => 'Facultad',
                'rules' => 'trim|required|is_natural'
            ),
            array(
                'field' => 'id_programa',
                'label' => 'Programa',
                'rules' => 'trim|required|is_natural'
            ),
            array(
                'field' => 'id_sede',
                'label' => 'Sede',
                'rules' => 'trim|required|is_natural'
            )
        );
        return $config;
    }
}
