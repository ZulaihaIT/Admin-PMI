<?php
class Berita extends CI_Controller {
  public function __construct() {
        parent::__construct();
        if(!$this->session->has_userdata('name')){
            redirect('infront');
        }
    }
    function form() {
        $this->load->view('berita/berita_input');
    }

    function insert() {
        $nm_file = time() . '.png';
        $config['upload_path'] = './assets/berita/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['file_name'] = $nm_file;
        $config['overwrite'] = TRUE;
        $this->upload->initialize($config);
        if ($this->upload->do_upload('gambar')) {
            $gambar = $this->upload->data();
            $data = array(
                'judul' => $this->input->post('in_judul'),
                'kategori' => $this->input->post('in_kategori'),
                'deskripsi' => $this->input->post('in_deskripsi'),
                'gambar' => $gambar['file_name']);

            $this->Berita_m->insert_db($data);
            redirect('Berita');
        } else {
            $error = array(
                'error' => $this->upload->display_errors()
            );
            echo json_encode($error);
        }
    }

    function index() {
        $this->load->view('berita/berita_v');
    }

    function delete($id) {
        $this->Berita_m->delete_db($id);
        redirect('Berita');
    }

    function select_by($id) {
        $data['berita'] = $this->Berita_m->select_by_db($id);
        $this->load->view('berita/berita_edit', $data);
    }

    function edit() {
        $id = $this->input->get('id');
        $nm_file = $this->input->post('nm_foto');
        $config['upload_path'] = './assets/berita/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['file_name'] = $nm_file;
        $config['overwrite'] = TRUE;
        $this->upload->initialize($config);
        if ($this->upload->do_upload('in_gambar')) {
            $gambar = $this->upload->data();
            $data = array(
                'judul' => $this->input->post('in_judul'),
                'kategori' => $this->input->post('in_kategori'),
                'deskripsi' => $this->input->post('in_deskripsi'),
                'gambar' => $gambar['file_name'],
                 );
        } else {
            $data = array(
            'judul' => $this->input->post('in_judul'),
            'kategori' => $this->input->post('in_kategori'),
            'deskripsi' => $this->input->post('in_deskripsi'),
        );
        }
        echo $this->Berita_m->edit_db($id, $data);
        redirect('Berita');
    }
    
    //WEB SERVICE
    function select() {
        //menampilkan semua data dari tabel artikel
        $response = array();
        $data['data'] = array();

        $result = $this->Berita_m->select_berita();

        if (sizeof($result) > 0) {
            foreach ($result as $value) {
                $response['id_berita'] = $value->id_berita;
                $response['judul'] = $value->judul;
                $response['deskripsi'] = $value->deskripsi;
                $response['kategori'] = $value->kategori;
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
        //menampilkan data dari tabel artikel berdasarkan id_berita
        //id_berita dapat dari get
        $response = array();
        $data['data'] = array();

        $result = $this->Berita_m->select_berita_where($id);

        if (sizeof($result) > 0) {
            foreach ($result as $value) {
                $response['id_berita'] = $value->id_berita;
                $response['judul'] = $value->judul;
                $response['deskripsi'] = $value->deskripsi;
                $response['kategori'] = $value->kategori;
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
        //menampilkan semua data dari tabel artikel berdasarkan id_berita
        //id_berita dapat dari post

        $id = $this->input->post('id_berita');
        
        $response = array();
        $data['data'] = array();

        $result = $this->Berita_m->select_berita_where($id);

        if (sizeof($result) > 0) {
            foreach ($result as $value) {
                $response['id_berita'] = $value->id_berita;
                $response['judul'] = $value->judul;
                $response['kategori'] = $value->kategori;
                 $response['deskripsi'] = $value->deskripsi;
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
