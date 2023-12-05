<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardAdmin extends CI_Controller {

	public function index(){
        if (!$this->session->userdata('correo')) {
            redirect('Login/index', 'refresh');
        } else if ($this->session->userdata('rol') === 'admin'){
            $this->load->view('DashboardAdmin/plantillaAdmin');
        }else {
            echo "No tienes Permisos como cajero";
        }
    }

}
