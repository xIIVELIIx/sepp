<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Sede_model
 *
 * @author cvelasquez
 */
class Programas_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function SelectAllProgramas() {
        return $this->db->get("programas");
    }

    public function SelectProgramasById($id) {
        $this->db->select();
        $this->db->from("programas");
        $this->db->where("id", $id);
        $query = $this->db->get();
        return $query;
    }
    
    public function SelectProgramasByFacultad($idFacultad) {
        $this->db->select();
        $this->db->from("programas");
        $this->db->where("id_facultad", $idFacultad);
        $query = $this->db->get();
        return $query;
    }

}
