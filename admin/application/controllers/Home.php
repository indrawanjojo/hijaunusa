<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->CI =& get_instance();
		$this->load->model('banner_model');
        $this->load->library('cls_login');

    }

    public function index() {
        if ($this->agent->is_mobile()) {
            $this->load->view('home');
        } elseif ($this->agent->is_mobile('ipad')) {
            $this->load->view('home');
        } else {
            $this->load->view('home');
        }
    }

    public function banner() {

        $getBannerList = $this->banner_model->get_all();

        $data = array (
            'bannerList' => $getBannerList
        );

        if ($this->agent->is_mobile()) {
            $this->load->view('banner_list', $data);
        } elseif ($this->agent->is_mobile('ipad')) {
            $this->load->view('banner_list', $data);
        } else {
            $this->load->view('banner_list', $data);
        }
    }

}