<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends MY_Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        if($this->ion_auth->logged_in()) {
            redirect('users/dashboard');
        }
    }

    public function login() {
        $this->form_validation->set_rules('email', 'E-mail', 'trim|required|valid_email|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if($this->form_validation->run()) {
            $identity = $this->input->post('email');
            $password = $this->input->post('password');
            $remember = (bool) $this->input->post('remember');
            if($this->ion_auth->login($identity, $password, $remember)) {
                $this->message->set('success', $this->ion_auth->messages());
                redirect('users/dashboard');
            } else {
                $this->message->set('error', $this->ion_auth->errors());
            }
        }
    }

    public function register() {
        $this->form_validation->set_rules('username', 'Pseudonym', 'trim|required|xss_clean');
        $this->form_validation->set_rules('first_name', 'First Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('last_name', 'Last', 'trim|required|xss_clean');
        $this->form_validation->set_rules('email', 'E-mail', 'trim|required|valid_email|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
        $this->form_validation->set_rules('password_conf', 'Confirm Password', 'trim|required|matches[password]');
        if($this->form_validation->run()) {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $email = $this->input->post('email');
            $additional_data = ['first_name' => $this->input->post('first_name'), 'last_name' => $this->input->post('last_name')];
            $group = ['2'];
            if($this->ion_auth->register($username, $password, $email, $additional_data, $group)) {
                $this->message->set('success', $this->ion_auth->messages());
                redirect('auth/login');
            } else {
                $this->message->set('error', $this->ion_auth->errors());
            }

        }
    }
    
    public function logout() {
        if($this->ion_auth->logout()) {
            $this->message->set('success', $this->ion_auth->messages());
            redirect('auth/login');
        }
    }

}

/* End of file auth.php */
/* Location: ./application/controllers/auth.php */