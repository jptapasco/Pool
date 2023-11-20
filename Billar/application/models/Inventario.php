<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Inventario extends CI_Model
{
    public $table_p = 'productos';
    public $table_i = 'inventario';
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
        $this->db->delete($this->table_i);
    }

    public function editar($id)
    {
        $this->db->where($this->table_id, $id);
        $query = $this->db->get($this->table_i);
        return $query->row();
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

    public function insert($data)
    {
        $this->db->insert($this->table_i, $data);
        return $this->db->insert_id();
    }

    public function update($data)
    {
        $this->db->where($this->table_id, $data['id_inventario']);
        $this->db->update($this->table_p, $data);
        return $data['id_inventario'];
    }

    public function obtenerProducto($idProducto)
    {
        $this->db->select('nombre, categoria');
        $this->db->from('productos');
        $this->db->where('id_producto', $idProducto);
        $query = $this->db->get();
        return $query->row();
    }

    public function buscarInventario($buscar)
    {
        $this->db->select('productos.nombre AS nombre_producto, productos.categoria, inventario.unidad_medida, inventario.cantidad');
        $this->db->from('productos');
        $this->db->join('inventario', 'productos.id_producto = inventario.id_producto', 'left');
        $this->db->group_start();
        $this->db->like('productos.nombre', $buscar);
        $this->db->or_like('productos.categoria', $buscar);
        $this->db->or_like('inventario.unidad_medida', $buscar);
        $this->db->or_like('inventario.cantidad', $buscar);
        $this->db->group_end();
        $query = $this->db->get();
        return $query->result();
    }
}