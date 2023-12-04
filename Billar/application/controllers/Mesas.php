<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mesas extends CI_Controller
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

    public function rutaMesas()
    {
        $this->load->view('Mesas/mesasAdmin');
    }

    public function listado()
    {
        $data["respuesta"] = $this->Mesa->lista();
        $this->load->view('Mesa/mesasAdmin', $data);
    }

    public function guardar($id_mesa = null)
    {
        $vdata["tipo"] = $vdata["created_at"] = "";

        if(isset($id_mesa))
        {
            $mesa= $this->Mesa->find($id_mesa);

            if(isset($id_mesa)){
                $vdata["tipo"]= $mesa->tipo;
                $vdata["created_at"]= $mesa->created_at;
            }
        }        
        
        if ($this->input->server("REQUEST_METHOD") == "POST") {
            $data_mesa = array(
                'tipo'            => $this->input->post("tipo"),
                'created_at'        => $this->input->post("created_at")
            );

            if (isset($id_mesa)) {
                $this->Mesa->update($id_mesa, $data_mesa);
            } else {
                $id_mesa_inserted = $this->Mesa->insert($data_mesa);
            }
            redirect('Mesas/listado', 'refresh');
        }
    }

    public function editarMesa($id_mesa)
    {
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            $data = [
                'tipo' => $this->input->post('tipo')
            ];

            $this->Mesa->update($id_mesa, $data);
            redirect('Mesa/listado', 'refresh');
        } else {            
            $mesa = $this->Mesa->getMesaById($id_mesa);
            
            $data = [
                'mesa' => $mesa
            ];

            $this->load->view('productos/editarProducto', $data);
        }
    }
}
