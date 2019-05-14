<?php
use GuzzleHttp\Client;

	Class mdosen extends CI_Model{

		function getdata(){
			// $query = $this->db->get('logistik');
			// return $query->result_array();

			// $client = new Client();

			// $response = $client->request('GET', 'http://localhost/rest-api/api/Logistik');

			// $result = json_decode($response->getBody()->getContents(), true);
			// return $result['data'];

			$data = file_get_contents('http://localhost:8000/api/v1/hr/Dosen/ShowDosen');
			$dosen = json_decode($data, true);
			return $dosen['data'];
		}
		public function getDatabyFak($id_fakultas)
		{
			$data = file_get_contents("http://localhost:8000/api/v1/hr/Dosen/Showbyfakultas/$id_fakultas");
			$dosen = json_decode($data, true);
			return $dosen['data'];			
		}
		public function hapusData($nip_dosen)
		{
			$nip = $nip_dosen;
			$data = file_get_contents("http://localhost:8000/api/v1/hr/Dosen/$nip/removeDosen");
			$dosen = json_decode($data, true);
			return $dosen['data'];
			// $dosen = json_decode($data, true);
			// return $dosen['data'];
			// $client = new Client();
			// $response = $client->request('DELETE', 'http://localhost:8000/api/v1/hr/Dosen/{nip_dosen}/removeDosen',[
			// 	'form_params' => [
			// 		'nip_dosen' => $nip_dosen
			// 	]
			// ]);

			// $result = json_decode($response->getBody()->getContents(), true);
			// return $result;

		}

		// function updateData(){
		// 	$client = new Client();
		//   $data = [
		// 	"kode" => $this->input->post('kode_logistik', true),
		// 	"nama" => $this->input->post('nama', true),
		// 	"status" => $this->input->post('status', true),
		// 	"tipe" => $this->input->post('tipe', true),
		// 	"foto" => $this->input->post('foto', true),
		//   ];
    //
		//   $response = $client->request('PUT', 'http://localhost/rest-api/api/Logistik', [
		// 	'form_params' => $data
		//   ]);
    //
		// 	$result = json_decode($response->getBody()->getContents(), true);
		// 	return $result;
    //
		// }
    //
		// public function tambahData()
		// {
    //
		// 	$client = new Client();
    //
		// 	$data = [
		// 	"kode" => $this->input->post('kode_logistik', true),
		// 	"nama" => $this->input->post('nama', true),
		// 	"status" => $this->input->post('status', true),
		// 	"tipe" => $this->input->post('tipe', true),
		// 	"foto" => $this->input->post('foto', true),
		//   ];
    //
		//   $response = $client->request('POST', 'http://localhost/rest-api/api/Logistik', [
		// 	'form_params' => $data
		//   ]);
    //
		//   $result = json_decode($response->getBody()->getContents(), true);
		//   return $result;
    //
		// }
    //
		// public function getInfoArtikel($id)
		// {
		// 	$this->db->where('no_artikel',$id);
		// 	$query = $this->db->get('artikel');
		// 	return $query->result_array();
    //
		// }



	}

?>
