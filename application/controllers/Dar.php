<?php
class Darah extends CI_Controller {

    function form() {
        $this->load->view('darah/darah_input');
    }

    function insert() {
        $nm_file = time() . '.png';
        $config['upload_path'] = './assets/darah/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['file_name'] = $nm_file;
        $config['overwrite'] = TRUE;
        $this->upload->initialize($config);
        if ($this->upload->do_upload('gambar')) {
            $gambar = $this->upload->data();
            $data = array(
                'gol_darah' => $this->input->post('in_gol'),
                'stok' => $this->input->post('in_stok'),
                'gambar' => $gambar['file_name']);

            $this->Darah_m->insert_db($data);
            redirect('darah');
        } else {
            $error = array(
                'error' => $this->upload->display_errors()
            );
            echo json_encode($error);
        }
    }

    function index() {
        $this->load->view('darah/darah_v');
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
        $id = $this->input->get('id');
        $nm_file = $this->input->post('nm_foto');
        $config['upload_path'] = './assets/darah/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['file_name'] = $nm_file;
        $config['overwrite'] = TRUE;
        $this->upload->initialize($config);
        if ($this->upload->do_upload('in_gambar')) {
            $gambar = $this->upload->data();
            $data = array(
                'gol_darah' => $this->input->post('in_gol'),
                'stok' => $this->input->post('in_stok'),
                'gambar' => $gambar['file_name'],
                 );
        } else {
            $data = array(
            'gol_darah' => $this->input->post('in_gol'),
            'stok' => $this->input->post('in_stok'),
            );
               }
        echo $this->Darah_m->edit_db($id, $data);
        redirect('darah');
    }
    
    //WEB SERVICE
    function select() {
        //menampilkan semua data dari tabel artikel
        $response = array();
        $data['data'] = array();

        $result = $this->Darah_m->select_darah();

        if (sizeof($result) > 0) {
            foreach ($result as $value) {
                $response['id_darah'] = $value->id_darah;
                $response['gol_darah'] = $value->gol_darah;
                $response['stok'] = $value->stok;
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

        $result = $this->Darah_m->select_darah_where($id);

        if (sizeof($result) > 0) {
            foreach ($result as $value) {
                $response['id_darah'] = $value->id_darah;
                $response['gol_darah'] = $value->gol_darah;
                $response['stok'] = $value->stok;
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

        $id = $this->input->post('id_darah');
        
        $response = array();
        $data['data'] = array();

        $result = $this->Darah_m->select_darah_where($id);

        if (sizeof($result) > 0) {
            foreach ($result as $value) {
                $response['id_darah'] = $value->id_darah;
                $response['gol_darah'] = $value->gol_darah;
                $response['stok'] = $value->stok;
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
