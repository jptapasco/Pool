<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {
	public function __construct(){
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->model('Usuario');
        $this->load->library('session');
        $this->load->database();
    }

    public function listar(){
        if (!$this->session->userdata('correo')) {
            redirect('Login/index', 'refresh');
        } else if ($this->session->userdata('rol') === 'admin'){
            $data["usuarios"] = $this->Usuario->lista();
            $jsonData = json_encode($data);
            echo "<script>console.log('JSON Data:', $jsonData);</script>";
            $this->load->view('Inicio/inicio', $data);
        } else if ($this->session->userdata('rol') === 'cajero') {
            echo "cajero";
        }
    }
}