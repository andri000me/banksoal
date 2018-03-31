<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if ( ! function_exists('encrypt_url'))
{
	function encrypt_url($string, $url_safe=TRUE) {
		$CI =& get_instance();
		$CI->load->library('encryption');

		$ret = $CI->encryption->encrypt($string);

		if($url_safe) {
			$ret = strtr($ret, array('+'=>'.', '='=>'-', '/'=>'~'));
		}

		return $ret;
	}
}

if ( ! function_exists('decrypt_url'))
{
	function decrypt_url($string) {
		$CI =& get_instance();
		$CI->load->library('encryption');

		$string = strtr($string, array('.'=>'+', '-'=>'=', '~'=>'/'));

		return $CI->encryption->decrypt($string);
	}
}
