<?php
	class Frontend {
		protected $_ci;

		function __construct() {
			$this->_ci = &get_instance(); //Untuk Memanggil function load, dll dari CI. ex: $this->load, $this->model, dll
		}

		function views($template = NULL, $data = NULL) {
			if ($template != NULL) {
				$data['_header'] 				= $this->_ci->load->view('layout/frontend/_header', $data, TRUE);

                //nav
                $data['_nav'] 					= $this->_ci->load->view('layout/frontend/_nav', $data, TRUE);
				
				//hero
				$data['_hero'] 					= $this->_ci->load->view('layout/frontend/_hero', $data, TRUE);
                $data['_hero2'] 					= $this->_ci->load->view('layout/frontend/_hero2', $data, TRUE);
				//Content
				$data['_mainContent'] 			= $this->_ci->load->view($template, $data, TRUE);
				$data['_content'] 				= $this->_ci->load->view('layout/frontend/_content', $data, TRUE);
				//Footer
				$data['_footer1'] 				= $this->_ci->load->view('layout/frontend/_footer1', $data, TRUE);
				

				echo $data['_template'] 		= $this->_ci->load->view('layout/frontend/_template', $data, TRUE);
			}
		}
	}
	
?>