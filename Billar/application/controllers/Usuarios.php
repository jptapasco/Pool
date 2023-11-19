<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Usuarios extends CI_Controller
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

    public function rutaUsuarios()
    {
        $this->load->view('Usuarios/usuarios');
    }


    public function listado()
    {
        $vdata["respuesta"] = $this->Usuario->lista();
        $this->load->view('Usuarios/usuarios', $vdata);
    }

    public function buscar()
    {
        $termino_busqueda = $this->input->post('termino_busqueda');

        // Lógica para realizar la búsqueda en el modelo
        $data['respuesta'] = $this->Usuarios->buscar($termino_busqueda);

        // Cargar la vista con los resultados de la búsqueda
        $this->load->view('Inventarios/listado', $data);
    }
}
