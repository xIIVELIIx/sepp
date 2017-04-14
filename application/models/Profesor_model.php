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



class Profesor_model extends User_model {
        
    public function __construct() {
        parent::__construct();
        $this->estados = array( 'activo' => 8,
                                'inactivo' => 9,
                                'bloqueado' => 10,
                                );
    }
    
    public function obtener($id_usuario){
        
        /*
            SELECT usuario.*, facultades.nombre AS facultad,programas.nombre  AS programa,sedes.nombre AS sede,estados_usuario.nombre AS estado 
            FROM usuario
            JOIN facultades ON facultades.id = usuario.id_facultad
            JOIN programas ON programas.id = usuario.id_programa
            JOIN sedes ON sedes.id = usuario.id_sede
            JOIN estados_usuario ON estados_usuario.id = usuario.id_estado
            WHERE usuario.id_rol_usuario = ID_ROL_PROFESOR AND usuario.id = X 
         */
        
        $select = array(['usuario.*'],
                    ['facultades.nombre','facultad'],
                    ['programas.nombre','programa'],
                    ['estados_usuario.nombre','estado'],);
        
        $join = array(['facultades','facultades.id = usuario.id_facultad'],
                    ['programas','programas.id = usuario.id_programa'],
                    ['sedes','sedes.id = usuario.id_sede'],
                    ['estados_usuario','estados_usuario.id = usuario.id_estado'],);
        
        $where = array('usuario.id_rol_usuario = '.ID_ROL_PROFESOR,
                        'usuario.id = '.$id_usuario,);
        
        $limit = "1";
              
        /*
         * FIRMA DE GET
         * getList($select = array(), $join = array(), $where = array(), $order = "", $limit = "" )
         */
        $result = $this->get($select,$join,$where,NULL,1);
       
        return $result;
    }
    
    public function listar($whereArray = array('usuario.id_rol_usuario = '.ID_ROL_PROFESOR)){
        
        /*
            SELECT usuario.*, facultades.nombre AS facultad,programas.nombre  AS programa,sedes.nombre AS sede,estados_usuario.nombre AS estado 
            FROM usuario
            JOIN facultades ON facultades.id = usuario.id_facultad
            JOIN programas ON programas.id = usuario.id_programa
            JOIN sedes ON sedes.id = usuario.id_sede
            JOIN estados_usuario ON estados_usuario.id = usuario.id_estado
            WHERE usuario.id_rol_usuario = ID_ROL_PROFESOR
            ORDER BY usuario.id ASC
         */
        
        $select = array(['usuario.*'],
                    ['facultades.nombre','facultad'],
                    ['programas.nombre','programa'],
                    ['estados_usuario.nombre','estado'],);
        
        $join = array(['facultades','facultades.id = usuario.id_facultad'],
                    ['programas','programas.id = usuario.id_programa'],
                    ['sedes','sedes.id = usuario.id_sede'],
                    ['estados_usuario','estados_usuario.id = usuario.id_estado'],);
        
        $where = $whereArray;
        
        $order = "usuario,id ASC";
              
        /*
         * FIRMA DE GET_LIST
         * getList($select = array(), $join = array(), $where = array(), $order = "", $limit = "" )
         */
        $result = $this->get($select,$join,$where,$order);
       
        return $result;
    }
    
    public function actualizarEstado($where,$estado){
        $result = $this->update(['id_estado' => $this->estados[$estado]],$where);
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
                'label' => 'Correo Uniminuto',
                'rules' => 'trim|is_unique[usuario.email1]|required|regex_match[/^[a-z0-9](\.?[a-z0-9]){5,}@uniminuto\.edu\.co$/]',
                'errors' => array(
                        'is_unique' => 'El correo ya est&aacute; registrado.',
                        'regex_match' => 'Debe ser una direcci&oacuten de correo de UNIMINUTO v&aacute;lida.',
                ),
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
                'field' => 'id_facultad',
                'label' => 'Facultad',
                'rules' => 'trim|required|is_natural'
            ),
            array(
                'field' => 'id_programa',
                'label' => 'Programa',
                'rules' => 'trim|required|is_natural'
            ),
            array(
                'field' => 'id_sede',
                'label' => 'Sede',
                'rules' => 'trim|required|is_natural'
            )
        );
        return $config;
    }
    
    
    
}