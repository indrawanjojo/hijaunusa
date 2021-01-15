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

}