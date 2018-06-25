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
        $data['datatables'] = $this->Mpembelian->pembelian();
        $this->load->view('template',$data);
       
    }
    function addPembelian(){
        $add = array(
            'tanggal_pembelian' => $this->input->post('tanggal'),
            'nota_pembelian' => $this->input->post('nota'),
            'status_pembelian' => $this->input->post('status')
        );
        $this->Mpembelian->addPembelian($add);
    }
    function editPembelian($id){
        $flag  = array('id_pembelian'=>$id);
        $get = $this->Mpembelian->getPembelian($flag)->row();
        echo json_encode($get);
    }
    function newPembelian(){
        $flag  = array('id_produk'=>$this->input->post('oid'));
        $edit = array(
            'tanggal_pembelian' => $this->input->post('tanggal'),
            'nota_pembelian' => $this->input->post('nota'),
            'status_pembelian' => $this->input->post('status')
        );
        $this->Mpembelian->editPembelian($flag,$edit);
    }
    function deletePembelian($id){
        $flag  = array('id_pembelain'=>$id);
        $this->Mpembelian->deletePembelian($flag);
    }
 
}