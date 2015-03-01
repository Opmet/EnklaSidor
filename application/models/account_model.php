<?php
/**
 * Account modell. En användare kan skapa ett konto på fil och logga in.
 */

class Account_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}
	
	/**
	 *  En användare loggar in till sitt konto.
	 */
	public function login()
	{
		$data = []; // Tom array.
		
		// Om post är aktiv. Validera inmatning, hämta kontot och logga in.
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$data['email'] = $this->test_input($_POST["email"]);
			$data['password'] = $this->test_input($_POST["password"]);
				
			// Hämtar kontot från fil.
			$account = $this->findAccount($data['email'], $data['password']);
			
			// Om kontot finns försök skapa en session. 
			// Annars om kontot inte finns skicka ett felmedelande.
			if ( $account !== false ) {

				$data['message'] = $this->createSession($account, $data['password']);
				//$data['message'] = $this->createSession(1,1);
				//$data['message'] = "Test!";
			}
			else
			{
				$data['message'] = 'Felaktigt användarnamn och/eller felaktigt lösenord!';
			}
				
		}
		
		return $data;
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
	 *  @param string $p_name Användarens namn.
	 *  @param string $p_email Användarens epost.
	 *  @param string $p_password Användarens lösenord.
	 *
	 *  @return string Om kontot kunde skapas eller inte.
	 */
	private function createAccount($p_name,$p_email,$p_password)
	{
		$filedata = 'Namn=' . $p_name . ';Epost=' . $p_email . ';Lösenord=' . $p_password . ";\n";
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
	 *  Hämtar ett konto.
	 *
	 *  För enkelhetens skull används codeigniters egna fil helper för att skriva till filen.
	 *  @link https://ellislab.com/codeIgniter/user-guide/helpers/file_helper.html Codeigniters file helper.
	 *
	 *  @param string $p_email Epost.
	 *  @param string $p_password Lösenord.
	 *
	 *  @return string boolean Om kontot hittas retunerar en sträng annars false.
	 */
	private function findAccount($p_email,$p_password)
	{
		$findme = 'Epost=' . $p_email . ';Lösenord=' . $p_password . ";";
		$account = false;
		$start = false;
		$end = false;
	
		// Laddar in filen i en String.
		$file = read_file('./files/accounts.txt');
	
		// Hitta början och slutet på kontot med Skiftläges-okänslig strängsökning.
		$start = stripos($file, $findme);
		$end = stripos($file, "\n", $start);
	
		// Om $start inte är false så finns epost och lösenord i filen.
		if ($start !== false) {;
		$length = strlen($file); // Räkna ut fil-längden
			
		$account = substr($file, $start, ($end - $length) ); // Substring
		}
	
		return $account;
	}
	
	/**
	 *  Skapar en session om versaler och gemener stämmer i lösenordet.
	 *
	 *  @param string $p_account Kontot
	 *  @param string $p_account Lösenordet
	 *  @return string Medelande till användaren om en session skapats eller inte.
	 */
	private function createSession($p_account,$p_password)
	{
		$message = "Konto: " . $p_account . "Lösen: " . $p_password;
	
		// Om versaler och gemener inte stämmer i lösenordet skicka felmedelande.
		// Annars skapa en session
		if ( strpos($p_account,$p_password) === false ) {
			$message = 'Felaktigt användarnamn och/eller felaktigt lösenord!';
		}
		else
		{
			session_start();
			$_SESSION["session"] = "1";
			$message = 'Välkomen, du är nu inloggad!';
		}
	
		return $message;
	}
}