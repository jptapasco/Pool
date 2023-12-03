<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Factura extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->model('Usuario');
        $this->load->helper('url');
        $this->load->database();
    }

    public function indexFactura()
    {
        // Obtén los datos de la tabla almacenados en el formulario
        $ventas = json_decode($this->input->post('ventas'), true);
    
        // Almacena los datos en flashdata para que estén disponibles en la siguiente página
        $this->session->set_flashdata('ventas', $ventas);
    
        // Redirige a la nueva página
        redirect('Factura/mostrarFactura');
    }    

    public function mostrarFactura()
    {
        // Recupera los datos almacenados en flashdata
        $ventas = $this->session->flashdata('ventas');

        // Pasa los datos a la vista
        $data['ventas'] = $ventas;

        // Carga la vista con los datos
        $this->load->view('Caja/factura', $data);
    }
}
