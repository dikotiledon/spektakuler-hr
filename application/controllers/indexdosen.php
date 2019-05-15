<?php
class indexdosen extends CI_Controller
{
	private $urldosen = 'http://localhost:8000/api/v1/hr/Dosen';
	private $urlabsen = 'http://localhost:8000/api/v1/hr/Absen';
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
}

?>


	