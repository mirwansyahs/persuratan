<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_surat extends CI_Model {
	public function select($id = '', $jenis = '') {
			if ($id != '') {
				$this->db->where('tbl_surat.id', $id);
			}
			if ($jenis != '') {
				$this->db->where('tbl_surat.surat_jenis', $jenis);
			}

				$this->db->select('tbl_surat.*');
		
				$this->db->ORDER_BY('tbl_surat.tanggal_surat', 'ASC');
		$data = $this->db->get('tbl_surat');

		return $data;
	}
	public function simpan($data) {
		date_default_timezone_set('asia/jakarta');

		$arr = array(
			'tanggal_surat' 	=> html_escape($data['tanggal_surat']),
			'judul_surat'		=> html_escape($data['judul_surat']),
			'surat_jenis'		=> $data['surat_jenis'],
			'file_surat'		=> $data['file_surat'],
			'user_id'			=> $this->userdata->user_id
		);
		
		$result = $this->db->insert('tbl_surat', $arr);
		return $result;
	}

	public function update($data) {

		$arr = array(
			'tanggal_surat' 	=> html_escape($data['tanggal_surat']),
			'judul_surat'		=> html_escape($data['judul_surat']),
			'surat_jenis'		=> $data['surat_jenis'],
			'file_surat'		=> $data['file_surat']
		);
		

		$data = $this->db->update('tbl_surat', $arr, ['id' => $data['id']]);
		return $data;
	}


	public function delete($ID) {
		$data = $this->db->delete('tbl_surat', ['id' => $ID]);
		return $data;

	}

}

/* End of file M_admin.php */
/* Location: ./application/models/M_admin.php */
