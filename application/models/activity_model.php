<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Activity_model extends MY_Model {

  public function save_activity($uid, $activity_type, $link = null, $descr = null) {
    $activity = [
      'user_id'   => $uid,
      'activity'  => $activity_type,
    ];

    if($link != null)
      $activity['link'] = $link;

    if($descr != null)
      $activity['description'] = $descr;

    if(parent::insert($activity)) {
      return true;
    } else {
      return false;
    }
  }
  
}
/* End of file activity_model.php */
/* Location: ./application/models/activity_model.php */
?>