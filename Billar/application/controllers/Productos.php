<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Productos extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->model('Producto');
        $this->load->helper('url');
        $this->load->database();
    }

    public function rutaProductos()
    {
        $this->load->view('Productos/producto');
    }

    public function listado()
    {
        $data["respuesta"] = $this->Producto->lista();
        $this->load->view('Productos/producto', $data);
    }

    public function guardar($id_producto = null)
    {
        $vdata["nombre"] = $vdata["categoria"] = $vdata["unidad_medida"] = $vdata["cantidad"] = $vdata["punto_reorden"] = $vdata["precio_compra"] = $vdata["valor_venta"] = $vdata["created_at"] = $vdata["observaciones"] = "";

        if(isset($id_producto))
        {
            $producto= $this->Producto->find($id_producto);
            if(isset($id_producto)){
                $vdata["nombre"]= $producto->nombre;
                $vdata["categoria"]= $producto->categoria;
                $vdata["unidad_medida"]= $producto->unidad_medida;
                $vdata["cantidad"]= $producto->cantidad;
                $vdata["punto_reorden"]= $producto->punto_reorden;
                $vdata["precio_compra"]= $producto->precio_compra;
                $vdata["valor_venta"]= $producto->valor_venta;
                $vdata["created_at"]= $producto->created_at;
                $vdata["observaciones"]= $producto->observaciones;
            }
        }        
        
        if ($this->input->server("REQUEST_METHOD") == "POST") {
            $data_producto = array(
                'nombre'            => $this->input->post("nombre"),
                'categoria'         => $this->input->post("categoria"),
                'unidad_medida'     => $this->input->post("unidad_medida"),
                'cantidad'          => $this->input->post("cantidad"),
                'punto_reorden'     => $this->input->post("punto_reorden"),
                'precio_compra'     => $this->input->post("precio_compra"),
                'valor_venta'       => $this->input->post("valor_venta"),
                'created_at'        => $this->input->post("created_at"),
                'observaciones'     => $this->input->post("observaciones")
            );

            if (isset($id_producto)) {
                $this->Producto->update($id_producto, $data_producto);
            } else {
                $id_producto_inserted = $this->Producto->insert($data_producto);
            }
            redirect('Productos/listado', 'refresh');
        }
    }

    public function editarProducto($id_producto)
    {
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            $data = [
                'nombre' => $this->input->post('nombre'),
                'categoria' => $this->input->post('categoria'),
            ];

            $this->Producto->update($id_producto, $data);
            redirect('Productos/listado', 'refresh');
        } else {            
            $producto = $this->Producto->getProductoById($id_producto);
            
            $data = [
                'producto' => $producto,
            ];

            $this->load->view('productos/editarProducto', $data);
        }
    }

    public function obtenerPorCategoria()
    {
        $categoriaELegida = $this->input->post('categoria');
        $respuesta = $this->Producto->obtenerProductoPorCategoria($categoriaELegida);
        $data['respuesta_productos']=$respuesta;
        $this->load->view('Caja/vender', $data);
    }
}
