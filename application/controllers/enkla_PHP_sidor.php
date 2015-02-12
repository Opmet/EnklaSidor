<?php
/**
 * Kontroller för 6st enkla webbsidor med php på serversidan.
 */
class Enkla_PHP_sidor extends CI_Controller {
	
	public function view($page)
	{
		$this->load->model('enkel_model'); // Laddar modell.
		$this->load->helper('url');
		$data = []; // Tom behållare.
	
		//Visa 404 om sidan inte finns.
		if ( ! file_exists(APPPATH.'/views/enkla_PHP_sidor/'.$page.'.php'))
		{
			show_404();
		}
		
		// Kör modellen.
		switch ($page) {
			case "php_sida_1":
				$data = $this->enkel_model->page1();
				break;
			case "php_sida_2":
				$data = $this->enkel_model->page2();
				break;
			case "php_sida_3":
				$data = $this->enkel_model->page3();
				break;
			case "php_sida_4":
				$data = $this->enkel_model->page4();
				break;
			case "php_sida_5":
				echo "i is bar";
				break;
			case "php_sida_6":
				echo "i is cake";
				break;
		}
	
		$this->load->view('templates/header_Navs');
		$this->load->view('enkla_PHP_sidor/'.$page, $data);
		$this->load->view('templates/footer');
	}
}