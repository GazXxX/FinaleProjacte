<?php
 
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
 
 
class Penjualan extends CI_Controller {
 
    public function __construct() {
        parent::__construct();
        $this->load->model('Mpenjualan');
       
    }
    function index(){
        $data['title'] = 'Data Penjualan';
        $data['content'] = 'v_penjualan';
        $data['datatables'] = $this->Mpenjualan->penjualan();
        $this->load->view('template',$data);
       
    }
    function addPenjualan(){
        $add = array(
            'tanggal_penjualan' => $this->input->post('tanggal'),
            'harga_penjualan' => $this->input->post('harga'),
            'keterangan' => $this->input->post('keterangan')
        );
        $this->Mpenjualan->addPenjualan($add);
    }
    function editPenjualan($id){
        $flag  = array('id_penjualan'=>$id);
        $get = $this->Mpenjualan->getPenjualan($flag)->row();
        echo json_encode($get);
    }
    function newPenjualan(){
        $flag  = array('id_penjualan'=>$this->input->post('oid'));
        $edit = array(
            'tanggal_penjualan' => $this->input->post('ntanggal'),
            'harga_penjualan' => $this->input->post('nharga'),
            'keterangan' => $this->input->post('nketerangan')
        );
        $this->Mpenjualan->editPenjualan($flag,$edit);
    }
    function deletePenjualan($id){
        $flag  = array('id_penjualan'=>$id);
        $this->Mpenjualan->deletePenjualan($flag);
    }
 
}