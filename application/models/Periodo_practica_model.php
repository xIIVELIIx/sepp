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
class Periodo_practica_model extends CI_Model {

    //put your code here

    private $tabla;

    public function __construct() {
        $this->tabla = "periodos_practica";
    }

    public function get($id) {
        $this->db->select();
        $this->db->from($this->tabla);
        $this->db->where("id", $id);
        $query = $this->db->get();
        return $query->result();
    }
    
    public function get_actual() {
        $this->db->select();
        $this->db->from($this->tabla);
        $this->db->order_by("id DESC");
        $this->db->limit("1");
        $query = $this->db->get();
        return $query->result();
    }
    
    public function insert($data) {

        $this->db->insert($this->tabla, $data);
        return $this->db->affected_rows();
    }

    public function update($data) {
        extract($data);
        $this->db->where('id', $id);
        $this->db->update($this->tabla, $data);
        return true;
    }
    
    public function getValidationRules() {
        $config = array(
            array(
                'field' => 'id_practica',
                'label' => 'Pr&aacute;ctica profesional',
                'rules' => 'is_natural|required'
            ),
            array(
                'field' => 'comentario',
                'label' => 'Comentario',
                'rules' => 'required'
            )
        );
        return $config;
    }

}
