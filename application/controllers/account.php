<?php if ( ! defined('BASEPATH')) exit('Ingen direkt åtkomst tillåts');
/**
 * Hanterar användarkonton.
 */
class Account extends CI_Controller {
	
	/**
	 * Konstruktor
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->library('My_Form_validation');
		$this->load->library('MySession');
		$this->load->helper('url');
	}
	
	/**
	 * Hanterar inloggning.
	 */
	public function login()
	{
		$this->load->helper('file');
		$this->load->model('account_model'); // Laddar modell.
		$data = $this->account_model->login(); // Kör modell
		
		$this->view('login.php', $data); // Kör vyn.
	}
	
	/**
	 * Hanterar utloggning.
	 */
	public function logout()
	{
		$this->load->model('account_model'); // Laddar modell.
		$this->account_model->logout(); // Kör modell
		
		echo "<script type='text/javascript'>alert( 'Du har nu loggat ut!' );</script>";

		redirect( 'webbutveckling/view', 'refresh');
	}
	
	/**
	 * Hanterar skapandet av nytt användarkonto.
	 */
	public function create_new_account()
	{
		$this->load->helper('file');
		$this->load->model('account_model'); // Laddar modell.
		$data = $data = $this->account_model->newAccount(); // Kör modell
		
		$this->view('new_account.php', $data); // Kör vyn.
	}
	
	/**
	 * Sammanställer vyn.
	 * @param string $p_page Webbsidan som vyn ska rendera.
	 * @param array $p_data Vy märken.
	 */
	private function view($p_page, $p_data)
	{
		//Visa 404 om sidan inte finns.
		if ( ! file_exists(APPPATH.'/views/account/' . $p_page))
		{
			show_404();
		}
	
		$this->load->view('templates/header_Navs');
		$this->load->view('account/' . $p_page , $p_data);
		$this->load->view('templates/footer');
	}
}