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

        foreach ($data["respuesta"] as &$inventario) {
            $producto = $this->Inventario->obtenerProducto($inventario->id_producto);
            $inventario->nombre_producto = $producto->nombre;
            $inventario->categoria_producto = $producto->categoria;
        }

        $this->load->view('Inventarios/inventario', $data);
    }

    public function buscarInventario()
    {
        $buscar = $this->input->post('buscar');
        $data['respuesta'] = $this->Inventario->buscarInventario($buscar);
        $this->load->view('Inventarios/inventario', $data);
    }

    public function obtenerDetalleProducto($idProducto)
    {
        $producto = $this->Inventario->obtenerProducto($idProducto);

        if ($producto) {
            echo json_encode(array('status' => 'success', 'data' => $producto));
        } else {
            echo json_encode(array('status' => 'error', 'message' => 'Error al obtener detalles del producto.'));
        }
    }
}