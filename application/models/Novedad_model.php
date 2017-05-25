<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Novedad_Model
 *
 * @author fabianortiz
 */
class Novedad_model extends CI_Model {

    //put your code here

    private $tabla;

    public function __construct() {
        $this->tabla = "novedad";
    }

    public function getAll() {
        return $this->db->get($this->tabla)->result();
    }

    public function getByPractica($id_practica) {
        $this->db->select("novedad.*,CONCAT(usuario.nombre,' ',usuario.apellido) AS nombre_usuario");
        $this->db->from($this->tabla);
        $this->db->join("usuario","usuario.id = novedad.id_practica");
        $this->db->where("id_practica", $id_practica);
        $query = $this->db->get();
        return $query->result();
    }

    public function insert($data) {

        $this->db->insert($this->tabla, $data);
        return $this->db->affected_rows();
    }

    public function getValidationRules() {
        $config = array(
            array(
                'field' => 'comentario',
                'label' => 'Comentario/Novedad',
                'rules' => 'required'
            ),
        );
        return $config;
    }

}
