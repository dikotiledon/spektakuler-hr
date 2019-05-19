<?php
	/**
	*
	*/
	class indexadmin extends CI_Controller
	{
		private $urldosen = 'http://localhost:8000/api/v1/hr/Dosen';
		private $urlfakultas = 'http://localhost:8000/api/v1/hr/Fakultas';
		private $urlstaff = 'http://localhost:8000/api/v1/hr/Staff';
		private $urlabsen = 'http://localhost:8000/api/v1/hr/Absen';
		private $urlcuti = 'http://localhost:8000/api/v1/hr/Cuti';

		public function __construct(){
			parent::__construct();
			$this->load->helper('text');
			$this->load->helper('url');
			$this->load->model('mdosen');
			$this->load->helper('form');
			if ($this->session->userdata('logged_as') !== 'admin') {
				redirect(base_url(),'refresh');
			}

		}
		public function index(){
			if ($this->session->userdata('logged_as') == 'admin') {
			    if ($this->input->method() == 'get') {
			      $dosen = $this->retrieve_list_by($this->session->userdata('id_fakultas'));
			      $data = [
			        'title' => 'Daftar Dosen',
			        'json' => $dosen,
			      ];
			      $this->load->view('admin/dashboard', $data);
			    }
			}
		}
		public function staff(){
			if ($this->session->userdata('logged_as') == 'admin') {
			    if ($this->input->method() == 'get') {
			      $staff = $this->retrieve_staff_by($this->session->userdata('id_fakultas'));
			      $data = [
			        'title' => 'Daftar Staff',
			        'json' => $staff,
			      ];
			      $this->load->view('admin/staff', $data);
			    }
			}
		}
		public function absensi()
		{
			if ($this->session->userdata('logged_as') == 'admin') {
			    if ($this->input->method() == 'get') {
			      $absen = $this->retrieve_absensi($this->session->userdata('id_fakultas'));
			      $data = [
			        'title' => 'Daftar Absensi',
			        'json' => $absen,
			      ];
			      $this->load->view('admin/absensi', $data);
			    }
			}			
		}
		public function updatecuti()
		{
			$data = array(
				'jeniscuti' => $this->input->post('jeniscuti'),
				'rentangtanggal' => $this->input->post('rentangtanggal'),
				'status' => 'approved',
				'keterangan' => $this->input->post('keterangan'),
				'nip' => $this->input->post('nip'),
				'id_fakultas' => $this->input->post('id_fakultas')
			);
			$this->retrieve_update_cuti($data);
			redirect(base_url('indexadmin/cuti'));
		}		
		public function updateabsensi()
		{
			$data = array(
				'nip' => $this->input->post('nip'),
				'id_fakultas' => $this->input->post('id_fakultas'),
				'status' => 'approved'
			);
			$this->retrieve_update_absensi($data);
			redirect(base_url('indexadmin/absensi'));
		}
		private function retrieve_update_cuti($data)
		{
			$api = curl_init();
			curl_setopt($api, CURLOPT_URL, $this->urlcuti . '/updateCuti/'.$data['nip']);
			curl_setopt($api, CURLOPT_CUSTOMREQUEST, "PUT");
			curl_setopt($api, CURLOPT_POSTFIELDS, http_build_query($data));
		   	$result = curl_exec($api);
		   	$result = json_decode($result);
		   	curl_close($api);			
		}		
		private function retrieve_update_absensi($data)
		{
			$api = curl_init();
			curl_setopt($api, CURLOPT_URL, $this->urlabsen . '/updateAbsen/'.$data['nip']);
			curl_setopt($api, CURLOPT_CUSTOMREQUEST, "PUT");
			curl_setopt($api, CURLOPT_POSTFIELDS, http_build_query($data));
		   	$result = curl_exec($api);
		   	$result = json_decode($result);
		   	curl_close($api);			
		}
		private function retrieve_absensi($id_fakultas)
		{
		  $api = curl_init();
		  curl_setopt($api, CURLOPT_URL, $this->urlabsen . '/fetchAbsen/'.$id_fakultas);
		  curl_setopt($api, CURLOPT_RETURNTRANSFER, true);
		  curl_setopt($api, CURLOPT_HEADER, false);
		  $result = curl_exec($api);
		  $result = json_decode($result);
		  curl_close($api);
		  return $result;			
		}
		public function cuti()
		{
			if ($this->session->userdata('logged_as') == 'admin') {
			    if ($this->input->method() == 'get') {
			      $cuti = $this->retrieve_cuti($this->session->userdata('id_fakultas'));
			      $data = [
			        'title' => 'Daftar Cuti',
			        'json' => $cuti,
			      ];
			      $this->load->view('admin/cuti', $data);
			    }
			}
		}
		private function retrieve_cuti($id_fakultas)
		{
		  $api = curl_init();
		  curl_setopt($api, CURLOPT_URL, $this->urlcuti . '/fetchCuti/'.$id_fakultas);
		  curl_setopt($api, CURLOPT_RETURNTRANSFER, true);
		  curl_setopt($api, CURLOPT_HEADER, false);
		  $result = curl_exec($api);
		  $result = json_decode($result);
		  curl_close($api);
		  return $result;			
		}		
		public function tambahdosen(){
			$fakultas = $this->retrieve_list_fakultas();
			    $data = [
			      'title' => 'Daftar Fakultas',
			      'json' => $fakultas,
			    ];			
			$this->load->view('admin/tambahdosen',$data);
		}
		public function tambahstaff(){
			$fakultas = $this->retrieve_list_fakultas();
			    $data = [
			      'title' => 'Daftar Fakultas',
			      'json' => $fakultas,
			    ];			
			$this->load->view('admin/tambahstaff',$data);
		}		
		public function processtambahdosen(){
			$data = array(
				'nip_dosen' => $this->input->post('nip_dosen'),
				'nama' => $this->input->post('nama'),
				'kodedosen' => $this->input->post('kodedosen'),
				'alamat' => $this->input->post('alamat'),
				'ttl' => $this->input->post('ttl'),
				'nohp' => $this->input->post('nohp'),
				'gaji' => $this->input->post('gaji'),
				'id_fakultas' => $this->input->post('fakultas')
			);
			$this->retrievetambahdosen($data);
			redirect(base_url(),'refresh');
		}
		public function processtambahstaff(){
			$data = array(
				'nip_staff' => $this->input->post('nip_staff'),
				'jenis_staff' => $this->input->post('jenis_staff'),
				'nama' => $this->input->post('nama'),
				'alamat' => $this->input->post('alamat'),
				'ttl' => $this->input->post('ttl'),
				'nohp' => $this->input->post('nohp'),
				'gaji' => $this->input->post('gaji'),
				'id_fakultas' => $this->input->post('fakultas')
			);
			$this->retrievetambahstaff($data);
			redirect(base_url('indexadmin/staff'),'refresh');
		}
		private function retrievetambahstaff($data)
		{
			$post = [
				'nip_staff'=> $data['nip_staff'],
				'jenis_staff'=> $data['jenis_staff'],
				'nama'=> $data['nama'],
				'alamat'=> $data['alamat'],
				'ttl'=> $data['ttl'],
				'nohp'=> $data['nohp'],
				'gaji'=> $data['gaji'],
				'id_fakultas'=> $data['id_fakultas'],
			];

			$api = curl_init();
			curl_setopt($api, CURLOPT_URL, $this->urlstaff . '/newStaff/');
			curl_setopt($api, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($api, CURLOPT_POSTFIELDS, http_build_query($data));
			// curl_setopt($api, CURLOPT_POSTFIELDS, $data);
		   	$result = curl_exec($api);
		   	$result = json_decode($result);
		   	curl_close($api);
		   	return $result;			
		}				
		private function retrievetambahdosen($data)
		{
			$post = [
				'nip_dosen'=> $data['nip_dosen'],
				'nama'=> $data['nama'],
				'kodedosen'=> $data['kodedosen'],
				'alamat'=> $data['alamat'],
				'ttl'=> $data['ttl'],
				'nohp'=> $data['nohp'],
				'gaji'=> $data['gaji'],
				'id_fakultas'=> $data['id_fakultas'],
			];

			$api = curl_init();
			curl_setopt($api, CURLOPT_URL, $this->urldosen . '/newDosen/');
			curl_setopt($api, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($api, CURLOPT_POSTFIELDS, http_build_query($data));
			// curl_setopt($api, CURLOPT_POSTFIELDS, $data);
		   	$result = curl_exec($api);
		   	$result = json_decode($result);
		   	curl_close($api);
		   	return $result;			
		}
		public function deletedosen(){
			$nip_dosen = $this->input->post('nipdosen');
			$this->delete_dosen($nip_dosen);
			redirect(base_url(),'refresh');
		}
		public function deletestaff(){
			$nip_staff = $this->input->post('nipstaff');
			$this->delete_staff($nip_staff);
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
				'id_fakultas' => $this->input->post('fakultas')
			);
			$fakultas = $this->retrieve_list_fakultas();
			    $data = [
			      'title' => 'Daftar Fakultas',
			      'json' => $fakultas,
			    ];
			$datanya = $data + $param; 
			$this->load->view('admin/updatedosen', $datanya);
		}
		public function updatestaff(){
			$param = array(
				'nip_staff' => $this->input->post('nip_staff'),
				'nama' => $this->input->post('nama'),
				'jenis_staff' => $this->input->post('jenis_staff'),
				'alamat' => $this->input->post('alamat'),
				'ttl' => $this->input->post('ttl'),
				'nohp' => $this->input->post('nohp'),
				'gaji' => $this->input->post('gaji'),
				'id_fakultas' => $this->input->post('fakultas')
			);
			$fakultas = $this->retrieve_list_fakultas();
			    $data = [
			      'title' => 'Daftar Fakultas',
			      'json' => $fakultas,
			    ];
			$datanya = $data + $param; 
			$this->load->view('admin/updatestaff', $datanya);
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
				'id_fakultas' => $this->input->post('fakultas')
			);
			$this->retrieveupdatedosen($data);
			redirect(base_url(),'refresh');
		}
		public function processupdatestaff(){
			$data = array(
				'nip_staff' => $this->input->post('nip_staff'),
				'jenis_staff' => $this->input->post('jenis_staff'),
				'nama' => $this->input->post('nama'),
				'alamat' => $this->input->post('alamat'),
				'ttl' => $this->input->post('ttl'),
				'nohp' => $this->input->post('nohp'),
				'gaji' => $this->input->post('gaji'),
				'id_fakultas' => $this->input->post('fakultas')
			);
			$this->retrieveupdatestaff($data);
			redirect(base_url('indexadmin/staff'),'refresh');
		}		
		private function retrieveupdatedosen($data){
			$api = curl_init();
			curl_setopt($api, CURLOPT_URL, $this->urldosen . '/updateDosen/'.$data['nip_dosen']);
			curl_setopt($api, CURLOPT_CUSTOMREQUEST, "PUT");
			curl_setopt($api, CURLOPT_POSTFIELDS, http_build_query($data));
		   	$result = curl_exec($api);
		   	$result = json_decode($result);
		   	curl_close($api);
		}
		private function retrieveupdatestaff($data){
			$api = curl_init();
			curl_setopt($api, CURLOPT_URL, $this->urlstaff . '/updateStaff/'.$data['nip_staff']);
			curl_setopt($api, CURLOPT_CUSTOMREQUEST, "PUT");
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
		private function retrieve_staff_by($id_fakultas) {
		  $api = curl_init();
		  curl_setopt($api, CURLOPT_URL, $this->urlstaff . '/Showbyfakultas/'.$id_fakultas);
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
		private function delete_staff($nip_staff) {
		   $api = curl_init();
		   $data = json_decode($nip_staff);
		   curl_setopt($api, CURLOPT_URL, $this->urlstaff . '/removeStaff/'.$nip_staff);
		   curl_setopt($api, CURLOPT_CUSTOMREQUEST, "DELETE");
		   curl_setopt($api, CURLOPT_POSTFIELDS, json_encode($data));

		   $result = curl_exec($api);
		   $result = json_decode($result);
		   curl_close($api);
		   return $result;
		 }			 		  	

	}

?>
