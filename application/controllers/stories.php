<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Stories extends MY_Controller {
    public function __construct() {
        parent::__construct();
        $this->data['recent'] = $this->story->limit(5)->get_all();
    }
    public function index() {
        $this->asides['sidebar'] = "asides/sidebar";
        $this->data['stories'] = $this->story->get_all();
    }

    public function view($id) {
        $this->asides['sidebar'] = "asides/related";
        $this->data['story'] = $this->story->get($id);
        $this->story->update($id, ['views' => $this->data['story']->views + 1]);
        $this->data['author'] = $this->ion_auth->user($this->data['story']->user_id)->row();
    }

    public function view_by_state($state) {
        $this->data['stories'] = $this->story->get_by(['state' => $state]);
    }
    
    public function search($query) {
        // $this->data['stories'] = $this->story->get(id);
    }

    public function vote($story_id, $vote) {
        $vote_type = $vote == 1 ? "upvote" : "downvote";
        $story = $this->story->get($story_id);
        $user = $this->ion_auth->user()->row();
        $uid = $user->id;
        if($story) {
            $user_vote = ['story_id' => $story->id, 'user_id' => $uid];
            $voted = $this->vote->get_by($user_vote);
            if(!$voted) {
                $user_vote['vote'] = $vote;
                if($this->vote->insert($user_vote)) {
                    $this->story->update($story_id, [$vote_type => $story->$vote_type + 1]);
                    $this->message->set('success', 'Successfully '.$vote_type.'d this story');
                }
            } else {
                if($voted->vote == $vote) {
                    $this->message->set('error', 'You cannot ' . $vote_type . " this story more than once");
                } else {
                    $this->vote->update($voted->id, ['vote' => $vote]);
                    if($vote_type == "upvote") {
                        $this->story->update($story->id, ['upvote' => $story->upvote + 1, 'downvote' => $story->downvote - 1]);
                    } else {
                        $this->story->update($story->id, ['upvote' => $story->upvote - 1, 'downvote' => $story->downvote + 1]);
                    }
                    $this->message->set('success', 'Successfully updated your vote');
                }
            }
        } else {
            $this->message->set('error', "Story could not be found");
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

    public function delete($id, $force = false) {
        $this->data['id'] = $id;
        $user = $this->ion_auth->user()->row();
        if($force) {
            $story = $this->story->get($id);
            if(isset($story) && $story->user_id == $user->id) {
                if($this->story->delete($id)) {
                    $this->message->set('success', 'Successfully deleted the story.');
                } else {
                    $this->message->set('error', 'Could not delete the story.');
                }
            } else {
                $this->message->set('error', 'Could not delete the story.');
            }
        }
    }
}

/* End of file stories.php */
/* Location: ./application/controllers/stories.php */