<?php
/**
 * Model till första uppgiften.
 */

class Enkel_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}
	
	/**
	 * Validerar användarens inmatning i $_POST superglobal.
	 * @param string $strNamn inmatning som ska valideras.
	 * @return string retunerar den validerade strängen.
	 */
	function test_input($strNamn)
	{
		$strNamn = trim($strNamn);
		$strNamn = stripslashes($strNamn);
		$strNamn = htmlspecialchars($strNamn);
		
		return $strNamn;
	}
}