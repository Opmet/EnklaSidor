<?php if ( ! defined('BASEPATH')) exit('Ingen direkt åtkomst tillåts');

/**
 * Skicka epost till mig.
 */
class Javascript_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
		$this->load->library('My_Form_validation');
	}
	
	/**
	 * Metoden skickar epost till mig skälv.
	 *
	 * @uses $_POST['name'] Webbanvändarens namn.
	 * @uses $_POST['email'] Webbanvändarens svars adress.
	 * @uses $_POST['message'] Meddelandet.
	 * @return array Märkdata till vyn. Gick det skicka epost?.
	 */
	public function sendMail()
	{
		$data = []; // Tom array.
	
		// Om post är aktiv. Validera.
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$from_user = $this->my_form_validation->test_input($_POST["name"]);
			$sender_email = $this->my_form_validation->test_input($_POST["email"]);
			$message = $this->my_form_validation->test_input($_POST["message"]);
			
			//Med UTF-8.
			$from_user = "=?UTF-8?B?".base64_encode($from_user)."?=";
			
			//Header
			$headers = "From: $from_user <$sender_email>\r\n".
					"MIME-Version: 1.0" . "\r\n" .
					"Content-type: text/html; charset=UTF-8" . "\r\n";
			
			// Skicka epost till mig skälv.
			$data['message'] = mail('joakim@itandersson.se', 'Auto post', $message, $headers);
		}
		
		return $data;
	}
}