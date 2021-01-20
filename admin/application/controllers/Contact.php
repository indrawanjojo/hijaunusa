<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {

  public function __construct() {
		parent::__construct();
		$this->CI =& get_instance();
		// $this->load->model('users_model');
        $this->load->library('cls_login');
        $this->load->model('setting_model');

    }

	public function index()
	{

	}

  public function setting($ref=1)
  {
    $getSettingInfo = $this->setting_model->getSettingInfo($ref);

    $row = $this->setting_model->get_all();
		$provinsiselect = $row->id_province . '-' . $row->province_name;
		$kotaselect = $row->id_city.'-'.$row->city_name;
		$kotanama = $row->city_name;

    $data = array(
      'settingInfo' => $getSettingInfo,
      'provinsiselect' => $provinsiselect,
			'kotaselect' => $kotaselect,
      'kotanama' => $kotanama,
      'provinsidata' => $this->province(),

    );

		$this->load->view('contact_us', $data);
  }

  public function province()
	{
		return $this->setting_model->get_province();
	}

	function city()
	{
		$id = $this->input->post('id', TRUE);
		$result = $this->setting_model->city($id);
		echo json_encode($result);
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

    $data_provinsi = array_map("trim",explode('-', $i->post('provinsi')));
	  $data_kota = array_map("trim",explode('-', $i->post('oricity')));

    $data = array (
      'id' => $i->post('txtId'),
      'address' => $i->post('txtAddress'),
      'id_province' => $data_provinsi[0],
			'province_name' => $data_provinsi[1],
      'id_city' => $data_kota[0],
			'city_name' => $data_kota[1],
      'pos_code' => $i->post('txtPosCode'),
      'web_name' => $i->post('txtWebName'),
      'description' => $i->post('txtDesc'),
      'logo' => $gambarFix,
      'url' => $i->post('txtUrl'),
      'lattitude' => $i->post('txtLat'),
      'longitude' => $i->post('txtLong'),
      'url_map' => $i->post('txtUrlMap')
    );

    $this->setting_model->updateContact($data);

    redirect(base_url() . 'contact/setting/?n=' . $cg->encryptStr('update success'));
  }
}
