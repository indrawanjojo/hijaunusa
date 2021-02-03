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

    public function getAllSubscribe()
    {
      $query = $this->db->query('SELECT * FROM subscribe ORDER BY id DESC');
      return $query->result();
    }

    public function getAllVisitor()
    {
      $query = $this->db->query('SELECT * FROM visitor ORDER BY id DESC');
      return $query->result();
    }

    public function get_data_visitor()
    {
      // $query = $this->db->query('SELECT COUNT(*) as total_visitor FROM visitor WHERE YEAR(date) = 2021 GROUP BY  MONTH(date)');
      $query = $this->db->query('SELECT date, hits, browser FROM visitor ORDER BY id DESC');
      return $query->result();

    }

    public function getVisitorDevice()
    {
      $query = $this->db->query('SELECT COUNT(os) as device FROM visitor GROUP BY browser');
      return $query->result();
    }

    public function getDevice()
    {
      $query = $this->db->query('SELECT DISTINCT browser FROM visitor');
      return $query->result();
    }

    public function totalVisitor()
    {
      $query = $this->db->query('SELECT count(id) as total_visitor FROM visitor');
      return $query->row();
    }

    public function totalVisitorOnDay()
    {
      $date = date('Y-m-d');
      $query = $this->db->query('SELECT count(id) as total_visitor FROM visitor WHERE date = "'.$date.'"');
      return $query->row();
    }

    public function getService()
    {
      $query = $this->db->query('SELECT * FROM service ORDER BY id DESC');
      return $query->result();
    }

    function getDataService($id) {
        if ($id != 0) {
    			//kolom
    			$query = $this->db->query('SELECT * FROM service WHERE id = ' . $id);

    			return $query->row();
    		} else {
    			$query = $this->db->query("SELECT '' as id, '' as title, '' as synopsis, '' as icon, '' as created, '' as updated");

    			return $query->row();
    		}
    }

    public function insertService($data)
    {
      $this->db->insert('service', $data);
    }

  }
