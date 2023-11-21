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
        $this->load->model('Inventario');
        $this->load->helper('url');
        $this->load->database();
    }

    public function rutaInventario()
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
        $vdata["nombre"] = $vdata["categoria"] = $vdata["fecha_registro"] = $vdata["descripcion"] = "";

        if(isset($id_producto))
        {
            $producto= $this->Producto->find($id_producto);
            if(isset($id_producto)){
                $vdata["nombre"]= $producto->nombre;
                $vdata["categoria"]= $producto->categoria;
                $vdata["fecha_registro"]= $producto->fecha_registro;
                $vdata["descripcion"]= $producto->descripcion;
            }
        }        
        
        if ($this->input->server("REQUEST_METHOD") == "POST") {
            $data_producto = array(
                'nombre'            => $this->input->post("nombre"),
                'categoria'         => $this->input->post("categoria"),
                'fecha_registro'    => $this->input->post("fecha_registro"),
                'descripcion'       => $this->input->post("descripcion")
            );

            $data_inventario = array(
                'unidad_medida'     => $this->input->post("unidad_medida"),
                'cantidad'          => $this->input->post("cantidad"),
                'punto_reorden'     => $this->input->post("punto_reorden"),
                'valor_compra'      => $this->input->post("valor_compra"),
                'valor_venta'       => $this->input->post("valor_venta"),
                'observaciones'     => $this->input->post("descripcion")
            );

            if (isset($id_producto)) {
                $this->Producto->update($id_producto, $data_producto);
            } else {
                $id_producto_inserted = $this->Producto->insert($data_producto);

                if ($id_producto_inserted) {
                    $data_inventario['id_producto'] = $id_producto_inserted;
                    $this->Inventario->insert($data_inventario);
                }
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
}
