<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Category_model extends CI_Model
{

    public $table = 'category';
    public $table2 = 'category_sub';
    public $id = 'id';
    public $id_sub = 'id_sub';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    public function get_all() {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    public function getCategoryInfo($id) {
        if ($id != 0) {
			//kolom
			$query = $this->db->query('SELECT * FROM category WHERE id = ' . $id);

			return $query->row();
		} else {
			$query = $this->db->query("SELECT '' as id, '' as title, '' as description, '' as image, '' as status, '' as created");

			return $query->row();
		}
    }

    public function insertContent($data)
	{
		$this->db->insert($this->table, $data);
    }

    public function updateContent($data)
	{
		$id = $data['id'];
		$this->db->where('id', $id);
		$this->db->update($this->table, $data);
    }
    
    public function get_all_sub() {
        $query = $this->db->query('SELECT cs.*, c.title FROM category_sub cs JOIN category c ON c.id = cs.id_category ORDER BY cs.id_sub DESC');
        return $query->result();
    }

    public function insertSubCat($data)
	{
		$this->db->insert($this->table2, $data);
    }

    public function updateSubCat($data)
	{
		$id_sub = $data['id_sub'];
		$this->db->where('id_sub', $id_sub);
		$this->db->update($this->table2, $data);
    }

    public function getSubCategoryInfo($id) {
        if ($id != 0) {
			//kolom
			$query = $this->db->query('SELECT * FROM category_sub WHERE id_sub = ' . $id);

			return $query->row();
		} else {
			$query = $this->db->query("SELECT '' as id_sub, '' as name, '' as id_category, '' as image, '' as created");

			return $query->row();
		}
    }

    public function getWhereDropdown($id) {
        return $this->db->get_where('category', array('id' => $id))->result();
    }

}