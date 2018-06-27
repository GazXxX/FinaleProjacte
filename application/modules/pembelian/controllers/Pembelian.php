<?php
 
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
 
 
class Pembelian extends CI_Controller {
 
    public function __construct() {
        parent::__construct();
        $this->load->model('Mpembelian');
       
    }
    function index(){
        $data['title'] = 'Data Pembelian';
        $data['content'] = 'v_pembelian';
        $data['suppliers'] = $this->Mpembelian->getSupplier();
        $data['products'] = $this->Mpembelian->getProduct();
        $data['datatables'] = $this->Mpembelian->tampil();
        $this->load->view('template',$data);
       
    }
    function addPembelian(){
        // if (isset($_POST['submit'])) {
           
        // }
        $add = array(
            'supplier_id' => $this->input->post('supplier_id'),
            'produk_id' => $this->input->post('produk_id'),
            'tanggal_pembelian' => $this->input->post('tanggal'),
            'nota_pembelian' => $this->input->post('nota'),
            'status_pembelian' => $this->input->post('status'),
            'harga_pembelian' => $this->input->post('harga'),
            'qty_pembelian' => $this->input->post('qty')
        );

        $this->Mpembelian->addPembelian($add);
        
    }
    function editPembelian($id){
        $flag  = array('id_pembelian'=>$id);
        $get = $this->Mpembelian->getPembelian($flag)->row();
        echo json_encode($get);
    }
    function newPembelian(){
        $flag  = array('id_pembelian'=>$this->input->post('oid'));
        $edit = array(
            'supplier_id' => $this->input->post('nsupplier_id'),
            'produk_id' => $this->input->post('nproduk_id'),
            'tanggal_pembelian' => $this->input->post('ntanggal'),
            'nota_pembelian' => $this->input->post('nnota'),
            'status_pembelian' => $this->input->post('nstatus'),
            'harga_pembelian' => $this->input->post('nharga'),
            'qty_pembelian' => $this->input->post('nqty')
        );
        $this->Mpembelian->editPembelian($flag,$edit);
    }
    function deletePembelian($id){
        $flag  = array('id_pembelian'=>$id);
        $this->Mpembelian->deletePembelian($flag);
    }
 
}