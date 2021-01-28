<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product_model extends CI_Model
{
	var $CI = NULL;


	// Load database
	public function __construct()
	{
		parent::__construct();
		$this->CI = &get_instance();
		$this->load->database();
	}

  public function get_all()
  {
    $query = $this->db->query('SELECT * FROM products ORDER BY id_product DESC');
    return $query->result();
  }

}
