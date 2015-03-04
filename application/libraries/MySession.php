<?php if ( ! defined('BASEPATH')) exit('Ingen direkt åtkomst tillåts');

/**
 * Session
 */
class MySession {

	/**
	 * Kontrollerar om session är aktiv eller inaktiv.
	 * @link http://php.net/manual/en/function.session-status.php
	 * 
	 * @return boolean True om session är aktiv annars false.
	 */
	public function is_session_started()
	{
		if ( php_sapi_name() !== 'cli' ) {
			if ( version_compare(phpversion(), '5.4.0', '>=') ) {
				return session_status() === PHP_SESSION_ACTIVE ? TRUE : FALSE;
			} else {
				return session_id() === '' ? FALSE : TRUE;
			}
		}
		return FALSE;
	}
}