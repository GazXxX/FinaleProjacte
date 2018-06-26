<?php
 
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
 
 
class Produk extends CI_Controller {
 
    public function __construct() {
        parent::__construct();
        $this->load->model('Mproduk');
       
    }
    function index(){
        $data['title'] = 'Data Produk';
        $data['content'] = 'v_produk';
        $data['datatables'] = $this->Mproduk->produk();
        $this->load->view('template',$data);
       
    }
    function addProduk(){
        $add = array(
            'kode_produk' => $this->input->post('kode'),
            'nama_produk' => $this->input->post('nama'),
            'qty_produk' => $this->input->post('qty')
        );
        $this->Mproduk->addProduk($add);
    }
    function editProduk($id){
        $flag  = array('id_produk'=>$id);
        $get = $this->Mproduk->getProduk($flag)->row();
        echo json_encode($get);
    }
    function newProduk(){
        $flag  = array('id_produk'=>$this->input->post('oid'));
        $edit = array(
            'kode_produk' => $this->input->post('nkode'),
            'nama_produk' => $this->input->post('nnama'),
            'qty_produk' => $this->input->post('nqty')
        );
        $this->Mproduk->editProduk($flag,$edit);
    }
    function deleteProduk($id){
        $flag  = array('id_produk'=>$id);
        $this->Mproduk->deleteProduk($flag);
    }
 
}