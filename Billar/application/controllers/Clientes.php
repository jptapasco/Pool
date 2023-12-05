<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Cliente');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
    }

    public function listado()
    {   
        if (!$this->session->userdata('correo')) {
            redirect('Login/index', 'refresh');
        }elseif ($this->session->userdata('rol') === ROL_CAJERO || $this->session->userdata('rol') === ROL_ADMIN) {
            $vdata["clientes"] = $this->Cliente->obtener_clientes();
            $this->load->view('Clientes/cliente', $vdata);
        }
    }

    public function buscar() {

        if($_POST){
            $busqueda = $this->input->post('busqueda');

            $data['clientes'] = $this->Cliente->buscar_clientes($busqueda);
            $this->load->view('Clientes/listado', $data);
        } else {
            $data['clientes'] = $this->Cliente->obtener_clientes();
            $this->load->view('Clientes/listado', $data);
        }

    }

}
?>