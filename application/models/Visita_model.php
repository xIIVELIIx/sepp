<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Visitas_model
 *
 * @author jmalaver
 */
class Visita_model extends CI_Model {

    private $tabla;
    private $campos;
    
    public function __construct() { 
        
        $this->tabla = "visita";
        $this->campos = $this->getFields();
        
    }

    public function SelectAllItems() {
        $sql = "SELECT * FROM items_valoracion_visita";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function SelectAllVisitas() {
        return $this->db->get("visitas");
    }

    public function SelectVisitaByIdPractica($id_practica) {
        $sql = "SELECT * FROM ".$this->tabla." where id_practica = ".$id_practica;
        $query = $this->db->query($sql);
        return $query->result();
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
    

    public function getFields(){

        $sql = "SHOW COLUMNS FROM ".$this->tabla.";";
        $query = $this->db->query($sql);
        return $query->result();
    
    }

    public function SelectVisitaById($id) {
        $sql = "SELECT * FROM ".$this->tabla." where id = ".$id;
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function insert_valoracion($data) {
        $this->db->insert("valoracion_visita",$data);
        return $this->db->affected_rows();
    }

}
