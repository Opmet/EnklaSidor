<?php if ( ! defined('BASEPATH')) exit('Ingen direkt åtkomst tillåts');

class Welcome extends CI_Controller {

	/**
	 * Konstruktor
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->library('MySession');
	}
	
	/**
	 * Default controller route.
	 */
	public function index()
	{
		//Visa 404 om sidan inte finns.
		if ( ! file_exists(APPPATH.'/views/welcome/home.php'))
		{
			show_404();
		}
		
		$this->load->helper('url');
		
		$this->load->view('templates/header');
		$this->load->view('welcome/home.php');
		$this->load->view('templates/footer');
	}
	
	/**
	 * Wiew controller.
	 *
	 * @param string $page webbsidan som ska köras.
	 */
	public function view($page = 'home')
	{
	
		//Visa 404 om sidan inte finns.
		if ( ! file_exists(APPPATH.'/views/welcome/'.$page.'.php'))
		{
			show_404();
		}
		
		$this->load->helper('url');
	
		$this->load->view('templates/header');
		$this->load->view('welcome/'.$page);
		$this->load->view('templates/footer');
	
	}
}