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
class Aptitud_profesional_model extends CI_Model {
    //put your code here
    
    private $tabla;
    private $campos;
    
    public function __construct() { 
        
        $this->tabla = "aptitud_profesional";
        $this->campos = $this->getFields();
        
    }
    
    
    public function getAll($where = array()){
        
        // select
        $this->db->select(["aptitud_profesional.*", "categorias_aptitudes.nombre  AS categoria"]);
        $this->db->join('categorias_aptitudes', 'categorias_aptitudes.id = aptitud_profesional.id_categoria_aptitud');
        
        foreach($where as $key => $value){
            $this->db->where($key, $value);
        }
        
        $this->db->order_by("aptitud_profesional.nombre ASC");
        
        $query = $this->db->get($this->tabla);
        $result = $query->result();
       
        return $result;
        
        
    }
    
    
    public function get($id_aptitud){
        
        $sql = "SELECT aptitud_profesional.*, categorias_aptitudes.nombre  AS categoria  
                FROM aptitud_profesional
                JOIN categorias_aptitudes ON categorias_aptitudes.id = aptitud_profesional.id_categoria_aptitud
                WHERE aptitud_profesional.id = ?
                ORDER BY aptitud_profesional.id ASC";
        
        $query = $this->db->query($sql,array($id_aptitud));
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
        $reglaNombre = ($tipo === "update") ? '' : '|is_unique[aptitud_profesional.nombre]';
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
                'field' => 'id_categoria_aptitud',
                'label' => 'Categor&iacute;a',
                'rules' => 'trim|required|is_natural'
            ),
        );
        return $config;
    }
    
    
}