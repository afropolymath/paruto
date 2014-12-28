<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Stories extends MY_Controller {

    public function index() {
        $this->asides['sidebar'] = "asides/sidebar";
        $this->data['stories'] = $this->story->get_all();
    }

    public function view($id) {
        $this->data['stories'] = $this->story->get(id);
    }

    public function view_by_state($state) {
        $this->data['stories'] = $this->story->get_by(['state' => $state]);
    }
    
    public function search($query) {
        // $this->data['stories'] = $this->story->get(id);
    }

    public function vote($story_id, $uid, $vote) {
        $user_vote = ['story_id' => $story_id, 'user_id' => $uid];
        $voted = $this->vote->get_by($user_vote);
        if(isset($voted)) {
            if($voted->vote == $vote) {
                $vote_type = $vote == 1 ? "upvote" : "downvote";
                echo ['error' => 1, 'message' => 'You cannot ' . $vote_type . " this story more than once"];
            } else {
                $this->vote->update($voted->id, ['vote' => $vote]);
                echo ['success' => 1, 'message' => 'Successfully updated your vote'];
            }
        } else {
            $user_vote['vote'] = $vote;
            if($this->vote->insert($user_vote)) {
                $story = $this->story->get($id);
                $this->story->update($story_id, [$vote_type => $story->$vote_type + 1]);
            }

        }
    }

    public function create() {
        $this->asides['sidebar'] = "asides/sidebar";
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