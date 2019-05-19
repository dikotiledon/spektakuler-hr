<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class cakun extends CI_Controller {
private $urldosen = 'http://localhost:8000/api/v1/hr/Dosen';
private $urlfakultas = 'http://localhost:8000/api/v1/hr/Fakultas';
private $urlstaff = 'http://localhost:8000/api/v1/hr/Staff';
private $urladmin = 'http://localhost:8000/api/v1/hr/Admin';	
	public function __construct()
	{	
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('Akun');
		$this->load->helper('text');
		$this->load->helper('url');
		$this->load->model('mdosen');
		$this->load->helper('form');		
	}

	public function index()
	{
		if($this->session->userdata('logged') == 'login' && $this->session->userdata('logged_as') == 'admin')
		{
			redirect('indexadmin');
		}elseif ($this->session->userdata('logged') == 'login' && $this->session->userdata('logged_as') == 'dosen') {
			redirect('indexdosen');
		}elseif ($this->session->userdata('logged') == 'login' && $this->session->userdata('logged_as') == 'staff') {
			redirect('indexstaff');
		}else{
			$this->load->view('auth/v_login');
		}
	}
	private function retrieveAkun($nip) {
		$result = substr($nip, 0, 2);
		if (strpos($result, '23') !== false) {
			$api = curl_init();
			curl_setopt($api, CURLOPT_URL, $this->urladmin . '/Show/'.$nip);
			curl_setopt($api, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($api, CURLOPT_HEADER, false);
			$result = curl_exec($api);
			$result = json_decode($result,true);
			curl_close($api);
			return $result;

		}elseif (strpos($result, '98') !== false) {
			$api = curl_init();
			curl_setopt($api, CURLOPT_URL, $this->urlstaff . '/Show/'.$nip);
			curl_setopt($api, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($api, CURLOPT_HEADER, false);

			$result = curl_exec($api);
			$result = json_decode($result,true);
			curl_close($api);
			return $result;
		}elseif (strpos($result, '12') !== false) {
			$api = curl_init();
			curl_setopt($api, CURLOPT_URL, $this->urldosen . '/Show/'.$nip);
			curl_setopt($api, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($api, CURLOPT_HEADER, false);
			$result = curl_exec($api);
			$result = json_decode($result,true);
			curl_close($api);
			return $result;
		}

		// $api = curl_init();
		// curl_setopt($api, CURLOPT_URL, $this->urldosen . '/Show/'.$nip);
		// curl_setopt($api, CURLOPT_RETURNTRANSFER, true);
		// curl_setopt($api, CURLOPT_HEADER, false);

		// $result = curl_exec($api);
		// $result = json_decode($result);
		// curl_close($api);
		// return $result;
	 }
	public function aksi_login(){
		$nip = $this->input->post('nimnip');
		$auth = $this->retrieveAkun($nip);
	    $data = [
	      'authenticate' => 'Login',
	      'json' => $auth,
	    ];
	    if (isset($auth['data'][0]['nip_admin'])) {
	    	$data_session = array(
			'nip' => $nip,
			'id_fakultas' => $auth['data'][0]['id_fakultas'],
			'logged' => "login",
			'logged_as' => "admin"
			);
			$this->session->set_userdata($data_session);
			redirect('indexadmin/index', 'refresh');

	    }elseif (isset($auth['data'][0]['nip_dosen'])) {
	    	$data_session = array(
			'nip' => $nip,
			'nama' => $auth['data'][0]['nama'],
			'alamat' => $auth['data'][0]['alamat'],
			'ttl' => $auth['data'][0]['ttl'],
			'nohp' => $auth['data'][0]['nohp'],
			'id_fakultas' => $auth['data'][0]['id_fakultas'],
			'logged' => "login",
			'logged_as' => "dosen"
			);
			$this->session->set_userdata($data_session);
			redirect('indexdosen/index', 'refresh');

	    }elseif (isset($auth['data'][0]['nip_staff'])) {
	    	$data_session = array(
			'nip' => $nip,
			'id_fakultas' => $auth['data'][0]['id_fakultas'],
			'logged' => "login",
			'logged_as' => "staff"
			);
			$this->session->set_userdata($data_session);
	    }else{
	    	redirect(base_url(), 'refresh');
	    }
	}
	public function logout() {
		$this->session->sess_destroy();
		redirect(base_url(),'refresh');
	}
}