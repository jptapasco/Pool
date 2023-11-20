<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('LoginModel');
		$this->load->library('session');
		$this->load->database();
	}

	public function index(){
		$this->load->view('Login/login');
	}

	public function validar_datos(){
		if ($this->input->server("REQUEST_METHOD") == "POST") {
			$data["correo"] = $this->input->post("correo");
			$data["passw"] = $this->input->post("passw");
			$respuesta = $this->LoginModel->validar_ingreso($data["correo"]);
			$alert = array(); 

			if (!empty($respuesta)) {
				if ($respuesta->correo === $data['correo'] && $respuesta->contrasena === $data['passw']) {	
					$this->session->set_userdata('correo', $data['correo']);
					$this->session->set_userdata('rol', $respuesta->rol);
					$this->session->set_userdata('nombres', $respuesta->nombres);

					try {
						$rol = $this->session->userdata('rol');
						if ($rol === "admin") {
							redirect("DashboardAdmin", "refresh");
						} else if($rol === "cajero"){
							redirect("DashboardCajero", "refresh");
						}else{
							$this->load->view('Login/login');
						}
					} catch (Exception $e) {
						$respuesta = [
										'exeception' => $e
									];
						echo json_encode($respuesta);
					}
				} else {
					$alert = array(
						'mensaje' => 'La contraseña es incorrecta.',
						'color' => 'warning'
					);
				}
			} else {
				$alert = array(
					'mensaje' => 'El usuario no existe.',
					'color' => 'danger'
				);
			}

			$this->session->set_flashdata('alert', $alert);
		}

		$this->load->view('Login/login');
	}


	public function logOut(){
		$this->session->sess_destroy();

		redirect("Login/index", "refresh");
	}



}