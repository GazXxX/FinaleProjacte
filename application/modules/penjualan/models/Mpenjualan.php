<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
 
class Mpenjualan extends CI_Model {
 
        function __construct () {
        parent::__construct();
       
        }
 
    function penjualan(){
        return $this->db->get('penjualan');
    }
    function addPenjualan($add){
        return $this->db->insert('penjualan',$add);
    }
    function getPenjualan($flag){
        $this->db->where($flag);
        return $this->db->get('penjualan');
    }
    function editPenjualan($flag,$edit){
        $this->db->where($flag);
        return $this->db->update('penjualan',$edit);
    }
    function deletePenjualan($flag){
        $this->db->where($flag);
        return $this->db->delete('penjualan');
    }

    function tampil(){
        $sql = "SELECT penjualan.id_penjualan, produk.kode_produk, penjualan.tanggal_penjualan, penjualan.harga_penjualan, penjualan.keterangan 
        FROM penjualan JOIN produk ON penjualan.produk_id=produk.id_produk";
        return $this->db->query($sql);
    }
    function getProduct(){
        $sql = "SELECT id_produk, nama_produk FROM produk";
        return $this->db->query($sql)->result_array();
    }
    
}