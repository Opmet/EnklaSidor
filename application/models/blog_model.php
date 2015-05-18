<?php if ( ! defined('BASEPATH')) exit('Ingen direkt åtkomst tillåts');

/**
 * Blogg modell
 */
class Blog_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
		$this->load->library('My_Form_validation');
		$this->load->database();
	}
	
	/**
	 * Hämta alla blogg inlägg från databasen.
	 *
	 * @return array Märkdata till vyn.
	 */
	public function fetch_post()
	{
		$data = []; // Tom array.
		
		$sql = "SELECT Post.fk_user, Post.title, Post.text,
				Post.created, Image.imagename
		        FROM Post
		        INNER JOIN Image
		        ON Post.fk_image=Image.id
				WHERE Post.is_active='1'
				ORDER BY Post.created DESC;";
		
		$query = $this->db->query($sql);
		$data["posts"] = $query->result_array();
	
		return $data;
	}
	
	/**
	 * Hämta nya bloggare från databasen.
	 * @return array Märkdata till vyn.
	 */
	public function fetch_new_bloggers()
	{
		$data = []; // Tom array.
	
		$sql = "SELECT username
		        FROM User
		        ORDER BY created DESC
				LIMIT 7;";
	
		$query = $this->db->query($sql);
		$data["bloggers"] = $query->result_array();
	
		return $data;
	}
	
	/**
	 * Hämta mina poster.
	 *
	 * @return array Märkdata till vyn.
	 */
	public function fetch_my_post()
	{
		$data = []; // Tom array.
		
		$user = $this->user(); //Hämtar namnet
	
		$sql = "SELECT Post.id, Post.fk_user, Post.title, Post.text,
				Post.created, Image.imagename
		        FROM Post
		        INNER JOIN Image
		        ON Post.fk_image=Image.id
		        WHERE Post.fk_user='$user' AND Post.is_active='1'
		        ORDER BY Post.created DESC;";
	
		$query = $this->db->query($sql);
		$data["myposts"] = $query->result_array();
	
		return $data;
	}
	
	/**
	 * Hämta en användares poster.
	 *
	 * @param p_user är användaren vars poster som ska hämtas.
	 * @return array Märkdata till vyn.
	 */
	public function fetch_user_post($p_user)
	{
		$data = []; // Tom array.
	
		$sql = "SELECT Post.id, Post.fk_user, Post.title, Post.text,
		Post.created, Image.imagename
		FROM Post
		INNER JOIN Image
		ON Post.fk_image=Image.id
		WHERE Post.fk_user='$p_user' AND Post.is_active='1'
		ORDER BY Post.created DESC;";
	
		//Om parametern är minder än 30 tecken kör query.
		if( strlen($p_user) < 30 ){
				
			$query = $this->db->query($sql);
			$data["post"] = $query->result_array();
			$data["username"] = $p_user;
		}
	
		return $data;
	}
	
	/**
	 * Behandlar ett blogg inlägg till databasen.
	 *
	 * @uses $_POST['title'] Inläggets rubrik.
	 * @uses $_POST['message'] Meddelandet.
	 * @return array Märkdata till vyn.
	 */
	public function set_post( $meta_data )
	{
		$data = []; // Tom array.
		
		$fk_user = $this->user(); //Hämtar namnet
		
		$image = $meta_data["upload_data"]["file_name"]; // fil namn
		$title = $this->my_form_validation->test_input($_POST["title"]);
		$message = $this->my_form_validation->test_input($_POST["message"]);
		
		// Lägg bildens namn till databasen.
		$this->insert_image( $image );
		
		// Hämta bildens id.
		$fk_image = $this->last_insert();
		
		$sql = "INSERT INTO Post (fk_user, fk_image, title, text, is_active)
        VALUES (".$this->db->escape($fk_user).", ".$this->db->escape($fk_image).", ".$this->db->escape($title).", ".$this->db->escape($message).", '1')";
		
		// Om kontot inte kunde skapas skicka felmeddelande.
		// Annars kunde kontot skapas.
		if (!$this->db->query($sql))
		{
			$data["error"] = 'Kunde inte registrera inlägg!';
		}else{
			$data["error"] = 'Inlägget har registrerats!';
		}
		
		return $data;
		
	}
	
	/**
	 * Markera post som bort taget. 0 = ej aktiv.
	 * @param $p_id Posten som ska markeras.
	 */
	public function remove_post($p_id)
	{
		$user = $this->user(); //Hämtar användarens namn. För att testa att inloggning verkligen finns.
	
		$sql = "UPDATE Post
                SET is_active='0'
                WHERE id='$p_id' AND fk_user='$user';";
	
		$query = $this->db->query($sql);
	
	}
	
	/**
	 * Lägg bildens namn till databasen.
	 *
	 * @param string $p_imageName Namnet.
	 * @return void
	 */
	private function insert_image( $p_imageName )
	{
		$sql = "INSERT INTO Image (imagename)
        VALUES (".$this->db->escape($p_imageName)."); ";
		
		$this->db->query($sql);
	}
	
	/**
	 * Hämta sista inlagda id från Image.
	 *
	 * @return string ID eller null.
	 */
	private function last_insert()
	{
		$lastID = null;
		
		$sql = "SELECT LAST_INSERT_ID() FROM Image; ";
		
		$query = $this->db->query($sql);
		
		if ($query->num_rows() > 0)
		{
			$row = $query->row_array();
			
			$lastID = $row['LAST_INSERT_ID()'];
		}
		
		return $lastID;
	}
	
	/**
	 * Hämtar namnet på den inloggade användaren.
	 *
	 * @return string Användaren.
	 */
	private function user()
	{
		$user = '';
		
		// Om session inte är startad. Starta.
		if( $this->mysession->is_session_started() === FALSE ) {
			session_start();
		}
		
		// Om användaren är inloggad tilldela användarnamnet.
		if( isset($_SESSION['session']) ){
			$user = $_SESSION['session'];
		}
		
		return $user;
	}
}