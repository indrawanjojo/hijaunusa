<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->CI =& get_instance();
		// $this->load->model('users_model');
        $this->load->library('cls_login');
        $this->load->model('gallery_model');

    }

    public function index() {

        $galleryList = $this->gallery_model->getAllDataGallery();

        $data = array(
            'galleryList' => $galleryList
        );

        if ($this->agent->is_mobile()) {
            $this->load->view('gallery_list', $data);
        } elseif ($this->agent->is_mobile('ipad')) {
            $this->load->view('gallery_list', $data);
        } else {
            $this->load->view('gallery_list', $data);
        }
    }

    public function insert($ref = 0) {

        $galleryInfo = $this->gallery_model->getGalleryInfo($ref);

        $data = array(
            'galleryInfo' => $galleryInfo
        );

        if ($this->agent->is_mobile()) {
            $this->load->view('gallery_insert', $data);
        } elseif ($this->agent->is_mobile('ipad')) {
            $this->load->view('gallery_insert', $data);
        } else {
            $this->load->view('gallery_insert', $data);
        }
    }

    public function add_gallery_content() {
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
			'title' => $i->post('txtTitle'),
			'synopsis' => $i->post('txtSynopsis'),
            'description' => $i->post('txtDesc'),
            'image' => $gambarFix,
			'status' => '1',
			'created' => date('Y-m-d H:i:s')
		);

		$this->gallery_model->insertContent($data);

		redirect(base_url() . 'gallery/?n=' . $cg->encryptStr('insert content gallery success'));
    }

    public function edit($ref = 0) {

        $galleryInfo = $this->gallery_model->getGalleryInfo($ref);

        $data = array(
            'galleryInfo' => $galleryInfo
        );

        if ($this->agent->is_mobile()) {
            $this->load->view('gallery_update', $data);
        } elseif ($this->agent->is_mobile('ipad')) {
            $this->load->view('gallery_update', $data);
        } else {
            $this->load->view('gallery_update', $data);
        }
    }

    public function update_gallery_content() {
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
            'id_gallery' => $i->post('txtIDGal'),
			'title' => $i->post('txtTitle'),
			'synopsis' => $i->post('txtSynopsis'),
            'description' => $i->post('txtDesc'),
            'image' => $gambarFix,
			'status' => '1',
			'updated' => date('Y-m-d H:i:s')
		);

		$this->gallery_model->updateContent($data);

		redirect(base_url() . 'gallery/?n=' . $cg->encryptStr('update content gallery success'));
    }

}