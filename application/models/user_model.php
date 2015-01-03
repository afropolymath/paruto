<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User_model extends MY_Model {
  public function update($uid, $user) {
    $this->form_validation->set_rules('first_name', 'First Name', 'trim|required|xss_clean');
    $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|xss_clean');
    $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[6]|xss_clean');
    if($this->form_validation->run()) {
      if(parent::update($uid, $user)) {
        return true;
      } else {
        return false;
      }
    } else {
      return false;
    }
  }
}
/* End of file user_model.php */
/* Location: ./application/models/user_model.php */
?>