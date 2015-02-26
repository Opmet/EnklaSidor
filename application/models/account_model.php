<?php
/**
 * Login modell.
 */

class Account_model extends CI_Model {

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
	 *  Skriver användardata till fil.
	 */
	public function createAccount($name,$email,$password)
	{
		$filedata = 'Namn=' . $name . ';Epost=' . $email . ';Lösenord=' . $password . ';\n';
		$message;
		
		if ( ! write_file('./files/accounts.txt', $filedata, 'a'))
		{
			$message = 'Unable to write the file';
		}
		else
		{
			$message = 'File written!';
		}
		
		return $message;
	}
	
	/**
	 *  En användare loggar in till sitt konto.
	 */
	public function login()
	{
		
	}
	
	/**
	 * En användare skapar ett nytt konto.
	 */
	public function newAccount()
	{
		$data = []; // Tom array.
		
		// Om post är aktiv. Validera.
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$data['name'] = $this->test_input($_POST["name"]);
			$data['email'] = $this->test_input($_POST["email"]);
			$data['password'] = $this->test_input($_POST["password"]);
			
		}
		
		$data['name'] = "Test";
		$data['email'] = "Test";
		$data['password'] = "Test";
		
		// Skriver användardata till fil.
		$data['test'] = $this->createAccount($data['name'], $data['email'], $data['password']);
		
		return $data;
	}
}