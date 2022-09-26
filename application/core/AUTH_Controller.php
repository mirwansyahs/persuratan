<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AUTH_Controller extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_admin');
		$this->load->model('M_surat');
		$this->load->library('upload');
		date_default_timezone_set('asia/jakarta');

		$this->session->set_flashdata('segment', explode('/', $this->uri->uri_string()));

		if ($this->session->userdata('status') == '') {
			redirect('Auth');
		}else{
			$data = $this->M_admin->select($this->session->userdata('userdata')->user_id);

			if ($data->num_rows() > 0){
				$this->userdata = $data->row();
			}else{
				$this->session->sess_destroy();
				redirect('Auth');
			}
		}
	}
}
