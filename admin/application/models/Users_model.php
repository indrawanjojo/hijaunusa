<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Users_model extends CI_Model
{
    var $status = array(
        1 => 'Member',
        0 => 'Admin'
    );

    public $table = 'users';
    public $table2 = 'province';
    public $table3 = 'city';
    public $id = 'id';
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

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    // get data by email
    function get_by_email($email)
    {
        $this->db->where($this->email, $email);
        return $this->db->get($this->table)->row();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

     // update data
     function update($id, $data)
     {
         $this->db->where($this->id, $id);
         $this->db->update($this->table, $data);
     }

    function check_email($email) {
        $this->db->select('*');
        $this->db->where('email', $email);
        $query = $this->db->get($this->table, 1);

        if ($query->num_rows() == 1) {
            return $query->row_array();
        }
    }

    function check_password($password) {
        $this->db->select('*');
        $this->db->where('password', $password);
        $query = $this->db->get($this->table, 1);

        if ($query->num_rows() == 1) {
            return $query->row_array();
        }
    }

    function check_email_pass($email, $password) {
        $this->db->select('*');
        $this->db->where('email', $email);
        $this->db->where('password', $password);
        $query = $this->db->get($this->table, 1);

        if ($query->num_rows() == 1) {
            return $query->row_array();
        }
    }
    
    function check_reg($token) {
        $this->db->select('*');
        $this->db->where('reset_token', $token);
        $this->db->where('aktif', 0);
        $query = $this->db->get($this->table, 1);

        if ($query->num_rows() == 1) {
            return $query->row_array();
        }
    }

    function updateConfirmReg($id) {
        $data = array(
            'reset_token' => '',
            'aktif' => 1
        );
        $this->db->where('id', $id);
        $this->db->update($this->table, $data);
    }

    
    function findByEmail($email) {
        $this->db->select('*');
        $this->db->where('email', $email);
        $query = $this->db->get($this->table, 1);

        if ($query->num_rows() == 1) {
            return $query->row_array();
        }
    }
    
    function province()
    {
        // $this->db->order_by($this->id, $this->order);
        $results = $this->db->get($this->table2)->result();
        foreach ($results as $r) :
            $data[$r->id_province . '-' . $r->province_name] = $r->province_name;
        endforeach;
        return $data;
    }

    function city($id)
    {
        $this->db->where($this->id . '_province', $id);
        $results = $this->db->get($this->table3)->result();
        foreach ($results as $r) :
            $data[$r->id_city] = $r->city_name;
        endforeach;
        return $data;
    }
}

?>