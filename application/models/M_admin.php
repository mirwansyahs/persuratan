<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_admin extends CI_Model {

	public function auth($email = '', $password = ''){
					$this->db->select('*');
					$this->db->where('email', $email);
					$this->db->where('password', md5($password));
					$this->db->from('tbl_user');
		$result = 	$this->db->get();

		return $result;
	}

	public function select($user_id = '', $email = '', $offset = '', $limit = '', $random = ''){
		if ($user_id != ''){
			$this->db->where('user_id', $user_id);
		}

		if ($email != ''){
			$this->db->where('email', $email);
		}
		
		if ($offset != '' || $limit != '') {
			$this->db->limit($limit, $offset);
		}

		if ($random != ''){
			$this->db->order_by('rand()');
		}

					$this->db->from('tbl_user');
		$response = $this->db->get();
		return $response;
	}

	public function save($data){
		date_default_timezone_set('asia/jakarta');
		$arr = array(
			'email'			=> $data['email'],
			'nama'			=> @$data['nama'],
			'password'		=> md5($data['password']),
			'role'			=> @$data['role'],
		);

		$response = $this->db->insert('tbl_user', $arr);
		return $response;
	}

	public function update($arr){
		date_default_timezone_set('asia/jakarta');
		$response = $this->db->update('tbl_user', $arr, ['user_id' => $arr['user_id']]);
		return $response;
	}

	public function delete($arr){
		return $this->db->delete('tbl_user', $arr);
	}
}

/* End of file M_admin.php */
/* Location: ./application/models/M_admin.php */