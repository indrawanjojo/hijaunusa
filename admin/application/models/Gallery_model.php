<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Gallery_model extends CI_Model
{

    public $table = 'gallery';
    public $id = 'id_gallery';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function getAllDataGallery()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    function getGalleryInfo($id) {
        if ($id != 0) {
			//kolom
			$query = $this->db->query('SELECT * FROM gallery WHERE id_gallery = ' . $id);

			return $query->row();
		} else {
			$query = $this->db->query("SELECT '' as id_gallery, '' as title, '' as synopsis, '' as description, '' as image, '' as status, '' as created");

			return $query->row();
		}
    }

    public function insertContent($data)
	{
		$this->db->insert($this->table, $data);
    }
    
    public function updateContent($data)
	{
		$id_gallery = $data['id_gallery'];
		$this->db->where('id_gallery', $id_gallery);
		$this->db->update($this->table, $data);
	}

}