<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

	public function __construct() {
        parent::__construct();

        if (!$this->session->userdata('logged_in')) {
            redirect("login");
        }

        //$this->load->model('agenda_model');
    }

	public function index() {
        $data['title'] = "Inicio";
        $this->load->view('plantilla/encabezado');
        $this->load->view('inicio/index');
        $this->load->view('plantilla/pie');
    }

}

?>