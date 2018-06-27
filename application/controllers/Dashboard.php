<?php
 
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
 
// buat class sesuai dengan nama file dan diawali dengan huruf besar
class Dashboard extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Mdashboard');
    }
 
    // method dengan nama index akan dipanggil otomatis jika url hanya mendefinisikan controller saja
    public function index(){
    	$data['produk'] = $this->Mdashboard->countProduk();
    	$data['supplier'] = $this->Mdashboard->countSupplier();
    	$data['pembelian'] = $this->Mdashboard->countPembelian();
    	$data['penjualan'] = $this->Mdashboard->countPenjualan();
       	$data['title'] = 'DASHBOARD';
        $this->load->view('template2', $data); // kode ini akan memanggil view dengan nama template     
    }
 
 
}