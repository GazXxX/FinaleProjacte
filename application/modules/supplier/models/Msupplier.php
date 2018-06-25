<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
 
class Msupplier extends CI_Model {
 
        function __construct () {
        parent::__construct();
       
        }
 
    function supplier(){
        return $this->db->get('supplier');
    }
    function addSupplier($add){
        return $this->db->insert('supplier',$add);
    }
    function getSupplier($flag){
        $this->db->where($flag);
        return $this->db->get('supplier');
    }
    function editSupplier($flag,$edit){
        $this->db->where($flag);
        return $this->db->update('supplier',$edit);
    }
    function deleteSupplier($flag){
        $this->db->where($flag);
        return $this->db->delete('supplier');
    }
    
}