<?php
	/**
	*
	*/
	class indexadmin extends CI_Controller
	{
		private $urldosen = 'http://localhost:8000/api/v1/hr/Dosen';
		private $urlfakultas = 'http://localhost:8000/api/v1/hr/Fakultas';
		public function __construct(){
			parent::__construct();
			$this->load->helper('text');
			$this->load->helper('url');
			$this->load->model('mdosen');
			$this->load->helper('form');

		}
		public function index(){
			if ($this->session->userdata('logged_as') == 'admin') {
			    if ($this->input->method() == 'get') {
			      $dosen = $this->retrieve_list_by($this->session->userdata('id_fakultas'));
			      $data = [
			        'title' => 'Daftar Dosen',
			        'json' => $dosen,
			      ];
			      $this->load->view('dashboard', $data);
			    }
			}
		}

		public function deletedosen(){
			$nip_dosen = $this->input->post('nipdosen');
			$this->delete_dosen($nip_dosen);
			redirect(base_url(),'refresh');
		}
		public function updatedosen(){
			$param = array(
				'nip_dosen' => $this->input->post('nip_dosen'),
				'nama' => $this->input->post('nama'),
				'kodedosen' => $this->input->post('kodedosen'),
				'alamat' => $this->input->post('alamat'),
				'ttl' => $this->input->post('ttl'),
				'nohp' => $this->input->post('nohp'),
				'gaji' => $this->input->post('gaji'),
				'id_fakultas' => $this->input->post('id_fakultas')
			);
			$fakultas = $this->retrieve_list_fakultas();
			    $data = [
			      'title' => 'Daftar Fakultas',
			      'json' => $fakultas,
			    ];
			$datanya = $data + $param; 
			$this->load->view('admin/updatedosen', $datanya);
		}

		public function processupdatedosen(){
			$data = array(
				'nip_dosen' => $this->input->post('nip_dosen'),
				'kodedosen' => $this->input->post('kodedosen'),
				'nama' => $this->input->post('nama'),
				'alamat' => $this->input->post('alamat'),
				'ttl' => $this->input->post('ttl'),
				'nohp' => $this->input->post('nohp'),
				'gaji' => $this->input->post('gaji'),
				'id_fakultas' => $this->input->post('id_fakultas')
			);
			$this->retrieveupdate($data);
			redirect(base_url(),'refresh');
		}
		private function retrieveupdate($data){
			$api = curl_init();
			curl_setopt($api, CURLOPT_URL, $this->urldosen . '/updateDosen/'.$data['nip_dosen']);
			curl_setopt($api, CURLOPT_CUSTOMREQUEST, "PUT");
			// curl_setopt($api, CURLOPT_POSTFIELDS, json_encode($data));
			curl_setopt($api, CURLOPT_POSTFIELDS, http_build_query($data));
		   	$result = curl_exec($api);
		   	$result = json_decode($result);
		   	curl_close($api);
		   	
		   	
		}

		private function retrieve_list() {
		   $api = curl_init();
		   curl_setopt($api, CURLOPT_URL, $this->urldosen . '/ShowDosen');
		   curl_setopt($api, CURLOPT_RETURNTRANSFER, true);
		   curl_setopt($api, CURLOPT_HEADER, false);

		   $result = curl_exec($api);
		   $result = json_decode($result);
		   curl_close($api);

		   return $result;
		 }
		private function retrieve_list_fakultas() {
		   $api = curl_init();
		   curl_setopt($api, CURLOPT_URL, $this->urlfakultas . '/ShowFakultas');
		   curl_setopt($api, CURLOPT_RETURNTRANSFER, true);
		   curl_setopt($api, CURLOPT_HEADER, false);

		   $result = curl_exec($api);
		   $result = json_decode($result);
		   curl_close($api);
		   return $result;
		 }		 
		private function retrieve_list_by($id_fakultas) {
		  $api = curl_init();
		  curl_setopt($api, CURLOPT_URL, $this->urldosen . '/Showbyfakultas/'.$id_fakultas);
		  curl_setopt($api, CURLOPT_RETURNTRANSFER, true);
		  curl_setopt($api, CURLOPT_HEADER, false);

		  $result = curl_exec($api);
		  $result = json_decode($result);
		  curl_close($api);

		  return $result;
		 }
		private function delete_dosen($nip_dosen) {
		   $api = curl_init();
		   $data = json_decode($nip_dosen);
		   curl_setopt($api, CURLOPT_URL, $this->urldosen . '/removeDosen/'.$nip_dosen);
		   curl_setopt($api, CURLOPT_CUSTOMREQUEST, "DELETE");
		   curl_setopt($api, CURLOPT_POSTFIELDS, json_encode($data));

		   $result = curl_exec($api);
		   $result = json_decode($result);
		   curl_close($api);

		   return $result;
		 }		  	
		// public function deleteDosen()
		// {
		// 	$data = $this->input->post('kode');
		// 	$data['dosen'] = $this->mdosen->hapusData($data);
		// 	header('Location: '.$_SERVER['HTTP_REFERER']);
		// }
	}

?>
