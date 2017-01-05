<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Ciudad_model
 *
 * @author cvelasquez
 */
class Ciudad_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function SelectAllCuidades() {
        return $this->db->get("ciudad");
    }

    public function SelectCiudadById($id) {
        $this->db->select();
        $this->db->from("ciudad");
        $this->db->where("id", $id);
        $query = $this->db->get();
        return $query;
    }

}
