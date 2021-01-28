<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->CI = &get_instance();
		$this->load->model('home_model');

	}

	public function index()
	{

		$ip    = $this->input->ip_address(); // Mendapatkan IP user
    $date  = date("Y-m-d"); // Mendapatkan tanggal sekarang
    $waktu = time(); //
    $timeinsert = date("Y-m-d H:i:s");
    $user_agent = $this->input->user_agent();
    $os = $this->agent->platform();
    $browser = $this->agent->browser();

    // Cek berdasarkan IP, apakah user sudah pernah mengakses hari ini
    $s = $this->db->query("SELECT * FROM visitor WHERE ip_address='".$ip."' AND date='".$date."'")->num_rows();
    $ss = isset($s)?($s):0;

    // Kalau belum ada, simpan data user tersebut ke database
    if($ss == 0){
    $this->db->query("INSERT INTO visitor(ip_address, date, hits, waktu_online, user_agent, os, browser, time) VALUES('".$ip."','".$date."','1','".$waktu."', '".$user_agent."', '".$os."', '".$browser."', '".$timeinsert."')");
    }

    // Jika sudah ada, update
    else{
    $this->db->query("UPDATE visitor SET hits=hits+1, waktu_online='".$waktu."', user_agent='".$user_agent."', os='".$os."', browser='".$browser."' WHERE ip_address='".$ip."' AND date='".$date."'");
    }


    $pengunjunghariini  = $this->db->query("SELECT * FROM visitor WHERE date='".$date."' GROUP BY id")->num_rows(); // Hitung jumlah pengunjung

    $dbpengunjung = $this->db->query("SELECT COUNT(hits) as hits FROM visitor")->row();

    $totalpengunjung = isset($dbpengunjung->hits)?($dbpengunjung->hits):0; // hitung total pengunjung

    $bataswaktu = time() - 300;

    $pengunjungonline  = $this->db->query("SELECT * FROM visitor WHERE waktu_online > '".$bataswaktu."'")->num_rows(); // hitung pengunjung online


    $data['pengunjunghariini']=$pengunjunghariini;
    $data['totalpengunjung']=$totalpengunjung;
    $data['pengunjungonline']=$pengunjungonline;

		$contactUsList = $this->home_model->getContactUs();
		$sosmedList = $this->home_model->getSosmed();
		$bannerData = $this->home_model->getDataBanner();

		$data = array(
			'contactUsList' => $contactUsList,
			'sosmedList' => $sosmedList,
			'bannerData' => $bannerData
		);

		$this->load->view('home', $data);
	}
}
