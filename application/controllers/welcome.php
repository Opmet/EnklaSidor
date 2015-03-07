<?php if ( ! defined('BASEPATH')) exit('Ingen direkt åtkomst tillåts');

class Welcome extends CI_Controller {
	
	private $m_headlab = []; // Tom behållare för vy märken.

	/**
	 * Konstruktor
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('MySession');
		
		$this->m_headlab['header_nav_link1'] = ' class="active"';
		$this->m_headlab['header_nav_link2'] = '';
	}
	
	/**
	 * Default controller route.
	 */
	public function index()
	{
		$this->view('about.php'); // Kör vyn.
	}
	
	/**
	 * Hanterar klick på Om länk.
	 */
	public function about()
	{
		$this->view('about.php'); // Kör vyn.
	}
	
	/**
	 * Sammanställer vyn.
	 * @param string $p_page Webbsidan som vyn ska rendera.
	 */
	public function view($p_page)
	{
	
		//Visa 404 om sidan inte finns.
		if ( ! file_exists(APPPATH.'/views/welcome/'.$p_page))
		{
			show_404();
		}
		
		$this->load->view('templates/header', $this->m_headlab);
		$this->load->view('welcome/'.$p_page);
		$this->load->view('templates/footer');
	
	}
}