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
	 *  
	 *  För enkelhetens skull används codeigniters egna fil helper för att skriva till filen.
	 *  @link https://ellislab.com/codeIgniter/user-guide/helpers/file_helper.html Codeigniters file helper.
	 *  
	 *  @param string $name Användarens namn.
	 *  @param string $email Användarens epost.
	 *  @param string $password Användarens lösenord.
	 *  
	 *  @return string Om kontot kunde skapas eller inte.
	 */
	public function createAccount($name,$email,$password)
	{
		$filedata = 'Namn=' . $name . ';Epost=' . $email . ';Lösenord=' . $password . ";\n";
		$message;
		
		if ( ! write_file('./files/accounts.txt', $filedata, 'a'))
		{
			$message = 'Kunde inte skapa konto!';
		}
		else
		{
			$message = 'Ditt konto har skapats!';
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
		
		// Om post är aktiv. Validera och skriv till fil.
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$data['name'] = $this->test_input($_POST["name"]);
			$data['email'] = $this->test_input($_POST["email"]);
			$data['password'] = $this->test_input($_POST["password"]);
			
			// Skriver användardatan till fil.
			$data['message'] = $this->createAccount($data['name'], $data['email'], $data['password']);
			
		}
		
		return $data;
	}
}