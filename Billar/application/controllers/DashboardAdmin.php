<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardAdmin extends CI_Controller {

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

}
