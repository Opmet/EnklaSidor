<?php
class Enkla_PHP_sidor extends CI_Controller {

	public function view($page = 'php_sida_1') //TODO: Ändra så sidan kallas från path.
	{

		if ( ! file_exists(APPPATH.'/views/enkla_PHP_sidor/'.$page.'.php'))
		{
			// Whoops, we don't have a page for that!
			show_404();
		}

		$data['title'] = ucfirst($page); // Capitalize the first letter

		$this->load->helper('url');
		
		$this->load->model('enkel_model');

		$this->load->view('templates/header_Navs', $data);
		$this->load->view('enkla_PHP_sidor/'.$page, $data);
		$this->load->view('templates/footer', $data);

	}
}