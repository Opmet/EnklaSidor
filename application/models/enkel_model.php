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
	 * 
	 * @param string $strNamn inmatning som ska valideras.
	 * @return string retunerar den validerade strängen.
	 */
	private function test_input($strNamn)
	{
		$strNamn = trim($strNamn);
		$strNamn = stripslashes($strNamn);
		$strNamn = htmlspecialchars($strNamn);
		
		return $strNamn;
	}
	
	/**
	 * Skapar variablerna till sidans vy.
	 *
	 * @return array Retunerar sidans vy variabler.
	 */
	public function page1()
	{
		$data = []; // Tom array.
	
		// Om POST. Validera användarens inmatning och skapa variablerna till vyn.
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$data['strNamn'] = $this->test_input($_POST["strNamn"]);
		}
	
		return $data;
	}
	
	/**
	 * Skapar variablerna till sidans vy.
	 * 
	 * @return array Retunerar sidans vy variabler.
	 */
	public function page2()
	{
		$data = []; // Tom array.
	
		// Om POST. Validera användarens inmatning och skapa variablerna till vyn.
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$data['arrBondgard1'] = $this->test_input($_POST["djur1"]);
			$data['arrBondgard2'] = $this->test_input($_POST["djur2"]);
			$data['arrBondgard3'] = $this->test_input($_POST["djur3"]);
			
			$data['$arrRå'] = $data;
		}
	
		return $data;
	
	}
}