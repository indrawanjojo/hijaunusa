<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->CI =& get_instance();
		// $this->load->model('users_model');
        $this->load->library('cls_login');
        $this->load->model('category_model');

    }

    public function index() {

        $getAllCategory = $this->category_model->get_all();

        $data = array (
            'allCategory' => $getAllCategory
        );

        if ($this->agent->is_mobile()) {
            $this->load->view('category', $data);
        } elseif ($this->agent->is_mobile('ipad')) {
            $this->load->view('category', $data);
        } else {
            $this->load->view('category', $data);
        }
    }

    public function insert($ref = 0) {
        $categoryInfo = $this->category_model->getCategoryInfo($ref);

        $data = array(
            'categoryInfo' => $categoryInfo
        );

        if ($this->agent->is_mobile()) {
            $this->load->view('category_insert', $data);
        } elseif ($this->agent->is_mobile('ipad')) {
            $this->load->view('category_insert', $data);
        } else {
            $this->load->view('category_insert', $data);
        }
    }

    public function add_category() {
        $cg = $this->cls_general;
        $i = $this->input;

		$data = array (
			'title' => $i->post('txtTitle'),
            'description' => $i->post('txtDesc'),
			'status' => '1',
			'created' => date('Y-m-d H:i:s')
		);

		$this->category_model->insertContent($data);

		redirect(base_url() . 'category/?n=' . $cg->encryptStr('insert content gallery success'));
    }

    public function edit($ref = 0) {
        $categoryInfo = $this->category_model->getCategoryInfo($ref);

        $data = array(
            'categoryInfo' => $categoryInfo
        );

        if ($this->agent->is_mobile()) {
            $this->load->view('category_update', $data);
        } elseif ($this->agent->is_mobile('ipad')) {
            $this->load->view('category_update', $data);
        } else {
            $this->load->view('category_update', $data);
        }
    }

    public function update_category() {
        $cg = $this->cls_general;
        $i = $this->input;

		$data = array (
            'id' => $i->post('txtIDCat'),
			'title' => $i->post('txtTitle'),
            'description' => $i->post('txtDesc'),
			'status' => '1',
			'updated' => date('Y-m-d H:i:s')
		);

		$this->category_model->updateContent($data);

		redirect(base_url() . 'category/?n=' . $cg->encryptStr('insert content gallery success'));
    }

    public function sub_category() {
        $getAllSubCategory = $this->category_model->get_all_sub();

        $data = array (
            'allSubCategory' => $getAllSubCategory
        );

        if ($this->agent->is_mobile()) {
            $this->load->view('sub_category', $data);
        } elseif ($this->agent->is_mobile('ipad')) {
            $this->load->view('sub_category', $data);
        } else {
            $this->load->view('sub_category', $data);
        }
    }

    public function insert_sub($ref = 0) {
        $subCategoryInfo = $this->category_model->getSubCategoryInfo($ref);
        $getAllCategory = $this->category_model->get_all();

        $data = array(
            'subCategoryInfo' => $subCategoryInfo,
            'allCategory' => $getAllCategory
        );

        if ($this->agent->is_mobile()) {
            $this->load->view('sub_category_insert', $data);
        } elseif ($this->agent->is_mobile('ipad')) {
            $this->load->view('sub_category_insert', $data);
        } else {
            $this->load->view('sub_category_insert', $data);
        }
    }

    public function add_sub_category() {
        $cg = $this->cls_general;
        $i = $this->input;

		$data = array (
			'id_category' => $i->post('id_category'),
			'name' => $i->post('txtName'),
			'created' => date('Y-m-d H:i:s')
		);

		$this->category_model->insertSubCat($data);

		redirect(base_url() . 'category/sub_category/?n=' . $cg->encryptStr('insert category success'));
    }

    public function edit_sub($ref = 0) {
        $subCategoryInfo = $this->category_model->getSubCategoryInfo($ref);
        $getAllCategory = $this->category_model->get_all();
        $categorySelect = $this->category_model->getWhereDropdown($subCategoryInfo->id_category)[0];

        $data = array(
            'subCategoryInfo' => $subCategoryInfo,
            'allCategory' => $getAllCategory,
            'categorySelect' => $categorySelect
        );

        if ($this->agent->is_mobile()) {
            $this->load->view('sub_category_update', $data);
        } elseif ($this->agent->is_mobile('ipad')) {
            $this->load->view('sub_category_update', $data);
        } else {
            $this->load->view('sub_category_update', $data);
        }
    }

    public function update_sub_category() {
        $cg = $this->cls_general;
        $i = $this->input;

		$data = array (
            'id_sub' => $i->post('txtIDSubCat'),
			'id_category' => $i->post('id_category'),
			'name' => $i->post('txtName'),
			'updated' => date('Y-m-d H:i:s')
		);

		$this->category_model->updateSubCat($data);

		redirect(base_url() . 'category/sub_category?n=' . $cg->encryptStr('update sub category success'));
    }

}