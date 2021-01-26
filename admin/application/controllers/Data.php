<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data extends CI_Controller {

  public function __construct() {
		parent::__construct();
		$this->CI =& get_instance();
		// $this->load->model('users_model');
        $this->load->library('cls_login');
        $this->load->model('setting_model');

    }

	public function index()
	{

	}

  public function subscribe()
  {
    $getSubscribe = $this->setting_model->getAllSubscribe();

    $data = array(
      'subscribeInfo' => $getSubscribe
    );

    $this->load->view('subscribe_list', $data);
  }

  public function visitor()
  {
    $getVisitor = $this->setting_model->getAllVisitor();

    $data = array(
      'visitorInfo' => $getVisitor
    );

    $this->load->view('visitor_list', $data);
  }
}
