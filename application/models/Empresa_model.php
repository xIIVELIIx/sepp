<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User_Model
 *
 * @author JhonatanMalaver
 */
class Empresa_model extends CI_Model {
    //put your code here
    
    private $tabla;
    private $campos;
    
    public function __construct() { 
        
        $this->tabla = "empresas";
        $this->campos = $this->getFields();
        
    }

    public function getFields(){

        $sql = "SHOW COLUMNS FROM ".$this->tabla.";";
        $query = $this->db->query($sql);
        return $query->result();
    
    }
    
    
    public function getAll(){
        
         $sql = "SELECT empresas.*, ciudad.nombre AS ciudad 
         FROM empresas 
         JOIN ciudad ON ciudad.id = empresas.id_ciudad 
         ORDER BY empresas.id ASC";

        $query = $this->db->query($sql);
        $result = $query->result();
       
        return $result;
    }

    public function get($id_empresa){
        
        $sql = "SELECT empresas.*, ciudad.nombre AS ciudad 
                FROM empresas
                JOIN ciudad ON ciudad.id = empresas.id_ciudad
                WHERE empresas.id = ?
                ORDER BY empresas.id ASC";
        
        $query = $this->db->query($sql,array($id_empresa));
        $result = $query->result();

        return $result;
    }


    public function update($data) {

        extract($data);
        $this->db->where('id', $id);
        $this->db->update($this->tabla, $data);
        return true;
    
    }

    public function insert($data) {

        $this->db->insert($this->tabla,$data);
        return $this->db->affected_rows();

    }


    public function getValidationRules($tipo = '') {
        $reglaNombre = ($tipo === "update") ? '' : '|is_unique[ciudad.nombre]';
        $config = array(
            array(
                'field' => 'nombre',
                'label' => 'Nombre categor&iacute;a',
                'rules' => 'trim|required'.$reglaNombre
            )
        );
        return $config;
    } 
      
}