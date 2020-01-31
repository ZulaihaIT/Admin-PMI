<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Darah extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if(!$this->session->has_userdata('name')){
			redirect('infront');
		}
	}
	public function form()
	{
		$data['iddarah']= $this->id_darah_terakhir("DR",5,"0");
		$this->load->view('darah/darah_input',$data);
	}

	function index() {
		$this->load->view('darah/darah_v');
	}

	public function input_darah_proses(){
		$idDarah = $this->input->post("id_darah");
		$golongandarah = $this->input->post("gol_darah");
		$stok = $this->input->post("stok");
		$urlQrCode = $this->input->post("url_qr");

		//file_put_contents
		//file_get_contents
		$filename =$idDarah.".jpg";
		$uploadPath ="./assets/barcode/$filename";
		$files = file_put_contents($uploadPath, file_get_contents($urlQrCode));
		if($files >0 ){
		//yang ini kalau berhasil doanload qrCdenya
			$dataInsert = array(
				'id_darah' =>$idDarah,
				'gol_darah' =>$golongandarah,
				'stok' =>$stok,
				'gambar' => $filename);
			$res= $this->Darah_m->insert_db($dataInsert);
			if($res >0 )
				redirect('darah/index');
		} else{

			redirect('darah/form');
		}
	}
	private function id_darah_terakhir($prefix,$pad, $char){
		$query = $this->db->query("SELECT *FROM darah ORDER BY id_darah DESC limit 1");
		if($query->num_rows()>0){
			$idTerakhir = $query->row()->id_darah;
			echo "ID Terahir  : $idTerakhir<br>";

		// explode itu adalah memisahkkan huruf dengan angka yang selanjutnya menjadi array
		// str_pad itu apa?

		$explodeId = explode("-",$idTerakhir); //memisahkan string pada idterakhir berdasaran - 
		//STR_PAD LEFT berarti menambahkan karakter 0  seanyak 3 disebelah kiri 
		// return "$prefix-" .str_pad($explodeId[1]+=1, 3, "0",STR_PAD_LEFT);
		return "$prefix-" .str_pad($explodeId[1]+=1, $pad, $char,STR_PAD_LEFT);
	} else{
		return "$prefix-".str_pad("1", $pad, $char,STR_PAD_LEFT);
	}



}

function delete($id) {
	$this->Darah_m->delete_db($id);
	redirect('darah');
}

function select_by($id) {
	$data['darah'] = $this->Darah_m->select_by_db($id);
	$this->load->view('darah/darah_edit', $data);
}

function edit() {
	$idDarah = $this->input->get("idDarah");
	$golongandarah = $this->input->post("gol_darah");
	$stok = $this->input->post("stok");
	$dataInsert = array(
		'id_darah' =>$idDarah,
		'gol_darah' =>$golongandarah,
		'stok' =>$stok);
$res = $this->Darah_m->edit_db($idDarah, $dataInsert);
if($res >0 ){
	redirect('darah/index');
}
else{

		// redirect('darah/form');
}
}
}


