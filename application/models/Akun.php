<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akun extends CI_Model 
{
	public function daftar_akun($data)
	{
		$param = array(
            "username"=>$data['username'],
            "password"=>$data['password'],
            "nama"=>$data['nama'],
		);
		$insert = $this->db->insert('account', $param);
		if ($insert) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	public function login_akun($data) {
		$this->db->where('username',$data['username']);
		$result = $this->db->get('account');
		if ($result->num_rows()==1) {
			return $result->row(0);
		}else{
			return false;
		}
	}
	function cek_login($table,$where){		
		$result = $this->db->get_where($table,$where);
		if ($result->num_rows()==1) {
			return $result->row(0);
		}else{
			return false;
		}		
	}	
	
}