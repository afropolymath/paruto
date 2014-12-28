<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends MY_Controller {

	public function index() {
	}

	public function dashboard() {
    $this->asides['sidebar'] = "asides/activity";
		$user = $this->data['user'] = $this->ion_auth->user()->row();
    $this->data['user_stories'] = $this->story->get_many_by(['user_id' => $user->id]);
	}
  public function view($uid) {
    $this->data['user_stories'] = $this->story->get_many_by(['user_id' => $uid]);
  }

}

/* End of file users.php */
/* Location: ./application/controllers/users.php */