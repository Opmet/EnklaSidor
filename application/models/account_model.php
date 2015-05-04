<?php if ( ! defined('BASEPATH')) exit('Ingen direkt åtkomst tillåts');

/**
 * Account modell. En användare kan skapa ett konto på fil och logga in.
 */
class Account_model extends CI_Model {
	
	function __construct()
	{
		parent::__construct();
		
		$this->load->database();
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
			$data['name'] = $this->my_form_validation->test_input($_POST["name"]);
			$data['password'] = $this->my_form_validation->test_input($_POST["password"]);
			
			// Kontrollera om namn och lösenordet är satt.
			$data['name_is_set'] = $name = $this->my_form_validation->is_string_set($data['name']);
			$data['password_is_set'] = $password = $this->my_form_validation->is_string_set($data['password']);
			
			// Om namn och lösenordet är satt.
			if( $name == true && $password == true ){
				$account = $this->testAccount($data['name'], $data['password']); // Kontrollera att kontot finns.
				
				// Om kontot finns.
				if ($account !== false) {
					
					// Om versaler och gemener stämmer i lösenordet.
					if (strpos($account,$data['password']) !== FALSE) {
						
						// Skapa session.
						if ( $this->mysession->is_session_started() === FALSE ) {
							session_start();
							$_SESSION['session'] = $data['name'];
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
	 * @deprecated Ersatt med funktionen register().
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
	 * Användare registrerar sig.
	 * @return array Om kontot kunde skapas eller inte.
	 */
	public function register()
	{
		$data = []; // Tom array.
	
		// Om post är aktiv. Validera och registrera konto i databasen.
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$data['name'] = $this->my_form_validation->test_input($_POST["name"]);
			$data['email'] = $this->my_form_validation->test_input($_POST["email"]);
			$data['password'] = $this->my_form_validation->test_input($_POST["password"]);
			
			// Kontrollera om namn och lösenordet är satt.
			$data['name_is_set'] = $name = $this->my_form_validation->is_string_set($data['name']);
			$data['password_is_set'] = $password = $this->my_form_validation->is_string_set($data['password']);
			
			// Om namn och lösenordet är satt.
			// Annars skicka felmedelande.
		    if( $name == true && $password == true ){
			
			   //Om namnet inte redan är upptaget i databasen.
			   //Annars skicka felmedelande.
			   if( !$this->testName( $data['name'] ) ){
			
			      //Om lösenordet innehåller 3 eller fler tecken skapa kontot.
			      //Annars skicka felmedelande.
			      if ( strlen($data['password']) >= 3 )
			      {
				      // Skriver användardatan till databas.
				      $data['message'] = $this->registerAccount($data['name'], $data['email'], $data['password']);
			      }
			      else{$data['message'] = 'Lösenordet måste innehålla minst 3 tecken!';}
			   
			   }
			   else{$data['message'] = 'Kunde inte skapa konto!' . "<br/>Namnet är upptaget! ";}
		      }
		      else{$data['message'] = 'Alla fält måste vara ifyllda!';}
		   }
	
		return $data;
	}
	
	/**
	 *  Skriver användardata till fil.
	 *
	 *  @deprecated Ersatt med funktionen registerAccount().
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
	 *  Skriver användardata till databas.
	 *
	 *  @param string $p_name Användarens namn.
	 *  @param string $p_email Användarens epost.
	 *  @param string $p_password Användarens lösenord.
	 *
	 *  @return string Om kontot kunde skapas eller inte.
	 */
	private function registerAccount($p_name,$p_email,$p_password)
	{
		$sql = "INSERT INTO User (username, email, password)
        VALUES (".$this->db->escape($p_name).", ".$this->db->escape($p_email).", ".$this->db->escape($p_password).")";
		
		// Om kontot inte kunde skapas skicka felmeddelande.
		// Annars kunde kontot skapas.
		if (!$this->db->query($sql))
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
	 *  @deprecated Ersatt med funktionen testAccount().
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
	 *  Kontrollera att kontot finns.
	 *
	 *  @param string $p_name Namn.
	 *  @param string $p_password Lösenord.
	 *
	 *  @return string boolean Om kontot hittas retuneras tillhörande lösenord annars false.
	 */
	private function testAccount($p_name,$p_password)
	{
		$account = false;
		
		$sql = "SELECT password FROM User WHERE username=" . $this->db->escape($p_name);
		$query = $this->db->query($sql);
		
		foreach ($query->result() as $row)
		{
			$account = $row->password;
		}
		
		return $account;
	}
	
	/**
	 *  Kontrollerar om namnet finns i databasen.
	 *
	 *  @param string $p_name Namn.
	 *  @return string boolean Om namnet finns i databasen retuneras true annars false.
	 */
	private function testName($p_name)
	{
		$testName = false;
	
		$sql = "SELECT username FROM User WHERE username=" . $this->db->escape($p_name);
		$query = $this->db->query($sql);
		
		//Om namnet finns i databasen. Sätt true.
		if( $query->num_rows() === 1 ){ $testName = true; }
		
		return $testName;
	}
}