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
        $this->load->view('Inventarios/inventario');
    }

    public function listado()
    {
        $data_p["respuesta_p"] = $this->Inventario->lista_p();
        $data_i["respuesta_i"] = $this->Inventario->lista_i();

        foreach ($data_i["respuesta_i"] as &$inventario) {
            $producto = $this->Inventario->obtenerProducto($inventario->id_producto);
            $inventario->nombre_producto = $producto->nombre;
            $inventario->categoria_producto = $producto->categoria;
        }

        $this->load->view('Inventarios/inventario', $data_i + $data_p);
    }

    public function guardar($id_inventario = null)
    {
        $vdata["unidad_medida"] = $vdata["cantidad"] = $vdata["punto_reorden"] = $vdata["valor_compra"] = $vdata["valor_venta"] = $vdata["observaciones"] = "";

        if (isset($id_inventario)) {
            $inventario = $this->Inventario->find($id_inventario);

            if (isset($inventario)) {
                $vdata["unidad_medida"] = $inventario->unidad_medida;
                $vdata["cantidad"]      = $inventario->cantidad;
                $vdata["punto_reorden"] = $inventario->punto_reorden;
                $vdata["valor_compra"]  = $inventario->valor_compra;
                $vdata["valor_venta"]   = $inventario->valor_venta;
                $vdata["observaciones"] = $inventario->observaciones;
            }
        }

        if ($this->input->server("REQUEST_METHOD") == "POST") {
            $data = array(
                'unidad_medida' => $this->input->post("unidad_medida"),
                'cantidad'      => $this->input->post("cantidad"),
                'punto_reorden' => $this->input->post("punto_reorden"),
                'valor_compra'  => $this->input->post("valor_compra"),
                'valor_venta'   => $this->input->post("valor_venta"),
                'observaciones' => $this->input->post("observaciones")
            );

            if (isset($id_inventario)) {
                $this->Inventario->update($id_inventario, $data);
            } else {
                $this->Inventario->insert($data);
            }
            redirect('Inventarios/listado', 'refresh');
        }
    }
}