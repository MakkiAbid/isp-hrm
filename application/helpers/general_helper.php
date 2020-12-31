<?php


/**
*
* @returns CI instance
*
*/
if(!function_exists('getInstance')){
	function getInstance(){
		return $CI =& get_instance();
	}
}