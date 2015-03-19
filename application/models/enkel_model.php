<?php if ( ! defined('BASEPATH')) exit('Ingen direkt åtkomst tillåts');

/**
 * Model till första uppgiften.
 */
class Enkel_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}
	
	/**
	 * Validerar en sträng.
	 * 
	 * @param string $p_str inmatning som ska valideras.
	 * @return string retunerar den validerade strängen.
	 */
	private function test_input($p_str)
	{
		$str = trim($p_str);
		$str = stripslashes($p_str);
		$str = htmlspecialchars($p_str);
		
		return $str;
	}
	
	/**
	 * Omkrets och area på en triangel.
	 * Omkrets = 2b+2h = 2(b+h)
	 *
	 * @param float p_langd triangelns längd.
	 * @param float p_bredd triangelns bredd.
	 * @return array En triangels omkrets och area.
	 */
	private function beraknaOmkrets( $p_langd,$p_bredd )
	{
		$data = []; // Tom array.
		
		$data['omkrets'] = 2 * ($p_langd + $p_bredd); //Beräknar omkrets
		$data['area'] = $this->beraknaArea($p_langd,$p_bredd); //Beräknar area
		
		return $data;
	}
	
	/**
	 * Beräknar area på en triangel.
	 * Area = b*h
	 *
	 * @param float p_langd triangelns längd.
	 * @param float p_bredd triangelns bredd.
	 * @return float En triangels area.
	 */
	private function beraknaArea( $p_langd,$p_bredd )
	{
		return ( $p_langd * $p_bredd );
	}
	
	/**
	 * Validerar inmatning från ett formulär som gäller ett namn.
	 *
	 * @uses $_POST['strNamn'] Ett namn.
	 * @return array En array med ett validerat namn.
	 */
	public function page1()
	{
		$data = []; // Tom array.
	
		// Om post är aktiv. Validera.
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$data['strNamn'] = $this->test_input($_POST["strNamn"]);
		}
	
		return $data;
	}
	
	/**
	 * Behandlar inmatning från ett formulär som gäller djurbesättning.
	 * 
	 * @uses $_POST['djur1'] Djur ett.
	 * @uses $_POST['djur2'] Djur två.
	 * @uses $_POST['djur3'] Djur tre.
	 * @return array En array med tre validerade djur.
	 */
	public function page2()
	{
		$data = []; // Tom array.
	
		// Om post är aktiv. Validera
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$data['arrBondgard1'] = $this->test_input($_POST["djur1"]);
			$data['arrBondgard2'] = $this->test_input($_POST["djur2"]);
			$data['arrBondgard3'] = $this->test_input($_POST["djur3"]);
			
			$data['$arrRå'] = $data;
		}
	
		return $data;
	
	}
	
	/**
	 * Validerar inmatning från ett formulär som gäller en villkorssats.
	 *
	 * @uses $_POST['varde1'] Värde ett.
	 * @uses $_POST['varde2'] Värde två.
	 * @return array En array med två validerade värden.
	 */
	public function page3()
	{
		$data = []; // Tom array.
	
		// Om post är aktiv. Validera
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$data['arrVarden1'] = $this->test_input($_POST["varde1"]);
			$data['arrVarden2'] = $this->test_input($_POST["varde2"]);
		}
	
		return $data;
	
	}
	
	/**
	 * Behandlar inmatning från ett formulär som gäller en triangel.
	 * 
	 * @uses $_POST['radio'] Anger vilken radio knapp som är intryckt.
	 * @uses $_POST['langd'] Anger längd på en triangel.
	 * @uses $_POST['bredd'] Anger bredd på en triangel.
	 * @return array En array med validerad och beräknad inmatning.
	 */
	public function page4()
	{
		$data = []; // Tom array.
	
		// Om post är aktiv. Validera och beräkna.
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$data['radio'] = $this->test_input($_POST["radio"]);
			$langd = (float) $this->test_input($_POST["langd"]);
			$bredd = (float) $this->test_input($_POST["bredd"]);
			$output = $this->beraknaOmkrets($langd, $bredd); //Skriver till omkrets och area.
			$data = array_merge($data, $output); //Slår ihop
		}
	
		return $data;
	
	}
	
	/**
	 * Validerar inmatning från ett formulär som gäller att välja data överföring.
	 * 
	 * @uses $_REQUEST["data"] Vilken radio knapp som är intryckt.
	 * @uses $_REQUEST["namn"] Användarens namn.
	 * @uses $_REQUEST["telefon"] Användarens telefonnummer.
	 * @return array En array med validerad data.
	 */
	public function page6()
	{
		$data = []; // Tom array.
		
		// Om request är aktiv. Validera.
		if ( isset($_REQUEST["data"]) ) {
			$data['data'] = $this->test_input($_REQUEST["data"]);
			$data['namn'] = $this->test_input($_REQUEST["namn"]);
			$data['telefon'] = $this->test_input($_REQUEST["telefon"]);
		}
	
		return $data;
	
	}
}