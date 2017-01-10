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
class Practica_profesional_model extends CI_Model {
    //put your code here
    
    private $tabla;
    private $campos;
    
    public function __construct() { 
        
        $this->tabla = "practica_profesional";
        $this->campos = $this->getFields();
        
    }
    
    
    public function getAll($where = array()){
        
        
        foreach($where as $key => $value){
            $this->db->where($key, $value);
        }
        
        $query = $this->db->get($this->tabla);
        $result = $query->result();
       
        return $result;
        
        
    }
    
    public function insert($data) {
        
        $this->db->insert($this->tabla,$data);
        return $this->db->affected_rows();
        
    }
    
    public function update($data,$where = array()) {
        
        extract($data);
        
        foreach($where as $key => $value){
            $this->db->where($key, $value);
        }
        
        $this->db->update($this->tabla, $data);
        return true;
        
    }
    
    public function getFields(){
        
        $sql = "SHOW COLUMNS FROM ".$this->tabla.";";
        $query = $this->db->query($sql);
        return $query->result();
        
    }
       
    
}