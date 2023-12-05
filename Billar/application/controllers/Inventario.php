<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventario extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Producto');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
    }

    public function listado()
    {
        $vdata["productos"] = $this->Producto->lista();
        $this->load->view('Inventario/inventario', $vdata);
    }

    public function buscar() {

        if($_POST){
            $busqueda = $this->input->post('busqueda');

            $data['productos'] = $this->Cliente->buscar_productos($busqueda);
            $this->load->view('productos/listado', $data);
        } else {
            $data['productos'] = $this->Cliente->obtener_productos();
            $this->load->view('productos/listado', $data);
        }
    }

    public function agregarCantidad($id_producto){
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            $cantidadNueva = $this->input->post('cantidadNueva');
            $cantidadActual = $this->input->post('cantidad');

            $cantidadFinal = intval($cantidadActual) + intval($cantidadNueva);
            
            $this->Producto->modificar_cantidad($id_producto, $cantidadFinal);
            redirect('Inventario/listado');
        }
    } 


}
