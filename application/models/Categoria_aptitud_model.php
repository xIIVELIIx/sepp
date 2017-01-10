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
class Categoria_aptitud_model extends CI_Model {
    //put your code here
    
    private $tabla;
    private $campos;
    
    public function __construct() { 
        
        $this->tabla = "categorias_aptitudes";
        $this->campos = $this->getFields();
        
    }
    
    
    public function getAll($where = array()){
        
        // select
        $this->db->select("categorias_aptitudes.*", "programas.nombre  AS programa");
        $this->db->join('programas', 'programas.id = categorias_aptitudes.id_programa');
        
        foreach($where as $key => $value){
            $this->db->where($key, $value);
        }
        
        $this->db->order_by("categorias_aptitudes.nombre ASC");
        
        $query = $this->db->get($this->tabla);
        $result = $query->result();
       
        return $result;
        
        
    }
    
    public function get($id_categoria_aptitud){
        
        $sql = "SELECT categorias_aptitudes.*, programas.nombre  AS programa  
                FROM categorias_aptitudes
                JOIN programas ON programas.id = categorias_aptitudes.id_programa
                WHERE categorias_aptitudes.id = ?
                ORDER BY categorias_aptitudes.id ASC";
        
        $query = $this->db->query($sql,array($id_categoria_aptitud));
        $result = $query->result();
       
        return $result;
    }
    
    public function insert($data) {
        unset($data['id_facultad']);
        $this->db->insert($this->tabla,$data);
        return $this->db->affected_rows();
        
    }
    
    public function update($data) {
        unset($data['id_facultad']);
        extract($data);
        $this->db->where('id', $id);
        $this->db->update($this->tabla, $data);
        return true;
        
    }
    
    public function delete($data) {
        
        extract($data);
        $this->db->where('id', $id);
        $this->db->update($this->tabla, ['activo' => "0"]);
        return true;
        
    }
    
    public function enable($data) {
        
        extract($data);
        $this->db->where('id', $id);
        $this->db->update($this->tabla, ['activo' => "1"]);
        return true;
        
    }
    
    public function getFields(){
        
        $sql = "SHOW COLUMNS FROM ".$this->tabla.";";
        $query = $this->db->query($sql);
        return $query->result();
        
    }
    
    
    public function getValidationRules($tipo = '') {
        $reglaNombre = ($tipo === "update") ? '' : '|is_unique[categorias_aptitudes.nombre]';
        $config = array(
            array(
                'field' => 'nombre',
                'label' => 'Nombre categor&iacute;a',
                'rules' => 'trim|required'.$reglaNombre
            ),
            array(
                'field' => 'descripcion',
                'label' => 'Descripci&oacute;n',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'id_programa',
                'label' => 'Programa',
                'rules' => 'trim|required|is_natural'
            ),
        );
        return $config;
    }
    
    
}