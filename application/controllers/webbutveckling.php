<?php

class Webbutveckling extends CI_Controller {

	public function view($page = 'home')
	{
	
		//Visa 404 om sidan inte finns.
		if ( ! file_exists(APPPATH.'/views/webbutveckling/'.$page.'.php'))
		{
			show_404();
		}
	
		$data['title'] = ucfirst($page); // Capitalize the first letter
		
		$this->load->helper('url');
	
		$this->load->view('templates/header', $data);
		$this->load->view('webbutveckling/'.$page, $data);
		$this->load->view('templates/footer', $data);
	
	}
}