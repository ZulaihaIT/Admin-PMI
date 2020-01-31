<?php

/**
 *
 */
class Dashboard extends CI_Controller {

    function __construct() {
        parent::__construct();
        if (!$this->session->has_userdata('name')) {
            redirect('infront');
        }
    }

    public function index() {
    $this->load->view('berita/berita_v');
       
    }

}

?>
