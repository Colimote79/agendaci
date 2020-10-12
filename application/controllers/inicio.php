<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

	public function __construct() {
        parent::__construct();

        //$this->load->model('agenda_model');

        $GLOBALS['nivelUsuario'] = $this->session->userdata['logged_in']['userNivel'];
    }

	public function index() {
		$data['title'] = "Inicio";
        $this->load->view('plantilla/encabezado', $data);
        $this->load->view('plantilla/sidebarmenu');
        $this->load->view('inicio/index');
        $this->load->view('plantilla/pie');
    }

}

?>