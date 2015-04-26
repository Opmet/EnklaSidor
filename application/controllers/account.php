<?php if ( ! defined('BASEPATH')) exit('Ingen direkt åtkomst tillåts');
/**
 * Hanterar inloggning och utloggning och skapande av nytt användarkonto.
 */
class Account extends CI_Controller {
	
	private $m_headlab = []; // Tom behållare för vy märken.
	
	/**
	 * Konstruktor
	 */
	public function __construct()
	{
		parent::__construct();
		
		$this->load->library('My_Form_validation');
		$this->load->library('MySession');
		$this->load->helper('url');
		
		// Används för att visa vilken navigations länk som ska vara aktiv i vyn.
		$this->m_headlab['header_nav_link1'] = '';
		$this->m_headlab['header_nav_link2'] = '';
		$this->m_headlab['header_nav_link3'] = '';
		$this->m_headlab['header_nav_link4'] = '';
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

		redirect( 'welcome/about', 'refresh');
	}
	
	/**
	 * Registrera nytt användarkonto.
	 */
	public function register()
	{
		$this->load->helper('file');
		$this->load->model('account_model'); // Laddar modell.
		$data = $data = $this->account_model->register(); // Kör modell
		
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
	
		$this->load->view('templates/header', $this->m_headlab);
		$this->load->view('account/' . $p_page , $p_data);
		$this->load->view('templates/footer');
	}
}