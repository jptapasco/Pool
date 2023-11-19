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

    public function listado()
    {
        $vdata["respuesta"] = $this->Usuario->lista();
        $this->load->view('Usuarios/usuarios', $vdata);
    }

    public function insertar()
    {
        if ($this->input->server("REQUEST_METHOD") == "POST") {
            $data = array(
                'documento' => $this->input->post("documento"),
                'nombres' => $this->input->post("nombres"),
                'telefono' => $this->input->post("telefono"),
                'rol' => $this->input->post("rol"),
                'correo' => $this->input->post("correo"),
                'contrasena' => $this->input->post("contrasena")
            );
             
            $this->Usuario->insert($data);  
            $this->listado();      
        }
    }
}
