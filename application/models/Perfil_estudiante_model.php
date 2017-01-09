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
class Novedad_model extends CI_Model {

    //put your code here

    private $tabla;

    public function __construct() {
        $this->tabla = "perfil_estudiante";
    }

    public function get($select = array(), $join = array(), $where = array(), $order = "", $limit = "" ){
        
        // select
        $this->db->select(get_select_string($select));
        // from
        //$this->db->from($this->tabla);
        // join(s)
        if(count($join) > 0){
            foreach($join as $a){
                $this->db->join($a[0], $a[1]);
            }            
        }
        // where 
        $this->db->where(get_where_string($where));
        // order by
        if(!empty($order)){
            $this->db->order_by($order);    
        }
        // limit
        if(!empty($limit)){
            $this->db->limit($limit); 
        }        
        
        $query = $this->db->get($this->tabla);
        $result = $query->result();
       
        return $result;
    }

    public function insert($data) {

        $this->db->insert($this->tabla, $data);
        return $this->db->affected_rows();
    }

    public function getValidationRules() {
        $config = array(
            array(
                'field' => 'id_estudiante',
                'label' => 'Estudiante',
                'rules' => 'is_natural|required'
            ),
            array(
                'field' => 'id_aptitud',
                'label' => 'Aptitud profesional',
                'rules' => 'is_natural|required'
            )
        );
        return $config;
    }

}
