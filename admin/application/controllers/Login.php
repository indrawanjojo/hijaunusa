<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->CI =& get_instance();
		// $this->load->model('users_model');
        $this->load->library('cls_login');

    }

    public function index() {

            // Validasi
		$valid = $this->form_validation;
		
		$valid->set_rules('txtUsername','Username','required',
				array(	'required'	=> 'Username must be filled'));
		$valid->set_rules('txtPassword','Password','required',
				array(	'required'	=> 'Password must be filled'));
		
		$username	= $this->input->post('txtUsername');
		$password	= $this->input->post('txtPassword');
		
		if($valid->run()) {
			$this->cls_login->login($username,$password, base_url('home'), base_url('login'));
		}
		// End validasi
				
		$data = array( 'title' => 'Login Administrator');

        if ($this->agent->is_mobile()) {
            $this->load->view('login', $data);
        } elseif ($this->agent->is_mobile('ipad')) {
            $this->load->view('login', $data);
        } else {
            $this->load->view('login', $data);
        }

        // if ($this->agent->is_mobile()) {
        //     $this->load->view('login');
        // } elseif ($this->agent->is_mobile('ipad')) {
        //     $this->load->view('login');
        // } else {
        //     $this->load->view('login');
        // }
    }

    // Logout
	public function logout() {
		$this->cls_login->logout();
	}
    
}