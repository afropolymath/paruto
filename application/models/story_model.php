<?php

class Story_model extends MY_Model {

    public function insert($story, $user_id) {
		$this->form_validation->set_rules('headline', 'Headline', 'trim|required|min_length[3]|max_length[100]|xss_clean');
		$this->form_validation->set_rules('story', 'News Content', 'trim|required|xss_clean');
    	if($this->form_validation->run()) {
    		$story['user_id'] = $user_id;
    		if(parent::insert($story)) {
    			return true;
    		} else {
    			return false;
    		}
    	} else {
    		return false;
    	}
    }

    public function search($query) {
        // Todo: Implement search logic
    }
}

