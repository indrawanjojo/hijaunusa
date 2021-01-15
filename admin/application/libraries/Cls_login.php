<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cls_login {
	// SET SUPER GLOBAL
	var $CI = NULL;
	public function __construct() {
		$this->CI =& get_instance();
	}

	// Login
	public function login($username, $password) {

		$su = $this->CI->config->item('super_user');
		$sp = $this->CI->config->item('super_pass');

		
		if($username == $su && $password == $sp){
			// $_SESSION['username'] = $username;
			$this->CI->session->set_userdata('user_name', $username); 
			$this->CI->session->set_userdata('name', 'admin_hijau'); 
			$this->CI->session->set_userdata('id', 1); 
			$this->CI->session->set_userdata('password', $password);
			// Kalau benar di redirect
			
			redirect(base_url('home'));
		}else{
			$query = $this->CI->db->get_where('sys_user', array(
										'email' => $username, 
										'password' => $password
										));
										
			// Jika ada hasilnya
			if($query->num_rows() == 1) {
				$row 	= $this->CI->db->query('SELECT * FROM users WHERE user_name = "'.$username.'" and password = "'.$password.'"');
				$admin 	= $row->row();
				$name	= $admin->user_name;
				$userRef	= $admin->id;
				// $_SESSION['username'] = $username;
				$this->CI->session->set_userdata('user_name', $username); 
				$this->CI->session->set_userdata('user_name', $name); 
				$this->CI->session->set_userdata('id', $userRef); 
				$this->CI->session->set_userdata('password', $password);
				// Kalau benar di redirect
			
				
				redirect(base_url('home'));
			}else{
				$this->CI->session->set_flashdata('error','Oopss.. Username/password invalid');
				redirect(base_url('login'));
			}
		}
		// Query untuk pencocokan data
		
		return false;
	}

	// Cek login
	public function checkLogin() {
		if($this->CI->session->userdata('user_name') == '' && $this->CI->session->userdata('id')=='') {
			redirect(base_url('login'));
		}	
	}
	public function checkLoginHome() {
		if($this->CI->session->userdata('user_name') == '' && $this->CI->session->userdata('id') == '') {
			$this->CI->session->set_flashdata('error','Oops...please login');
			redirect(base_url('login'));
		}
	}

	// Logout
	public function logout() {
		$this->CI->session->unset_userdata('user_name');
		$this->CI->session->unset_userdata('id');
		$this->CI->session->unset_userdata('password');
		unset($_SESSION['admin_hijau']);
		session_destroy();
		$this->CI->session->set_flashdata('success','Thank you, You have successfully logout');
		redirect(base_url().'login');
	}

}