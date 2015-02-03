<?php
class Enkel_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}
	
	function printText()
	{
		define('TEXT', 'Denna text är genererad med utskriftskommandot i PHP');
		//$text = "Denna text är genererad med utskriftskommandot i PHP";
		return TEXT;
	}
}