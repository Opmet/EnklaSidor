<?php if ( ! defined('BASEPATH')) exit('Ingen direkt åtkomst tillåts');
/**
 * 
 */
class Blog extends CI_Controller {
	
	private $m_headlab = []; // Tom behållare för vy märken.
	
	/**
	 * Konstruktor
	 */
	public function __construct()
	{
		parent::__construct();
		
		$this->load->library('MySession');
		$this->load->database();
		
		// Används för att visa vilken navigations länk som ska vara aktiv i vyn.
		$this->m_headlab['header_nav_link1'] = '';
		$this->m_headlab['header_nav_link2'] = '';
		$this->m_headlab['header_nav_link3'] = '';
		$this->m_headlab['header_nav_link4'] = ' class="active"';
	}
	
	/**
	 * Användaren skickar epost till oss.
	 */
	public function index()
	{
		$this->load->helper('url');
		//$this->load->model('javascript_model'); // Laddar modell.
		//$data = $this->javascript_model->sendMail(); // Kör modell
		
		$this->view('index.php', null); // Kör vyn.
	}
	
	/**
	 * Sammanställer vyn.
	 * @param string $p_page Webbsidan som vyn ska rendera.
	 * @param array $p_data Vy märken.
	 */
	private function view($p_page, $p_data)
	{
		//Visa 404 om sidan inte finns.
		if ( ! file_exists(APPPATH.'/views/blog/' . $p_page))
		{
			show_404();
		}
	
		$this->load->view('templates/header', $this->m_headlab);
		$this->load->view('blog/' . $p_page , $p_data);
		$this->load->view('templates/footer');
	}
}