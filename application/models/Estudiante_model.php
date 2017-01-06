<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Estudiante_model
 *
 * @author Camilo
 */
class Estudiante_model extends User_model {

    //put your code here

    public function listEstudiantes($whereArray) {
        $select = array(['usuario.*'],
            ['facultades.nombre', 'facultad'],
            ['programas.nombre', 'programa'],
            ['estados_usuario.nombre', 'estado'],);

        $join = array(['facultades', 'facultades.id = usuario.id_facultad'],
            ['programas', 'programas.id = usuario.id_programa'],
            ['sedes', 'sedes.id = usuario.id_sede'],
            ['estados_usuario', 'estados_usuario.id = usuario.id_estado'],);

        $where = $whereArray;

        /*
         * FIRMA DE GET
         * getList($select = array(), $join = array(), $where = array(), $order = "", $limit = "" )
         */
        $result = $this->get($select, $join, $where, NULL);
//        echo $this->db->last_query();
//        exit;
        return $result;
    }

}
