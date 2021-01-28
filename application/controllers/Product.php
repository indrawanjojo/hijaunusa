<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->CI = &get_instance();
    // $this->load->model('product_model');
		$this->load->model('home_model');
		$this->load->model('product_model');

	}

	public function index()
	{
    $contactUsList = $this->home_model->getContactUs();
		$sosmedList = $this->home_model->getSosmed();
		$productList = $this->product_model->get_all();

		$data = array(
			'contactUsList' => $contactUsList,
			'sosmedList' => $sosmedList,
			'productList' => $productList
		);

    $this->load->view('product', $data);
  }

}
