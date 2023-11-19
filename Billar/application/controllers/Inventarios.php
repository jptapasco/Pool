<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Inventarios extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->model('Inventario');
        $this->load->helper('url');
        $this->load->database();
    }

    public function rutaInventario()
    {
        $this->load->view('Inventario/inventario');
    }


    public function listado()
    {
        $vdata["respuesta"] = $this->Inventario->lista();
        $this->load->view('Inventarios/inventario', $vdata);
    }
}
