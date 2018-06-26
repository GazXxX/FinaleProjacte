<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
 
class Mpembelian extends CI_Model {
 
        function __construct () {
        parent::__construct();
       
        }
 
    function pembelian(){

        return $this->db->get('pembelian');
    }
    function addPembelian($add){
        return $this->db->insert('pembelian',$add);
    }
    function getPembelian($flag){
        $this->db->where($flag);
        return $this->db->get('pembelian');
    }
    function editPembelian($flag,$edit){
        $this->db->where($flag);
        return $this->db->update('pembelian',$edit);
    }
    function deletePembelian($flag){
        $this->db->where($flag);
        return $this->db->delete('pembelian');
    }
    
    
    
}