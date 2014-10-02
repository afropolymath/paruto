<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Stories extends MY_Controller {

	// Get all jobs
	public function index() {
		$this->data['stories'] = $this->story->get_all();
	}
	// View a certain job
	public function view($id) {
		$this->data['stories'] = $this->story->get(id);
	}
	public function search($query) {
		// $this->data['stories'] = $this->story->get(id);

	}

	public function create() {
		$user = $this->ion_auth->user()->row();
		if($this->input->post()) {
			$story = $this->input->post();
			if($this->story->insert($story, $user->id)) {
				$this->message->set('success', 'Successfully created the story.');
			} else {
				$this->message->set('error', 'There was a problem inserting your story.');
			}
		}
	}

	public function edit($id) {

	}
}

/* End of file stories.php */
/* Location: ./application/controllers/stories.php */