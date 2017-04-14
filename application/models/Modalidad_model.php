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
class Modalidad_model extends CI_Model {

    //put your code here

    private $tabla;

    public function __construct() {
        $this->tabla = "modalidad_practica";
    }

    public function getAll() {
        return $this->db->get($this->tabla)->result();
    }

    public function get($id_modalidad) {
        $this->db->select();
        $this->db->from($this->tabla);
        $this->db->where("id", $id_modalidad);
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

    public function delete($data) {
        extract($data);
        $this->db->where('id', $id);
        $this->db->update($this->tabla, ['activo' => "0"]);
    }
    
    public function enable($data) {
        
        extract($data);
        $this->db->where('id', $id);
        $this->db->update($this->tabla, ['activo' => "1"]);
        return true;
        
    }

    public function getValidationRules() {
        $config = array(
            array(
                'field' => 'nombre',
                'label' => 'Nombre',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'numero_visitas',
                'label' => 'Número de Visitas',
                'rules' => 'trim|required|is_natural'
            ),
            array(
                'field' => 'descripcion',
                'label' => 'Descripci&oacute;n',
                'rules' => 'required'
            )
        );
        return $config;
    }

}
