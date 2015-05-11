<?php if ( ! defined('BASEPATH')) exit('Ingen direkt åtkomst tillåts');
/**
 * Hanterar bloggen.
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
		
		// Används för att visa vilken navigations länk som ska vara aktiv i vyn.
		$this->m_headlab['header_nav_link1'] = '';
		$this->m_headlab['header_nav_link2'] = '';
		$this->m_headlab['header_nav_link3'] = '';
		$this->m_headlab['header_nav_link4'] = ' class="active"';
	}
	
	/**
	 * Visa vyn flow.
	 */
	public function show_flow()
	{
		$this->load->helper('url');
		$this->load->helper('html'); //Så vi kan visa image.
		
		$this->load->model('blog_model'); // Laddar modell.
		$data = $this->blog_model->fetch_post(); // Kör modell
		$data += $this->blog_model->fetch_new_bloggers(); // Kör modell
		
		$this->view('flow.php', $data); // Kör vyn.
	}
	
	/**
	 * Visa vyn post.
	 */
	public function show_post()
	{
		$this->load->helper('url');
		
		// Om session inte är startad.
		if( $this->mysession->is_session_started() === FALSE ) {
			session_start();
			
			// Om användaren inte är inloggad.
			if( !isset($_SESSION['session']) ){
				echo "<script type='text/javascript'>alert( 'Logga in först!' );</script>";
				redirect('/account/login/', 'refresh');
			}
		}
		
		$this->view('post.php', null); // Kör vyn.
	}
	
	/**
	 * Skapa nytt blogg inlägg.
	 * 
	 * @uses $_POST['title'] Inläggets rubrik.
	 * @uses $_POST['message'] Meddelandet.
	 * @uses image_upload() För att ladda upp bild.
	 */
	public function set_post()
	{
		$this->load->helper(array('form', 'url'));
		
		$this->load->library('My_Form_validation');
		$this->load->library('form_validation');
		$this->load->library('upload');
		
		$this->form_validation->set_rules('title', 'Rubrik', 'required');
		$this->form_validation->set_rules('message', 'Meddelande', 'required');
		
		$this->form_validation->set_message('required', 'Fyll i fältet: %s!');
		
		// Om fälten inte validerar eller bilden inte kunde laddas upp, sänd fel meddelande.
		// Annars skapa inlägget.
		if ($this->form_validation->run() == FALSE || $this->image_upload() == FALSE)
		{
			$error = array('error' => $this->upload->display_errors()); //Error tilldelas antingen ett felmeddelande eller null.
			
			$this->view('post.php', $error); // Kör vyn.
		}
		else
		{
			$meta_data = array('upload_data' => $this->upload->data()); // Data om den uppladdade bilden.
			
			$this->load->model('blog_model'); // Laddar modell.
			$data = $this->blog_model->set_post( $meta_data ); // Kör modell
			
			$this->view('post.php', $data); // Kör vyn.
		}		
	}
	
	/**
	 * Visa vyn min sida.
	 */
	public function show_my_page()
	{
		$this->load->helper('url');
		$this->load->helper('html'); //Så vi kan visa image.
		
		// Om session inte är startad.
		if( $this->mysession->is_session_started() === FALSE ) {
			session_start();
				
			// Om användaren inte är inloggad.
			if( !isset($_SESSION['session']) ){
				echo "<script type='text/javascript'>alert( 'Logga in först!' );</script>";
				redirect('/account/login/', 'refresh');
			}
		}
	
		$this->load->model('blog_model'); // Laddar modell.
		$data = $this->blog_model->fetch_my_post(); // Kör modell
	
		$this->view('my_page.php', $data); // Kör vyn.
	}
	
	/**
	 * Markera post som bort taget.
	 * @uses $_POST['id'] Posten som ska markeras.
	 */
	public function remove_post()
	{
		$this->load->helper('url');
		$this->load->library('My_Form_validation');
		
		$id = $this->my_form_validation->test_input($_POST["id"]);
		
		$this->load->model('blog_model'); // Laddar modell.
		$this->blog_model->remove_post($id); // Kör modell
		
		redirect('/blog/show_my_page/', 'refresh');
	}
	
	/**
	 * Laddar upp fil om config tillåter.
	 * 
	 * @return Om filen kunde laddas upp retuneras TRUE annars retuneras FALSE.
	 */
	private function image_upload()
	{
		$image_upload = FALSE;
		
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '100';
		$config['max_width']  = '600';
		$config['max_height']  = '600';
	
		$this->upload->initialize($config);
		
		// Om filen laddas upp, retunera TRUE.
		if ( $this->upload->do_upload() )
		{
			$image_upload = TRUE;
		}
		
		return $image_upload;
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