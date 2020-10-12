<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct() {
        parent::__construct();

        //$this->load->model('login_model');
    }

	public function index() {
		$data['title'] = "Inicio de sesion";
        $this->load->view('login/index');
    }
    
    public function iniciarSesion() {

        $result = json_decode($this->input->raw_input_stream); //SOLO PARA CODEIGNITER 3 EN ADELANTE
        
        if ( $result == false) {
            echo json_encode( array("error" => true, "mensaje" => "El usuario o contraseña son incorrectos.") );
            exit;
        }

        try {
            $session_data = array(
                'idUsuario'     =>  $result->id_usuario,
                'usuario'       =>  $result->usuario,
                'nombreUsuario' =>  $result->nombre,
                'dependencia'   =>  $result->dependencia
            );
            
            // Add user data in session
            $this->session->set_userdata('logged_in', $session_data);

            echo json_encode( array("error" => false, "mensaje" => "Sesión iniciada correctamente.") );
        } catch (Exception $e) {
            echo json_encode( array("error" => true, "mensaje" => "Error al asignar los datos del usuario a SESSION: ".$e->getMessage() ) );
        }
    }

    // Logout from admin page
    public function cerrarSesion() {

        // Removing session data
        $sess_array = array(
            'idUsuario'     => '',
            'usuario'       => '',
            'nombreUsuario' => '',
            'dependencia'   => ''
        );

        $this->session->unset_userdata('logged_in', $sess_array);
        $this->session->sess_destroy();

        redirect('login', 'refresh');
    }

    function cambiaContrasena() {
        $data['title']  = "Cambio de contraseña";
        $data['idUsuario'] = $this->session->userdata['logged_in']['userId'];
        $data['usuario'] = $this->session->userdata['logged_in']['usuario'];
        $this->load->view('plantilla/encabezado', $data);
        $this->load->view('plantilla/menu');
        $this->load->view('login/cambiarContrasena', $data);
        $this->load->view('plantilla/pie');
    }

    public function verificarContrasena() {
        $idUsuario = $this->input->post('idUsuario');
        $passActual = $this->input->post('passActual');
        $result = $this->login_model->verificarContrasena($idUsuario, $passActual); 
        echo $result;
    }

    public function cambiarContrasena() {
        $idUsuario = $this->input->post('idUsuario');
        $passNuevo = $this->input->post('passNuevo');
        $data = $this->login_model->cambiarContrasena($idUsuario, $passNuevo); 
        echo json_encode($data);
    }

    public function resetearContrasena($idUsuario, $usuario) {
        $result = $this->login_model->cambiarContrasena($idUsuario, $usuario);

        if ($result) {
            $html = "<div class='alert alert-success' role='alert'>";
            $html .= "Contraseña reestablecida correctamente para el usuario <b>". $usuario."</b><br><br>";
            $html .= "<a class='btn btn-success' href='".site_url('administracion/usuariosCRUD')."'>Regresar a la administración de usuarios</a>";
            $html .= "</div>";
        } else {
            $html = "<div class='alert alert-danger' role='alert'>";
            $html .= "La contraseña no pudo ser reestablecida, intentelo nuevamente.<br><br>";
            $html .= "<a class='btn btn-danger' href='".site_url('administracion/usuariosCRUD')."'>Regresar a la administración de usuarios</a>";
            $html .= "</div>";
        }

        $data['css_files'][] = CSS.'bootstrap.min.css';
        $data['js_files'][] = JS.'bootstrap.min.js';
        $data['output'] = $html;
        $this->load->view('administracion/manage', $data);
    }
}
