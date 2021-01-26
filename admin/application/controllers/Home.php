<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct() {
		parent::__construct();
				$this->CI =& get_instance();
				$this->load->model('banner_model');
				$this->load->model('setting_model');
        $this->load->library('cls_login');

    }

    public function index() {

			$dataVisit = $this->setting_model->get_data_visitor();
			$dataDeviceVisit = $this->setting_model->getVisitorDevice();
			$dataDevice = $this->setting_model->getDevice();
			$dataResult['data'] = json_encode($dataVisit);

			$totVis = $this->setting_model->totalVisitor();
			$totVisOnDay = $this->setting_model->totalVisitorOnDay();

			foreach ($dataDeviceVisit as $dataDeviceVisit) {
				$dataDV[] = $dataDeviceVisit->device;
			}

			foreach ($dataDevice as $dataDevice) {
				$dataDeviceVis[] = $dataDevice->browser;
			}

			$dataResult['dataDevVis'] = json_encode($dataDV);
			$dataResult['dataDevice'] = json_encode($dataDeviceVis);

			$dataResult['totalVisitor'] = json_decode($totVis->total_visitor);
			$dataResult['totalVisitorOnDay'] = json_decode($totVisOnDay->total_visitor);

        if ($this->agent->is_mobile()) {
            $this->load->view('home', $dataResult);
        } elseif ($this->agent->is_mobile('ipad')) {
            $this->load->view('home', $dataResult);
        } else {
            $this->load->view('home', $dataResult);
        }
    }

    public function banner() {

        $getBannerList = $this->banner_model->get_all();

        $data = array (
            'bannerList' => $getBannerList
        );

        if ($this->agent->is_mobile()) {
            $this->load->view('banner_list', $data);
        } elseif ($this->agent->is_mobile('ipad')) {
            $this->load->view('banner_list', $data);
        } else {
            $this->load->view('banner_list', $data);
        }
    }

    public function banner_insert($ref = 0) {

        $getDataBanner = $this->banner_model->getDataBanner($ref);

        $data = array (
            'bannerInfo' => $getDataBanner
        );

        if ($this->agent->is_mobile()) {
            $this->load->view('banner_insert', $data);
        } elseif ($this->agent->is_mobile('ipad')) {
            $this->load->view('banner_insert', $data);
        } else {
            $this->load->view('banner_insert', $data);
        }
    }

		public function banner_add()
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
				'title' => $i->post('txtTitle'),
				'description' => $i->post('txtDesc'),
				'image' => $gambarFix,
				'status' => '1',
				'created' => date('Y-m-d H:i:s')
			);

			$this->banner_model->insertBanner($data);

			redirect(base_url() . 'home/banner/?n=' . $cg->encryptStr('insert content gallery success'));
		}

		public function banner_edit($ref=0)
		{
			$getDataBanner = $this->banner_model->getDataBanner($ref);

			$data = array (
					'bannerInfo' => $getDataBanner
			);

			if ($this->agent->is_mobile()) {
					$this->load->view('banner_update', $data);
			} elseif ($this->agent->is_mobile('ipad')) {
					$this->load->view('banner_update', $data);
			} else {
					$this->load->view('banner_update', $data);
			}
		}

		public function banner_update()
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
				'id_banner' => $i->post('txtIDBanner'),
				'title' => $i->post('txtTitle'),
				'description' => $i->post('txtDesc'),
				'image' => $gambarFix,
				'status' => '1',
				'updated' => date('Y-m-d H:i:s')
			);

			$this->banner_model->updateBanner($data);

			redirect(base_url() . 'home/banner/?n=' . $cg->encryptStr('update banner success'));
		}

}
