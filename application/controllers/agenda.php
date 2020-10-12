<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agenda extends CI_Controller {

	public function __construct() {
        parent::__construct();

        //$this->load->model('agenda_model');
    }

	public function index() {
		$data['title'] = "Agenda";
        $this->load->view('plantilla/encabezado', $data);
        $this->load->view('agenda/index');
        $this->load->view('plantilla/pie');
    }

}

?>