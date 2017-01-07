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
    
    public function crearEstudiante($data){
        
        $data['id_facultad'] = "1";
        $data['id_rol_usuario'] = ID_ROL_ESTUDIANTE;
        $data['id_sede'] = "1";
        $data['id_estado'] = "7";
        
        return $this->insert($data);

    }
    
    public function validarEmailEstudiante($email){
        
        $where = array('username = '.$email,
                        'email1 = '.$email,);
        
        /*
         * FIRMA DE GET
         * getList($select = array(), $join = array(), $where = array(), $order = "", $limit = "" )
         */
        $result = $this->get(NULL,NULL,$where,NULL,1);
       
        return $result;
        
    }
    
    public function enviarEmailActivacionEstudiante($email){
        
        $where = array('username = '.$email,
                        'email1 = '.$email,);
        
        /*
         * FIRMA DE GET
         * getList($select = array(), $join = array(), $where = array(), $order = "", $limit = "" )
         */
        $result = $this->get(NULL,NULL,$where,NULL,1);
       
        return $result;
        
    }
    
    public function getValidationRules($tipo = '') {
        $reglaCc = ($tipo === "update") ? '' : '|is_unique[usuario.cedula]';
        $reglaCodigo = ($tipo === "update") ? '' : '|is_unique[usuario.codigo_uniminuto]';
        $config = array(
            array(
                'field' => 'cedula',
                'label' => 'C&eacute;dula',
                'rules' => 'trim|required|is_natural'.$reglaCc
            ),
            array(
                'field' => 'codigo_uniminuto',
                'label' => 'C&oacute;digo Uniminuto',
                'rules' => 'trim|required|is_natural'.$reglaCodigo
            ),
            array(
                'field' => 'nombre',
                'label' => 'Primer Nombre',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'apellido',
                'label' => 'Primer Apellido',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'email1',
                'label' => 'Primer Email',
                'rules' => 'trim|required|valid_email'
            ),
            array(
                'field' => 'email2',
                'label' => 'Segundo Email',
                'rules' => 'trim|valid_email'
            ),
            array(
                'field' => 'telefono_fijo',
                'label' => 'Tel&eacute;fono Fijo',
                'rules' => 'trim|is_natural|exact_length[7]'
            ),
            array(
                'field' => 'celular',
                'label' => 'Celular',
                'rules' => 'trim|exact_length[10]'
            ),
            array(
                'field' => 'id_programa',
                'label' => 'Programa',
                'rules' => 'trim|required|is_natural'
            ),
        );
        return $config;
    }
    
 

}
