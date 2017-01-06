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
    
    public function listarAdmin(){
        
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
        
        $where = array('usuario.id_rol_usuario = '.ID_ROL_PROFESOR,);
        $order = "usuario,id ASC";
              
        /*
         * FIRMA DE GET_LIST
         * getList($select = array(), $join = array(), $where = array(), $order = "", $limit = "" )
         */
        $result = $this->get($select,$join,$where,$order);
       
        return $result;
    }
    
    
}