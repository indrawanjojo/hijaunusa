<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Cls_general
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

	function generateRandomCode($length = 8) {
        // Available characters
        $chars = '0123456789abcdefghjkmnoprstvwxyz';

        $Code = '';
        // Generate code
        for ($i = 0; $i < $length; ++$i) {
            $Code .= substr($chars, (((int) mt_rand(0, strlen($chars))) - 1), 1);
        }
        return strtoupper($Code);
    }

    public function setting() {
        $this->CI->load->model('setting_model');
        $setting = $this->CI->setting_model->get_all();
        return $setting;
    }

	public function encryptStr( $string, $action = 'e' ) {

		if ($string != ""){
			// you may change these values to your own
		    $secret_key = 'pengenjalan_s_key';
		    $secret_iv = 'pengenjalan_s_iv';
		 
		    $output = false;
		    $encrypt_method = "AES-256-CBC";
		    $key = hash( 'sha256', $secret_key );
		    $iv = substr( hash( 'sha256', $secret_iv ), 0, 16 );
		 
		    if( $action == 'e' ) {
		        $output = base64_encode( openssl_encrypt( $string, $encrypt_method, $key, 0, $iv ) );
		    }
		    else if( $action == 'd' ){
		        $output = openssl_decrypt( base64_decode( $string ), $encrypt_method, $key, 0, $iv );
		    }
		 
		    return $output;
		}

	    return "";
	}

	public function path() {		
        $path = 'https://www.tokuonline.com/admin/';       
        return $path;
    }

	
	
	public $pageId_sUser = "sUser";
	public $pageId_sRoles = "sRoles";
	public $defaultRowCount = 30;
	public $defaultDisplayPage = 30;
}