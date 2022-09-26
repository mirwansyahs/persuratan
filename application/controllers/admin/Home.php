<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends AUTH_Controller {
	function __construct()
	{
		parent::__construct();
		
	}
	
	public function index()
	{
		$data = array(
			'active'		=> 'home',
			'headerTitle'	=> 'Halaman Awal',
		);

		$this->backend->views('admin/home', $data);
	}

}
