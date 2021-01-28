<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home_model extends CI_Model
{
	var $CI = NULL;


	// Load database
	public function __construct()
	{
		parent::__construct();
		$this->CI = &get_instance();
		$this->load->database();
	}

  public function getContactUs()
  {
    $query = $this->db->query('SELECT * FROM setting');
    return $query->row();
  }

  public function getSosmed()
  {
    $query = $this->db->query('SELECT * FROM social_media');
    return $query->result();
  }

	public function getDataBanner()
	{
		$query = $this->db->query('SELECT * FROM banner');
    return $query->result();
	}

}
