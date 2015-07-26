<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $user = $this->data['logged_in_user'];
        $this->data['user_stories'] = $this->story->get_many_by(['user_id' => $user->id]);
        $this->data['profile'] = $this->profile->get_by(['user_id' => $user->id]);
        $this->data['activities'] = $this->activity->limit(5)->order_by('date_created', 'desc')->get_many_by(['user_id' => $user->id]);
    }

    public function dashboard() {
        $this->asides['sidebar'] = "asides/activity";
    }

    public function profile($uid = false) {
        $this->data['user'] = $this->data['logged_in_user'];
        if($uid != false) {
            $this->data['user'] = $this->ion_auth->user($uid)->row();
            $this->data['user_stories'] = $this->story->get_many_by(['user_id' => $uid]);
            $this->data['profile'] = $this->profile->get_by(['user_id' => $uid]);
        }
    }

    public function update() {
        $uid = $this->data['logged_in_user']->id;
        $profile = $this->data['profile'];
        if($this->input->post()) {
            $post_obj = $this->input->post();
            $fields = ['first_name', 'last_name', 'username'];
            $user = [];
            foreach($fields as $field) {
                $user[$field] = $post_obj[$field];
                unset($post_obj[$field]);
            }
            if($this->user->update($uid, $user)) {
                if(count(array_keys($post_obj)) > 0) {
                    $this->profile->update($profile->id, $post_obj);
                }
                $this->message->set('success', 'Successfully updated your profile.');
                $this->activity->save_activity($uid, 'pupd');
            }
            else {
                $this->message->set('error', 'Could not update your profile.');
            }
        }
    }

}

/* End of file users.php */
/* Location: ./application/controllers/users.php */