<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('M_admin');
	}
	
	public function index()
	{
		if ($this->session->userdata('status') != null)
		{
			redirect('admin/home');
		}else{
			$this->load->view('login');
		}
	}

	public function regist()
	{
		if ($this->session->userdata('status') != null)
		{
			redirect('admin/home');
		}else{
			$this->load->view('register');
		}
	}

	public function prosesregist()
	{
		$data = $this->input->post();

		$result = $this->M_admin->save($data);

		if ($result){
			redirect('Auth');
		}else{
			redirect('auth/regist');
		}
	}

	public function secure()
	{
		$data = $this->input->post();
		$username = trim($data['email']);
		$password = trim($data['password']);

		$result = $this->M_admin->auth($username, $password);
		if ($result->num_rows() == 0) {			
			$arr = array(
				'succ'	=> 0,
				'msg'	=> "Username atau Password salah."
			);
		} else {
			date_default_timezone_set('Asia/Jakarta');
			$session = [
				'userdata' => $result->row(),
				'status' => "Loged in"
			];

			$this->session->set_userdata('file_manager',true);
			$this->session->set_userdata($session);
			if (@$this->input->get('redirect')){
				$redirect = $this->input->get('redirect');
				// if (strtolower($redirect) == "aspirations"){
				// 	redirect('Administrator/Aspirations');
				// }
			}else{
				$redirect = "admin/home";
			}
			
			$arr = array(
				'succ'		=> 1,
				'msg'		=> "Login berhasil",
				'data'		=> array(
					'redirect'	=> $redirect
				)
			);
		}
		echo json_encode($arr);
	}

	public function signout()
	{
		$this->session->sess_destroy();
		redirect('auth');
	}
}
