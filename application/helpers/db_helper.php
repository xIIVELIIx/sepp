<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');


if (!function_exists('get_select_string')) {

    function get_select_string($select_arr = array()) {
        
        $select = "";
        $tmp = "";
        $tmp_arr = array();
        
        if(count($select_arr) > 0){
            
            foreach($select_arr as $a){
                
                $tmp = "";
                // Agregar nombre de campo
                $tmp .= (!empty($a[0])) ? $a[0] : "";
                // Agregar alias
                $tmp .= (!empty($a[1])) ? " AS ".$a[1] : "";
                
                $tmp_arr[] = $tmp;
                
            }
            
            $select = implode(',',$tmp_arr);
            
        }else{
            $select = "";
        }
        
        return $select;
    }
}

if (!function_exists('get_where_string')) {

    function get_where_string($where_arr = array()) {
        
        $where = "";
        $tmp = "";
        $tmp_arr = array();
        
        if(count($where_arr) > 0){
            
            foreach($where_arr as $a){
                
                $tmp = "";
                // Agregar condicion
                $tmp .= (!empty($a)) ? $a : "";
                
                $tmp_arr[] = $tmp;
                
            }
            
            $where = implode(' AND ',$tmp_arr);
            
        }else{
            $where = "*";
        }
        
        return $where;
    }
}