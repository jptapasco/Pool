<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardAdmin extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->model('Usuario');
        $this->load->library('session');
        $this->load->database();
    }

	public function index(){
        if (!$this->session->userdata('correo')) {
            redirect('Login/index', 'refresh');

        } else if ($this->session->userdata('rol') === 'admin'){
            $data["usuarios"] = $this->Usuario->lista();
            $jsonData = json_encode($data);
            echo "<script>console.log('JSON Data:', $jsonData);</script>";
            $this->load->view('Inicio/inicio',$data);

        }else {
            echo "No tienes Permisos como cajero";
        }
    }

    public function perfil(){
        if ($this->session->userdata('correo')) {      
        $data['usuario'] = $this->session->userdata();
        $this->load->view('Perfil/perfil', $data);

        } else {
            echo "No cuentas con permisos para acceder a esta sesión.";
        }
    }

    public function perfilEditable(){
        if ($this->session->userdata('correo')) {      
        $data['usuario'] = $this->session->userdata();
        $this->load->view('Perfil/perfilEditable', $data);

        } else {
            echo "No cuentas con permisos para acceder a esta sesión.";
        }
    }

    

}
