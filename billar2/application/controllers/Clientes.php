<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('clientes_model');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
    }

    public function index() {
        $data['clientes'] = $this->clientes_model->obtener_clientes();
        $this->load->view('admin/Clientes', $data);
    }

    public function buscar() {

        if($_POST){
            $busqueda = $this->input->post('busqueda');

            $data['clientes'] = $this->clientes_model->buscar_clientes($busqueda);
            $this->load->view('admin/Clientes', $data);
        } else {
            $data['clientes'] = $this->clientes_model->obtener_clientes();
            $this->load->view('admin/Clientes', $data);
        }

    }

}
?>