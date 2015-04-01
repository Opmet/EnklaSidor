<?php if ( ! defined('BASEPATH')) exit('Ingen direkt åtkomst tillåts');

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
	 *  @return array Märkdata till vyn om login fungerade eller inte.
	 */
	public function login()
	{
		$data = []; // Tom array.
		$data['message'] = false; //inget medelande.
		$account = false;
		
		// Om post är aktiv. Validera inmatning, hämta kontot och logga in.
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$data['email'] = $this->my_form_validation->test_input($_POST["email"]);
			$data['password'] = $this->my_form_validation->test_input($_POST["password"]);
			
			// Kontrollera om epost och lösenordet är satt.
			$data['email_is_set'] = $email = $this->my_form_validation->is_string_set($data['email']);
			$data['password_is_set'] = $password = $this->my_form_validation->is_string_set($data['password']);
			
			// Om epost och lösenordet är satt.
			if( $email == true && $password == true ){
				$account = $this->findAccount($data['email'], $data['password']); // Hämta kontot.
				
				// Om kontot finns.
				if ($account !== false) {
					
					// Om versaler och gemener stämmer i lösenordet.
					if (strpos($account,$data['password']) !== FALSE) {
						
						// Skapa session.
						if ( $this->mysession->is_session_started() === FALSE ) {
							session_start();
							$_SESSION['session'] = '1';
							$data['message'] = 'Välkomen, du är nu inloggad!';
						}
					}else{ $data['message'] = 'Felaktigt användarnamn och/eller felaktigt lösenord!';}
					
				}else{ $data['message'] = 'Felaktigt användarnamn och/eller felaktigt lösenord!';}
			}
		}
		
		return $data;
	}
	
	/**
	 *  En användare loggar ut från sitt konto.
	 */
	public function logout()
	{
		//Starta session om inaktiv.
		if ( $this->mysession->is_session_started() === FALSE ) session_start();
		
		// Om session variabel är aktiv avsluta.
		if( isset($_SESSION["session"]) ) {
			session_unset();
			session_destroy();
		}
	}
	
	/**
	 * En användare skapar ett nytt konto på fil.
	 * @return array Om kontot kunde skapas eller inte.
	 */
	public function newAccount()
	{
		$data = []; // Tom array.
		
		// Om post är aktiv. Validera och skriv till fil.
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$data['name'] = $this->my_form_validation->test_input($_POST["name"]);
			$data['email'] = $this->my_form_validation->test_input($_POST["email"]);
			$data['password'] = $this->my_form_validation->test_input($_POST["password"]);
			
			//Om lösenordet innehåller 3 eller fler tecken skapa kontot.
			//Annars skicka felmedelande.
			if ( strlen($data['password']) >= 3 )
			{
				// Skriver användardatan till fil.
				$data['message'] = $this->createAccount($data['name'], $data['email'], $data['password']);
			}else{
				$data['message'] = 'Lösenordet måste innehålla minst 3 tecken!';
			}
		}
		
		return $data;
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
	
		if (!write_file('./files/accounts.txt', $filedata, 'a'))
		{
			$message = 'Kunde inte skapa konto!';
		}else{
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
}