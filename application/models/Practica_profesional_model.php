<?php

<<<<<<< HEAD
defined('BASEPATH') OR exit('No direct script access allowed');
=======
>>>>>>> origin/dev
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
<<<<<<< HEAD
 * Description of Practica_profesional_model
 *
 * @author jmalaver
 */
class Practica_profesional_model extends CI_Model {

=======
 * Description of User_Model
 *
 * @author fabianortiz
 */
class Practica_profesional_model extends CI_Model {

    //put your code here

>>>>>>> origin/dev
    private $tabla;
    private $campos;

    public function __construct() {
<<<<<<< HEAD
        parent::__construct();
=======

>>>>>>> origin/dev
        $this->tabla = "practica_profesional";
        $this->campos = $this->getFields();
    }

<<<<<<< HEAD
    public function SelectPracticaByIdEstudiante($id_estudiante) {
        $sql = "SELECT practica_profesional.*, modalidad_practica.nombre AS modalidad_practica , empresas.nombre AS empresa
        FROM practica_profesional 
        JOIN usuario ON usuario.id = practica_profesional.id_estudiante
        JOIN modalidad_practica ON modalidad_practica.id = practica_profesional.id_modalidad
        JOIN empresas ON empresas.id = practica_profesional.id_empresa
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

    public function getAll($where = array()) {
        foreach ($where as $key => $value) {
            $this->db->where($key, $value);
        }
        $query = $this->db->get($this->tabla);
        $result = $query->result();
        return $result;
    }
    public function insert($data) {
        $this->db->insert($this->tabla, $data);
        return $this->db->affected_rows();
    }
=======
    public function getAll($where = array()) {


        foreach ($where as $key => $value) {
            $this->db->where($key, $value);
        }

        $query = $this->db->get($this->tabla);
        $result = $query->result();

        return $result;
    }

    public function insert($data) {

        $this->db->insert($this->tabla, $data);
        return $this->db->affected_rows();
    }

>>>>>>> origin/dev
    public function update($data = array(), $where = array()) {
        $this->db->where($where);
        $this->db->update($this->tabla, $data);
        return true;
    }
<<<<<<< HEAD
    public function getFields() {
=======

    public function getFields() {

>>>>>>> origin/dev
        $sql = "SHOW COLUMNS FROM " . $this->tabla . ";";
        $query = $this->db->query($sql);
        return $query->result();
    }
<<<<<<< HEAD
=======

>>>>>>> origin/dev
}
