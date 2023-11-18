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
}
