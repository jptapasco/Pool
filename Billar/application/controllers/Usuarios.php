<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Usuarios extends CI_Controller
{

    public function construct()
    {
        parent::construct();
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

    public function guardar($id_usuario = null)
    {
        $vdata["rol"] = $vdata["documento"] = $vdata["nombres"] = $vdata["telefono"] = $vdata["correo"] = $vdata["contrasena"] = "";

        if (isset($id_usuario)) {
            $usuario = $this->Usuario->find($id_usuario);

            if (isset($usuario)) {
                $vdata["rol"] = $usuario->rol;
                $vdata["documento"] = $usuario->documento;
                $vdata["nombres"] = $usuario->nombres;
                $vdata["telefono"] = $usuario->telefono;
                $vdata["correo"] = $usuario->correo;
                $vdata["contrasena"] = $usuario->contrasena;
            }
        }

        if ($this->input->server("REQUEST_METHOD") == "POST") {
            $data = array(
                'rol' => $this->input->post("rol"),
                'documento' => $this->input->post("documento"),
                'nombres' => $this->input->post("nombres"),
                'telefono' => $this->input->post("telefono"),
                'correo' => $this->input->post("correo"),
                'contrasena' => $this->input->post("contrasena")
            );

            if (isset($id_usuario)) {
                $this->Usuario->update($id_usuario, $data);
            } else {
                $this->Usuario->insert($data);
            }
        }
        $this->listado();
    }

  public function buscar()
  {
      $termino_busqueda = $this->input->post('termino_busqueda');

      $data['respuesta'] = $this->Usuarios->buscar($termino_busqueda);

      $this->load->view('Inventarios/listado', $data);
  }


}