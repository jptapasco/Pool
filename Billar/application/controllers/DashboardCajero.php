<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardCajero extends CI_Controller {

	public function index(){
        if (!$this->session->userdata('correo')) {
            redirect('Login/index', 'refresh');
        } else if ($this->session->userdata('rol') === 'cajero'){
            $this->load->view('DashboardCajero/plantillaCajero');
        }else {
            echo "No tienes Permisos como Admin";
        }
    }

}
