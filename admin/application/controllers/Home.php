<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('home_model');
	}

	public function index()
	{
		if ($this->session->userdata('username') != '') {
			redirect(base_url() . 'home/dashboard');
		} else {
			$this->load->view('admin/login');
		}
	}

	public function dashboard()
	{
		if ($this->session->userdata('username') != '') {
			$data['title'] =  'Dashboard';
			$data['this_year'] = $this->get_total_years_rev();
			$data['this_day'] = $this->get_total_days_rev();
			$data['this_week'] = $this->get_total_weeks_rev();
			$data['this_month'] = $this->get_total_months_rev();
			$data['rev'] = $this->home_model->get_total_LGs_rev();
			$this->load->view('admin/inc/header', $data);
			$this->load->view('admin/dashboard', $data);
			$this->load->view('admin/inc/footer');
		} else {
			redirect(base_url() . 'home');
		}
	}

	public function adminlogin()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email', 'username', 'required');
		$this->form_validation->set_rules('password', 'password', 'required');
		if ($this->form_validation->run()) {
			$username = $this->input->post('email');
			$password = $this->input->post('password');

			$this->load->model('home_model');
			if ($this->home_model->getlogindata($username, $password)) {
				$var = $this->home_model->getsuperadmin($username, $password);
				$session_data = array('email' => $username, 'role' => $var['role'], 'id' => $var['id'], 'username' => $var['username']);
				$this->session->set_userdata($session_data);
				if ($var['role'] == 1) {
					redirect(base_url() . 'home/dashboard');
				} else {
					$this->session->set_flashdata('failure', 'Invalid Username and Password');
					redirect(base_url() . 'home');
				}
			} else {
				$this->session->set_flashdata('failure', 'Invalid Username and Password');
				redirect(base_url() . 'home');
			}
		} else {
			echo "Error";
		}
	}
	public function logout()
	{
		$this->session->unset_userdata('username', 'manager');
		redirect(base_url() . 'home');
	}

	public function businessexemptionslist()
	{
		if ($this->session->userdata('username') != '') {
			$data['title'] = 'All Business Exemption';
			$this->load->model('home_model');
			$data['hcat'] = $this->home_model->businessexemptions();
			$this->load->view('admin/inc/header', $data);
			$this->load->view('admin/businessexemptionslist', $data);
			$this->load->view('admin/inc/footer');
		} else {
			$this->session->set_flashdata('failure', 'Invalid Username and Password');
			redirect(base_url() . 'home');
		}
	}

	public function approve_b_exem($id)
	{
		if ($this->session->userdata('username') != '') {
			$data['title'] = 'All Business Exemption';
			$this->load->model('home_model');
			$uid = $this->uri->segment(4);
			$user_email = get_perticular_field_value('business_exemptions', 'email', " and `userid`='" . $uid . "'");
			$formArray  = array();
			$formArray['permission'] = 1;
			$formArray['code'] = rand(1000, 9999);
			$this->load->library('email');
			$config['protocol']    = 'smtp';
			$config['smtp_host']    = 'ssl://smtp.gmail.com';
			$config['smtp_port']    = '465';
			$config['smtp_timeout'] = '60';

			$config['smtp_user']    = 'ripansaha.rendement@gmail.com';    //Important
			$config['smtp_pass']    = 'Ripan@123';  //Important

			$config['charset']    = 'utf-8';
			$config['newline']    = "\r\n";
			$config['mailtype'] = 'html'; // or html
			$config['validation'] = TRUE; // bool whether to validate email or not
			$config['mailtype'] = 'html';
			$this->email->initialize($config);
			$htmlContent = '<h1>Exemption Code</h1>';
			$htmlContent .= '<p>This email has sent from Nicolex</p>';
			$htmlContent .= '<p><b> Your Business Exemption Code Is: </b></p><br>';
			$htmlContent .= $formArray['code'];
			$this->email->from('Nicolex@gmail.com', 'Nicolex');
			$this->email->to($user_email);
			$this->email->subject('Exemption Code');
			$this->email->message($htmlContent);

			$this->email->send();
			$data['hcat'] = $this->home_model->approved_b_exem($id, $formArray);
			$this->session->set_flashdata('success', 'Exemption Approved Successfully.');
			redirect(base_url() . 'home/businessexemptionslist');
		} else {
			$this->session->set_flashdata('failure', 'Invalid Username and Password');
			redirect(base_url() . 'home');
		}
	}

	public function deny_b_exem($id)
	{
		if ($this->session->userdata('username') != '') {
			$data['title'] = 'All Business Exemption';
			$this->load->model('home_model');
			$uid = $this->uri->segment(4);
			$user_email = get_perticular_field_value('business_exemptions', 'email', " and `userid`='" . $uid . "'");
			$formArray  = array();
			$formArray['permission'] = 2;
			$formArray['code'] = 0000;
			$this->load->library('email');
			$config['protocol']    = 'smtp';
			$config['smtp_host']    = 'ssl://smtp.gmail.com';
			$config['smtp_port']    = '465';
			$config['smtp_timeout'] = '60';

			$config['smtp_user']    = 'ripansaha.rendement@gmail.com';    //Important
			$config['smtp_pass']    = 'Ripan@123';  //Important

			$config['charset']    = 'utf-8';
			$config['newline']    = "\r\n";
			$config['mailtype'] = 'html'; // or html
			$config['validation'] = TRUE; // bool whether to validate email or not
			$config['mailtype'] = 'html';
			$this->email->initialize($config);
			$htmlContent = '<h1>Exemption Code</h1>';
			$htmlContent .= '<p>This email has sent from Nicolex</p>';
			$htmlContent .= '<p><b> Your Request Business Exemption Has Denied. </b></p><br>';
			$this->email->from('Nicolex@gmail.com', 'Nicolex');
			$this->email->to($user_email);
			$this->email->subject('Exemption Code');
			$this->email->message($htmlContent);

			$this->email->send();
			$data['hcat'] = $this->home_model->deny_b_exem($id, $formArray);
			$this->session->set_flashdata('success', 'Exemption Denied Successfully.');
			redirect(base_url() . 'home/businessexemptionslist');
		} else {
			$this->session->set_flashdata('failure', 'Invalid Username and Password');
			redirect(base_url() . 'home');
		}
	}

	public function propertyexemptionslist()
	{
		if ($this->session->userdata('username') != '') {
			$data['title'] = 'All Property Exemption';
			$this->load->model('home_model');
			$data['hcat'] = $this->home_model->propertyexemptions();
			$this->load->view('admin/inc/header', $data);
			$this->load->view('admin/propertyexemptionslist', $data);
			$this->load->view('admin/inc/footer');
		} else {
			$this->session->set_flashdata('failure', 'Invalid Username and Password');
			redirect(base_url() . 'home');
		}
	}

	public function approve_p_exem($id)
	{
		if ($this->session->userdata('username') != '') {
			$data['title'] = 'All Property Exemption';
			$this->load->model('home_model');
			$uid = $this->uri->segment(4);
			$user_email = get_perticular_field_value('property_exemption', 'email', " and `userid`='" . $uid . "'");
			$formArray  = array();
			$formArray['permission'] = 1;
			$formArray['code'] = rand(1000, 9999);
			$this->load->library('email');
			$config['protocol']    = 'smtp';
			$config['smtp_host']    = 'ssl://smtp.gmail.com';
			$config['smtp_port']    = '465';
			$config['smtp_timeout'] = '60';

			$config['smtp_user']    = 'ripansaha.rendement@gmail.com';    //Important
			$config['smtp_pass']    = 'Ripan@123';  //Important

			$config['charset']    = 'utf-8';
			$config['newline']    = "\r\n";
			$config['mailtype'] = 'html'; // or html
			$config['validation'] = TRUE; // bool whether to validate email or not
			$config['mailtype'] = 'html';
			$this->email->initialize($config);
			$htmlContent = '<h1>Exemption Code</h1>';
			$htmlContent .= '<p>This email has sent from Nicolex</p>';
			$htmlContent .= '<p><b> Your Property Exemption Code Is: </b></p><br>';
			$htmlContent .= $formArray['code'];
			$this->email->from('Nicolex@gmail.com', 'Nicolex');
			$this->email->to($user_email);
			$this->email->subject('Exemption Code');
			$this->email->message($htmlContent);

			$this->email->send();
			$data['hcat'] = $this->home_model->approved_p_exem($id, $formArray);
			$this->session->set_flashdata('success', 'Exemption Approved Successfully.');
			redirect(base_url() . 'home/propertyexemptionslist');
		} else {
			$this->session->set_flashdata('failure', 'Invalid Username and Password');
			redirect(base_url() . 'home');
		}
	}

	public function deny_p_exem($id)
	{
		if ($this->session->userdata('username') != '') {
			$data['title'] = 'All Property Exemption';
			$this->load->model('home_model');
			$uid = $this->uri->segment(4);
			$user_email = get_perticular_field_value('property_exemption', 'email', " and `userid`='" . $uid . "'");
			$formArray  = array();
			$formArray['permission'] = 2;
			$formArray['code'] = 0000;
			$this->load->library('email');
			$config['protocol']    = 'smtp';
			$config['smtp_host']    = 'ssl://smtp.gmail.com';
			$config['smtp_port']    = '465';
			$config['smtp_timeout'] = '60';

			$config['smtp_user']    = 'ripansaha.rendement@gmail.com';    //Important
			$config['smtp_pass']    = 'Ripan@123';  //Important

			$config['charset']    = 'utf-8';
			$config['newline']    = "\r\n";
			$config['mailtype'] = 'html'; // or html
			$config['validation'] = TRUE; // bool whether to validate email or not
			$config['mailtype'] = 'html';
			$this->email->initialize($config);
			$htmlContent = '<h1>Exemption Code</h1>';
			$htmlContent .= '<p>This email has sent from Nicolex</p>';
			$htmlContent .= '<p><b> Your Request Business Exemption Has Denied. </b></p><br>';
			$this->email->from('Nicolex@gmail.com', 'Nicolex');
			$this->email->to($user_email);
			$this->email->subject('Exemption Code');
			$this->email->message($htmlContent);

			$this->email->send();
			$data['hcat'] = $this->home_model->deny_p_exem($id, $formArray);
			$this->session->set_flashdata('success', 'Exemption Denied Successfully.');
			redirect(base_url() . 'home/propertyexemptionslist');
		} else {
			$this->session->set_flashdata('failure', 'Invalid Username and Password');
			redirect(base_url() . 'home');
		}
	}

	public function vrpexemptionslist()
	{
		if ($this->session->userdata('username') != '') {
			$data['title'] = 'All Vehicle Radio & Parking Exemption';
			$this->load->model('home_model');
			$data['hcat'] = $this->home_model->vrpexemptions();
			$this->load->view('admin/inc/header', $data);
			$this->load->view('admin/vrpexemptionslist', $data);
			$this->load->view('admin/inc/footer');
		} else {
			$this->session->set_flashdata('failure', 'Invalid Username and Password');
			redirect(base_url() . 'home');
		}
	}

	public function approve_vrp_exem($id)
	{
		if ($this->session->userdata('username') != '') {
			$data['title'] = 'All Vehicle Radio & Parking Exemption';
			$this->load->model('home_model');
			$uid = $this->uri->segment(4);
			$user_email = get_perticular_field_value('vehicle_exemption', 'email', " and `userid`='" . $uid . "'");
			$formArray  = array();
			$formArray['permission'] = 1;
			$formArray['code'] = rand(1000, 9999);
			$this->load->library('email');
			$config['protocol']    = 'smtp';
			$config['smtp_host']    = 'ssl://smtp.gmail.com';
			$config['smtp_port']    = '465';
			$config['smtp_timeout'] = '60';

			$config['smtp_user']    = 'ripansaha.rendement@gmail.com';    //Important
			$config['smtp_pass']    = 'Ripan@123';  //Important

			$config['charset']    = 'utf-8';
			$config['newline']    = "\r\n";
			$config['mailtype'] = 'html'; // or html
			$config['validation'] = TRUE; // bool whether to validate email or not
			$config['mailtype'] = 'html';
			$this->email->initialize($config);
			$htmlContent = '<h1>Exemption Code</h1>';
			$htmlContent .= '<p>This email has sent from Nicolex</p>';
			$htmlContent .= '<p><b> Your Vehicle Exemption Code Is: </b></p><br>';
			$htmlContent .= $formArray['code'];
			$this->email->from('Nicolex@gmail.com', 'Nicolex');
			$this->email->to($user_email);
			$this->email->subject('Exemption Code');
			$this->email->message($htmlContent);

			$this->email->send();
			$data['hcat'] = $this->home_model->approved_vrp_exem($id, $formArray);
			$this->session->set_flashdata('success', 'Exemption Approved Successfully.');
			redirect(base_url() . 'home/vrpexemptionslist');
		} else {
			$this->session->set_flashdata('failure', 'Invalid Username and Password');
			redirect(base_url() . 'home');
		}
	}

	public function deny_vrp_exem($id)
	{
		if ($this->session->userdata('username') != '') {
			$data['title'] = 'All Vehicle Radio & Parking Exemption';
			$this->load->model('home_model');
			$uid = $this->uri->segment(4);
			$user_email = get_perticular_field_value('vehicle_exemption', 'email', " and `userid`='" . $uid . "'");
			$formArray  = array();
			$formArray['permission'] = 2;
			$formArray['code'] = 0000;
			$this->load->library('email');
			$config['protocol']    = 'smtp';
			$config['smtp_host']    = 'ssl://smtp.gmail.com';
			$config['smtp_port']    = '465';
			$config['smtp_timeout'] = '60';

			$config['smtp_user']    = 'ripansaha.rendement@gmail.com';    //Important
			$config['smtp_pass']    = 'Ripan@123';  //Important

			$config['charset']    = 'utf-8';
			$config['newline']    = "\r\n";
			$config['mailtype'] = 'html'; // or html
			$config['validation'] = TRUE; // bool whether to validate email or not
			$config['mailtype'] = 'html';
			$this->email->initialize($config);
			$htmlContent = '<h1>Exemption Code</h1>';
			$htmlContent .= '<p>This email has sent from Nicolex</p>';
			$htmlContent .= '<p><b> Your Request Vehicle Exemption Has Denied. </b></p><br>';
			$this->email->from('Nicolex@gmail.com', 'Nicolex');
			$this->email->to($user_email);
			$this->email->subject('Exemption Code');
			$this->email->message($htmlContent);

			$this->email->send();
			$data['hcat'] = $this->home_model->deny_vrp_exem($id, $formArray);
			$this->session->set_flashdata('success', 'Exemption Denied Successfully.');
			redirect(base_url() . 'home/vrpexemptionslist');
		} else {
			$this->session->set_flashdata('failure', 'Invalid Username and Password');
			redirect(base_url() . 'home');
		}
	}

	public function faq_list()
	{
		if ($this->session->userdata('username') != '') {
			$data['title'] = 'FaQ List';
			$this->load->model('home_model');
			$data['list'] = $this->home_model->faqlist_db();
			$this->load->view('admin/inc/header', $data);
			$this->load->view('admin/faq_list', $data);
			$this->load->view('admin/inc/footer');
		} else {
			$this->session->set_flashdata('failure', 'Invalid Username and Password');
			redirect(base_url() . 'home');
		}
	}

	public function add_faq()
	{
		if ($this->session->userdata('username') != '') {
			$data['title'] = 'FaQ';
			$this->load->model('home_model');
			$id = $this->uri->segment(3);
			$data['list'] = $this->home_model->faqlist_db_by_id($id);
			// echo "<pre>";print_r($data['list']);die();
			$this->load->view('admin/inc/header', $data);
			$this->load->view('admin/faq_add', $data);
			$this->load->view('admin/inc/footer');
		} else {
		}
	}

	public function add_faq_data()
	{
		if ($this->session->userdata('username') != '') {
			// echo '<pre>';print_r($_POST);die();
			$this->load->model('home_model');
			$formArray = array();
			$formArray['question'] = $_POST['question'];
			$formArray['answer'] = $_POST['answer'];
			$retid = $this->home_model->insfaq($formArray);
			$this->session->set_flashdata('success', 'FaQ Added Successfully.');
			redirect(base_url() . 'home/faq_list');
		} else {
		}
	}

	public function edit_faq_data()
	{
		if ($this->session->userdata('username') != '') {
			// echo '<pre>';print_r($_POST);die();
			$this->load->model('home_model');
			$formArray = array();
			$id = $_POST['id'];
			$formArray['question'] = $_POST['question'];
			$formArray['answer'] = $_POST['answer'];
			$this->home_model->updfaq($formArray, $id);
			$this->session->set_flashdata('success', 'FaQ Updated Successfully.');
			redirect(base_url() . 'home/faq_list');
		} else {
		}
	}

	public function faq_details()
	{
		if ($this->session->userdata('username') != '') {
			$data['title'] = 'FaQ Details';
			$this->load->model('home_model');
			$id = $this->uri->segment(3);
			$data['list'] = $this->home_model->faqlist_db_by_id($id);
			// echo "<pre>";print_r($data['list']);die();
			$this->load->view('admin/inc/header', $data);
			$this->load->view('admin/faq_details', $data);
			$this->load->view('admin/inc/footer');
		} else {
		}
	}

	public function delete_faq()
	{
		if ($this->session->userdata('username') != '') {
			$id = $this->uri->segment(3);
			$delete = $this->db->where('id', $id)->delete('faq');
			if ($delete) {
				$this->session->set_flashdata('success', 'FaQ Deleted Successfully.');
				redirect(base_url() . 'home/faq_list');
			}
		} else {
		}
	}

	public function status_change()
	{
		$id = $this->uri->segment('3');
		$status = $this->uri->segment('4');
		if ($status == 'A') {
			if ($this->db->set('status', $status)->where('id', $id)->update('faq')) {
				$this->session->set_flashdata('success', 'FaQ Activated.');
			} else {
			}
		} else {
			if ($this->db->set('status', $status)->where('id', $id)->update('faq')) {
				$this->session->set_flashdata('success', 'FaQ Pending.');
			} else {
			}
		}
		redirect('home/faq_list');
	}


	public function info_list()
	{
		if ($this->session->userdata('username') != '') {
			$data['title'] = 'Info List';
			$this->load->model('home_model');
			$data['list'] = $this->home_model->infolist_db();
			$this->load->view('admin/inc/header', $data);
			$this->load->view('admin/info_list', $data);
			$this->load->view('admin/inc/footer');
		} else {
			$this->session->set_flashdata('failure', 'Invalid Username and Password');
			redirect(base_url() . 'home');
		}
	}

	public function add_info()
	{
		if ($this->session->userdata('username') != '') {
			$data['title'] = 'Info Add';
			$this->load->model('home_model');
			$id = $this->uri->segment(3);
			$data['list'] = $this->home_model->infolist_db_by_id($id);
			// echo "<pre>";print_r($data['list']);die();
			$this->load->view('admin/inc/header', $data);
			$this->load->view('admin/info_add', $data);
			$this->load->view('admin/inc/footer');
		} else {
		}
	}

	public function add_info_data()
	{
		if ($this->session->userdata('username') != '') {
			// echo '<pre>';print_r($_POST);die();
			$this->load->model('home_model');
			$formArray = array();
			$formArray['title'] = $_POST['title'];
			$formArray['description'] = $_POST['description'];
			$retid = $this->home_model->insinfo($formArray);
			$this->session->set_flashdata('success', 'Info Added Successfully.');
			redirect(base_url() . 'home/info_list');
		} else {
		}
	}

	public function edit_info_data()
	{
		if ($this->session->userdata('username') != '') {
			// echo '<pre>';print_r($_POST);die();
			$this->load->model('home_model');
			$formArray = array();
			$id = $_POST['id'];
			$formArray['title'] = $_POST['title'];
			$formArray['description'] = $_POST['description'];
			$this->home_model->updinfo($formArray, $id);
			$this->session->set_flashdata('success', 'Info Updated Successfully.');
			redirect(base_url() . 'home/info_list');
		} else {
		}
	}

	public function info_details()
	{
		if ($this->session->userdata('username') != '') {
			$data['title'] = 'Info Details';
			$this->load->model('home_model');
			$id = $this->uri->segment(3);
			$data['list'] = $this->home_model->infolist_db_by_id($id);
			// echo "<pre>";print_r($data['list']);die();
			$this->load->view('admin/inc/header', $data);
			$this->load->view('admin/info_details', $data);
			$this->load->view('admin/inc/footer');
		} else {
		}
	}

	public function status_change_info()
	{
		$id = $this->uri->segment('3');
		$status = $this->uri->segment('4');
		if ($status == 'A') {
			if ($this->db->set('status', $status)->where('id', $id)->update('info')) {
				$this->session->set_flashdata('success', 'Info Activated.');
			} else {
			}
		} else {
			if ($this->db->set('status', $status)->where('id', $id)->update('info')) {
				$this->session->set_flashdata('success', 'Info Pending.');
			} else {
			}
		}
		redirect('home/info_list');
	}

	public function delete_info()
	{
		if ($this->session->userdata('username') != '') {
			$id = $this->uri->segment(3);
			$delete = $this->db->where('id', $id)->delete('info');
			if ($delete) {
				$this->session->set_flashdata('success', 'Info Deleted Successfully.');
				redirect(base_url() . 'home/info_list');
			}
		} else {
		}
	}

	public function user_list()
	{
		if ($this->session->userdata('username') != '') {
			$data['title'] = 'All Users';
			$this->load->model('home_model');
			$data['list'] = $this->home_model->userlist_db();
			$this->load->view('admin/inc/header', $data);
			$this->load->view('admin/user_list', $data);
			$this->load->view('admin/inc/footer');
		} else {
			$this->session->set_flashdata('failure', 'Invalid Username and Password');
			redirect(base_url() . 'home');
		}
	}
	public function user_add()
	{
		if ($this->session->userdata('username') != '') {
			$data['title'] = 'Add a User';
			$this->load->model('home_model');
			// $data['list'] = $this->home_model->userlist_db();
			$this->load->view('admin/inc/header', $data);
			$this->load->view('admin/user_add', $data);
			$this->load->view('admin/inc/footer');
		} else {
			$this->session->set_flashdata('failure', 'Invalid Username and Password');
			redirect(base_url() . 'home');
		}
	}

	public function user_add_submit()
	{
		if ($this->session->userdata('username') != '') {
			// echo '<pre>';print_r($_POST);die();
			$this->load->model('home_model');
			$formArray = array();
			// `name`, `username`, `email`, `mobile`, `gender`, `dob`, `address1`, `address2`, `password`
			$formArray['name'] = $_POST['name'];
			$formArray['username'] = $_POST['username'];
			$formArray['email'] = $_POST['email'];
			$formArray['mobile'] = $_POST['mobile'];
			$formArray['gender'] = $_POST['gender'];
			$formArray['dob'] = $_POST['dob'];
			$formArray['address1'] = $_POST['address1'];
			$formArray['address2'] = $_POST['address2'];
			$formArray['password'] = md5($_POST['password']);

			// print_r($formArray);

			$retid = $this->home_model->insuser_add($formArray);
			$this->session->set_flashdata('success', 'User Added Successfully.');
			redirect(base_url() . 'home/user_list');
		} else {
			$back_ref = $_SERVER['HTTP_REFERER'];
			redirect($back_ref);
		}
	}

	public function user_edit($id)
	{
		if ($this->session->userdata('username') != '') {
			$data['title'] = 'Edit a User';
			$data['id'] = $id;
			$this->load->model('home_model');
			$data['show'] = $this->home_model->userlist_db_by_id($id);
			$this->load->view('admin/inc/header', $data);
			$this->load->view('admin/user_add', $data);
			$this->load->view('admin/inc/footer');
		} else {
			$this->session->set_flashdata('failure', 'Invalid Username and Password');
			redirect(base_url() . 'home');
		}
	}

	public function user_details($id)
	{
		if ($this->session->userdata('username') != '') {
			$data['title'] = 'User Details';
			$data['id'] = $id;
			$this->load->model('home_model');
			$data['show'] = $this->home_model->userlist_db_by_id($id);
			$this->load->view('admin/inc/header', $data);
			$this->load->view('admin/user_details', $data);
			$this->load->view('admin/inc/footer');
		} else {
			$this->session->set_flashdata('failure', 'Invalid Username and Password');
			redirect(base_url() . 'home');
		}
	}

	public function user_payment_history_bisuness($id)
	{
		if ($this->session->userdata('username') != '') {
			$data['title'] = 'User Payment History';
			$data['id'] = $id;
			$this->load->model('home_model');
			$data['list'] = $this->home_model->user_payment_history_business_bill_db($id);
			$this->load->view('admin/inc/header', $data);
			$this->load->view('admin/user_payment_history_business_bill', $data);
			$this->load->view('admin/inc/footer');
		} else {
			$this->session->set_flashdata('failure', 'Invalid Username and Password');
			redirect(base_url() . 'home');
		}
	}

	public function user_payment_history_property($id)
	{
		if ($this->session->userdata('username') != '') {
			$data['title'] = 'User Payment History';
			$data['id'] = $id;
			$this->load->model('home_model');
			$data['list'] = $this->home_model->user_payment_history_property_bill_db($id);
			$this->load->view('admin/inc/header', $data);
			$this->load->view('admin/user_payment_history_property_bill', $data);
			$this->load->view('admin/inc/footer');
		} else {
			$this->session->set_flashdata('failure', 'Invalid Username and Password');
			redirect(base_url() . 'home');
		}
	}

	public function user_payment_history_vehicle($id)
	{
		if ($this->session->userdata('username') != '') {
			$data['title'] = 'User Payment History';
			$data['id'] = $id;
			$this->load->model('home_model');
			$data['list'] = $this->home_model->user_payment_history_vehicle_bill_db($id);
			$this->load->view('admin/inc/header', $data);
			$this->load->view('admin/user_payment_history_vehicle_bill', $data);
			$this->load->view('admin/inc/footer');
		} else {
			$this->session->set_flashdata('failure', 'Invalid Username and Password');
			redirect(base_url() . 'home');
		}
	}

	public function user_edit_submit()
	{
		if ($this->session->userdata('username') != '') {
			// echo '<pre>';print_r($_POST);die();
			$this->load->model('home_model');
			$formArray = array();
			// `name`, `username`, `email`, `mobile`, `gender`, `dob`, `address1`, `address2`, `password`
			$id = $_POST['idaa'];
			$formArray['name'] = $_POST['name'];
			$formArray['username'] = $_POST['username'];
			$formArray['email'] = $_POST['email'];
			$formArray['mobile'] = $_POST['mobile'];
			$formArray['gender'] = $_POST['gender'];
			$formArray['dob'] = $_POST['dob'];
			$formArray['address1'] = $_POST['address1'];
			$formArray['address2'] = $_POST['address2'];
			// $formArray['password'] = $_POST['password'];

			// print_r($formArray);

			$this->home_model->insuser_edit($formArray, $id);
			$this->session->set_flashdata('success', 'User Edit Successfully.');
			redirect(base_url() . 'home/user_list');
		} else {
			$back_ref = $_SERVER['HTTP_REFERER'];
			redirect($back_ref);
		}
	}

	public function status_change_user()
	{
		$id = $this->uri->segment('3');
		$status = $this->uri->segment('4');
		if ($status == 'Y') {
			if ($this->db->set('status', $status)->where('id', $id)->update('user')) {
				$this->session->set_flashdata('success', 'User Activated.');
			} else {
			}
		} else {
			if ($this->db->set('status', $status)->where('id', $id)->update('user')) {
				$this->session->set_flashdata('success', 'User Denied.');
			} else {
			}
		}
		redirect('home/user_list');
	}

	public function delete_user($id)
	{
		if ($this->session->userdata('username') != '') {
			// $id=$this->uri->segment(3);
			$delete = $this->db->where('id', $id)->delete('user');
			if ($delete) {
				$this->session->set_flashdata('success', 'User Deleted Successfully.');
				// redirect(base_url(). 'home/info_list');
				$back_ref = $_SERVER['HTTP_REFERER'];
				redirect($back_ref);
			}
		} else {
		}
	}

	public function query_list()
	{
		if ($this->session->userdata('username') != '') {
			$data['title'] = 'Query List';
			$this->load->model('home_model');
			$data['list'] = $this->home_model->querylist_db();
			$this->load->view('admin/inc/header', $data);
			$this->load->view('admin/query_list', $data);
			$this->load->view('admin/inc/footer');
		} else {
			$this->session->set_flashdata('failure', 'Invalid Username and Password');
			redirect(base_url() . 'home');
		}
	}

	public function send_answer()
	{
		// echo '<pre>';print_r($_POST);die();
		$this->load->library('email');
		$config['protocol']    = 'smtp';
		$config['smtp_host']    = 'ssl://smtp.gmail.com';
		$config['smtp_port']    = '465';
		$config['smtp_timeout'] = '60';

		$config['smtp_user']    = 'ripansaha.rendement@gmail.com';    //Important
		$config['smtp_pass']    = 'Ripan@123';  //Important

		$config['charset']    = 'utf-8';
		$config['newline']    = "\r\n";
		$config['mailtype'] = 'html'; // or html
		$config['validation'] = TRUE; // bool whether to validate email or not
		$config['mailtype'] = 'html';
		$this->email->initialize($config);
		$htmlContent = '<h1>Support Team</h1>';
		$htmlContent .= '<p>This email has sent from Nicolex</p>';
		$htmlContent .= '<p>';
		$htmlContent .= $_POST['msg'];
		$htmlContent .= '</p>';
		// $htmlContent .= $formArray['code'];
		$this->email->from('Nicolex@gmail.com', 'Nicolex');
		$this->email->to($_POST['to_email']);
		$this->email->subject('Exemption Code');
		$this->email->message($htmlContent);

		$this->email->send();
		$this->db->set('status', 1)->where('id', $_POST['uid'])->update('support');
		$this->session->set_flashdata('success', 'Answer Send Successfully.');
		redirect(base_url() . 'home/query_list');
	}

	public function later_answer($id)
	{
		$this->db->set('status', 0)->where('id', $this->session->userdata('id'))->update('support');
		$this->session->set_flashdata('success', 'Query Added To Pendings Successfully.');
		redirect(base_url() . 'home/query_list');
	}

	public function payment_analysis()
	{
		if ($this->session->userdata('username') != '') {
			$data['title'] = 'Payment Analysis';
			$this->load->model('home_model');
			$start_data = '2020-01-01';
			$end_date = '2020-06-09';
			date_default_timezone_set('Asia/Kolkata');
			$today = date("Y-m-d");
			$month_date = date('Y-m-d', strtotime($today . ' -1 months'));
			$year_date = date('Y-m-d', strtotime($today . ' -12 months'));

			$data['today_vehicle_pa'] = $this->home_model->payment_analysis_vehicle_dtl_db($today, $today);
			$data['today_business_pa'] = $this->home_model->payment_analysis_business_dtl_db($today, $today);
			$data['today_property_pa'] = $this->home_model->payment_analysis_property_dtl_db($today, $today);

			$data['month_vehicle_pa'] = $this->home_model->payment_analysis_vehicle_dtl_db($month_date, $today);
			$data['month_business_pa'] = $this->home_model->payment_analysis_business_dtl_db($month_date, $today);
			$data['month_property_pa'] = $this->home_model->payment_analysis_property_dtl_db($month_date, $today);

			$data['year_vehicle_pa'] = $this->home_model->payment_analysis_vehicle_dtl_db($year_date, $today);
			$data['year_business_pa'] = $this->home_model->payment_analysis_business_dtl_db($year_date, $today);
			$data['year_property_pa'] = $this->home_model->payment_analysis_property_dtl_db($year_date, $today);
			$this->load->view('admin/inc/header', $data);
			$this->load->view('admin/payment_analysis', $data);
			$this->load->view('admin/inc/footer');
		} else {
			$this->session->set_flashdata('failure', 'Invalid Username and Password');
			redirect(base_url() . 'home');
		}
	}

	public function updateorderstatus()
	{
		if ($this->session->userdata('username') != '') {
			// echo '<pre>';print_r($_POST);die();
			$status = $_POST['status'];
			$order_id = $_POST['q_id'];
			$data['orders'] = $this->home_model->updateorderstatus($status, $order_id);
		} else {
			$this->session->set_flashdata('failure', 'Invalid Username and Password');
			redirect(base_url());
		}
	}

	public function getdata()
	{
		// echo '<pre>';print_r($_POST);die();
		$frm_date = $this->input->post('sd');
		$to_date = $this->input->post('ed');
		$state = $this->input->post('state');
		$gov = $this->input->post('gov');
		if ($_POST['category'] == 'Bus') {
			if (($state != '') && ($gov == '')) {
				$bresult = $this->home_model->get_total_bus_state($frm_date, $to_date, $state);
			} elseif (($state == '') && ($gov != '')) {
				$bresult = $this->home_model->get_total_bus_gov($frm_date, $to_date, $gov);
			} elseif (($state != '') && ($gov != '')) {
				$bresult = $this->home_model->get_total_bus_state_gov($frm_date, $to_date, $state, $gov);
			} elseif (($state == '') && ($gov == '')) {
				$bresult = $this->home_model->get_total_bus($frm_date, $to_date);
			}
			$presult['tpro'] = 0;
			$vresult['tvehi'] = 0;
			echo $bresult['tbus'] . '|' . $presult['tpro'] . '|' . $vresult['tvehi'] . '|' . $frm_date . '|' . $to_date;
			die();
		} elseif ($_POST['category'] == 'Pro') {
			if (($state != '') && ($gov == '')) {
				$presult = $this->home_model->get_total_pro_state($frm_date, $to_date, $state);
			} elseif (($state == '') && ($gov != '')) {
				$presult = $this->home_model->get_total_pro_gov($frm_date, $to_date, $gov);
			} elseif (($state != '') && ($gov != '')) {
				$presult = $this->home_model->get_total_pro_state_gov($frm_date, $to_date, $state, $gov);
			} elseif (($state == '') && ($gov == '')) {
				$presult = $this->home_model->get_total_pro($frm_date, $to_date);
			}
			$bresult['tbus'] = 0;
			$vresult['tvehi'] = 0;
			echo $bresult['tbus'] . '|' . $presult['tpro'] . '|' . $vresult['tvehi'] . '|' . $frm_date . '|' . $to_date;
			die();
		} elseif ($_POST['category'] == 'Veh') {
			if (($state != '') && ($gov == '')) {
				$vresult = $this->home_model->get_total_vehi_state($frm_date, $to_date, $state);
			} elseif (($state == '') && ($gov != '')) {
				$vresult = $this->home_model->get_total_vehi_gov($frm_date, $to_date, $gov);
			} elseif (($state != '') && ($gov != '')) {
				$vresult = $this->home_model->get_total_vehi_state_gov($frm_date, $to_date, $state, $gov);
			} elseif (($state == '') && ($gov == '')) {
				$vresult = $this->home_model->get_total_vehi($frm_date, $to_date);
			}
			$bresult['tbus'] = 0;
			$presult['tpro'] = 0;
			echo $bresult['tbus'] . '|' . $presult['tpro'] . '|' . $vresult['tvehi'] . '|' . $frm_date . '|' . $to_date;
			die();
		} else {

			$bresult = $this->home_model->get_total_bus($frm_date, $to_date);
			$presult = $this->home_model->get_total_pro($frm_date, $to_date);
			$vresult = $this->home_model->get_total_vehi($frm_date, $to_date);
			echo $bresult['tbus'] . '|' . $presult['tpro'] . '|' . $vresult['tvehi'] . '|' . $frm_date . '|' . $to_date;
			die();
		}
	}

	public function get_total_years_rev()
	{
		$current_year = date('Y');
		$rev_bus = $this->home_model->get_total_years_rev_business($current_year);
		$rev_pro = $this->home_model->get_total_years_rev_property($current_year);
		$rev_vehi = $this->home_model->get_total_years_rev_vehicle($current_year);
		$total_years_rev = ($rev_bus['trans_amount'] + $rev_pro['trans_amount'] + $rev_vehi['trans_amount']);
		return number_format((float)$total_years_rev, 2, '.', '');
	}

	public function get_total_months_rev()
	{
		$current_year = date('Y');
		$current_month = date('m');
		$rev_bus = $this->home_model->get_total_months_rev_business($current_year, $current_month);
		$rev_pro = $this->home_model->get_total_months_rev_property($current_year, $current_month);
		$rev_vehi = $this->home_model->get_total_months_rev_vehicle($current_year, $current_month);
		$total_months_rev = ($rev_bus['trans_amount'] + $rev_pro['trans_amount'] + $rev_vehi['trans_amount']);
		return number_format((float)$total_months_rev, 2, '.', '');
	}

	public function get_total_days_rev()
	{
		$current_day = date('Y-m-d');
		$rev_bus = $this->home_model->get_total_days_rev_business($current_day);
		$rev_pro = $this->home_model->get_total_days_rev_property($current_day);
		$rev_vehi = $this->home_model->get_total_days_rev_vehicle($current_day);
		$total_days_rev = ($rev_bus['trans_amount'] + $rev_pro['trans_amount'] + $rev_vehi['trans_amount']);
		return number_format((float)$total_days_rev, 2, '.', '');
	}

	public function get_total_weeks_rev()
	{
		$week_start = date("Y-m-d", strtotime("-7 days"));
		$week_end = date("Y-m-d", strtotime("-0 days"));
		$rev_bus = $this->home_model->get_total_weeks_rev_business($week_start, $week_end);
		$rev_pro = $this->home_model->get_total_weeks_rev_property($week_start, $week_end);
		$rev_vehi = $this->home_model->get_total_weeks_rev_vehicle($week_start, $week_end);
		$total_days_rev = ($rev_bus['trans_amount'] + $rev_pro['trans_amount'] + $rev_vehi['trans_amount']);
		return number_format((float)$total_days_rev, 2, '.', '');
	}

	public function get_LGs_rev()
	{
		if ($this->session->userdata('username') != '') {
			$data['title'] =  'Local Goverment Revenue';
			$data['rev'] = $this->home_model->get_total_LGs_rev();
			$this->load->view('admin/inc/header', $data);
			$this->load->view('admin/lg_rev', $data);
			$this->load->view('admin/inc/footer');
		} else {
			$this->session->set_flashdata('failure', 'Invalid Username and Password');
			redirect(base_url() . 'home');
		}
	}

	public function business_type()
	{
		if ($this->session->userdata('username') != '') {
			$data['title'] =  'Type Of Business List';
			$data['rev'] = $this->home_model->bus_type_list_db();
			$this->load->view('admin/inc/header', $data);
			$this->load->view('admin/bus_type_list', $data);
			$this->load->view('admin/inc/footer');
		} else {
			$this->session->set_flashdata('failure', 'Invalid Username and Password');
			redirect(base_url() . 'home');
		}
	}

	public function add_business_type()
	{
		if ($this->session->userdata('username') != '') {
			$id = $this->uri->segment('3');
			if (!empty($id)) {
				$data['title'] =  'Edit Type Of Business';
				$data['rev'] = $this->home_model->specific_bus_type($id);
				$this->load->view('admin/inc/header', $data);
				$this->load->view('admin/add_bus_type', $data);
				$this->load->view('admin/inc/footer');
			} else {
				$data['title'] =  'Add Type Of Business';
				$this->load->view('admin/inc/header', $data);
				$this->load->view('admin/add_bus_type', $data);
				$this->load->view('admin/inc/footer');
			}
		} else {
			$this->session->set_flashdata('failure', 'Invalid Username and Password');
			redirect(base_url() . 'home');
		}
	}

	public function store_Bus_type()
	{
		if ($this->session->userdata('username') != '') {
			// echo '<pre>';print_r($_POST);die();
			if (!empty($_POST['bus_type_id'])) {
				$data['title'] =  'Update Type Of Business';
				$formArray = array();
				$formArray['admin_id'] = $this->session->userdata('id');
				$formArray['typeofbusiness'] = $_POST['bus_type'];
				$this->home_model->update_bus_type($_POST['bus_type_id'], $formArray);
				$this->session->set_flashdata('success', 'Business Type Updated Successfully.');
				redirect(base_url() . 'home/business_type');
			} else {
				$data['title'] =  'Store Type Of Business';
				$formArray = array();
				$formArray['admin_id'] = $this->session->userdata('id');
				$formArray['typeofbusiness'] = $_POST['bus_type'];
				$this->home_model->insbustype($formArray);
				$this->session->set_flashdata('success', 'Business Type Added Successfully.');
				redirect(base_url() . 'home/business_type');
			}
		} else {
			$this->session->set_flashdata('failure', 'Invalid Username and Password');
			redirect(base_url() . 'home');
		}
	}

	public function delete_business_type()
	{
		if ($this->session->userdata('username') != '') {
			$id = $this->uri->segment(3);
			$delete = $this->db->where('id', $id)->delete('typeofbusiness');
			if ($delete) {
				$this->session->set_flashdata('success', 'Business Type Deleted Successfully.');
				redirect(base_url() . 'home/business_type');
			} else {
				$this->session->set_flashdata('failure', 'Business Type Already Deleted.');
				redirect(base_url() . 'home/business_type');
			}
		} else {
			$this->session->set_flashdata('failure', 'Invalid Username and Password');
			redirect(base_url() . 'home');
		}
	}

	public function business_size()
	{
		if ($this->session->userdata('username') != '') {
			$data['title'] =  'Size Of Business List';
			$data['rev'] = $this->home_model->bus_size_list_db();
			$this->load->view('admin/inc/header', $data);
			$this->load->view('admin/bus_size_list', $data);
			$this->load->view('admin/inc/footer');
		} else {
			$this->session->set_flashdata('failure', 'Invalid Username and Password');
			redirect(base_url() . 'home');
		}
	}

	public function add_business_size()
	{
		if ($this->session->userdata('username') != '') {
			$id = $this->uri->segment('3');
			if (!empty($id)) {
				$data['title'] =  'Edit Size Of Business';
				$data['rev'] = $this->home_model->specific_bus_size($id);
				$this->load->view('admin/inc/header', $data);
				$this->load->view('admin/add_bus_size', $data);
				$this->load->view('admin/inc/footer');
			} else {
				$data['title'] =  'Add Size Of Business';
				$this->load->view('admin/inc/header', $data);
				$this->load->view('admin/add_bus_size', $data);
				$this->load->view('admin/inc/footer');
			}
		} else {
			$this->session->set_flashdata('failure', 'Invalid Username and Password');
			redirect(base_url() . 'home');
		}
	}

	public function store_Bus_size()
	{
		if ($this->session->userdata('username') != '') {
			// echo '<pre>';print_r($_POST);die();
			if (!empty($_POST['bus_size_id'])) {
				$data['title'] =  'Update Type Of Business';
				$formArray = array();
				$formArray['admin_id'] = $this->session->userdata('id');
				$formArray['sizeofbusiness'] = $_POST['bus_size'];
				$this->home_model->update_bus_size($_POST['bus_size_id'], $formArray);
				$this->session->set_flashdata('success', 'Business Size Updated Successfully.');
				redirect(base_url() . 'home/business_size');
			} else {
				$data['title'] =  'Store Type Of Business';
				$formArray = array();
				$formArray['admin_id'] = $this->session->userdata('id');
				$formArray['sizeofbusiness'] = $_POST['bus_size'];
				$this->home_model->insbussize($formArray);
				$this->session->set_flashdata('success', 'Business Size Added Successfully.');
				redirect(base_url() . 'home/business_size');
			}
		} else {
			$this->session->set_flashdata('failure', 'Invalid Username and Password');
			redirect(base_url() . 'home');
		}
	}

	public function delete_business_size()
	{
		if ($this->session->userdata('username') != '') {
			$id = $this->uri->segment(3);
			$delete = $this->db->where('id', $id)->delete('sizeofbusiness');
			if ($delete) {
				$this->session->set_flashdata('success', 'Business Size Deleted Successfully.');
				redirect(base_url() . 'home/business_size');
			} else {
				$this->session->set_flashdata('failure', 'Business Size Already Deleted.');
				redirect(base_url() . 'home/business_size');
			}
		} else {
			$this->session->set_flashdata('failure', 'Invalid Username and Password');
			redirect(base_url() . 'home');
		}
	}

	public function state_with_gov()
	{
		if ($this->session->userdata('username') != '') {
			$data['title'] =  'State With Goverment List';
			$data['rev'] = $this->home_model->state_with_gov_list_db();
			$this->load->view('admin/inc/header', $data);
			$this->load->view('admin/state_with_gov_list', $data);
			$this->load->view('admin/inc/footer');
		} else {
			$this->session->set_flashdata('failure', 'Invalid Username and Password');
			redirect(base_url() . 'home');
		}
	}

	public function add_state_with_gov()
	{
		if ($this->session->userdata('username') != '') {
			$id = $this->uri->segment('3');
			if (!empty($id)) {
				$data['title'] =  'Edit State With Goverment';
				$data['rev'] = $this->home_model->specific_state_with_gov($id);
				$this->load->view('admin/inc/header', $data);
				$this->load->view('admin/add_state_with_gov', $data);
				$this->load->view('admin/inc/footer');
			} else {
				$data['title'] =  'Add State With Goverment';
				$this->load->view('admin/inc/header', $data);
				$this->load->view('admin/add_state_with_gov', $data);
				$this->load->view('admin/inc/footer');
			}
		} else {
			$this->session->set_flashdata('failure', 'Invalid Username and Password');
			redirect(base_url() . 'home');
		}
	}

	public function store_State_With_Goverment()
	{
		if ($this->session->userdata('username') != '') {
			// echo '<pre>';print_r($_POST);die();
			if (!empty($_POST['State_With_Goverment_id'])) {
				$data['title'] =  'Update State With Goverment';
				$formArray = array();
				$formArray['admin_id'] = $this->session->userdata('id');
				$formArray['state'] = $_POST['state'];
				$formArray['government'] = $_POST['government'];
				$this->home_model->update_state_with_gov($_POST['State_With_Goverment_id'], $formArray);
				$this->session->set_flashdata('success', 'State With Goverment Updated Successfully.');
				redirect(base_url() . 'home/state_with_gov');
			} else {
				$data['title'] =  'Store State With Goverment';
				$formArray = array();
				$formArray['admin_id'] = $this->session->userdata('id');
				$formArray['state'] = $_POST['state'];
				$formArray['government'] = $_POST['government'];
				$this->home_model->insstate_with_gov($formArray);
				$this->session->set_flashdata('success', 'State With Goverment Added Successfully.');
				redirect(base_url() . 'home/state_with_gov');
			}
		} else {
			$this->session->set_flashdata('failure', 'Invalid Username and Password');
			redirect(base_url() . 'home');
		}
	}

	public function delete_state_with_gov()
	{
		if ($this->session->userdata('username') != '') {
			$id = $this->uri->segment(3);
			$delete = $this->db->where('id', $id)->delete('statewithgovernment');
			if ($delete) {
				$this->session->set_flashdata('success', 'State With Goverment Deleted Successfully.');
				redirect(base_url() . 'home/state_with_gov');
			} else {
				$this->session->set_flashdata('failure', 'State With Goverment Already Deleted.');
				redirect(base_url() . 'home/state_with_gov');
			}
		} else {
			$this->session->set_flashdata('failure', 'Invalid Username and Password');
			redirect(base_url() . 'home');
		}
	}
}