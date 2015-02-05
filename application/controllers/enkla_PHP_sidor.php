<?php
class Enkla_PHP_sidor extends CI_Controller {

	public function view($page = 'php_sida_1') //TODO: Ändra så sidan kallas från path.
	{
		$this->load->model('enkel_model');
		$this->load->helper('url');
		
		$strNamn = '';

		//Visa 404 om sidan inte finns.
		if ( ! file_exists(APPPATH.'/views/enkla_PHP_sidor/'.$page.'.php'))
		{
			show_404();
		}
		
		// Validerar användarens inmatning i $_POST superglobal.
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$strNamn = $this->enkel_model->test_input($_POST["strNamn"]);
		}

		$data['strNamn'] = $strNamn;
		$data['title'] = ucfirst($page); // Capitalize the first letter
		
		$this->load->view('templates/header_Navs');
		$this->load->view('enkla_PHP_sidor/'.$page, $data);
		$this->load->view('templates/footer');

	}
}