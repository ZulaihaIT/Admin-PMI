<?php
class Petugas extends CI_Controller {

    function form() {
        $this->load->view('petugas/petugas_input');
    }

    function insert(){
        $nama = $this->input->post('nama');
        $jk = $this->input->post('jk');
        $email = $this->input->post('email');
        $no_tlp = $this->input->post('no_tlp');
        $alamat = $this->input->post('alamat');
        $data = array(
            'nama' => $nama,
            'jk' => $jk,
            'email' => $email,
            'no_tlp' =>$no_tlp,
            'alamat' => $alamat,);
            $this->Petugas_m->insert_db($data);
            redirect('petugas');
        } 
    function index() {
        $this->load->view("petugas/petugas_v");
    }

    function delete($id) {
        $this->Petugas_m->delete_db($id);
        redirect('petugas');
    }

    function select_by($id) {
        $data['petugas'] = $this->Petugas_m->select_by_db($id);
        $this->load->view('petugas/petugas_edit', $data);
    }

    function edit() {
        $id = $this->input->get('id');
        $nama = $this->input->post('nama');
        $jk = $this->input->post('jk');
        $email = $this->input->post('email');
        $no_tlp = $this->input->post('no_tlp');
        $alamat = $this->input->post('alamat');
        $data = array(
            'nama' => $nama,
            'email' => $email,
            'no_tlp' =>$no_tlp,
            'alamat' => $alamat,);
        echo $this->Petugas_m->edit_db($id, $data);
        redirect('petugas');
    }
    
    //WEB SERVICE
    function select() {
        //menampilkan semua data dari tabel artikel
        $response = array();
        $data['data'] = array();

        $result = $this->Petugas_m->select_darah();

        if (sizeof($result) > 0) {
            foreach ($result as $value) {
                $response['id_petugas'] = $value->id_petugas;
                $response['nama'] = $value->nama;
                $response['email'] = $value->email;
                $response['no_tlp'] = $value->no_tlp;
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

        $result = $this->Petugas_m->select_petugas_where($id);

        if (sizeof($result) > 0) {
            foreach ($result as $value) {
               $response['id_petugas'] = $value->id_petugas;
                $response['nama'] = $value->nama;
                $response['email'] = $value->email;
                $response['no_tlp'] = $value->no_tlp;
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

        $id = $this->input->post('id_petugas');
        
        $response = array();
        $data['data'] = array();

        $result = $this->Petugas_m->select_darah_where($id);

        if (sizeof($result) > 0) {
            foreach ($result as $value) {
               $response['id_petugas'] = $value->id_petugas;
                $response['nama'] = $value->nama;
                $response['email'] = $value->email;
                $response['no_tlp'] = $value->no_tlp;
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
