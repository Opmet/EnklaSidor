<?php if ( ! defined('BASEPATH')) exit('Ingen direkt åtkomst tillåts');

/**
 * Form validator
 */
class My_Form_validation {
	
	/**
	 * Validerar en sträng.
	 *
	 * @param string $p_str inmatning som ska valideras.
	 * @return string retunerar den validerade strängen.
	 */
	public function test_input($p_str)
	{
		$str = trim($p_str);
		$str = stripslashes($p_str);
		$str = htmlspecialchars($p_str);
	
		return $str;
	}
	
	/**
	 * Är strängen satt?
	 *
	 * @param string $p_str inmatning som ska valideras.
	 * @return boolean True om strängen är satt annars False.
	 */
	public function is_string_set($p_str)
	{
		$str_set = false;
		$check = strlen($p_str);
		if( $check !== 0 ){$str_set = true;}
		
		return $str_set;
	}
}