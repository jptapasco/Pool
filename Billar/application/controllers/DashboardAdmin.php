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
            $this->session->set_flashdata('mensaje', 'Por favor, inicia sesión para acceder.');
            redirect('Login/index', 'refresh');

        } else if ($this->session->userdata('rol') === ROL_ADMIN) {
            $this->load->view('DashboardAdmin/plantillaAdmin');
        } else {
            $this->session->set_flashdata('mensaje', 'No tienes permisos como cajero.');
            redirect('Login/index', 'refresh');
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
