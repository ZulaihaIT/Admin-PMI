<?php
class Pendonor extends CI_Controller {
  public function __construct() {
        parent::__construct();
        if(!$this->session->has_userdata('name')){
            redirect('infront');
        }
    }
    function form() {
         $data['darah'] = $this->Pendonor_m->select('darah')->result();
        $this->load->view('pendonor/pendonor_input',$data);
    }

    function insert(){
        $id_darah = $this->input->post('gol_darah');
        $nama = $this->input->post('nama');
        $berat_badan = $this->input->post('berat_badan');
        $tensi_darah = $this->input->post('tensi_darah');
        $kadar_hb = $this->input->post('kadar_hb');
        $alamat = $this->input->post('alamat');
        $data = array(
            'id_darah' =>$id_darah,
            'nama' => $nama,
            'berat_badan' => $berat_badan,
            'tensi_darah' => $tensi_darah,
            'kadar_hb' =>$kadar_hb,
            'alamat' => $alamat,);
            $this->Pendonor_m->insert_db($data);
            redirect('pendonor');
        } 
    function index() {
        $data['data'] = $this->Pendonor_m->select_other('pendonor','join darah on pendonor.id_darah=darah.id_darah order by id_pendonor desc')->result();
        $this->load->view("pendonor/pendonor_v", $data);
    }

    function delete($id) {
        $this->Pendonor_m->delete_db($id);
        redirect('pendonor');
    }

    function select_by($id) {
        $data['pendonor'] = $this->Pendonor_m->select_by_db($id);
         $data['darah'] = $this->Pendonor_m->select('darah')->result();
        $this->load->view('pendonor/pendonor_edit', $data);
    }

    function edit() {
        $id = $this->input->get('id');
        $id_darah = $this->input->post('gol_darah');
        $nama = $this->input->post('nama');
        $berat_badan = $this->input->post('berat_badan');
        $tensi_darah = $this->input->post('tensi_darah');
        $kadar_hb = $this->input->post('kadar_hb');
        $alamat = $this->input->post('alamat');
        $data = array(
            'id_darah' =>$id_darah,
            'nama' => $nama,
            'berat_badan' => $berat_badan,
            'tensi_darah' => $tensi_darah,
            'kadar_hb' =>$kadar_hb,
            'alamat' => $alamat,);
        echo $this->Pendonor_m->edit_db($id, $data);
        redirect('pendonor');
    }
    
    //WEB SERVICE
    function select() {
        //menampilkan semua data dari tabel artikel
        $response = array();
        $data['data'] = array();

        $result = $this->Pendonor_m->select_darah();

        if (sizeof($result) > 0) {
            foreach ($result as $value) {
                $response['id_pendonor'] = $value->id_pendonor;
                $response['id_darah'] = $value->id_darah;
                $response['nama'] = $value->nama;
                $response['berat_badan'] = $value->berat_badan;
                $response['tensi_darah'] = $value->tensi_darah;
                $response['kadar_hb'] = $value->kadar_hb;
                $response['alamat'] = $value->alamat;
                array_push($data['data'], $response);
            }

            $data['status'] = 0;
            $data['response'] = 'Data Ditemukan';

            die(json_encode($data));
        } else {
            $response['status'] = 1;
            $response['response'] = 'Tidak data yang ditampilkan';

            die(json_encode($response));
        }
    }
    
    function select_by_get($id) {
        //menampilkan data dari tabel artikel berdasarkan id_darah
        //id_darah dapat dari get
        $response = array();
        $data['data'] = array();

        $result = $this->Pendonor_m->select_pendonor_where($id);

        if (sizeof($result) > 0) {
            foreach ($result as $value) {
               $response['id_pendonor'] = $value->id_pendonor;
                $response['id_darah'] = $value->id_darah;
                $response['nama'] = $value->nama;
                $response['berat_badan'] = $value->berat_badan;
                $response['tensi_darah'] = $value->tensi_darah;
                $response['kadar_hb'] = $value->kadar_hb;
                $response['alamat'] = $value->alamat;
                array_push($data['data'], $response);
            }

            $data['status'] = 0;
            $data['response'] = 'Data Ditemukan';

            die(json_encode($data));
        } else {
            $response['status'] = 1;
            $response['response'] = 'Tidak data yang ditampilkan';

            die(json_encode($response));
        }
    }
    
    function select_by_post() {
        //menampilkan semua data dari tabel artikel berdasarkan id_darah
        //id_darah dapat dari post

        $id = $this->input->post('id_pendonor');
        
        $response = array();
        $data['data'] = array();

        $result = $this->Pendonor_m->select_darah_where($id);

        if (sizeof($result) > 0) {
            foreach ($result as $value) {
               $response['id_pendonor'] = $value->id_pendonor;
                $response['id_darah'] = $value->id_darah;
                $response['nama'] = $value->nama;
                $response['berat_badan'] = $value->berat_badan;
                $response['tensi_darah'] = $value->tensi_darah;
                $response['kadar_hb'] = $value->kadar_hb;
                $response['alamat'] = $value->alamat;
                 array_push($data['data'], $response);
            }

            $data['status'] = 0;
            $data['response'] = 'Data Ditemukan';

            die(json_encode($data));
        } else {
            $response['status'] = 1;
            $response['response'] = 'Tidak data yang ditampilkan';

            die(json_encode($response));
        }
    }
}
