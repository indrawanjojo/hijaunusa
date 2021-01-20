<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

	public function __construct() {
		parent::__construct();
				$this->CI =& get_instance();
        $this->load->model('banner_model');
				$this->load->model('product_model');
        $this->load->library('cls_login');

    }

    public function index() {

      $getProductList = $this->product_model->get_all();

      $data = array(
        'productList' => $getProductList
      );

        if ($this->agent->is_mobile()) {
            $this->load->view('product_list', $data);
        } elseif ($this->agent->is_mobile('ipad')) {
            $this->load->view('product_list', $data);
        } else {
            $this->load->view('product_list', $data);
        }
    }

    public function insert($ref=0)
    {
      $getDataProduct = $this->product_model->getDataProductInfo($ref);

      $data = array (
          'productInfo' => $getDataProduct
      );

      if ($this->agent->is_mobile()) {
          $this->load->view('product_insert', $data);
      } elseif ($this->agent->is_mobile('ipad')) {
          $this->load->view('product_insert', $data);
      } else {
          $this->load->view('product_insert', $data);
      }
    }

    public function add_product()
    {
      $cg = $this->cls_general;
      $i = $this->input;

      $config['upload_path']          = './gallery_img/';
      $config['allowed_types']        = 'gif|jpg|png|webp';
      $config['overwrite']			= true;
      $config['max_size']             = 1024; // 1MB

      $this->load->library('upload', $config);
      $this->upload->do_upload('image');
      $gambar = $this->upload->data();
      move_uploaded_file($_FILES["image"]["tmp_name"], $gambar['full_path']);
      if (!$this->upload->do_upload('image')) {
        $gambarFix = 'default.jpg';
      }
      $gambarFix = $gambar['file_name'];

      $data = array (
        'name' => $i->post('txtName'),
        'synopsis' => $i->post('txtSynopsis'),
        'description' => $i->post('txtDesc'),
        'price' => $i->post('txtPrice'),
        'image' => $gambarFix,
        'status' => '1',
        'created' => date('Y-m-d H:i:s')
      );

      $this->product_model->insertProduct($data);

      redirect(base_url() . 'product/?n=' . $cg->encryptStr('insert product success'));
    }

    public function edit($ref=0)
    {
      $getDataProduct = $this->product_model->getDataProductInfo($ref);

      $data = array (
          'productInfo' => $getDataProduct
      );

      if ($this->agent->is_mobile()) {
          $this->load->view('product_update', $data);
      } elseif ($this->agent->is_mobile('ipad')) {
          $this->load->view('product_update', $data);
      } else {
          $this->load->view('product_update', $data);
      }
    }

    public function update()
    {
      $cg = $this->cls_general;
      $i = $this->input;

      $config['upload_path']          = './gallery_img/';
      $config['allowed_types']        = 'gif|jpg|png|webp';
      $config['overwrite']			= true;
      $config['max_size']             = 1024; // 1MB

      $this->load->library('upload', $config);
      $this->upload->do_upload('image');
      $gambar = $this->upload->data();
      move_uploaded_file($_FILES["image"]["tmp_name"], $gambar['full_path']);
      if (!$this->upload->do_upload('image')) {
        $gambarFix = $i->post('old_image');
      }

      if ($gambar['file_name'] === '') {
        $gambarFix = $i->post('old_image');
      } else {
        $gambarFix = $gambar['file_name'];
      }

      $data = array (
        'id_product' => $i->post('txtIDProduct'),
        'name' => $i->post('txtName'),
        'synopsis' => $i->post('txtSynopsis'),
        'description' => $i->post('txtDesc'),
        'price' => $i->post('txtPrice'),
        'image' => $gambarFix,
        'status' => '1',
        'updated' => date('Y-m-d H:i:s')
      );

      $this->product_model->updateProduct($data);

      redirect(base_url() . 'product/?n=' . $cg->encryptStr('update product success'));
    }


  }
