<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Webbutveckling extends CI_Controller {

	/**
	 * Default controller route.
	 */
	public function index()
	{
		//Visa 404 om sidan inte finns.
		if ( ! file_exists(APPPATH.'/views/webbutveckling/home.php'))
		{
			show_404();
		}
		
		$this->load->helper('url');
		
		$this->load->view('templates/header');
		$this->load->view('webbutveckling/home.php');
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
		if ( ! file_exists(APPPATH.'/views/webbutveckling/'.$page.'.php'))
		{
			show_404();
		}
		
		$this->load->helper('url');
	
		$this->load->view('templates/header');
		$this->load->view('webbutveckling/'.$page);
		$this->load->view('templates/footer');
	
	}
}