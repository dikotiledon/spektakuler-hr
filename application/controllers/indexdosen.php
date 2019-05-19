<?php
class indexdosen extends CI_Controller
{
	private $urldosen = 'http://localhost:8000/api/v1/hr/Dosen';
	private $urlabsen = 'http://localhost:8000/api/v1/hr/Absen';
	private $urlcuti = 'http://localhost:8000/api/v1/hr/Cuti';
	public function __construct(){
		parent::__construct();
		$this->load->helper('text');
		$this->load->helper('url');
		$this->load->model('mdosen');
		$this->load->helper('form');
		if ($this->session->userdata('logged_as') !== 'dosen') {
			redirect(base_url(),'refresh');
		}
	}
	public function index()
	{
		$this->load->view('dosen/dashboard');
	}
	public function absensi()
	{
		$data = array(
			'nip' => $this->input->post('nip'),
			'id_fakultas' => $this->input->post('id_fakultas'),
			'status' => 'not approved'
		);
		$this->retrieveabsen($data);
		echo "<script>alert('Berhasil Absen!');</script>";
		redirect(base_url('indexdosen/index'),'refresh');

	}
	private function retrieveabsen($data)
	{
		$post = [
			'nip'=> $data['nip'],
			'id_fakultas'=> $data['id_fakultas'],
			'status'=> $data['status']
		];

		$api = curl_init();
		curl_setopt($api, CURLOPT_URL, $this->urlabsen . '/newAbsen/');
		curl_setopt($api, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($api, CURLOPT_POSTFIELDS, http_build_query($data));
		// curl_setopt($api, CURLOPT_POSTFIELDS, $data);
	   	$result = curl_exec($api);
	   	$result = json_decode($result);
	   	curl_close($api);
	   	return $result;			
	}
	public function fetchCuti()
	{
		if ($this->session->userdata('logged_as') == 'dosen') {
		    if ($this->input->method() == 'get') {
		      $cuti = $this->retrieve_list_cuti($this->session->userdata('nip'));
		      $data = [
		        'title' => 'Daftar Cuti',
		        'json' => $cuti,
		      ];
		      $this->load->view('dosen/listcuti', $data);
		    }
		}		
	}
		private function retrieve_list_cuti($nip) {
		  $api = curl_init();
		  curl_setopt($api, CURLOPT_URL, $this->urlcuti . '/fetchCutiNIP/'.$nip);
		  curl_setopt($api, CURLOPT_RETURNTRANSFER, true);
		  curl_setopt($api, CURLOPT_HEADER, false);

		  $result = curl_exec($api);
		  $result = json_decode($result);
		  curl_close($api);
		  return $result;
		 }		
	public function cuti()
	{
		$statusnya = 'not approved';
		$cond = $this->input->post('jeniscuti');
		if ($cond == 'hamil') {
			$rentangtanggal = $this->input->post('rentangtanggal1');
		}elseif ($cond == 'izin') {
			$rentangtanggal = $this->input->post('rentangtanggal2');
		}elseif ($cond == 'sakit') {
			$rentangtanggal = $this->input->post('rentangtanggal3');
		}elseif ($cond == 'hariraya') {
			$rentangtanggal = $this->input->post('rentangtanggal4');
		}

		if ($rentangtanggal == NULL) {
			echo "<script>alert('gagal!');</script>";
			redirect(base_url('indexdosen/index'),'refresh');
		}else{
			$data = array(
				'jeniscuti' => $this->input->post('jeniscuti'),
				'rentangtanggal' => $rentangtanggal,
				'status' => $statusnya,
				'keterangan' => $this->input->post('keterangan'),
				'nip' => $this->input->post('nip'),
				'id_fakultas' => $this->input->post('id_fakultas')
			);
			$this->retrievecuti($data);
			echo "<script>alert('Berhasil!');</script>";
			redirect(base_url('indexdosen/index'),'refresh');
		}

	}
	private function retrievecuti($data)
	{
		$post = [
			'jeniscuti' => $data['jeniscuti'],
			'rentangtanggal' => $data['rentangtanggal'],
			'status' => $data['status'],
			'keterangan' => $data['keterangan'],
			'nip'=> $data['nip'],
			'id_fakultas'=> $data['id_fakultas'],
		];

		$api = curl_init();
		curl_setopt($api, CURLOPT_URL, $this->urlcuti . '/newCuti/');
		curl_setopt($api, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($api, CURLOPT_POSTFIELDS, http_build_query($data));
		// curl_setopt($api, CURLOPT_POSTFIELDS, $data);
	   	$result = curl_exec($api);
	   	$result = json_decode($result);
	   	curl_close($api);
	   	return $result;			
	}	
}

?>


	