<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Inventario extends CI_Model
{
    public $table_i = 'inventario';
    public $table_p = 'productos';
    public $table_id = 'id_inventario';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function guardar($data)
    {
        if (isset($data['id_inventario'])) {
            return $this->update($data);
        } else {
            return $this->insert($data);
        }
    }

    public function borrar($id)
    {
        $this->db->where($this->table_id, $id);
        $this->db->delete($this->table);
    }

    public function lista_p()
    {
        $query = $this->db->get($this->table_p);
        return $query->result();
    }

    public function lista_i()
    {
        $query = $this->db->get($this->table_i);
        return $query->result();
    }

    public function find($id)
    {
        $this->db->select();
        $this->db->from($this->table_i);
        $this->db->where($this->table_id,$id);

        $query = $this->db->get();
        return $query->row();
    }

    public function insert($data)
    {
        $this->db->insert($this->table_i, $data);
        return $this->db->insert_id();
    }

    public function update($id, $data)
    {
        $this->db->where($this->table_id, $id);
        $this->db->update($this->table_i, $data);
    }

    public function obtenerProducto($idProducto)
    {
        $this->db->select('nombre, categoria');
        $this->db->from('productos');
        $this->db->where('id_producto', $idProducto);
        $query = $this->db->get();
        return $query->row();
    }
}