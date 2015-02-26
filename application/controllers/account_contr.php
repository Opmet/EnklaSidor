<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Hanterar användarkonton.
 */
class Account_contr extends CI_Controller {
	
	public function view($page)
	{
		$this->load->helper('url');
	
		$this->load->view('templates/header_Navs');
		$this->load->view('account/'.$page.'.php');
		$this->load->view('templates/footer');
	}
	
	public function account($page)
	{
		$this->load->model('account_model'); // Laddar modell.
		$this->load->helper('url');
		$this->load->helper('file');
		$data = []; // Tom behållare.
	
		// Kör modellen.
		switch ($page) {
			case "login":
				$data = $this->account_model->login();
				break;
			case "new_account":
				$data = $this->account_model->newAccount();
				break;
		}
		
		$this->load->view('templates/header_Navs');
		$this->load->view('account/'.$page.'.php', $data);
		$this->load->view('templates/footer');
	}
}