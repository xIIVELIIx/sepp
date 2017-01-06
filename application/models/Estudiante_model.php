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
            ['estados_usuario.nombre', 'estado'],
            ['sedes.nombre','sede']);

        $join = array(['facultades', 'facultades.id = usuario.id_facultad'],
            ['programas', 'programas.id = usuario.id_programa'],
            ['sedes', 'sedes.id = usuario.id_sede'],
            ['estados_usuario', 'estados_usuario.id = usuario.id_estado']
            );

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
    
     public function detalleEstudiantes($whereArray) {
        $select = array(['usuario.*'],
            ['facultades.nombre', 'facultad'],
            ['practica_profesional.id', 'id_practica'],
            ['practica_profesional.id_profesor'],
            ['practica_profesional.id_periodo'],
            ['practica_profesional.id_modalidad'],
            ['practica_profesional.id_empresa'],
            ['practica_profesional.cargo_practicante'],
            ['practica_profesional.nombre_jefe'],
            ['practica_profesional.apellido_jefe'],
            ['practica_profesional.telefono_jefe'],
            ['practica_profesional.celular_jefe'],
            ['practica_profesional.email_jefe'],
            ['practica_profesional.cargo_jefe'],
            ['practica_profesional.direccion_practica'],
            ['practica_profesional.id_ciudad'],
            ['practica_profesional.id_estado_practica'],
            ['programas.nombre', 'programa'],
            ['estados_usuario.nombre', 'estado'],
            ['sedes.nombre','sede']);

        $join = array(['facultades', 'facultades.id = usuario.id_facultad'],
            ['programas', 'programas.id = usuario.id_programa'],
            ['sedes', 'sedes.id = usuario.id_sede'],
            ['estados_usuario', 'estados_usuario.id = usuario.id_estado'],
            ['practica_profesional', 'practica_profesional.id_estudiante = usuario.id'],
            );

        $where = $whereArray;

        /*
         * FIRMA DE GET
         * getList($select = array(), $join = array(), $where = array(), $order = "", $limit = "" )
         */
        $result = $this->get($select, $join, $where, NULL);
        echo $this->db->last_query();
        exit;
        return $result;
    }

}
