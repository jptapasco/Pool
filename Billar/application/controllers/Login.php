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
					$this->session->set_userdata('documento', $respuesta->documento);
					$this->session->set_userdata('telefono', $respuesta->telefono);
					$this->session->set_userdata('rol', $respuesta->rol);
					$this->session->set_userdata('nombres', $respuesta->nombres);


					$user_data = array(
						'documento' => $respuesta->documento,
						'nombres' => $respuesta->nombres,
						'telefono' => $respuesta->telefono,
						'rol' => $respuesta->rol,
						'correo' => $respuesta->correo
					);

					$this->session->set_userdata('user_data',$user_data);

					$rol = $this->session->userdata('rol');
					try {
						if ($rol === ROL_ADMIN) {
							redirect("DashboardAdmin", "refresh");
						} else if($rol === ROL_CAJERO){

							redirect("DashboardCajero", "refresh");

						}else{
							redirect('Login', 'refresh');
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