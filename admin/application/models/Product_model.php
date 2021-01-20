<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Product_model extends CI_Model
{

    public $table = 'products';
    public $id = 'id_product';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    function getDataProductInfo($id) {
        if ($id != 0) {
    			//kolom
    			$query = $this->db->query('SELECT * FROM products WHERE id_product = ' . $id);

    			return $query->row();
    		} else {
    			$query = $this->db->query("SELECT '' as id_product, '' as name, '' as synopsis, '' as description, '' as price, '' as image, '' as status, '' as created, '' as updated");

    			return $query->row();
    		}
    }

    public function insertProduct($data)
  	{
  		$this->db->insert($this->table, $data);
    }

    public function updateProduct($data)
  	{
  		$id_product = $data['id_product'];
  		$this->db->where('id_product', $id_product);
  		$this->db->update($this->table, $data);
  	}

  }
