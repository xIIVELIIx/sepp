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
    
    public function __construct() { 
        
        $this->tabla = "usuario";
        $this->load->helper('db_helper');
    }
    
    public function get($select = array(), $join = array(), $where = array(), $order = "", $limit = "" ){
        
        // select
        $this->db->select(get_select_string($select));
        // from
        //$this->db->from($this->tabla);
        // join(s)
        if(count($join) > 0){
            foreach($join as $a){
                $this->db->join($a[0], $a[1]);
            }            
        }
        // where 
        $this->db->where(get_where_string($where));
        // order by
        if(!empty($order)){
            $this->db->order_by($order);    
        }
        // limit
        if(!empty($limit)){
            $this->db->limit($limit); 
        }        
        
        $query = $this->db->get($this->tabla);
        $result = $query->result();
       
        return $result;
    }
       
    public function insert($data) {
        
        $this->db->insert($this->tabla,$data);
        return $this->db->affected_rows();
        
    }
    
    public function update($data) {
        extract($data);
        $this->db->where('id', $id);
        $this->db->update($this->tabla, $data);
        return true;
        
    }
        
    public function setState($data) {
        
        extract($data);
        $this->db->where('id', $id);
        $this->db->update($this->tabla, ['id_estado' => "8"]);
        return true;
        
    }
    
    
    public function getUsers($param = "", $value = ""){
        
        $sql = "SELECT * FROM usuario WHERE $param = '$value'";
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
    
    public function getValidationRules($tipo = '') {
        $reglaCc = ($tipo === "update") ? '' : '|is_unique[usuario.cedula]';
        $reglaCodigo = ($tipo === "update") ? '' : '|is_unique[usuario.codigo_uniminuto]';
        $config = array(
            array(
                'field' => 'cedula',
                'label' => 'C&eacute;dula',
                'rules' => 'trim|required|is_natural'.$reglaCc
            ),
            array(
                'field' => 'codigo_uniminuto',
                'label' => 'C&oacute;digo Uniminuto',
                'rules' => 'trim|required|is_natural'.$reglaCodigo
            ),
            array(
                'field' => 'nombre',
                'label' => 'Primer Nombre',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'apellido',
                'label' => 'Primer Apellido',
                'rules' => 'trim|required'
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
