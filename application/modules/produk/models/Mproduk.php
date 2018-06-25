<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
 
class Mproduk extends CI_Model {
 
        function __construct () {
        parent::__construct();
       
        }
 
    function produk(){
        return $this->db->get('produk');
    }
    function addProduk($add){
        return $this->db->insert('produk',$add);
    }
    function getProduk($flag){
        $this->db->where($flag);
        return $this->db->get('produk');
    }
    function editProduk($flag,$edit){
        $this->db->where($flag);
        return $this->db->update('produk',$edit);
    }
    function deleteProduk($flag){
        $this->db->where($flag);
        return $this->db->delete('produk');
    }
    
    
}