<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Banner_model extends CI_Model
{

    public $table = 'banner';
    public $id = 'id_banner';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    public function get_all() {
        $query = $this->db->query('SELECT * FROM banner ORDER BY id_banner DESC');
        return $query->result();
    }

    function getDataBanner($id) {
        if ($id != 0) {
    			//kolom
    			$query = $this->db->query('SELECT * FROM banner WHERE id_banner = ' . $id);

    			return $query->row();
    		} else {
    			$query = $this->db->query("SELECT '' as id_banner, '' as title, '' as description, '' as image, '' as status, '' as created");

    			return $query->row();
    		}
    }

    public function insertBanner($data)
    {
      $this->db->insert($this->table, $data);
    }

    public function updateBanner($data)
    {
      $id_banner = $data['id_banner'];
      $this->db->where('id_banner', $id_banner);
      $this->db->update($this->table, $data);
    }

}
