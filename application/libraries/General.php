<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */
class General
{

	// SET SUPER GLOBAL
	var $CI = NULL;
	public function __construct() {
		$this->CI =& get_instance();
	}

	public function getQueryStr($key){
		if (isset($_GET[$key])){
			return $_GET[$key];
		}
		return "";
	}

  public function path() {
    $path = 'http://localhost/hijaunusaflooring/admin/';
    return $path;
  }

}
