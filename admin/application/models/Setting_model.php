<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Setting_model extends CI_Model
{

    public $table = 'setting';
    public $table2 = 'province';
    public $table3 = 'city';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    function get_province()
    {
      $results = $this->db->get($this->table2)->result();
      foreach ($results as $r) :
          $data[$r->id_province . '-' . $r->province_name] = $r->province_name;
      endforeach;
      return $data;
    }

    function city($id)
    {
        $this->db->where('id_province', $id);
        $results = $this->db->get($this->table3)->result();
        foreach ($results as $r) :
            $data[$r->id_city] = $r->city_name;
        endforeach;
        return $data;
    }

    public function get_all()
    {
      $query = $this->db->query('SELECT * FROM setting');
      return $query->row();
    }

    function getSettingInfo($id) {
        if ($id != 0) {
    			//kolom
    			$query = $this->db->query('SELECT * FROM setting WHERE id = ' . $id);

    			return $query->row();
    		} else {
          $query = $this->db->query("SELECT '' as id, '' as address, '' as id_city, '' as city_name, '' as id_province, '' as province_name, '' as pos_code, '' as web_name, '' as description, '' as logo, '' as url, '' as lattitude, '' as longitude, '' as url_map");

    			return $query->row();
    		}
    }

    public function updateContact($data)
    {
      $id = $data['id'];
      $this->db->where('id', $id);
      $this->db->update($this->table, $data);
    }


  }
