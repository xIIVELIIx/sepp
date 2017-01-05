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
class Sedes_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function SelectAllSedes() {
        return $this->db->get("sedes");
    }

    public function SelectSedesById($id) {
        $this->db->select();
        $this->db->from("sedes");
        $this->db->where("id", $id);
        $query = $this->db->get();
        return $query;
    }

}
