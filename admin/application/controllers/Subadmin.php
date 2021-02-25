<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Subadmin extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('home_model');
		$this->load->model('subadmin_model');
	}

	public function index()
	{
		if ($this->session->userdata('username') != '') {
			redirect(base_url() . 'home/dashboard');
		} else {
			$this->load->view('admin/sublogin');
		}
	}

	public function subadminlogin()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email', 'username', 'required');
		$this->form_validation->set_rules('password', 'password', 'required');
		if ($this->form_validation->run()) {
			$username = $this->input->post('email');
			$password = $this->input->post('password');
			if ($this->subadmin_model->getlogindata($username, $password)) {
				$var = $this->subadmin_model->getsuperadmin($username, $password);
				if ($var['status'] == 1) {
					$session_data = array('semail' => $username, 'role' => $var['role'], 'sid' => $var['id'], 'username' => $var['username'], 'state' => $var['state'], '	LG' => $var['LG']);
					$this->session->set_userdata($session_data);
					if ($var['role'] == 2) {
						redirect(base_url() . 'home/dashboard');
					} else {
						$this->session->set_flashdata('failure', 'Invalid Username and Password');
						redirect(base_url() . 'subadmin');
					}
				}else{
					$this->session->set_flashdata('failure', 'Invalid Username and Password');
					redirect(base_url() . 'subadmin');
				}
				
			} else {
				$this->session->set_flashdata('failure', 'Invalid Username and Password');
				redirect(base_url() . 'subadmin');
			}
		} else {
			echo "Error";
		}
	}
	public function logout()
	{
		$this->session->unset_userdata('username', 'state','LG');
		redirect(base_url() . 'subadmin');
	}
}