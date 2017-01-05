<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Facultades_model
 *
 * @author cvelasquez
 */
class Facultades_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function SelectAllFacultades() {
        return $this->db->get("facultades");
    }

    public function SelectFacultadesById($id) {
        $this->db->select();
        $this->db->from("facultades");
        $this->db->where("id", $id);
        $query = $this->db->get();
        return $query;
    }

}
