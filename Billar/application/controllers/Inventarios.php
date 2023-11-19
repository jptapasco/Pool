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
        $data["respuesta"] = $this->Inventario->lista();

        // Obtener información adicional de los productos
        foreach ($data["respuesta"] as &$inventario) {
            $producto = $this->Inventario->obtenerProducto($inventario->id_producto);
            $inventario->nombre_producto = $producto->nombre;
            $inventario->categoria_producto = $producto->categoria;
        }

        $this->load->view('Inventarios/inventario', $data);
    }
}
