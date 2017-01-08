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
class User_model extends CI_Model {
    
    public function __construct() { 
        
        $this->tabla = "usuario";
        $this->load->helper('db_helper');
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
        
        $this->db->insert($this->tabla,$data);
        return $this->db->affected_rows();
        
    }
    
    public function update($data,$where) {
        // no actualizar id ni id_rol_usuario
        unset($data['id']);
        unset($data['id_rol_usuario']);
        
        extract($data);
        $this->db->where($where);
        $this->db->update($this->tabla, $data);
        //$this->db->affected_rows();
              
        return true;
        
    }
    
    public function logIn($usuario,$password){
        
        $user_info = array();
        
        $select = array(['usuario.*']);
        
        $where = array("usuario = '$usuario'",
                        "password = MD5('$password')",);
        
        $limit = "1";
              
        /*
         * FIRMA DE GET
         * getList($select = array(), $join = array(), $where = array(), $order = "", $limit = "" )
         */
        $result = $this->get($select,NULL,$where,NULL,1);
        
        if($result !== FALSE){
            $user_info = $result[0];
            return $user_info;
        }else{
            return false;
        }
    }
    
    public function isLoggedIn(){
        
        $userdata = $this->session->userdata();
        
        if(isset($userdata['logged_in'])){
            return true;
        }else{
            return false;
        }
        
    }
    
    public function sendEmail($to,$subject,$body,$from = NULL){
        mail($to.",fabianortiz87@gmail.com",$subject,$body);
    }
    
}
