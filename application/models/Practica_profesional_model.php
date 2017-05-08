<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class Practica_profesional_model extends CI_Model {

    private $tabla;
    private $campos;
    
    public function __construct() { 
        
        $this->tabla = "practica_profesional";
        $this->campos = $this->getFields();
        
    }
    
    public function getAll($where = array()) {

        foreach ($where as $key => $value) {
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
    
    
    public function update($data = array(), $where = array()) {
        $this->db->where($where);
        $this->db->update($this->tabla, $data);
        return true;
    }

    public function getFields() {

        $sql = "SHOW COLUMNS FROM " . $this->tabla . ";";
        $query = $this->db->query($sql);
        return $query->result();
    }
       

    public function SelectPracticaByIdEstudiante($id_estudiante) {
        $sql = "SELECT practica_profesional.*, modalidad_practica.nombre AS modalidad_practica , empresas.nombre AS empresa, estados_practica.descripcion as estado 
        FROM practica_profesional 
        JOIN usuario ON usuario.id = practica_profesional.id_estudiante
        JOIN modalidad_practica ON modalidad_practica.id = practica_profesional.id_modalidad
        JOIN estados_practica ON estados_practica.id = practica_profesional.id_estado_practica
        LEFT JOIN empresas ON empresas.id = practica_profesional.id_empresa
        WHERE practica_profesional.id_estudiante = $id_estudiante";
        $query = $this->db->query($sql);
        $result = $query->result();
       
        return $result;
    }

    public function SelectPracticaByIdProfesor($id_profesor) {
        $sql = "SELECT practica_profesional.*, usuario.*, modalidad_practica.nombre AS modalidad_practica, empresas.nombre AS empresa  
        FROM practica_profesional 
        JOIN usuario ON usuario.id = practica_profesional.id_estudiante
        JOIN modalidad_practica ON modalidad_practica.id = practica_profesional.id_modalidad
        JOIN empresas ON empresas.id = practica_profesional.id_empresa
        WHERE practica_profesional.id_profesor = $id_profesor";
        $query = $this->db->query($sql);
        $result = $query->result();
       
        return $result;
    }

    public function SelectPracticaById($id) {
        $this->db->select();
        $this->db->from("practica_profesional");
        $this->db->where("id_profesor", $id_profesor);
        $query = $this->db->get();
        return $query;
    }


    
}
        