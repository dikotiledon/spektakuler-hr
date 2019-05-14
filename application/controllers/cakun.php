<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class cakun extends CI_Controller {
	public function __construct()
	{	
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('Akun');
	}

	public function index()
	{
		if($this->session->userdata('logged') == 'login' && $this->session->userdata('logged_as') == 'admin')
		{
			redirect('indexadmin');
		}elseif ($this->session->userdata('logged') == 'login' && $this->session->userdata('logged_as') == 'dosen') {
			redirect('indexdosen');
		}elseif ($this->session->userdata('logged') == 'Slogin' && $this->session->userdata('logged_as') == 'staff') {
			redirect('indexstaff');
		}else{
			$this->load->view('auth/v_login');
		}
	}
	function aksi_login(){
		$nip = $this->input->post('nimnip');
		$result = substr($nip, 0, 2);
		if (strpos($result, '23') !== false) {
			$where = array(
				'nip_admin' => $nip
				);			
			$cek = $this->Akun->cek_login("hr_admin",$where);
			if($cek){
				$data_session = array(
					'nama' => $nip,
					'id_fakultas' => $cek->id_fakultas,
					'logged' => "login",
					'logged_as' => "admin"
					);
			}else{
				redirect(base_url(), 'refresh');
			}		    
		}elseif (strpos($result, '98') !== false) {
			$where = array(
				'nip_staff' => $nip
				);			
			$cek = $this->Akun->cek_login("hr_staff",$where)->num_rows();
			if($cek > 0){
				$data_session = array(
					'nama' => $nip,
					'logged' => "login",
					'logged_as' => "staff"
					);
			}else{
				redirect(base_url(), 'refresh');
			}				
		}elseif (strpos($result, '1') !== false) {
			$where = array(
				'nip_dosen' => $nip
				);			
			$cek = $this->Akun->cek_login("hr_dosen",$where)->num_rows();
			if($cek > 0){
				$data_session = array(
					'nama' => $nip,
					'logged' => "login",
					'logged_as' => "dosen"
					);
			}else{
				redirect(base_url(), 'refresh');
			}				
		}
		$this->session->set_userdata($data_session);
		if ($this->session->userdata('logged_as') == 'admin') {
			echo "<script>alert('Berhasil Login!');</script>";
			redirect('indexadmin/index', 'refresh');
		}
		// if($cek > 0){
 
		// 	$data_session = array(
		// 		'nama' => $username,
		// 		'logged' => "login"
		// 		);
 
		// 	$this->session->set_userdata($data_session);
		// 	echo "<script>alert('Berhasil Login!');</script>";
		// 	redirect(base_url(""), 'refresh');
 
		// }else{
		// 	echo "Username dan password salah !";
		// }
	}
// 	//Indah Ayu NF_1301164004
// 	public function v_regist()
// 	{
// 		$this->load->view('v_register');
// 	}


// 	//Indah Ayu NF_1301164004
// 	public function daftar_akun()
// 	{
// 		$data = new stdClass();
// 		$this->load->helper('form');
// 		$this->load->library('form_validation');
// 		$this->load->model('Akun');
// 		$this->form_validation->set_rules('username', 'Username', 'trim|required|alpha_numeric|min_length[4]|is_unique[account.username]', array('is_unique' => 'This username already exists. Please choose another one.'));
// 		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');

// 		if ($this->form_validation->run() === false) {
// 			echo "<script>alert('Gagal Register!');</script>";
// 			redirect(base_url(""), 'refresh');


			
// 		} else {

// 		$username = $this->input->post('username');
// 		$password = $this->input->post('password');
// 		$nama = $this->input->post('nama');
// 		$data = array(
// 			'username' => $username,
// 			'password' => $password,
// 			'nama'     => $nama	
// 		);
// 		$insert = $this->Akun->daftar_akun($data);
// 			if ($insert) {
				
// 				// user creation ok
// 			echo "<script>alert('Berhasil Login!');</script>";
// 			redirect(base_url(""), 'refresh');
				
// 			} else {
				
// 			echo "<script>alert('Gagal Register!');</script>";
// 			redirect(base_url(""), 'refresh');
				
// 			}
			
// 		}

// 	}

// 	//Indah Ayu NF_1301164004
// 	public function cek_login()
// 	{
// 		$data = $this->input->post(null, TRUE);
// 		$login = $this->Akun->login_akun($data);
// 		if($login) {
// 			$newdata = array(
// 				'logged' => 'Sudah Login',
// 				'username' => $login->username,
// 				'password' => $login->password,
// 				'email' => $login->email,
// 				'name' => $login->name,
// 			);
// 			$this->session->set_userdata($newdata);
// 			redirect('c_akun/index');
// 		} else {
// 			$this->session->set_flashdata('info','gagal_login');
// 			redirect('home/materi');
// 		}
// 	}

// 	//Riandi Kartiko_1301164300
// 	public function edit_dataakun(){
// 		if ($this->input->post('submit')) {

// 		      $password = $this->input->post('password');
// 		      $namalengkap = $this->input->post('namalengkap');
// 		      $email = $this->input->post('email');
// 		      $alamat = $this->input->post('alamat');

// 			 $diupdate = $this->Akun->updateAkun($this->session->userdata('username'),$namalengkap,$password,$email,$alamat);
// 				if($diupdate)
// 				{	
// /*							$newdata = array(
// 							'logged' => 'Sudah Login',
// 							'username' => $this->session->userdata('username'),
// 							'password' => $password,
// 							'email' => $email,
// 							'name' => $namalengkap,
// 							'address' => $alamat,
// 							'img' => 'default.svg'
// 						);
// 				$this->session->set_userdata($newdata);*/
// 					redirect('c_akun/index');

// 				}else{
// 					$this->session->set_flashdata('info','gagal_update');
// 					redirect('c_akun/index');
// 				}
// 		}
//     }

	public function logout() {
		$this->session->sess_destroy();
		redirect(base_url(),'refresh');
	}
}