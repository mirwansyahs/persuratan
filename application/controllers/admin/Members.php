<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Members extends AUTH_Controller {
	function __construct()
	{
		parent::__construct();
		secure_allowed_position(['admin']);
	}
	
	public function index()
	{
		$data = array(
			'active'		=> 'members',
			'headerTitle'	=> 'Pengguna',
			'data'			=> $this->M_admin->select()->result()
		);

		$this->backend->views('admin/members/list', $data);
	}

	public function getData()
	{
		$fetch = $this->M_admin->select();
		
		if ($fetch->num_rows() > 0){
			$data = array(
				'active'		=> 'members',
				'headerTitle'	=> 'Pengguna',
				'data'			=> $fetch->result()
			);
			if ($data['data'] != null){
				$arr = array(
					'succ'	=> 1,
					'data'	=> $this->load->view('admin/members/listMembers', $data, true),
					'message'=> 'Data berhasil diambil.'
				);
			}else{
				$arr = array(
					'succ'	=> 0,
					'data'	=> '',
					'message'=> 'Data gagal diambil.'
				);
			}
		}else{
			$arr = array(
				'succ'	=> 0,
				'data'	=> '',
				'message'=> 'Data gagal diambil.'
			);
		}

		echo json_encode($arr);
	}

	public function add()
	{
		$data = array(
			'active'		=> 'members',
			'headerTitle'	=> 'Pengguna',
		);
		$this->backend->views('admin/members/add', $data);
	}

	public function addProccess()
	{
		$data 		= $this->input->post();
		$response 	= $this->M_admin->save($data);
		if ($response)
		{
			$this->session->set_flashdata('msg', swal("succ", "Data berhasil ditambahkan."));
			redirect('admin/members');
		}
		else
		{
			$this->session->set_flashdata('msg', swal("err", "Data gagal ditambahkan."));
			redirect('admin/members/add');
		}
	}

	public function edit($user_id = null)
	{
		$data = array(
			'active'		=> 'members',
			'headerTitle'	=> 'Pengguna',
			'id'			=> $user_id,
			'data'			=> $this->M_admin->select($user_id)->row()
		);
		$this->backend->views('admin/members/edit', $data);
	}

	public function editProccess($user_id = null)
	{
		$data = $this->input->post();
		if ($data['password'] != ""){
			$arr = array(
				'email'			=> $data['email'],
				'nama'			=> $data['nama'],
				'password'		=> md5($data['password']),
				'role'	=> $data['role'],
				'user_id'		=> $user_id
			);
	
		}else{
			$arr = array(
				'email'			=> $data['email'],
				'nama'			=> $data['nama'],
				'role'	=> $data['role'],
				'user_id'		=> $user_id
			);
	
		}

		$response = $this->M_admin->update($arr);

		if ($response)
		{
			$this->session->set_flashdata('msg', swal("succ", "Data berhasil diubah."));
			redirect('admin/members/edit/'.$user_id);
		}
		else
		{
			$this->session->set_flashdata('msg', swal("err", "Data gagal diubah."));
			redirect('admin/members/edit/'.$user_id);
		}
	}

	public function delete($user_id = null)
	{
		$response = $this->M_admin->delete(['user_id' => $user_id]);

		if ($response)
		{

			$this->session->set_flashdata('msg', swal("succ", "Data berhasil dihapus."));
		}
		else
		{
			$this->session->set_flashdata('msg', swal("err", "Data gagal dihapus."));
		}
		
		redirect('admin/members');
	}

}
