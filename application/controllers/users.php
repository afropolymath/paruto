<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends MY_Controller {

	public function index() {
		
	}

	public function dashboard() {
		$this->data['user'] = $this->ion_auth->user()->row();
	}

}

/* End of file users.php */
/* Location: ./application/controllers/users.php */