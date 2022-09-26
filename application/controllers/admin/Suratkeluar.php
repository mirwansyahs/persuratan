<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Suratkeluar extends AUTH_Controller {
	function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{
		$data = array(
			'active'		=> 'surat keluar',
			'headerTitle'	=> 'Surat Keluar',
			'data'			=> $this->M_surat->select('', 'keluar')->result()
		);

		$this->backend->views('admin/suratkeluar/list', $data);
	}

	public function add()
	{
		$data = array(
			'active'		=> 'surat keluar',
			'headerTitle'	=> 'Surat Keluar',
		);
		$this->backend->views('admin/suratkeluar/add', $data);
	}

	public function addProccess()
	{
		$data 		= $this->input->post();
		$data['surat_jenis']	= 'keluar';
		$config['upload_path']		= './uploads/'; //path folder
		$config['allowed_types']	= 'docx|doc|xlxs|xls|pdf|pptx|jpg|png|jpeg'; //type yang dapat diakses bisa anda sesuaikan
		$config['encrypt_name']		= TRUE; //nama yang terupload nantinya


		$this->upload->initialize($config);
		
		if($this->upload->do_upload("file_surat")){
		    $image = $this->upload->data();
			$data['file_surat']	= $image['file_name'];
			$response 	= $this->M_surat->simpan($data);
			if ($response)
			{
				$this->session->set_flashdata('msg', swal("succ", "Data berhasil ditambahkan."));
			}
			else
			{
				$this->session->set_flashdata('msg', swal("err", "Data gagal ditambahkan."));
			}
		}else{
			$this->session->set_flashdata('msg', swal("err", $this->upload->display_errors()));
		}

		redirect('admin/suratkeluar/add');
		
	}

	public function edit($user_id = null)
	{
		$data = array(
			'active'		=> 'surat keluar',
			'headerTitle'	=> 'Surat Keluar',
			'id'			=> $user_id,
			'data'			=> $this->M_surat->select($user_id)->row()
		);
		$this->backend->views('admin/suratkeluar/edit', $data);
	}

	public function editProccess($user_id = null)
	{
		$data = $this->input->post();
		$data['id']	= $user_id;
		$data['surat_jenis']	= 'keluar';
		
		$config['upload_path']		= './uploads/'; //path folder
		$config['allowed_types']	= 'docx|doc|xlxs|xls|pdf|pptx|jpg|png|jpeg'; //type yang dapat diakses bisa anda sesuaikan
		$config['encrypt_name']		= TRUE; //nama yang terupload nantinya


		$this->upload->initialize($config);
		
		if($this->upload->do_upload("file_surat")){
		    $image = $this->upload->data();
			$data['file_surat']	= $image['file_name'];
		}else{
			$data['file_surat']	= $this->M_surat->select($user_id)->row()->file_surat;
			
			// $this->session->set_flashdata('msg', swal("err", $this->upload->display_errors()));
		}

		$response = $this->M_surat->update($data);

		if ($response)
		{
			$this->session->set_flashdata('msg', swal("succ", "Data berhasil diubah."));
			redirect('admin/suratkeluar/edit/'.$user_id);
		}
		else
		{
			$this->session->set_flashdata('msg', swal("err", "Data gagal diubah."));
			redirect('admin/suratkeluar/edit/'.$user_id);
		}
	}

	public function delete($user_id = null)
	{
		$response = $this->M_surat->delete($user_id);

		if ($response)
		{

			$this->session->set_flashdata('msg', swal("succ", "Data berhasil dihapus."));
		}
		else
		{
			$this->session->set_flashdata('msg', swal("err", "Data gagal dihapus."));
		}
		
		redirect('admin/suratkeluar');
	}

}
