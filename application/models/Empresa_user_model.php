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



class Empresa_user_model extends User_model {
        
    public function __construct() {
        parent::__construct();
        $this->estados = array( 'activo' => 13,
                                'inactivo' => 14,
                                );
    }
    
    public function obtener($id_usuario){
        
        $select = array(['usuario.*'],
                    ['empresas.nombre','empresa'],
                    ['estados_usuario.nombre','estado'],);
        
        $join = array(['empresas','empresas.id = usuario.id_empresa'],
                    ['estados_usuario','estados_usuario.id = usuario.id_estado'],);
        
        $where = array('usuario.id_rol_usuario = '.ID_ROL_EMPRESA,
                        'usuario.id = '.$id_usuario,);
        
        $limit = "1";
              
        /*
         * FIRMA DE GET
         * getList($select = array(), $join = array(), $where = array(), $order = "", $limit = "" )
         */
        $result = $this->get($select,$join,$where,NULL,1);
       
        return $result;
    }
    
    public function listar(){
        
        $select = array(['usuario.*'],
                    ['empresas.nombre','empresa'],
                    ['estados_usuario.nombre','estado'],);
        
        $join = array(['empresas','empresas.id = usuario.id_empresa'],
                    ['estados_usuario','estados_usuario.id = usuario.id_estado'],);
        
        $where = array('usuario.id_rol_usuario = '.ID_ROL_EMPRESA,);
        
        $limit = "1";
              
        /*
         * FIRMA DE GET
         * getList($select = array(), $join = array(), $where = array(), $order = "", $limit = "" )
         */
        $result = $this->get($select,$join,$where,NULL,1);
       
        return $result;
    }
    
    public function cambiarEstado($where,$estado){
        $result = $this->update(['id_estado' => $this->estados[$estado]],$where);
        return $result;
    }
    
    public function getValidationRules($tipo = '') {
        $reglaCc = ($tipo === "update") ? '' : '|is_unique[usuario.cedula]';
        $config = array(
            array(
                'field' => 'cedula',
                'label' => 'C&eacute;dula',
                'rules' => 'trim|required|is_natural'.$reglaCc
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
                'field' => 'id_empresa',
                'label' => 'Facultad',
                'rules' => 'trim|required|is_natural'
            ),
        );
        return $config;
    }
    
    
    
}