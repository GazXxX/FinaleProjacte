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


    function tampil(){
        $sql = "SELECT pembelian.id_pembelian, supplier.nama_supplier, produk.kode_produk, pembelian.tanggal_pembelian, pembelian.harga_pembelian, pembelian.qty_pembelian, pembelian.nota_pembelian, pembelian.status_pembelian 
            FROM pembelian 
                JOIN supplier ON pembelian.supplier_id=supplier.id_supplier
            JOIN produk 
                ON pembelian.produk_id=produk.id_produk";
        return $this->db->query($sql);
    }

    function getSupplier(){
        $sql = "SELECT id_supplier, nama_supplier FROM supplier";
        return $this->db->query($sql)->result_array();
    } 

    function getProduct(){
        $sql = "SELECT id_produk, nama_produk FROM produk";
        return $this->db->query($sql)->result_array();
    }
    
}