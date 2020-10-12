<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agenda extends CI_Controller {

	public function __construct() {
        parent::__construct();

        //$this->load->model('agenda_model');
    }

	public function index() {
		$data['title'] = "Nuevo contacto";
        $this->load->view('plantilla/encabezado');
        $this->load->view('agenda/index', $data);
        $this->load->view('plantilla/pie');
    }

    public function consulta() {
		$data['title'] = "Consulta de contactos";
        $this->load->view('plantilla/encabezado');
        $this->load->view('agenda/consulta', $data);
        $this->load->view('plantilla/pie');
    }

}

?>