<?php
 
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
 
 
class Supplier extends CI_Controller {
 
    public function __construct() {
        parent::__construct();
        $this->load->model('Msupplier');
       
    }
    function index(){
        $data['title'] = 'Data Supplier';
        $data['content'] = 'v_supplier';
        $data['datatables'] = $this->Msupplier->supplier();
        $this->load->view('template',$data);
       
    }
    function addSupplier(){
        $add = array(
            'nama_supplier' => $this->input->post('nama'),
            'kontak_supplier' => $this->input->post('kontak'),
            'alamat' => $this->input->post('alamat')
        );
        $this->Msupplier->addSupplier($add);
    }
    function editSupplier($id){
        $flag  = array('id_supplier'=>$id);
        $get = $this->Msupplier->getSupplier($flag)->row();
        echo json_encode($get);
    }
    function newSupplier(){
        $flag  = array('id_supplier'=>$this->input->post('oid'));
        $edit = array(
            'nama_supplier' => $this->input->post('nnama'),
            'kontak_supplier' => $this->input->post('nkontak'),
            'alamat' => $this->input->post('nalamat')
        );
        $this->Msupplier->editSupplier($flag, $edit);
    }
    function deleteSupplier($id){
        $flag  = array('id_supplier'=>$id);
        $this->Msupplier->deleteSupplier($flag);
    }
 
}