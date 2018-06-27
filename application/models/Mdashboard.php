<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdashboard extends CI_Model{
	function __construct () {
        parent::__construct();   
    }

	function countProduk(){
    	return $this->db->query("SELECT count(*) as total from produk")->row_array();
	}
	function countSupplier(){
    	return $this->db->query("SELECT count(*) as total from supplier")->row_array();
	}
	function countPembelian(){
    	return $this->db->query("SELECT count(*) as total from pembelian")->row_array();
	}
	function countPenjualan(){
    	return $this->db->query("SELECT count(*) as total from penjualan")->row_array();
	}

}